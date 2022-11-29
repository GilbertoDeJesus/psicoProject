<?php

namespace Database\Seeders;

use App\Models\Result;
use App\Models\Student;
use Illuminate\Database\Seeder;

use function PHPSTORM_META\map;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

 
//////////////////////////////////////////////
        \App\Models\Type::factory(1)->create(['name' => "Opcion Multiple"]);
        \App\Models\Type::factory(1)->create(['name' => "Desplegable"]);
        \App\Models\Type::factory(1)->create(['name' => "Abierta"]);
        \App\Models\Type::factory(1)->create(['name' => "Multirespuesta"]);



        $this->call(EducativeProgramSeeder::class); 

        $t1 = \App\Models\Test::factory(1)->create([
            'name' => "Trayectoria académica",
            "clave"=>"trayectoria",
            'directions' => "Lee atentamente y escribe lo que se te pide",
            'order' => 1,
        ]);
        $t2 = \App\Models\Test::factory(1)->create([
            'name' => "Orientación Vocacional",
            "clave"=>"vocacional",
            'directions' => "Lee cuidadosamente cada una de las oraciones y selecciona SÍ o NO dependiendo de tus conocimientos e intereses",
            'order' => 2,
        ]);
        $t3 = \App\Models\Test::factory(1)->create([
            'name' => "Estilo de aprendizaje",
            "clave"=>"aprendizaje",
            'directions' => "Lee cuidadosamente cada una de las oraciones y selecciona una opción en escala de 'Siempre' a 'Nunca' según cuanto te identificas",
            'order' => 3,
        ]);
        $t4 = \App\Models\Test::factory(1)->create([
            'name' => "Orientacion vocacional 2",
            "clave"=>"vocacional 2",
            'directions' => "Lee cuidadosamente cada una de las oraciones y selecciona una opción en escala de 'Siempre' a 'Nunca' según cuanto te identificas",
            'order' => 4,
        ]);


        //////////////////////////////////// Información académica 
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Escuela de procedencia",
            'status' => 1,
            'is_example' => 0,
            'order' => 1,
            'type_id' => 3,

        ]);



        //\App\Models\Question::find(1)->tests()->attach([$t1->id]);
        //
        //

        $q = \App\Models\Question::factory(1)->create([
            'question' => "Promedio",
            'status' => 1,
            'is_example' => 0,
            'order' => 2,
            'type_id' => 3
        ]);

        //\App\Models\Question::find(1)->tests()->attach([$t1->id]);
        //
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Cúal fue la especialidad que tomaste en el bachillerato?",
            'status' => 1,
            'is_example' => 0,
            'order' => 3,
            'type_id' => 1
        ]);

        //$question = \App\Models\Answer::find($q->id);

        foreach ($q as $question) {
            $question->save();
            $a = \App\Models\Answer::factory(1)->create([
                'answer' => "Económico-Administrativo",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);




            \App\Models\Answer::factory(1)->create([
                'answer' => "Humanidades",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Ciencias de la Salud",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Tecnológico",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Ciencias Biológicas y de la Salud",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Otras",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 7,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Ninguna",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 6,
                'question_id' => $question->id
            ]);
        }
        //
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Es la primer ocasión que estudias una carrera universitaria?",
            'status' => 1,
            'is_example' => 0,
            'order' => 4,
            'type_id' => 1
        ]);

        foreach ($q as $question) {
            $question->save();

            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Durante el bachillerato o carrera universitaria anterior ¿reprobaste alguna materia o presentaste exámenes extraordinarios?",
            'status' => 1,
            'is_example' => 0,
            'order' => 5,
            'type_id' => 1
        ]);

        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Cuál o cuáles materias reprobaste?",
            'status' => 1,
            'is_example' => 0,
            'order' => 6,
            'type_id' => 4
        ]);

        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Matemáticas Básicas",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Biologia Ciencias de la Salud",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Razonamiento Analítico",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Conocimiento de la Lengua",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Química",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Habilidad Comunicativa",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 6,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Comprensión de Textos",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 7,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Inglés",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 8,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Ninguna",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 9,
                'question_id' => $question->id
            ]);
        }
        //
        //

        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Cuentas con tu certificado de bachillerato/preparatoria?",
            'status' => 1,
            'is_example' => 0,
            'order' => 7,
            'type_id' => 1
        ]);

        foreach ($q as $question) {
            $question->save();

            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Cuál o cuáles materias no fueron de tu interés durante la preparatoria?",
            'status' => 1,
            'is_example' => 0,
            'order' => 8,
            'type_id' => 4
        ]);

        foreach ($q as $question) {
            $question->save();

            \App\Models\Answer::factory(1)->create([
                'answer' => "Matemáticas",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Fisica ",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Química",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Biología",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Inglés ",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Ecología",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 6,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Administración",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 7,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Taller de lectura y redacción",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 8,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Ninguna",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 9,
                'question_id' => $question->id
            ]);
        }
        //
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Entre mis asignaturas favoritas durante la preparatoria se encuentran",
            'status' => 1,
            'is_example' => 0,
            'order' => 9,
            'type_id' => 4
        ]);

        foreach ($q as $question) {
            $question->save();

            \App\Models\Answer::factory(1)->create([
                'answer' => "Matemáticas",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);

            \App\Models\Answer::factory(1)->create([
                'answer' => "Fisica ",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);

            \App\Models\Answer::factory(1)->create([
                'answer' => "Química",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);

            \App\Models\Answer::factory(1)->create([
                'answer' => "Biología",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);

            \App\Models\Answer::factory(1)->create([
                'answer' => "Inglés ",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);

            \App\Models\Answer::factory(1)->create([
                'answer' => "Ecología",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 6,
                'question_id' => $question->id
            ]);

            \App\Models\Answer::factory(1)->create([
                'answer' => "Administración",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 7,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Taller de lectura y redacción",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 8,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Ninguna",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 9,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Tienes computadora de escritorio o laptop como apoyo para  trabajos y tareas escolares?",
            'status' => 1,
            'is_example' => 0,
            'order' => 10,
            'type_id' => 1
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Cuentas con servicio de Internet en casa?",
            'status' => 1,
            'is_example' => 0,
            'order' => 11,
            'type_id' => 1
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿En casa cuentas con un espacio específico para realizar tus actividades académicas?",
            'status' => 1,
            'is_example' => 0,
            'order' => 12,
            'type_id' => 1
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Estudias o Trabajas?",
            'status' => 1,
            'is_example' => 0,
            'order' => 13,
            'type_id' => 1
        ]);
        foreach ($q as $question) {
            \App\Models\Answer::factory(1)->create([
                'answer' => "Solamente estudió",
                'is_correct' => 1,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Ambas",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
        }






        //////////////////////////////////// Intereses
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Conoces acerca de procesos económico administrativos?",
            'status' => 1,
            'is_example' => 0,
            'order' => 1,
            'type_id' => 1,
            'educative_program_id'=>2
        ]);

        foreach ($q as $question) {
            $question->save();

            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
                
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gusta automatizar procesos mediante el uso de la computadora o procesadores?",
            'status' => 1,
            'is_example' => 0,
            'order' => 2,
            'type_id' => 1,
            'educative_program_id'=>3
        ]);

        foreach ($q as $question) {
            $question->save();

            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gusta cocinar y/o procesar alimentos?",
            'status' => 1,
            'is_example' => 0,
            'order' => 3,
            'type_id' => 1,
            'educative_program_id'=>4
        ]);
        foreach ($q as $question) {
            $question->save();

            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gusta configurar equipos de cómputo?",
            'status' => 1,
            'is_example' => 0,
            'order' => 4,
            'type_id' => 1,
            'educative_program_id'=>6
        ]);

        foreach ($q as $question) {
            $question->save();

            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gusta llevar un control ordenado en el proceso o ejecución de alguna tarea industrial?",
            'status' => 1,
            'is_example' => 0,
            'order' => 5,
            'type_id' => 1,
            'educative_program_id'=>5
        ]);

        foreach ($q as $question) {
            $question->save();

            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te interesa dar mantenimiento a equipos industriales?",
            'status' => 1,
            'is_example' => 0,
            'order' => 6,
            'type_id' => 1,
            'educative_program_id'=>8
        ]);
        foreach ($q as $question) {
            $question->save();

            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Acostumbras a leer revistas relacionadas con los últimos avances científicos y tecnológicos en el área de la salud?",
            'status' => 1,
            'is_example' => 0,
            'order' => 7,
            'type_id' => 1,
            'educative_program_id'=>7
        ]);
        foreach ($q as $question) {
            $question->save();

            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gusta hacer reparaciones eléctricas en tu domicilio?",
            'status' => 1,
            'is_example' => 0,
            'order' => 8,
            'type_id' => 1,
            'educative_program_id'=>9
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Aceptarías trabajar en producción protegida para sustentabilidad agrícola?",
            'status' => 1,
            'is_example' => 0,
            'order' => 9,
            'type_id' => 1,
            'educative_program_id'=>1
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gusta el manejo de redes sociales?",
            'status' => 1,
            'is_example' => 0,
            'order' => 10,
            'type_id' => 1,
            'educative_program_id'=>2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Conoces que es un Arduino y sus funciones?",
            'status' => 1,
            'is_example' => 0,
            'order' => 11,
            'type_id' => 1,
            'educative_program_id'=>3
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gusta analizar la composición de los alimentos?",
            'status' => 1,
            'is_example' => 0,
            'order' => 12,
            'type_id' => 1,
            'educative_program_id'=>4
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gusta conocer el funcionamiento de un equipo de computo?",
            'status' => 1,
            'is_example' => 0,
            'order' => 13,
            'type_id' => 1,
            'educative_program_id'=>6
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te apasiona construir cosas con materiales a tu alcance?",
            'status' => 1,
            'is_example' => 0,
            'order' => 14,
            'type_id' => 1,
            'educative_program_id'=>5
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te interesa conocer el funcionamiento de equipos industriales?",
            'status' => 1,
            'is_example' => 0,
            'order' => 15,
            'type_id' => 1,
            'educative_program_id'=>8
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gusta trabajar con personas en el cuidado de la salud?",
            'status' => 1,
            'is_example' => 0,
            'order' => 16,
            'type_id' => 1,
            'educative_program_id'=>7
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te interesa desarrollar procesos de manufactura?",
            'status' => 1,
            'is_example' => 0,
            'order' => 17,
            'type_id' => 1,
            'educative_program_id'=>9
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        // //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te ofrecerías para participar en un proyecto de control y automatización de sistemas a campo abierto?",
            'status' => 1,
            'is_example' => 0,
            'order' => 18,
            'type_id' => 1,
            'educative_program_id'=>1
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 0,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaria analizar y resolver problemas dentro de un negocio o empresa?",
            'status' => 1,
            'is_example' => 0,
            'order' => 19,
            'type_id' => 1,
            'educative_program_id'=>2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 0,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te llama la atención el proceso de impresión 3D?",
            'status' => 1,
            'is_example' => 0,
            'order' => 20,
            'type_id' => 1,
            'educative_program_id'=>3
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría producir alimentos a escala industrial?",
            'status' => 1,
            'is_example' => 0,
            'order' => 21,
            'type_id' => 1,
            'educative_program_id'=>4
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría trabajar con lenguaje de programación?",
            'status' => 1,
            'is_example' => 0,
            'order' => 22,
            'type_id' => 1,
            'educative_program_id'=>6
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gusta realizar dibujos o bosquejos para después llevarlos a la realidad?",
            'status' => 1,
            'is_example' => 0,
            'order' => 23,
            'type_id' => 1,
            'educative_program_id'=>5
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría trabajar en el sector industrial como jefe de mantenimiento?",
            'status' => 1,
            'is_example' => 0,
            'order' => 24,
            'type_id' => 1,
            'educative_program_id'=>8
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te sentirías a gusto trabajando en un ámbito hospitalario?",
            'status' => 1,
            'is_example' => 0,
            'order' => 25,
            'type_id' => 1,
            'educative_program_id'=>7
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaria participar en el mantenimiento a los sistemas energéticos?",
            'status' => 1,
            'is_example' => 0,
            'order' => 26,
            'type_id' => 1,
            'educative_program_id'=>9
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría radicar en una zona agrícola-ganadera para desarrollar tus actividades como profesional?",
            'status' => 1,
            'is_example' => 0,
            'order' => 27,
            'type_id' => 1,
            'educative_program_id'=>1
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te ofrecerías para organizar las ventas y compras de una empresa?",
            'status' => 1,
            'is_example' => 0,
            'order' => 28,
            'type_id' => 1,
            'educative_program_id'=>2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te interesa saber cómo estan construidos los equipos de automatización de las grandes empresas industriales?",
            'status' => 1,
            'is_example' => 0,
            'order' => 29,
            'type_id' => 1,
            'educative_program_id'=>3
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te interesa trabajar en una empresa de alimentos?",
            'status' => 1,
            'is_example' => 0,
            'order' => 30,
            'type_id' => 1,
            'educative_program_id'=>4
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te interesan los secretos de la tecnología?",
            'status' => 1,
            'is_example' => 0,
            'order' => 31,
            'type_id' => 1,
            'educative_program_id'=>6
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te sientes cómodo al trabajar en ambientes como talleres o fábricas?",
            'status' => 1,
            'is_example' => 0,
            'order' => 32,
            'type_id' => 1,
            'educative_program_id'=>5
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Tienes conocimientos previos en las materias de electricidad y magnetismo?",
            'status' => 1,
            'is_example' => 0,
            'order' => 33,
            'type_id' => 1,
            'educative_program_id'=>8
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te dedicarías a socorrer a personas accidentadas?",
            'status' => 1,
            'is_example' => 0,
            'order' => 34,
            'type_id' => 1,
            'educative_program_id'=>7
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te agradaría tomar um curso de primeros auxilios?",
            'status' => 1,
            'is_example' => 0,
            'order' => 35,
            'type_id' => 1,
            'educative_program_id'=>7
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        // //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría investigar científicamente sobre cultivos agrícolas?",
            'status' => 1,
            'is_example' => 0,
            'order' => 36,
            'type_id' => 1,
            'educative_program_id'=>1
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría diseñar y planificar la producción de artículos o nuevos productos?",
            'status' => 1,
            'is_example' => 0,
            'order' => 37,
            'type_id' => 1,
            'educative_program_id'=>2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te interesa dar mantenimiento a maquinaria automatizada?",
            'status' => 1,
            'is_example' => 0,
            'order' => 38,
            'type_id' => 1,
            'educative_program_id'=>3
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Tienes conocimiento en conservar alimentos?",
            'status' => 1,
            'is_example' => 0,
            'order' => 39,
            'type_id' => 1,
            'educative_program_id'=>4
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Entablas una relación casi personal con tu computadora?",
            'status' => 1,
            'is_example' => 0,
            'order' => 40,
            'type_id' => 1,
            'educative_program_id'=>6
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Las matemáticas y el cálculo te resultan interesantes?",
            'status' => 1,
            'is_example' => 0,
            'order' => 41,
            'type_id' => 1,
            'educative_program_id'=>5
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Conoces el concepto de metrología industrial?",
            'status' => 1,
            'is_example' => 0,
            'order' => 42,
            'type_id' => 1,
            'educative_program_id'=>8
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Escuchas atentamente los síntomas que tiene una persona al estar enferma?",
            'status' => 1,
            'is_example' => 0,
            'order' => 43,
            'type_id' => 1,
            'educative_program_id'=>7
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        // $q = \App\Models\Question::factory(1)->create([
        //     'question' => "¿Te gustaría conocer a que se refieren las Energías renovables?",
        //     'status' => 1,
        //     'is_example' => 0,
        //     'order' => 44,
        //     'type_id' => 1,
        //     'educative_program_id'=>9
        // ]);
        // foreach ($q as $question) {
        //     $question->save();
        //     \App\Models\Answer::factory(1)->create([
        //         'answer' => "Sí",
        //         'is_correct' => 1,
        //         'value' => 1,
        //         'status' => 1,
        //         'order' => 1,
        //         'question_id' => $question->id
        //     ]);
        //     \App\Models\Answer::factory(1)->create([
        //         'answer' => "No",
        //         'is_correct' => 0,
        //         'value' => 0,
        //         'status' => 1,
        //         'order' => 2,
        //         'question_id' => $question->id
        //     ]);
        // }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Participarías en una campaña de reforestación empleando técnicas y conocimientos agrícolas?",
            'status' => 1,
            'is_example' => 0,
            'order' => 45,
            'type_id' => 1,
            'educative_program_id'=>1
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gusta diseñar logotipos y/o portadas para tus libretas?",
            'status' => 1,
            'is_example' => 0,
            'order' => 46,
            'type_id' => 1,
            'educative_program_id'=>2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te interesa diseñar máquinas que puedan simular actividades humanas?",
            'status' => 1,
            'is_example' => 0,
            'order' => 47,
            'type_id' => 1,
            'educative_program_id'=>3
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría desarrollar productos alimentarios aprovechando los recursos disponibles e impulsando el desarrollo de tú región?",
            'status' => 1,
            'is_example' => 0,
            'order' => 48,
            'type_id' => 1,
            'educative_program_id'=>4
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Estás informado sobre las nuevas tecnologías?",
            'status' => 1,
            'is_example' => 0,
            'order' => 49,
            'type_id' => 1,
            'educative_program_id'=>6
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te interesa desarrollar procesos de manufactura?",
            'status' => 1,
            'is_example' => 0,
            'order' => 50,
            'type_id' => 1,
            'educative_program_id'=>5
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Se te facilita el armar y desarmar objetos?",
            'status' => 1,
            'is_example' => 0,
            'order' => 51,
            'type_id' => 1,
            'educative_program_id'=>8
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
      
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te interesa formular proyectos de energías renovables mediante diagnósticos energéticos y estudios especializados de los recursos naturales del entorno?",
            'status' => 1,
            'is_example' => 0,
            'order' => 53,
            'type_id' => 1,
            'educative_program_id'=>9
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría conocer los alcances de la agricultura protegida?",
            'status' => 1,
            'is_example' => 0,
            'order' => 54,
            'type_id' => 1,
            'educative_program_id'=>1
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gusta tener el control de tus ingresos y egresos económicos?",
            'status' => 1,
            'is_example' => 0,
            'order' => 55,
            'type_id' => 1,
            'educative_program_id'=>2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gusta tener un negocio propio de tipo comercial?",
            'status' => 1,
            'is_example' => 0,
            'order' => 56,
            'type_id' => 1,
            'educative_program_id'=>2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gusta formular planos a través de software especializado?",
            'status' => 1,
            'is_example' => 0,
            'order' => 56,
            'type_id' => 1,
            'educative_program_id'=>3
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te interesaría supervisar el proceso de producción alimentaria?",
            'status' => 1,
            'is_example' => 0,
            'order' => 57,
            'type_id' => 1,
            'educative_program_id'=>4
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gusta explorar nuevas aplicaciones tecnológicas para uso del internet?",
            'status' => 1,
            'is_example' => 0,
            'order' => 58,
            'type_id' => 1,
            'educative_program_id'=>6
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        // $q = \App\Models\Question::factory(1)->create([
        //     'question' => "Te interesa saber ¿cómo estan construidos los equipos de automatización de las grandes empresas industriales?",
        //     'status' => 1,
        //     'is_example' => 0,
        //     'order' => 59,
        //     'type_id' => 1,
        //     'educative_program_id'=>3
        // ]);
        // foreach ($q as $question) {
        //     $question->save();
        //     \App\Models\Answer::factory(1)->create([
        //         'answer' => "Sí",
        //         'is_correct' => 1,
        //         'value' => 1,
        //         'status' => 1,
        //         'order' => 1,
        //         'question_id' => $question->id
        //     ]);
        //     \App\Models\Answer::factory(1)->create([
        //         'answer' => "No",
        //         'is_correct' => 0,
        //         'value' => 0,
        //         'status' => 1,
        //         'order' => 2,
        //         'question_id' => $question->id
        //     ]);
        // }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría conocer las normas de seguridad e higiene bajo las que opera el sector industrial?",
            'status' => 1,
            'is_example' => 0,
            'order' => 60,
            'type_id' => 1,
            'educative_program_id'=>8
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Ante una situación de emergencia actúas rápidamente?",
            'status' => 1,
            'is_example' => 0,
            'order' => 61,
            'type_id' => 1,
            'educative_program_id'=>7
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te llama la atención el uso de nuevas tecnologías para la generación de energía?",
            'status' => 1,
            'is_example' => 0,
            'order' => 62,
            'type_id' => 1,
            'educative_program_id'=>9
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te incluirías en un proyecto nacional de desarrollo sustentable de agricultura?",
            'status' => 1,
            'is_example' => 0,
            'order' => 63,
            'type_id' => 1,
            'educative_program_id'=>1
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
       
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gusta identificar, formular y resolver problemas aplicando conocimientos de las matemáticas, la física mecánica e ingeniería?",
            'status' => 1,
            'is_example' => 0,
            'order' => 65,
            'type_id' => 1,
            'educative_program_id'=>3
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te llama la atención el conocer los parámetros de control de calidad en alimentos?",
            'status' => 1,
            'is_example' => 0,
            'order' => 66,
            'type_id' => 1,
            'educative_program_id'=>4
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Se te facilita el uso de las tecnologías?",
            'status' => 1,
            'is_example' => 0,
            'order' => 67,
            'type_id' => 1,
            'educative_program_id'=>6
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te interesa saber cómo estaban construidos los equipos de automatización de las grandes empresas industriales?",
            'status' => 1,
            'is_example' => 0,
            'order' => 68,
            'type_id' => 1,
            'educative_program_id'=>5
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría tener tu propia empresa en la cadena de suministro y servicios a la industria automotriz y de autopartes?",
            'status' => 1,
            'is_example' => 0,
            'order' => 68,
            'type_id' => 1,
            'educative_program_id'=>5
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te interesaría realizar programas para mantenimiento preventivo de instalaciones industriales y maquinaria?",
            'status' => 1,
            'is_example' => 0,
            'order' => 69,
            'type_id' => 1,
            'educative_program_id'=>8
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Participarías en una campaña de prevención de enfermedades?",
            'status' => 1,
            'is_example' => 0,
            'order' => 70,
            'type_id' => 1,
            'educative_program_id'=>7
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te interesa el desarrollo sustentable de energía con el cuidado del medio ambiente?",
            'status' => 1,
            'is_example' => 0,
            'order' => 71,
            'type_id' => 1,
            'educative_program_id'=>9
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría trabajar en un laboratorio para conocer más sobre la estructura y mejora de las plantas?",
            'status' => 1,
            'is_example' => 0,
            'order' => 72,
            'type_id' => 1,
            'educative_program_id'=>1
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gusta organizar un plan de distribución y venta de un gran almacén?",
            'status' => 1,
            'is_example' => 0,
            'order' => 73,
            'type_id' => 1,
            'educative_program_id'=>2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gusta crear campañas publicitarias?",
            'status' => 1,
            'is_example' => 0,
            'order' => 73,
            'type_id' => 1,
            'educative_program_id'=>2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te interesa conocer el proceso de manufactura de piezas del sector industrial?",
            'status' => 1,
            'is_example' => 0,
            'order' => 74,
            'type_id' => 1,
            'educative_program_id'=>3
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría dedicarte a fabricar productos alimenticios de consumo masivo?",
            'status' => 1,
            'is_example' => 0,
            'order' => 75,
            'type_id' => 1,
            'educative_program_id'=>4
            
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gusta manejar y/o dar mantenimiento a dispositivos/aparatos tecnológicos (computadoras, teléfonos)?",
            'status' => 1,
            'is_example' => 0,
            'order' => 76,
            'type_id' => 1,
            'educative_program_id'=>6
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría trabajar en una empresa en un cargo técnico como control de la producción?",
            'status' => 1,
            'is_example' => 0,
            'order' => 77,
            'type_id' => 1,
            'educative_program_id'=>5
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría elaborar manuales de uso de maquinaria?",
            'status' => 1,
            'is_example' => 0,
            'order' => 78,
            'type_id' => 1,
            'educative_program_id'=>8
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Tienes disposición a seguir instrucciones precisas para cuidar a una persona?",
            'status' => 1,
            'is_example' => 0,
            'order' => 79,
            'type_id' => 1,
            'educative_program_id'=>7
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría implementar un proyecto usando tecnologías relacionadas con el aprovechamiento de recursos energéticos renovables?",
            'status' => 1,
            'is_example' => 0,
            'order' => 80,
            'type_id' => 1,
            'educative_program_id'=>9
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Tienes interés por saber cuales son las causas que determinan ciertos fenómenos que alteran la producción agrícola?",
            'status' => 1,
            'is_example' => 0,
            'order' => 81,
            'type_id' => 1,
            'educative_program_id'=>1
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //        
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te interesa trabajar con maquinaria y dispositivos electrónicos?",
            'status' => 1,
            'is_example' => 0,
            'order' => 83,
            'type_id' => 1,
            'educative_program_id'=>3
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría transformar materias primas, mediante el uso de la tecnología pertinente, para proporcionar valor agregado?",
            'status' => 1,
            'is_example' => 0,
            'order' => 84,
            'type_id' => 1,
            'educative_program_id'=>4
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Sabes que es un sistema operativo?",
            'status' => 1,
            'is_example' => 0,
            'order' => 85,
            'type_id' => 1,
            'educative_program_id'=>6
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te interesa participar en los procesos de producción en donde se empleen herramientas de administración enfocadas a satisfacer los requerimientos del cliente?",
            'status' => 1,
            'is_example' => 0,
            'order' => 86,
            'type_id' => 1,
            'educative_program_id'=>5
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Cuando se descompone un artefacto en casa, te dispones prontamente a repararlo?",
            'status' => 1,
            'is_example' => 0,
            'order' => 87,
            'type_id' => 1,
            'educative_program_id'=>8
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría aprender a tomar los signos vitales de una persona?",
            'status' => 1,
            'is_example' => 0,
            'order' => 88,
            'type_id' => 1,
            'educative_program_id'=>7
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te llama la atención el uso racional y eficiente de la energía eléctrica?",
            'status' => 1,
            'is_example' => 0,
            'order' => 89,
            'type_id' => 1,
            'educative_program_id'=>9
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te interesa aprender y conocer sobre las características del suelo y su influencia en los cultivos?",
            'status' => 1,
            'is_example' => 0,
            'order' => 90,
            'type_id' => 1,
            'educative_program_id'=>1
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gusta hacer trabajo de investigación de mercados?",
            'status' => 1,
            'is_example' => 0,
            'order' => 91,
            'type_id' => 1,
            'educative_program_id'=>2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría trabajar en una empresa que se dedique a la fabricación de componentes eléctricos?",
            'status' => 1,
            'is_example' => 0,
            'order' => 92,
            'type_id' => 1,
            'educative_program_id'=>3
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustan las materias de química y biología?",
            'status' => 1,
            'is_example' => 0,
            'order' => 93,
            'type_id' => 1,
            'educative_program_id'=>4
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Sabes la diferencia de un software o hardware?",
            'status' => 1,
            'is_example' => 0,
            'order' => 94,
            'type_id' => 1,
            'educative_program_id'=>6
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría trabajar en la industria automotriz en el área de producción, calidad, ingeniería de producto/manufactura, logística, proyectos y soporte técnico?",
            'status' => 1,
            'is_example' => 0,
            'order' => 95,
            'type_id' => 1,
            'educative_program_id'=>5
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te interesaría participar en programa para incrementar la eficiencia de los equipos y reducir los costos de mantenimiento?",
            'status' => 1,
            'is_example' => 0,
            'order' => 96,
            'type_id' => 1,
            'educative_program_id'=>8
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Tienes conocimiento del funcionamiento del cuerpo humano?",
            'status' => 1,
            'is_example' => 0,
            'order' => 97,
            'type_id' => 1,
            'educative_program_id'=>7
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría trabajar como supervisor de mantenimiento de instalaciones eléctricas?",
            'status' => 1,
            'is_example' => 0,
            'order' => 98,
            'type_id' => 1,
            'educative_program_id'=>9
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te llaman la atención los invernaderos?",
            'status' => 1,
            'is_example' => 0,
            'order' => 99,
            'type_id' => 1,
            'educative_program_id'=>1
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Convences fácilmente a otras personas?",
            'status' => 1,
            'is_example' => 0,
            'order' => 100,
            'type_id' => 1,
            'educative_program_id'=>2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Tienes conocimientos básicos de electricidad y electrónica?",
            'status' => 1,
            'is_example' => 0,
            'order' => 101,
            'type_id' => 1,
            'educative_program_id'=>3
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría conocer técnicas que aseguren la calidad de un producto alimenticio?",
            'status' => 1,
            'is_example' => 0,
            'order' => 102,
            'type_id' => 1,
            'educative_program_id'=>4
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría participar en un proyecto que acerque el internet a las comunidades sin este servicio?",
            'status' => 1,
            'is_example' => 0,
            'order' => 103,
            'type_id' => 1,
            'educative_program_id'=>6
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te llama la atención el uso de herramientas electromecanicas industriales?",
            'status' => 1,
            'is_example' => 0,
            'order' => 104,
            'type_id' => 1,
            'educative_program_id'=>5
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Se te facilita el uso del pensamiento crítico y analítico para la solución de problemas?",
            'status' => 1,
            'is_example' => 0,
            'order' => 105,
            'type_id' => 1,
            'educative_program_id'=>8
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Síentes empatía con las personas enfermas y/o con sus familiares?",
            'status' => 1,
            'is_example' => 0,
            'order' => 106,
            'type_id' => 1,
            'educative_program_id'=>7
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría ser coordinador de proyectos de eficiencia energética?",
            'status' => 1,
            'is_example' => 0,
            'order' => 107,
            'type_id' => 1,
            'educative_program_id'=>9
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Conoces sobre el Fitomejoramiento en plantas?",
            'status' => 1,
            'is_example' => 0,
            'order' => 108,
            'type_id' => 1,
            'educative_program_id'=>1
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Cuando tienes que trabajar con compañeros a tú cargo ¿logras el objetivo?",
            'status' => 1,
            'is_example' => 0,
            'order' => 109,
            'type_id' => 1,
            'educative_program_id'=>2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gusta dar soporte técnico, electromecánico y electrónico?",
            'status' => 1,
            'is_example' => 0,
            'order' => 110,
            'type_id' => 1,
            'educative_program_id'=>3
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        // $q = \App\Models\Question::factory(1)->create([
        //     'question' => "¿Te gustaría generar  un programa de seguridad e higiene en la producción de alimentos?",
        //     'status' => 1,
        //     'is_example' => 0,
        //     'order' => 111,
        //     'type_id' => 1,
        //     'educative_program_id'=>4
        // ]);
        // foreach ($q as $question) {
        //     $question->save();
        //     \App\Models\Answer::factory(1)->create([
        //         'answer' => "Sí",
        //         'is_correct' => 1,
        //         'value' => 1,
        //         'status' => 1,
        //         'order' => 1,
        //         'question_id' => $question->id
        //     ]);
        //     \App\Models\Answer::factory(1)->create([
        //         'answer' => "No",
        //         'is_correct' => 0,
        //         'value' => 0,
        //         'status' => 1,
        //         'order' => 2,
        //         'question_id' => $question->id
        //     ]);
        // }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría elaborar y gestionar una base de datos de una empresa?",
            'status' => 1,
            'is_example' => 0,
            'order' => 112,
            'type_id' => 1,
            'educative_program_id'=>6
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría trabajar como supervisor de calidad industrial?",
            'status' => 1,
            'is_example' => 0,
            'order' => 113,
            'type_id' => 1,
            'educative_program_id'=>5
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría conocer sobre la Termodinámica y sus efectos dentro de las estructuras físicas?",
            'status' => 1,
            'is_example' => 0,
            'order' => 114,
            'type_id' => 1,
            'educative_program_id'=>8
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Las materias de química, biología y anatomía te resultan interesantes?",
            'status' => 1,
            'is_example' => 0,
            'order' => 115,
            'type_id' => 1,
            'educative_program_id'=>7
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría trabajar en una auditoría energética?",
            'status' => 1,
            'is_example' => 0,
            'order' => 116,
            'type_id' => 1,
            'educative_program_id'=>9
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría trabajar en el área agroalimentaria?",
            'status' => 1,
            'is_example' => 0,
            'order' => 117,
            'type_id' => 1,
            'educative_program_id'=>1
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Crees que los detalles son tan importantes en ventas?",
            'status' => 1,
            'is_example' => 0,
            'order' => 118,
            'type_id' => 1,
            'educative_program_id'=>2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gusta diseñar interfases y sistemas electrónicos, utilizando herramientas de programación en dispositivos electrónicos o sistemas de cómputo, para el control y monitoreo de sistemas mecatrónicos?",
            'status' => 1,
            'is_example' => 0,
            'order' => 119,
            'type_id' => 1,
            'educative_program_id'=>3
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        // $q = \App\Models\Question::factory(1)->create([
        //     'question' => "¿Te gustaría trabajar como supervisor de materias primas en una empresa de alimentos?",
        //     'status' => 1,
        //     'is_example' => 0,
        //     'order' => 120,
        //     'type_id' => 1,
        //     'educative_program_id'=>4
        // ]);
        // foreach ($q as $question) {
        //     $question->save();
        //     \App\Models\Answer::factory(1)->create([
        //         'answer' => "Sí",
        //         'is_correct' => 1,
        //         'value' => 1,
        //         'status' => 1,
        //         'order' => 1,
        //         'question_id' => $question->id
        //     ]);
        //     \App\Models\Answer::factory(1)->create([
        //         'answer' => "No",
        //         'is_correct' => 0,
        //         'value' => 0,
        //         'status' => 1,
        //         'order' => 2,
        //         'question_id' => $question->id
        //     ]);
        // }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría trabajar en una empresa dedicada al desarrollo de Software?",
            'status' => 1,
            'is_example' => 0,
            'order' => 121,
            'type_id' => 1,
            'educative_program_id'=>6
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría trabajar como superintendente industrial?",
            'status' => 1,
            'is_example' => 0,
            'order' => 122,
            'type_id' => 1,
            'educative_program_id'=>5
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Tienes conocimientos sobre mecánica, automatización, electricidad, dibujo técnico?",
            'status' => 1,
            'is_example' => 0,
            'order' => 123,
            'type_id' => 1,
            'educative_program_id'=>8
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
       
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te interesa ocupar la energía solar para instalaciones eléctricas?",
            'status' => 1,
            'is_example' => 0,
            'order' => 125,
            'type_id' => 1,
            'educative_program_id'=>9
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Consideras importante la producción del campo para la vida?",
            'status' => 1,
            'is_example' => 0,
            'order' => 126,
            'type_id' => 1,
            'educative_program_id'=>1
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Planificas detalladamente tus trabajos antes de empezar?",
            'status' => 1,
            'is_example' => 0,
            'order' => 127,
            'type_id' => 1,
            'educative_program_id'=>2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te interesa aplicar nuevas tecnologías para resolver problemas en el sector industrial?",
            'status' => 1,
            'is_example' => 0,
            'order' => 128,
            'type_id' => 1,
            'educative_program_id'=>3
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te apasiona facilitar tareas cotidianas mediante el internet de las cosas?",
            'status' => 1,
            'is_example' => 0,
            'order' => 130,
            'type_id' => 1,
            'educative_program_id'=>6
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te interesaría trabajar en la producción industrial considerando los recursos tecnológicos, financieros, materiales y humanos?",
            'status' => 1,
            'is_example' => 0,
            'order' => 131,
            'type_id' => 1,
            'educative_program_id'=>5
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría conocer sobre instalaciones eléctricas y subestaciones eléctricas?",
            'status' => 1,
            'is_example' => 0,
            'order' => 132,
            'type_id' => 1,
            'educative_program_id'=>8
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
       
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Tienes conocimientos básicos en electrónica y electricidad?",
            'status' => 1,
            'is_example' => 0,
            'order' => 134,
            'type_id' => 1,
            'educative_program_id'=>9
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿El trabajo en exteriores te resulta agradable?",
            'status' => 1,
            'is_example' => 0,
            'order' => 135,
            'type_id' => 1,
            'educative_program_id'=>1
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //

        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Posees habilidades para trabajar en equipo?",
            'status' => 1,
            'is_example' => 0,
            'order' => 136,
            'type_id' => 1,
            'educative_program_id'=>4
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te gustaría aprender a determinar las condiciones optimas de los equipos utilizados en la producción de alimentos?",
            'status' => 1,
            'is_example' => 0,
            'order' => 137,
            'type_id' => 1,
            'educative_program_id'=>4
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Conoces a que se refiere la microbiología?",
            'status' => 1,
            'is_example' => 0,
            'order' => 138,
            'type_id' => 1,
            'educative_program_id'=>4
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Usar uniforme te hace sentir distinto, importante?",
            'status' => 1,
            'is_example' => 0,
            'order' => 139,
            'type_id' => 1,
            'educative_program_id'=>7
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Conoces la definición de Diastólica y Sistólica ?",
            'status' => 1,
            'is_example' => 0,
            'order' => 140,
            'type_id' => 1,
            'educative_program_id'=>7
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Sabes para qué se usa un multímetro?",
            'status' => 1,
            'is_example' => 0,
            'order' => 141,
            'type_id' => 1,
            'educative_program_id'=>9
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Conoces la definición de energías renovables?",
            'status' => 1,
            'is_example' => 0,
            'order' => 142,
            'type_id' => 1,
            'educative_program_id'=>9
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Sí",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }

        //////////////CANAL DE APRENDIZAJE

        $q = \App\Models\Question::factory(1)->create([
            'question' => "Puedo recordar algo mejor si lo escribo.",
            'status' => 1,
            'is_example' => 0,
            'order' => 1,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Al leer, oigo las palabras en mi cabeza o leo en voz alta.",
            'status' => 1,
            'is_example' => 0,
            'order' => 2,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }

        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Necesito hablar las cosas para entenderlas mejor.",
            'status' => 1,
            'is_example' => 0,
            'order' => 3,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "No me gusta leer o escuchar instrucciones, prefiero simplemente comenzar a hacer las cosas",
            'status' => 1,
            'is_example' => 0,
            'order' => 4,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Puedo visualizar imágenes en mi cabeza.",
            'status' => 1,
            'is_example' => 0,
            'order' => 5,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Puedo estudiar mejor si escucho música.",
            'status' => 1,
            'is_example' => 0,
            'order' => 6,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Necesito recreos frecuentes cuando estudio.",
            'status' => 1,
            'is_example' => 0,
            'order' => 7,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Pienso mejor cuando tengo la libertad de moverme, estar sentado detrás de un escritorio no es para mi",
            'status' => 1,
            'is_example' => 0,
            'order' => 8,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Tomo muchas notas de lo que leo y escucho.",
            'status' => 1,
            'is_example' => 0,
            'order' => 9,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Me ayuda mirar a la persona que está hablando. Me mantiene enfocado.",
            'status' => 1,
            'is_example' => 0,
            'order' => 10,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Se me hace difícil entender lo que una persona está diciendo si hay ruidos alrededor.",
            'status' => 1,
            'is_example' => 0,
            'order' => 11,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Prefiero que alguien me diga cómo tengo que hacer las cosas que leer las instrucciones.",
            'status' => 1,
            'is_example' => 0,
            'order' => 12,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Prefiero escuchar una conferencia o una grabación a leer un libro.",
            'status' => 1,
            'is_example' => 0,
            'order' => 13,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Cuando no puedo pensar en una palabra específica, uso mis manos y llamó al objeto “coso”.",
            'status' => 1,
            'is_example' => 0,
            'order' => 14,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Puedo seguir fácilmente a una persona que está hablando aunque mi cabeza esté hacia abajo o me encuentre mirando por la ventana.",
            'status' => 1,
            'is_example' => 0,
            'order' => 15,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Es más fácil para mí hacer un trabajo en un lugar tranquilo.",
            'status' => 1,
            'is_example' => 0,
            'order' => 16,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Me resulta fácil entender mapas, tablas y gráficos.",
            'status' => 1,
            'is_example' => 0,
            'order' => 17,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Cuando comienzo un artículo o un libro, prefiero espiar la última página.",
            'status' => 1,
            'is_example' => 0,
            'order' => 18,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Recuerdo mejor lo que la gente dice que su aspecto.",
            'status' => 1,
            'is_example' => 0,
            'order' => 19,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Recuerdo mejor si estudio en voz alta con alguien.",
            'status' => 1,
            'is_example' => 0,
            'order' => 20,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Tomo notas, pero nunca vuelvo a releerlas.",
            'status' => 1,
            'is_example' => 0,
            'order' => 21,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Cuando esto concentrado leyendo o escribiendo, la radio me molesta.",
            'status' => 1,
            'is_example' => 0,
            'order' => 22,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Me resulta difícil crear imágenes en mi cabeza.",
            'status' => 1,
            'is_example' => 0,
            'order' => 23,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Me resulta útil decir en voz alta las tareas que tengo para hacer.",
            'status' => 1,
            'is_example' => 0,
            'order' => 24,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Mi cuaderno y mi escritorio pueden verse un desastre, pero sé exactamente dónde está cada cosa.",
            'status' => 1,
            'is_example' => 0,
            'order' => 25,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Cuando estoy en un examen, puedo “ver en mi mente” la página en el libro de textos referente al tema y la respuesta.",
            'status' => 1,
            'is_example' => 0,
            'order' => 26,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "No puedo recordar una broma lo suficiente para contarla luego.",
            'status' => 1,
            'is_example' => 0,
            'order' => 27,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Al aprender algo nuevo, prefiero escuchar la información, luego leer y luego hacerlo.",
            'status' => 1,
            'is_example' => 0,
            'order' => 28,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Me gusta completar una tarea antes de comenzar otra.",
            'status' => 1,
            'is_example' => 0,
            'order' => 29,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Uso mis dedos para contar y muevo los labios cuando leo.",
            'status' => 1,
            'is_example' => 0,
            'order' => 30,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "No me gusta releer mi trabajo.",
            'status' => 1,
            'is_example' => 0,
            'order' => 31,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Cuando estoy tratando de recordar algo nuevo, por ejemplo un número de teléfono, me ayuda formarme una imagen mental para lograrlo.",
            'status' => 1,
            'is_example' => 0,
            'order' => 32,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Para obtener una nota extra, prefiero grabar un informe a escribirlo.",
            'status' => 1,
            'is_example' => 0,
            'order' => 33,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Fantaseo en clase.",
            'status' => 1,
            'is_example' => 0,
            'order' => 34,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Para obtener calificación extra, prefiero crear un proyecto a escribir un informe.",
            'status' => 1,
            'is_example' => 0,
            'order' => 35,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Cuando tengo una gran idea, debo escribirla inmediatamente o la olvido con facilidad",
            'status' => 1,
            'is_example' => 0,
            'order' => 36,
            'type_id' => 2
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "1",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "2",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "3",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "4",
                'is_correct' => 1,
                'value' => 4,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "5",
                'is_correct' => 1,
                'value' => 5,
                'status' => 1,
                'order' => 5,
                'question_id' => $question->id
            ]);
        }
        //
        ///////////////////////////////////////////////////////////// Cuestionario nuevo

        $q = \App\Models\Question::factory(1)->create([
            'question' => "Dirección de correo electrónico",
            'status' => 1,
            'is_example' => 0,
            'order' => 1,
            'type_id' => 3,

        ]);
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Nombre completo ",
            'status' => 1,
            'is_example' => 0,
            'order' => 2,
            'type_id' => 3,

        ]);
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Sexo",
            'status' => 1,
            'is_example' => 0,
            'order' => 3,
            'type_id' => 1,

        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Hombre",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Mujer",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Prefiero no responder",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Edad",
            'status' => 1,
            'is_example' => 0,
            'order' => 4,
            'type_id' => 3,
        ]);
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Estado civil",
            'status' => 1,
            'is_example' => 0,
            'order' => 5,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Soltero",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Casado",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Divorciado",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Viudo",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Localidad de origen",
            'status' => 1,
            'is_example' => 0,
            'order' => 6,
            'type_id' => 3,
        ]);
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Tu localidad de origen pertenece a una población indígena?",
            'status' => 1,
            'is_example' => 0,
            'order' => 7,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Específica grupo/s étnico/s y Municipio",
            'status' => 1,
            'is_example' => 0,
            'order' => 8,
            'type_id' => 3,
        ]);
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Hablas alguna lengua indígena?",
            'status' => 1,
            'is_example' => 0,
            'order' => 9,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Cual?",
            'status' => 1,
            'is_example' => 0,
            'order' => 10,
            'type_id' => 3,
        ]);
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Localidad donde radicas actualmente",
            'status' => 1,
            'is_example' => 0,
            'order' => 11,
            'type_id' => 3,
        ]);
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Domicilio Calle/número/Colonia/Municipio",
            'status' => 1,
            'is_example' => 0,
            'order' => 12,
            'type_id' => 3,
        ]);
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Número de teléfono celular",
            'status' => 1,
            'is_example' => 0,
            'order' => 13,
            'type_id' => 3,
        ]);
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Número de teléfono particular (casa) (de no contar con teléfono en casa coloca el número celular de algún familiar)",
            'status' => 1,
            'is_example' => 0,
            'order' => 14,
            'type_id' => 3,
        ]);
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Correo electrónico personal",
            'status' => 1,
            'is_example' => 0,
            'order' => 15,
            'type_id' => 3,
        ]);
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Tienes hijos?",
            'status' => 1,
            'is_example' => 0,
            'order' => 16,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Eres padre o madre soltera?",
            'status' => 1,
            'is_example' => 0,
            'order' => 17,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Actualmente con quién vives?",
            'status' => 1,
            'is_example' => 0,
            'order' => 18,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Solo",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Familia",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Conyuge",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Otro",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 4,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Cuántos hermanos tienes?",
            'status' => 1,
            'is_example' => 0,
            'order' => 19,
            'type_id' => 3,
        ]);
        //      
        $q = \App\Models\Question::factory(1)->create([
            'question' => "En general, ¿Cómo calificarías tu salud hoy?",
            'status' => 1,
            'is_example' => 0,
            'order' => 20,
            'type_id' => 3,
        ]);
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Estás bajo tratamiento médico por enfermedad  (hipertensión, epilepsia, diabetes, cáncer, anemia, etc.)?",
            'status' => 1,
            'is_example' => 0,
            'order' => 21,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Tipo de padecimiento",
            'status' => 1,
            'is_example' => 0,
            'order' => 22,
            'type_id' => 3,
        ]);
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Tu pareja o tú actualmente se encuentran esperando un hijo?",
            'status' => 1,
            'is_example' => 0,
            'order' => 23,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Consumes algún tipo de Droga (tabaco, marihuana, cocaína, inhallable, etc.)?",
            'status' => 1,
            'is_example' => 0,
            'order' => 24,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Has vivido una situación emocional significativa (ruptura amorosa, problemas familiares, desempleo, ansiedad, depresión, etc.) en los últimos 6 meses?",
            'status' => 1,
            'is_example' => 0,
            'order' => 25,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Acudiste a atención psicológica por la situación emocional significativa?",
            'status' => 1,
            'is_example' => 0,
            'order' => 26,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Has tenido menos interés o placer por tus actividades cotidianas?",
            'status' => 1,
            'is_example' => 0,
            'order' => 27,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Has sentido que no eres capaz de controlar tus preocupaciones?",
            'status' => 1,
            'is_example' => 0,
            'order' => 28,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Has tenido problemas para concentrarte?",
            'status' => 1,
            'is_example' => 0,
            'order' => 29,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        } 
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Has tenido sentimientos de minusvalía (sentirte menos)?",
            'status' => 1,
            'is_example' => 0,
            'order' => 30,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        } 
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Durante las últimas dos semanas... ¿Te has sentido deprimido(a) todos los días?",
            'status' => 1,
            'is_example' => 0,
            'order' => 31,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        } 
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Has sentido que te quieres morir o has pensado en la muerte?",
            'status' => 1,
            'is_example' => 0,
            'order' => 32,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        } 
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Has tenido problemas para relajarte?",
            'status' => 1,
            'is_example' => 0,
            'order' => 33,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        } 
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te has sentido tan inquieto(a) que te cuesta trabajo dejar de moverte?",
            'status' => 1,
            'is_example' => 0,
            'order' => 34,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        } 
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Has tenido temor de que algo horrible pueda suceder?",
            'status' => 1,
            'is_example' => 0,
            'order' => 35,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        } 
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Te observas (tocar, mirar, etcétera) para ver si notas o sientes algo en tu cuerpo?",
            'status' => 1,
            'is_example' => 0,
            'order' => 36,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        } 
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Comentas tus dolores o molestias físicas a familiares y amigos?",
            'status' => 1,
            'is_example' => 0,
            'order' => 37,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        } 
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Realizas conductas como guardar cama, ponerte el termómetro, tomarte el pulso, modificar tu dieta alimenticia, 
                tomar medicación, etcétera? esto sin estar seguro(a) de si estas enfermo(a).",
            'status' => 1,
            'is_example' => 0,
            'order' => 38,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Quién paga tus estudios?",
            'status' => 1,
            'is_example' => 0,
            'order' => 39,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Padre o madre",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Algun familiar",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Yo",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
        }
        //    
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Aparte de ti ¿Cuántas personas dependen económicamente de tus padres o pareja?",
            'status' => 1,
            'is_example' => 0,
            'order' => 40,
            'type_id' => 3,
        ]);
        //      
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Los Recursos Económicos con los que cuenta tu familia para desarrollar tus actividades académicas son:",
            'status' => 1,
            'is_example' => 0,
            'order' => 41,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Mas que suficiente",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Suficiente",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Insuficiente",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Económicamente, depende alguien de ti?",
            'status' => 1,
            'is_example' => 0,
            'order' => 42,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Quién es tu dependiente económico?",
            'status' => 1,
            'is_example' => 0,
            'order' => 43,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Cuentas con alguna Beca?",
            'status' => 1,
            'is_example' => 0,
            'order' => 44,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Trabajas?",
            'status' => 1,
            'is_example' => 0,
            'order' => 45,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Antes de postularte a alguna carrera de la UTT ¿Pausastes tus estudios por 1, 2 o mas años?",
            'status' => 1,
            'is_example' => 0,
            'order' => 46,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Es la primer ocasión que estas cursando estudios de nivel universitario?",
            'status' => 1,
            'is_example' => 0,
            'order' => 47,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Cuentas con una carrera universitaria trunca?",
            'status' => 1,
            'is_example' => 0,
            'order' => 48,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿La carrera que elegiste fue tu primer opción para estudiar?",
            'status' => 1,
            'is_example' => 0,
            'order' => 49,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿La escuela dónde cursaste el bachillera fue de escolaridad abierta?",
            'status' => 1,
            'is_example' => 0,
            'order' => 50,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "Durante el bachillerato o Carrera Universitaria anterior ¿Reprobaste alguna materia o presentaste exámenes extraordinarios?",
            'status' => 1,
            'is_example' => 0,
            'order' => 51,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Cuál o cuáles materias reprobaste(s)?",
            'status' => 1,
            'is_example' => 0,
            'order' => 52,
            'type_id' => 3,
        ]);
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Tienes computadora de escritorio o laptop como apoyo para trabajos y tareas escolares?",
            'status' => 1,
            'is_example' => 0,
            'order' => 53,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Es de uso exclusivo para ti?",
            'status' => 1,
            'is_example' => 0,
            'order' => 54,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Cuál es el estado de tu equipo de cómputo?",
            'status' => 1,
            'is_example' => 0,
            'order' => 55,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Bueno",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Regular",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "Malo",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 3,
                'question_id' => $question->id
            ]);
        }
        //       
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿Tienes internet en tu domicilio para realizar tus actividades académicas?",
            'status' => 1,
            'is_example' => 0,
            'order' => 56,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿La Uttehuacán fue tu primera opción para estudiar una carrera universitaria?",
            'status' => 1,
            'is_example' => 0,
            'order' => 57,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿La Uttehuacán fue tu segunda opción para estudiar una carrera universitaria?",
            'status' => 1,
            'is_example' => 0,
            'order' => 58,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿La Uttehuacán fue tu tercer opción para estudiar una carrera universitaria?",
            'status' => 1,
            'is_example' => 0,
            'order' => 59,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿La carrera en la que estás inscrito en  UTTehuacán fue tu primera opción para estudiar?",
            'status' => 1,
            'is_example' => 0,
            'order' => 60,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 1,
                'value' => 3,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿La carrera en la que estás inscrito en  UTTehuacán fue tu segunda opción para estudiar?",
            'status' => 1,
            'is_example' => 0,
            'order' => 61,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 2,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        //
        $q = \App\Models\Question::factory(1)->create([
            'question' => "¿La carrera en la que estás inscrito en UTTehuacán fue tu tercer opción para estudiar?",
            'status' => 1,
            'is_example' => 0,
            'order' => 62,
            'type_id' => 1,
        ]);
        foreach ($q as $question) {
            $question->save();
            \App\Models\Answer::factory(1)->create([
                'answer' => "Si",
                'is_correct' => 1,
                'value' => 1,
                'status' => 1,
                'order' => 1,
                'question_id' => $question->id
            ]);
            \App\Models\Answer::factory(1)->create([
                'answer' => "No",
                'is_correct' => 0,
                'value' => 0,
                'status' => 1,
                'order' => 2,
                'question_id' => $question->id
            ]);
        }
        /////////////////////////////////////////////////////////////

        \App\Models\Test::find(1)->questions()->attach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]);
        \App\Models\Test::find(2)->questions()->attach([
            14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29,
            30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49,
            50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69,
            70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89,
            90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 
            108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 
            124, 125, 126, 127, 128, 129, 130, 131, 132, 133, 134, 135, 136, 137, 138, 139, 
            140, 141, 142, 143, 144, 145, 146, 147, 148
        ]);
        \App\Models\Test::find(3)->questions()->attach([
            149, 150, 151, 152, 153, 154, 155, 156, 157, 158, 159, 160, 
            161, 162, 163, 164, 165, 166, 167, 168, 169, 170, 171, 172, 
            173, 174, 175, 176, 177, 178, 179, 180, 181, 182, 183, 184
        ]);
        \App\Models\Test::find(4)->questions()->attach([
            185, 186, 187, 188, 189, 190, 191, 192, 193, 194, 195, 196, 
            197, 198, 199, 200, 201, 202, 203, 204, 205, 206, 207, 208, 
            209, 210, 211, 212, 213, 214, 215, 216, 217, 218, 219, 220, 
            221, 222, 223, 224, 225, 226, 227, 228, 229, 230, 231, 232, 
            233, 234, 235, 236, 237, 238, 239, 240, 241, 242, 243, 244,
            245, 246
        ]);




        // $students  =Student::Factory(80)->create();       
        
        // foreach ($students as $student) {
        //     $student->tests()->attach(3,['answers' => '{
        //         "149": "Casi siempre",
        //         "150": "Casi siempre",
        //         "151": "Regularmente",
        //         "152": "Siempre",
        //         "153": "Regularmente",
        //         "154": "Casi siempre",
        //         "155": "Casi siempre",
        //         "156": "Siempre",
        //         "157": "Regularmente",
        //         "158": "Casi siempre",
        //         "159": "Casi siempre",
        //         "160": "Regularmente",
        //         "161": "Siempre",
        //         "162": "Regularmente",
        //         "163": "Casi siempre",
        //         "164": "Regularmente",
        //         "165": "Casi siempre",
        //         "166": "Regularmente",
        //         "167": "Siempre",
        //         "168": "Casi siempre",
        //         "169": "Regularmente",
        //         "170": "Siempre",
        //         "171": "Regularmente",
        //         "172": "Ocasionalmente",
        //         "173": "Siempre",
        //         "174": "Ocasionalmente",
        //         "175": "Casi siempre",
        //         "176": "Regularmente",
        //         "177": "Ocasionalmente",
        //         "178": "Siempre",
        //         "179": "Ocasionalmente",
        //         "180": "Siempre",
        //         "181": "Regularmente",
        //         "182": "Regularmente",
        //         "183": "Casi siempre",
        //         "184": "Regularmente"
        //     }','finished'=>1]);            
        //     $student->tests()->attach(2, ['answers' => '{
        //      "14": {
        //          "answer": "0",
        //          "program": 2
        //      },
        //      "15": {
        //          "answer": "1",
        //          "program": 3
        //      },
        //      "16": {
        //          "answer": "0",
        //          "program": 4
        //      },
        //      "17": {
        //          "answer": "1",
        //          "program": 6
        //      },
        //      "18": {
        //          "answer": "0",
        //          "program": 5
        //      },
        //      "19": {
        //          "answer": "0",
        //          "program": 8
        //      },
        //      "20": {
        //          "answer": "1",
        //          "program": 7
        //      },
        //      "21": {
        //          "answer": "0",
        //          "program": 9
        //      },
        //      "22": {
        //          "answer": "0",
        //          "program": 1
        //      },
        //      "23": {
        //          "answer": "1",
        //          "program": 2
        //      },
        //      "24": {
        //          "answer": "1",
        //          "program": 3
        //      },
        //      "25": {
        //          "answer": "0",
        //          "program": 4
        //      },
        //      "26": {
        //          "answer": "1",
        //          "program": 6
        //      },
        //      "27": {
        //          "answer": "0",
        //          "program": 5
        //      },
        //      "28": {
        //          "answer": "0",
        //          "program": 8
        //      },
        //      "29": {
        //          "answer": "0",
        //          "program": 7
        //      },
        //      "30": {
        //          "answer": "0",
        //          "program": 9
        //      },
        //      "31": {
        //          "answer": "0",
        //          "program": 1
        //      },
        //      "32": {
        //          "answer": "0",
        //          "program": 2
        //      },
        //      "33": {
        //          "answer": "1",
        //          "program": 3
        //      },
        //      "34": {
        //          "answer": "0",
        //          "program": 4
        //      },
        //      "35": {
        //          "answer": "1",
        //          "program": 6
        //      },
        //      "36": {
        //          "answer": "0",
        //          "program": 5
        //      },
        //      "37": {
        //          "answer": "0",
        //          "program": 8
        //      },
        //      "38": {
        //          "answer": "0",
        //          "program": 7
        //      },
        //      "39": {
        //          "answer": "0",
        //          "program": 9
        //      },
        //      "40": {
        //          "answer": "0",
        //          "program": 1
        //      },
        //      "41": {
        //          "answer": "0",
        //          "program": 2
        //      },
        //      "42": {
        //          "answer": "0",
        //          "program": 3
        //      },
        //      "43": {
        //          "answer": "0",
        //          "program": 4
        //      },
        //      "44": {
        //          "answer": "1",
        //          "program": 6
        //      },
        //      "45": {
        //          "answer": "0",
        //          "program": 5
        //      },
        //      "46": {
        //          "answer": "0",
        //          "program": 8
        //      },
        //      "47": {
        //          "answer": "0",
        //          "program": 7
        //      },
        //      "48": {
        //          "answer": "1",
        //          "program": 7
        //      },
        //      "49": {
        //          "answer": "0",
        //          "program": 1
        //      },
        //      "50": {
        //          "answer": "0",
        //          "program": 2
        //      },
        //      "51": {
        //          "answer": "0",
        //          "program": 3
        //      },
        //      "52": {
        //          "answer": "0",
        //          "program": 4
        //      },
        //      "53": {
        //          "answer": "1",
        //          "program": 6
        //      },
        //      "54": {
        //          "answer": "1",
        //          "program": 5
        //      },
        //      "55": {
        //          "answer": "0",
        //          "program": 8
        //      },
        //      "56": {
        //          "answer": "0",
        //          "program": 7
        //      },
        //      "57": {
        //          "answer": "0",
        //          "program": 1
        //      },
        //      "58": {
        //          "answer": "0",
        //          "program": 2
        //      },
        //      "59": {
        //          "answer": "0",
        //          "program": 3
        //      },
        //      "60": {
        //          "answer": "0",
        //          "program": 4
        //      },
        //      "61": {
        //          "answer": "1",
        //          "program": 6
        //      },
        //      "62": {
        //          "answer": "0",
        //          "program": 5
        //      },
        //      "63": {
        //          "answer": "0",
        //          "program": 8
        //      },
        //      "64": {
        //          "answer": "0",
        //          "program": 9
        //      },
        //      "65": {
        //          "answer": "0",
        //          "program": 1
        //      },
        //      "66": {
        //          "answer": "1",
        //          "program": 2
        //      },
        //      "67": {
        //          "answer": "0",
        //          "program": 2
        //      },
        //      "68": {
        //          "answer": "1",
        //          "program": 3
        //      },
        //      "69": {
        //          "answer": "0",
        //          "program": 4
        //      },
        //      "70": {
        //          "answer": "1",
        //          "program": 6
        //      },
        //      "71": {
        //          "answer": "0",
        //          "program": 8
        //      },
        //      "72": {
        //          "answer": "0",
        //          "program": 7
        //      },
        //      "73": {
        //          "answer": "0",
        //          "program": 9
        //      },
        //      "74": {
        //          "answer": "0",
        //          "program": 1
        //      },
        //      "75": {
        //          "answer": "0",
        //          "program": 3
        //      },
        //      "76": {
        //          "answer": "0",
        //          "program": 4
        //      },
        //      "77": {
        //          "answer": "1",
        //          "program": 6
        //      },
        //      "78": {
        //          "answer": "0",
        //          "program": 5
        //      },
        //      "79": {
        //          "answer": "0",
        //          "program": 5
        //      },
        //      "80": {
        //          "answer": "0",
        //          "program": 8
        //      },
        //      "81": {
        //          "answer": "0",
        //          "program": 7
        //      },
        //      "82": {
        //          "answer": "0",
        //          "program": 9
        //      },
        //      "83": {
        //          "answer": "0",
        //          "program": 1
        //      },
        //      "84": {
        //          "answer": "0",
        //          "program": 2
        //      },
        //      "85": {
        //          "answer": "0",
        //          "program": 2
        //      },
        //      "86": {
        //          "answer": "0",
        //          "program": 3
        //      },
        //      "87": {
        //          "answer": "0",
        //          "program": 4
        //      },
        //      "88": {
        //          "answer": "1",
        //          "program": 6
        //      },
        //      "89": {
        //          "answer": "0",
        //          "program": 5
        //      },
        //      "90": {
        //          "answer": "0",
        //          "program": 8
        //      },
        //      "91": {
        //          "answer": "0",
        //          "program": 7
        //      },
        //      "92": {
        //          "answer": "0",
        //          "program": 9
        //      },
        //      "93": {
        //          "answer": "0",
        //          "program": 1
        //      },
        //      "94": {
        //          "answer": "1",
        //          "program": 3
        //      },
        //      "95": {
        //          "answer": "0",
        //          "program": 4
        //      },
        //      "96": {
        //          "answer": "1",
        //          "program": 6
        //      },
        //      "97": {
        //          "answer": "0",
        //          "program": 5
        //      },
        //      "98": {
        //          "answer": "0",
        //          "program": 8
        //      },
        //      "99": {
        //          "answer": "0",
        //          "program": 7
        //      },
        //      "100": {
        //          "answer": "0",
        //          "program": 9
        //      },
        //      "101": {
        //          "answer": "0",
        //          "program": 1
        //      },
        //      "102": {
        //          "answer": "0",
        //          "program": 2
        //      },
        //      "103": {
        //          "answer": "0",
        //          "program": 3
        //      },
        //      "104": {
        //          "answer": "0",
        //          "program": 4
        //      },
        //      "105": {
        //          "answer": "1",
        //          "program": 6
        //      },
        //      "106": {
        //          "answer": "0",
        //          "program": 5
        //      },
        //      "107": {
        //          "answer": "0",
        //          "program": 8
        //      },
        //      "108": {
        //          "answer": "0",
        //          "program": 7
        //      },
        //      "109": {
        //          "answer": "0",
        //          "program": 9
        //      },
        //      "110": {
        //          "answer": "0",
        //          "program": 1
        //      },
        //      "111": {
        //          "answer": "0",
        //          "program": 2
        //      },
        //      "112": {
        //          "answer": "0",
        //          "program": 3
        //      },
        //      "113": {
        //          "answer": "0",
        //          "program": 4
        //      },
        //      "114": {
        //          "answer": "1",
        //          "program": 6
        //      },
        //      "115": {
        //          "answer": "0",
        //          "program": 5
        //      },
        //      "116": {
        //          "answer": "1",
        //          "program": 8
        //      },
        //      "117": {
        //          "answer": "0",
        //          "program": 7
        //      },
        //      "118": {
        //          "answer": "0",
        //          "program": 9
        //      },
        //      "119": {
        //          "answer": "0",
        //          "program": 1
        //      },
        //      "120": {
        //          "answer": "0",
        //          "program": 2
        //      },
        //      "121": {
        //          "answer": "0",
        //          "program": 3
        //      },
        //      "122": {
        //          "answer": "1",
        //          "program": 6
        //      },
        //      "123": {
        //          "answer": "0",
        //          "program": 5
        //      },
        //      "124": {
        //          "answer": "0",
        //          "program": 8
        //      },
        //      "125": {
        //          "answer": "0",
        //          "program": 7
        //      },
        //      "126": {
        //          "answer": "0",
        //          "program": 9
        //      },
        //      "127": {
        //          "answer": "0",
        //          "program": 1
        //      },
        //      "128": {
        //          "answer": "0",
        //          "program": 2
        //      },
        //      "129": {
        //          "answer": "0",
        //          "program": 3
        //      },
        //      "130": {
        //          "answer": "0",
        //          "program": 6
        //      },
        //      "131": {
        //          "answer": "0",
        //          "program": 5
        //      },
        //      "132": {
        //          "answer": "0",
        //          "program": 8
        //      },
        //      "133": {
        //          "answer": "0",
        //          "program": 9
        //      },
        //      "134": {
        //          "answer": "0",
        //          "program": 1
        //      },
        //      "135": {
        //          "answer": "0",
        //          "program": 2
        //      },
        //      "136": {
        //          "answer": "0",
        //          "program": 3
        //      },
        //      "137": {
        //          "answer": "0",
        //          "program": 6
        //      },
        //      "138": {
        //          "answer": "0",
        //          "program": 5
        //      },
        //      "139": {
        //          "answer": "0",
        //          "program": 8
        //      },
        //      "140": {
        //          "answer": "0",
        //          "program": 9
        //      },
        //      "141": {
        //          "answer": "0",
        //          "program": 1
        //      },
        //      "142": {
        //          "answer": "0",
        //          "program": 4
        //      },
        //      "143": {
        //          "answer": "0",
        //          "program": 4
        //      },
        //      "144": {
        //          "answer": "0",
        //          "program": 4
        //      },
        //      "145": {
        //          "answer": "0",
        //          "program": 7
        //      },
        //      "146": {
        //          "answer": "0",
        //          "program": 7
        //      },
        //      "147": {
        //          "answer": "0",
        //          "program": 9
        //      },
        //      "148": {
        //          "answer": "0",
        //          "program": 9
        //      }
        //  }','finished'=>1]);
        //     $student->tests()->attach(1, ['answers' => '{
        //         "1": "CBTis 229",
        //         "2": "9.6",
        //         "3": "Tecnológico",
        //         "4": "Sí",
        //         "5": "No",
        //         "6": [
        //             "Ninguna"
        //         ],
        //         "7": "Sí",
        //         "8": [
        //             "Matemáticas",
        //             "Inglés",
        //             "Administración"
        //         ],
        //         "9": [
        //             "Matemáticas",
        //             "Inglés",
        //             "Administración"
        //         ],
        //         "10": "Sí",
        //         "11": "Sí",
        //         "12": "Sí",
        //         "13": "Ambas"
        //  }','finished'=>1]);

        //     $pe1 = random_int(1,3);
        //     $pe2 = random_int(4,6);
        //     $pe3 = random_int(7,9);
        //     $testAprendizaje = ["Kinestesico","Auditivo","Visual"];
        //     $status_academico = ["Verde","Amarillo","Rojo"];

        //     \App\Models\Result::create([
        //         'test_orientacional1_id' => $pe1,
        //         'test_orientacional2_id' => $pe2,
        //         'test_orientacional3_id' => $pe3, 
        //         'test_aprendizaje' => $testAprendizaje[rand(0,2)],
        //         'test_status_academico' => $status_academico[rand(0,2)],
        //         'student_id' => $student->id
        //     ]);
         
        // }
    }
}
