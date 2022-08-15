<?php

namespace App\Exports\Sheets;

use App\Models\Student;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class UsersPerMonthSheet implements FromQuery, WithTitle, WithHeadings, ShouldAutoSize, WithEvents
{
    private $añoinicio;
    private $mesinicio;
    private $diainicio;
    private $diafin;
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
        $array = array('students.id',
                            'students.name', 
                            'matricula', 
                            'email', 
                            'dos.name as dos', 
                            'dus.name as dus',
                            'das.name as das', 
                            'des.name as des', 
                            'dis.name as dis',
                            'results.test_aprendizaje', 
                            'results.test_status_academico', 
                            'results.created_at');
            
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
/**
     * @return array
     */
    public function registerEvents(): array
    {
        
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $styleArray = [
                    'font' => [
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                    ],
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => '1d576c'],
                        ],
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                        'rotation' => 90,
                        'startColor' => [
                            'argb' => '07ae8b',
                        ],
                        'endColor' => [
                            'argb' => 'FFFFFFFF',
                        ],
                    ],
                ];
                $cellRange = 'A1:L1'; // All headers
                if($this->test == "aprendizaje"){
                    $cellRange = 'A1:H1';
                }elseif($this->test == "vocacional"){
                    $cellRange = 'A1:J1';
                }elseif($this->test == "trayectoria"){
                    $cellRange = 'A1:H1';
                }
                $event->sheet->getDelegate()->getStyle($cellRange)
                ->applyFromArray($styleArray);

            },
        ];
    }

    public function allQuery($array)
    {
        $query = Student::select($array)
        ->join('results', 'students.id', '=', 'results.student_id')
        ;
        if($this->test == "todos" ){
            $query = $query
            ->crossJoin('educative_programs as das', 'results.test_orientacional1_id', '=', 'das.id')
            ->crossJoin('educative_programs  as des', 'results.test_orientacional2_id', '=', 'des.id')
            ->crossJoin('educative_programs as dis', 'results.test_orientacional3_id', '=', 'dis.id')
            ;
        }
        if($this->test == "vocacional"){
            $query = $query
            ->join('educative_programs as das', 'results.test_orientacional1_id', '=', 'das.id')
            ->join('educative_programs  as des', 'results.test_orientacional2_id', '=', 'des.id')
            ->join('educative_programs as dis', 'results.test_orientacional3_id', '=', 'dis.id')
            ;
        }
        $query = $query->join('groups as dus', 'students.group_id', '=', 'dus.id')
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
