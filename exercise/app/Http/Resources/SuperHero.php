<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SuperHero extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'fullName' => $this->fullName,
            'strength' => $this->strength,
            'speed' => $this->speed,
            'durability' => $this->durability,
            'power' => $this->power,
            'combat' => $this->combat,
            'race' => $this->race ? $this->race->name : $this->race,
            'height_0' => $this->height_0,
            'height_1' => $this->height_1,
            'weight_0' => $this->weight_0,
            'weight_1' => $this->weight_1,
            'eyeColor' => $this->eyeColor,
            'hairColor' => $this->hairColor,
            'publisher' => $this->publisher ? $this->publisher->name : $this->publisher
        ];
    }
}
