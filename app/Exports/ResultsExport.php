<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use App\Exports\Sheets\UsersPerMonthSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;

class ResultsExport implements WithMultipleSheets
{
    use Exportable;
    private $añoinicio;
    private $mesinicio;
    private $diainicio;
    private $añofin;
    private $mesfin;
    private $diafin;
    private $test;
    private $educational;
    private $grade;

    public function forYear($añoinicio, $mesinicio, $diainicio, $añofin, $mesfin, $diafin, $test, $educational, $grade)
    {
        $this->añoinicio = $añoinicio;
        $this->mesinicio = $mesinicio;
        $this->diainicio = $diainicio;
        $this->diafin = $diafin;
        $this->añofin = $añofin;
        $this->mesfin = $mesfin;
        $this->educational = $educational;
        $this->grade = $grade;
        $this->test = $test;
        return $this;
    }

    

    /**
     * @inheritDoc
     */
    public function sheets(): array
    {
        $sheets = [];
        foreach(range($this->mesinicio, $this->mesfin) as $month) {
            
            $sheets[] = new UsersPerMonthSheet($month, $this->añoinicio, $this->mesinicio, $this->diainicio, $this->añofin, $this->mesfin, $this->diafin, $this->educational, $this->grade, $this->test);
        }
        return $sheets;
    }
    
    
}
