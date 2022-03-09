<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EducativeProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\EducativeProgram::factory(1)->create([
            'name'=> "Agricultura Sustentable y Protegida"
        ]);
        \App\Models\EducativeProgram::factory(1)->create([
            'name'=> "Desarrollo de Negocios Área Mercadotecnia"
        ]);
        \App\Models\EducativeProgram::factory(1)->create([
            'name'=> "Mecatronica Área Sistemas de Manufactura Flexible"
        ]);
        \App\Models\EducativeProgram::factory(1)->create([
            'name'=> "Procesos Alimentarios"
        ]);
        \App\Models\EducativeProgram::factory(1)->create([
            'name'=> "Procesos Industriales Área Automotriz"
        ]);
        \App\Models\EducativeProgram::factory(1)->create([
            'name'=> "Tecnologías de la Información"
        ]);
    }
}
