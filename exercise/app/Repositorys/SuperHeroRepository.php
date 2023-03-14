<?php

namespace App\Repositorys;

use App\SuperHero;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class SuperHeroRepository implements SuperHeroRepositoryInterface
{
    public function getSuperheros($filters)
    {
        return SuperHero::when(Arr::exists($filters, 'name'), function ($query) use ($filters) {
                return $query->where('name', 'like', '%' . $filters['name'] . '%');
            })
            ->when(Arr::exists($filters, 'race'), function ($query) use ($filters)  {
                return $query->whereHas('race', function (Builder $query) use ($filters) {
                    $query->where('name', 'like', '%' . $filters['race'] . '%');
                });
            })
            ->when(Arr::exists($filters, 'publisher'), function ($query) use ($filters) {
                return $query->whereHas('publisher', function (Builder $query) use ($filters) {
                    $query->where('name', 'like', '%' . $filters['publisher'] . '%');
                });
            })->paginate(20);
    }
}
