<?php

namespace App\Http\Controllers;

use App\Good;
use Illuminate\Http\Request;
use PDF;

class GoodReportController extends Controller
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
        return view('good-report.index');
    }

    public function exportPDF()
    {
        $goods = Good::all();
        $pdf = PDF::loadView('good-report.export-pdf', ['goods' => $goods]);
        return $pdf->download('laporan-data-barang');
    }
}
