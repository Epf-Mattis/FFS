<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FunFact extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'author',
        'date',
        'moderation_status', // Ajoutez 'moderation_status' à la liste des attributs fillables
    ];

    public static function boot()
    {
        parent::boot();
        
        if (!Schema::hasTable('fun_facts')) {
            Schema::create('fun_facts', function (Blueprint $table) {
                $table->id();
                $table->string('text');
                $table->string('author');
                $table->timestamp('created_at')->useCurrent();
                $table->timestamps();
                $table->boolean('approved')->default(false);
            });
        }
    }

    public function random()
    {
        $funFact = FunFact::where('moderation_status', 'approved')->inRandomOrder()->first();

        return response()->json($funFact);
    }
}
