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
        \App\Models\Type::factory(1)->create(['name' => "Multirespuesta"]);

        //////////////////////////////////// Información académica 
        $q= \App\Models\Question::factory(1)->create([
            'question'=> "Escuela de procedencia",
            'status'=> 1,
            'is_example'=> 0,
            'order'=>1,
            'type_id'=>3
        ]);
        //
        //
        $q= \App\Models\Question::factory(1)->create([
            'question'=> "Promedio",
            'status'=> 1,
            'is_example'=> 0,
            'order'=>2,
            'type_id'=>3
        ]);
        //
        //
        $q= \App\Models\Question::factory(1)->create([
            'question'=> "¿Cúal fue la especialidad que tomaste en el bachillerato?",
            'status'=> 1,
            'is_example'=> 0,
            'order'=>3,
            'type_id'=>4
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Económico-Administrativo",
            'is_correct'=>0,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Humanidades",
            'is_correct'=>0,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Ciencias de la Salud",
            'is_correct'=>0,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Tecnológico",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Ciencias Biológicas y de la Salud",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Otras",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Ninguna",
            'is_correct'=>0,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        //
        //
        $q= \App\Models\Question::factory(1)->create([
            'question'=> "¿Es la primer ocasión que estudias una carrera universitaria?",
            'status'=> 1,
            'is_example'=> 0,
            'order'=>4,
            'type_id'=>1
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Si",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "No",
            'is_correct'=>0,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        //
        //
        $q= \App\Models\Question::factory(1)->create([
            'question'=> "Durante el bachillerato o Carrera Universitaria anterior ¿Reprobaste alguna materia o presentaste exámenes extraordinarios?",
            'status'=> 1,
            'is_example'=> 0,
            'order'=>5,
            'type_id'=>1
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Si",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "No",
            'is_correct'=>0,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        //
        //
        $q= \App\Models\Question::factory(1)->create([
            'question'=> "¿Cuál o cuáles materias reprobaste(s)?",
            'status'=> 1,
            'is_example'=> 0,
            'order'=>6,
            'type_id'=>4
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Matemáticas Básicas",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Biologia Ciencias de la Salud",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Razonamiento Analítico",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Conocimiento de la Lengua",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Química",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Habilidad Comunicativa",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Comprensión de Textos",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Inglés",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Ninguna",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        //
        //
        
        $q= \App\Models\Question::factory(1)->create([
            'question'=> "¿Cuentas con tu certificado de bachillerato/preparatoria?",
            'status'=> 1,
            'is_example'=> 0,
            'order'=>7,
            'type_id'=>1
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Si",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "No",
            'is_correct'=>0,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        //
        //
        $q= \App\Models\Question::factory(1)->create([
            'question'=> "¿Cuál o Cuáles materias no fueron de tu interés durante la preparatoria?",
            'status'=> 1,
            'is_example'=> 0,
            'order'=>8,
            'type_id'=>4
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Matemáticas",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Fisica ",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Química",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Biología",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Inglés ",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Ecología",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Administración",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Taller de lectura y redacción",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Ninguna",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        //
        //
        $q= \App\Models\Question::factory(1)->create([
            'question'=> "Entre mis asignaturas favoritas durante la preparatoria se encuentran",
            'status'=> 1,
            'is_example'=> 0,
            'order'=>9,
            'type_id'=>4
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Matemáticas",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Fisica ",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Química",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Biología",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Inglés ",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Ecología",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Administración",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Taller de lectura y redacción",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        \App\Models\Answer::factory(1)->create([
            'answer'=> "Ninguna",
            'is_correct'=>1,
            'value'=>0,
            'status'=>1,
            'order'=>1,
            'question_id'=>$q->id
        ]);
        /////////////////////////////////////////////////////////////
    }
}
