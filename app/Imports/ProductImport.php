<?php

namespace App\Imports;
use App\Models\Product;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Queue\ShouldQueue;
// use Maatwebsite\Excel\Concerns\{FromQuery, WithHeadings, WithChunkReading};
use Maatwebsite\Excel\Concerns\{
    ToModel,
    WithHeadingRow,
    WithChunkReading,
    WithValidation
};

class ProductImport implements ToModel, WithHeadingRow, WithChunkReading, WithValidation, ShouldQueue
{
    public function model(array $row) {
        return new Product([
            'name'         => $row['name'],
            'price'        => $row['price'],
            'category'     => $row['category'],
            'stock'        => $row['stock'] ?? 0,
            'description'  => $row['description'] ?? '',
            'image'        => ''
        ]);
    }

    //Row wise validation
    public function rules(): array
    {
        return [
            '*.name'     => 'required|string|max:255',
            '*.price'    => 'required|numeric|min:0',
            '*.category' => 'required|string',
            '*.stock'    => 'nullable|integer|min:0',
        ];
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
