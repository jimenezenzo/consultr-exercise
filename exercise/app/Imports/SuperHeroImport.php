<?php

namespace App\Imports;

use App\Publisher;
use App\Race;
use App\SuperHero;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class SuperHeroImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SuperHero([
            'name' => $row['name'],
            'fullName' => $row['fullName'],
            'strength' => $row['strength'],
            'speed' => $row['speed'],
            'durability' => $row['durability'],
            'power' => $row['power'],
            'combat' => $row['combat'],
            'race_id' => $this->setByIdRace($row['race']),
            'height_0' => $row['height/0'],
            'height_1' => $row['height/1'],
            'weight_0' => $row['weight/0'],
            'weight_1' => $row['weight/1'],
            'eyeColor' => $row['eyeColor'],
            'hairColor' => $row['hairColor'],
            'publisher_id' => $this->setByNamePublisher($row['publisher'])
        ]);
    }

    private function setByIdRace($row)
    {
        if (empty($row)) return null;

        $race = Race::firstOrCreate(['name' => $row]);

        return $race->id;
    }

    private function setByNamePublisher($row)
    {
        if (empty($row)) return null;

        $race = Publisher::firstOrCreate(['name' => $row]);

        return $race->id;
    }
}
