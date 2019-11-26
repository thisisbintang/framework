<?php

namespace App\Http\Controllers;

use App\Stock;
use Illuminate\Http\Request;
use PDF;
class StockReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:employee');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('stock-report.index');
    }

    public function exportPDF()
    {
        $stocks = Stock::all();
        $pdf = PDF::loadView('stock-report.export-pdf', ['stocks' => $stocks]);
        return $pdf->download('laporan-data-stok-barang');
    }
}
