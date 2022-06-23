<?php

namespace App\Exports;

use App\Models\BeritaModel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Drawing;

class UsersExport implements FromView
{
    public $data = array();
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($data = array())
    {
        $this->data  = $data;
    }

    public function view(): View
   {
       return view('data.excel', $this->data);
   }
}
