<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker;
use Carbon\Carbon;

class incidenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=0; $i<50; $i++) {
            DB::table('incidencias')->insert([
          'latitud' => $faker->latitude,
                'longitud' => $faker->longitude,
                'ciudad' => $faker->city,
                'direccion' => $faker->streetAddress,
                'etiqueta' => Str::random(3),
                'descripcion' => $faker->text($maxNbChars = 200),
                'estado' => 'abierta',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
           }

    }

}
