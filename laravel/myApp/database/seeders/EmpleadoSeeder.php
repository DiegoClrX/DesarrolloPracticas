<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker;
use App\Models\Empleado;
class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Hay dos maneras de hacerlo
     * @return void
     */
    public function run()
    {
        // $faker = Faker\Factory::create();
        // //Esta es la creacion de 20 empleados de una de las maneras que hay
        // for($i = 0;$i < 20; $i++){
        //     DB::table('empleados')->insert([
        //         //La clase faker crea todo tipo de datos random consultar la pagina: https://github.com/fzaninotto/faker
        //         'nombre' => $faker->firstName,
        //         'apellidos' => $faker->lastName,
        //         'dni' => $faker->randomNumber($nbDigits = 0).Str::random(1),
        //         'direccion'=>$faker->streetAddress,
        //         'ciudad'=>$faker->city,
        //         'cargo'=>$faker->jobTitle,
        //         'erte'=>$faker->boolean

        //     ]);
        // }

            Empleado::factory()
            ->count(15)
            ->create();
    }
}
