<?php

namespace App\Exports;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\{FromQuery, WithHeadings, WithChunkReading};

class ProductExport implements FromQuery, WithHeadings, WithChunkReading, ShouldQueue
{
    public function query()
    {
        return Product::select('name', 'price', 'category', 'stock', 'description', 'image')
                    ->orderBy('created_at', 'asc');
    }

    public function headings(): array
    {
        return [
            'Name',
            'Price',
            'Category',
            'Stock',
            'Description',
            'Image',
        ];
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
