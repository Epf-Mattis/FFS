<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FunFactResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'text' => $this->text,
            'author' => $this->author,
            'date' => $this->date,
        ];
    }
}
