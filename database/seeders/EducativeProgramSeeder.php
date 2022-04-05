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



        $ep = \App\Models\EducativeProgram::factory(1)->create([
            'name' => "Agricultura Sustentable y Protegida"
        ]);

        foreach ($ep as $epi) {
            $epi->save();

            \App\Models\Group::factory(1)->create([
                'name' => "A",
                'educative_program_id' => $epi->id
            ]);
            \App\Models\Group::factory(1)->create([
                'name' => "B",
                'educative_program_id' => $epi->id
            ]);
            \App\Models\Group::factory(1)->create([
                'name' => "C",
                'educative_program_id' => $epi->id
            ]);
        }


        $ep = \App\Models\EducativeProgram::factory(1)->create([
            'name' => "Desarrollo de Negocios Área Mercadotecnia"
        ]);

        foreach ($ep as $epi) {
            $epi->save();

            \App\Models\Group::factory(1)->create([
                'name' => "A",
                'educative_program_id' => $epi->id
            ]);
            \App\Models\Group::factory(1)->create([
                'name' => "B",
                'educative_program_id' => $epi->id
            ]);
            \App\Models\Group::factory(1)->create([
                'name' => "C",
                'educative_program_id' => $epi->id
            ]);
        }

        $ep = \App\Models\EducativeProgram::factory(1)->create([
            'name' => "Mecatronica Área Sistemas de Manufactura Flexible"
        ]);

        foreach ($ep as $epi) {
            $epi->save();

            \App\Models\Group::factory(1)->create([
                'name' => "A",
                'educative_program_id' => $epi->id
            ]);
            \App\Models\Group::factory(1)->create([
                'name' => "B",
                'educative_program_id' => $epi->id
            ]);
            \App\Models\Group::factory(1)->create([
                'name' => "C",
                'educative_program_id' => $epi->id
            ]);
        }

        $ep = \App\Models\EducativeProgram::factory(1)->create([
            'name' => "Procesos Alimentarios"
        ]);

        foreach ($ep as $epi) {
            $epi->save();

            \App\Models\Group::factory(1)->create([
                'name' => "A",
                'educative_program_id' => $epi->id
            ]);
            \App\Models\Group::factory(1)->create([
                'name' => "B",
                'educative_program_id' => $epi->id
            ]);
            \App\Models\Group::factory(1)->create([
                'name' => "C",
                'educative_program_id' => $epi->id
            ]);
        }

        $ep = \App\Models\EducativeProgram::factory(1)->create([
            'name' => "Procesos Industriales Área Automotriz"
        ]);

        foreach ($ep as $epi) {
            $epi->save();

            \App\Models\Group::factory(1)->create([
                'name' => "A",
                'educative_program_id' => $epi->id
            ]);
            \App\Models\Group::factory(1)->create([
                'name' => "B",
                'educative_program_id' => $epi->id
            ]);
            \App\Models\Group::factory(1)->create([
                'name' => "C",
                'educative_program_id' => $epi->id
            ]);
        }

        $ep = \App\Models\EducativeProgram::factory(1)->create([
            'name' => "Tecnologías de la Información"
        ]);

        foreach ($ep as $epi) {
            $epi->save();

            \App\Models\Group::factory(1)->create([
                'name' => "A",
                'educative_program_id' => $epi->id
            ]);
            \App\Models\Group::factory(1)->create([
                'name' => "B",
                'educative_program_id' => $epi->id
            ]);
            \App\Models\Group::factory(1)->create([
                'name' => "C",
                'educative_program_id' => $epi->id
            ]);
        }

        $ep = \App\Models\EducativeProgram::factory(1)->create([
            'name' => "Enfermería"
        ]);

        foreach ($ep as $epi) {
            $epi->save();

            \App\Models\Group::factory(1)->create([
                'name' => "A",
                'educative_program_id' => $epi->id
            ]);
            \App\Models\Group::factory(1)->create([
                'name' => "B",
                'educative_program_id' => $epi->id
            ]);
            \App\Models\Group::factory(1)->create([
                'name' => "C",
                'educative_program_id' => $epi->id
            ]);
        }

        $ep = \App\Models\EducativeProgram::factory(1)->create([
            'name' => "Mantenimiento Industrial"
        ]);

        foreach ($ep as $epi) {
            $epi->save();

            \App\Models\Group::factory(1)->create([
                'name' => "A",
                'educative_program_id' => $epi->id
            ]);
            \App\Models\Group::factory(1)->create([
                'name' => "B",
                'educative_program_id' => $epi->id
            ]);
            \App\Models\Group::factory(1)->create([
                'name' => "C",
                'educative_program_id' => $epi->id
            ]);
        }

        $ep = \App\Models\EducativeProgram::factory(1)->create([
            'name' => "Energias Renovables"
        ]);

        foreach ($ep as $epi) {
            $epi->save();

            \App\Models\Group::factory(1)->create([
                'name' => "A",
                'educative_program_id' => $epi->id
            ]);
            \App\Models\Group::factory(1)->create([
                'name' => "B",
                'educative_program_id' => $epi->id
            ]);
            \App\Models\Group::factory(1)->create([
                'name' => "C",
                'educative_program_id' => $epi->id
            ]);
        }

        /*$ep = \App\Models\EducativeProgram::factory(1)->create([
            'name' => "Tecnologías de la Información RIC"
        ]);

        foreach ($ep as $epi) {
            $epi->save();

            \App\Models\Group::factory(1)->create([
                'name' => "A",
                'educative_program_id' => $epi->id
            ]);
            \App\Models\Group::factory(1)->create([
                'name' => "B",
                'educative_program_id' => $epi->id
            ]);
            \App\Models\Group::factory(1)->create([
                'name' => "C",
                'educative_program_id' => $epi->id
            ]);
        }*/
    }
}
