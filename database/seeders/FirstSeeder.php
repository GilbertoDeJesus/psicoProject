<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Type::factory(1)->create(['name' => "Opcion Multiple"]);
        \App\Models\Type::factory(1)->create(['name' => "Desplegable"]);
        \App\Models\Type::factory(1)->create(['name' => "Abierta"]);

        ////////////////////////////////////Ejemplooooo (borrar cuando ya sea el bueno)
        $q= \App\Models\Question::factory(1)->create([
            'question'=> "Pregunta....",
            'status'=> 1,
            'is_example'=> 0,
            'order'=>1,
            'type_id'=>2
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "1",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q
        ]);
        /////////////////////////////////////////////////////////////
    }
}
