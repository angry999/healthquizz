<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\User;
// use App\Repositories\Backend\ItemDetailRepository;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize; 
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

use DB;

class ExportPdfController implements FromCollection, WithHeadings , ShouldAutoSize , WithEvents
{
    use Exportable;

    public function __construct()
    {
    }
    
     public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {

            $event->sheet->getDelegate()->getStyle('A1:L1' , function($cells) {
                    $cells->setFont(array(
                        'family'     => 'Calibri',
                        'size'       => '16',
                        'bold'       =>  true
                    ));
                     $cells->setBackground('#000000');
                     $cells->setFontColor('#ffffff');
                     $cells->setValignment('center');
                } );
              
                $cellRange = 'A1:L1';


                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(16);
                $event->sheet->getStyle($cellRange)->getFont()->setName('Arial');
                 
                
            },

        ];

    }

    public function collection()
    {

        $contents = DB::table('emails')->select('email', 'content', 'created_at')
        ->get();

        return $contents;
    }
    
    public function headings(): array
    {
        return [ 
            [
             'Email', 'Result', 'Date'
            ]
        ];
    }
}
