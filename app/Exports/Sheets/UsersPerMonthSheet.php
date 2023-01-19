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
    private $test;


    public function __construct($month, $añoinicio, $mesinicio, $diainicio, $añofin, $mesfin, $diafin)
    {
        $this->añoinicio = $añoinicio;
        $this->mesinicio = $mesinicio;
        $this->diainicio = $diainicio;
        $this->añofin = $añofin;
        $this->mesfin = $mesfin;
        $this->diafin = $diafin;
        $this->month = $month;
    }



    public function query()
    {
        $array = array(
            'students.id',
            'students.name',
            'students.family_name',
            'students.last_name',
            'email',
            'das.name as das',
            'des.name as des',
            'dis.name as dis',
            'results.created_at'
        );
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
            'Apellido P',
            'Apellido M',
            'Email',
            'Programa E. 1',
            'Programa E. 2',
            'Programa E. 3',
            'Fecha',
        ];

        return $array;
    }
    /**
     * @return array
     */
    public function registerEvents(): array
    {

        return [
            AfterSheet::class    => function (AfterSheet $event) {
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
                $cellRange = 'A1:I1'; // All headers

                $event->sheet->getDelegate()->getStyle($cellRange)
                    ->applyFromArray($styleArray);
            },
        ];
    }

    public function allQuery($array)
    {
        $query = Student::select($array)
            ->join('results', 'students.id', '=', 'results.student_id');
        $query = $query
            ->crossJoin('educative_programs as das', 'results.test_orientacional1_id', '=', 'das.id')
            ->crossJoin('educative_programs  as des', 'results.test_orientacional2_id', '=', 'des.id')
            ->crossJoin('educative_programs as dis', 'results.test_orientacional3_id', '=', 'dis.id');

        $query = $query->whereYear('students.created_at', $this->añoinicio)
            ->whereMonth('students.created_at', $this->month);
        if ($this->mesinicio == $this->month) {
            $query = $query->whereDay('students.created_at', '>=', $this->diainicio);
        } elseif ($this->mesfin == $this->month) {
            $query = $query->whereDay('students.created_at', '<=', $this->diafin);
        }



        return $query;
    }
}
