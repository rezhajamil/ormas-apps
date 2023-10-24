<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TerritorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = database_path('seeds/territory_new.csv');
        $contents = array_map('str_getcsv', file($csvFile));

        foreach ($contents as $idx => $data) {
            if ($idx > 0) {
                DB::table('territory')->insert([
                    'regional' => $data[0],
                    'branch' => $data[1],
                    'sub_branch' => $data[2],
                    'cluster' => $data[3],
                    'provinsi' => $data[4],
                    'kabupaten' => $data[5],
                    'kecamatan' => $data[6],
                    'desa' => $data[7],
                ]);
            }
        }
    }
}
