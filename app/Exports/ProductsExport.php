<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Product::with('category')->get()->map(function($product) {
            return [
                'name' => $product->title,
                'price' => $product->price,
                'description' => $product->description? $product->description : '',
                'category' => $product->category ? $product->category->name : '',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Product Name',
            'Price',
            'Description',
            'Category Name',
        ];
    }
}
