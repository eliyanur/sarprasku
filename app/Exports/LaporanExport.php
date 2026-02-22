<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LaporanExport implements 
    FromCollection, 
    WithHeadings, 
    WithStyles, 
    ShouldAutoSize
{
    public function collection()
    {
        return Peminjaman::with(['user','alat'])->get()->map(function($item){
            return [
                $item->user->name,
                $item->alat->nama_alat,
                \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d-m-Y'),
                \Carbon\Carbon::parse($item->tanggal_kembali)->format('d-m-Y'),
                ucfirst($item->status),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Alat',
            'Tanggal Pinjam',
            'Tanggal Kembali',
            'Status',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [ // baris header
                'font' => ['bold' => true],
            ],
        ];
    }
}
