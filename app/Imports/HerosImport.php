<?php

namespace App\Imports;

use App\Hero;
use App\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HerosImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            DB::beginTransaction();
            try{
                Hero::create([
                    'external_id'   =>$row['id'],
                    'name'          =>$row['name'],
                    'fullName'      =>$row['fullname'],
                    'strength'      =>$row['strength'],
                    'speed'         =>$row['speed'],
                    'durability'    =>$row['durability'],
                    'power'         =>$row['power'],
                    'combat'        =>$row['combat'],
                    'race'          =>$row['race'],
                    'height0'      =>$row['height0'],
                    'height1'      =>$row['height1'],
                    'weight0'      =>$row['weight0'],
                    'weight1'      =>$row['weight1'],
                    'eyeColor'      =>$row['eyecolor'],
                    'hairColor'     =>$row['haircolor'],
                    'publisher'     =>$row['publisher'],
                ]);
                DB::commit();
            }catch (\Exception  $e) {
                \Log::debug($e->getMessage());
                DB::rollBack();
            }
        }
    }
}