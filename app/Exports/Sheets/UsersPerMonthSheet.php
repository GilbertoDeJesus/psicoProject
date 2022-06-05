<?php

namespace App\Exports\Sheets;

use App\Models\Student;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersPerMonthSheet implements FromQuery, WithTitle, WithHeadings
{
    private $añoinicio;
    private $mesinicio;
    private $diainicio;
    private $diafin;
    private $añofin;
    private $mesfin;
    private $month;
    private $educational;
    private $grade;
    private $test;
    

    public function __construct($month, $añoinicio, $mesinicio, $diainicio, $añofin, $mesfin, $diafin, $educational, $grade, $test)
    {
        $this->añoinicio = $añoinicio;
        $this->mesinicio = $mesinicio;
        $this->diainicio = $diainicio;
        $this->añofin = $añofin;
        $this->mesfin = $mesfin;
        $this->diafin = $diafin;
        $this->month = $month;
        $this->educational = $educational;
        $this->grade = $grade;
        $this->test = $test;
    }

    

    public function query()
    {   
        $array = array('students.id','students.name', 'matricula', 'email', 'dos.name as dos', 
                            'dus.name as dus',
                            'das.name as das', 'des.name as des', 'dis.name as dis',
                            'results.test_aprendizaje', 'results.test_status_academico', 'results.created_at');
            
            if($this->test == "aprendizaje"){
                                unset($array[6]);
                                unset($array[7]);
                                unset($array[8]);
                                unset($array[10]);
                            }elseif($this->test == "vocacional"){
                                unset($array[9]);
                                unset($array[10]);
                            }elseif($this->test == "trayectoria"){
                                unset($array[6]);
                                unset($array[7]);
                                unset($array[8]);
                                unset($array[9]);
                            }   
            return ($this->allQuery($array));
        

    }
    /**
     * @inheritDoc
     */
    public function title(): string
    {
        return Carbon::parse("{$this->añoinicio}-{$this->month}-01")->format('F-Y');
    }
    /**
     * @inheritDoc
     */
    public function headings(): array
    {
        $array = [
            '#',
            'Nombre',
            'Matrícula',
            'Email',
            'Programa Educativo',
            'Grado',
            'Orientacional1',
            'Orientacional2',
            'Orientacional3',
            'Estilo de Aprendizaje',
            'Trajectoria Académica',
            'Fecha',
        ];
        
            if($this->test == "aprendizaje"){
                unset($array[6]);
                unset($array[7]);
                unset($array[8]);
                unset($array[10]);
            }elseif($this->test == "vocacional"){
                unset($array[9]);
                unset($array[10]);
            }elseif($this->test == "trayectoria"){
                unset($array[6]);
                unset($array[7]);
                unset($array[8]);
                unset($array[9]);
            }
        
        return $array;
    }

    public function allQuery($array)
    {
        $query = Student::select($array)
        ->join('results', 'students.id', '=', 'results.student_id')
        ->join('educative_programs as das', 'results.test_orientacional1_id', '=', 'das.id')
        ->join('educative_programs as des', 'results.test_orientacional2_id', '=', 'des.id')
        ->join('educative_programs as dis', 'results.test_orientacional3_id', '=', 'dis.id')
        ->join('groups as dus', 'students.group_id', '=', 'dus.id')
        ->join('educative_programs as dos', 'dus.educative_program_id', '=', 'dos.id')
        ->whereYear('students.created_at', $this->añoinicio)
        ->whereMonth('students.created_at', $this->month)
        ;
        if($this->mesinicio == $this->month){
            $query = $query->whereDay('students.created_at', '>=', $this->diainicio);
        }elseif($this->mesfin == $this->month){
            $query = $query->whereDay('students.created_at', '<=', $this->diafin);
        }
        
        if($this->educational != "todos"){
            $query = $query->where('dus.educative_program_id', '=', $this->educational); 
        }
        if($this->grade != "todos"){
            $query = $query->where('dus.id', '=', $this->grade); 
        }
        return $query;
    }

}
