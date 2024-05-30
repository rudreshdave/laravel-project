<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function export() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function showExportForm()
    {
        return view('export');
    }
}