<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProductStyleExport implements
    FromView,
    WithStyles

{

    protected $id;
    protected $line;

    function __construct($id){
        $this->id = $id;
        $this->line = 0;
    }

    public function view(): View{
        $result = Product::with('user')->where('user_id', $this->id)->get();

        $this->line = count($result) ; //hitung banyak data

        return view('pages.product', compact('result'));
    }

    public function styles(Worksheet $sheet)
    {
        $baris = 3 + $this->line;
        $sheet->getColumnDimension('A')->setWidth(8);
        $sheet->getColumnDimension('B')->setWidth(40);
        $sheet->getColumnDimension('C')->setWidth(13);
        $sheet->getColumnDimension('D')->setWidth(13);

        return [
            'A1:D2' => [
                'font' => [
                    'size' => 14,
                    'style' => 'bold'
                ],
                'alignment' => [
                    'vertical' => 'center'
                ],
            ],
            'C' => [
                'alignment' => [
                    'horizontal' => 'center'
                ]
            ],
            'D' => [
                'alignment' => [
                    'horizontal' => 'center'
                ]
            ],
            'A3:D' . $baris => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ]
                ]
            ]
        ];
    }
}
