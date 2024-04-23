<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FunFact extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();
        
        if (!Schema::hasTable('fun_facts')) {
            Schema::create('fun_facts', function (Blueprint $table) {
                $table->id();
                $table->string('text');
                $table->string('author');
                $table->timestamp('created_at')->useCurrent();
                $table->boolean('approved')->default(false);
                $table->timestamps();
            });
        }
    }
}
