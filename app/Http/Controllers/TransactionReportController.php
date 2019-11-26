<?php

namespace App\Http\Controllers;

use App\Transaction;
use PDF;
use Illuminate\Http\Request;
class TransactionReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:cashier');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('transaction-report.index');
    }

    public function exportPDF()
    {
        $transactions = Transaction::all();
        $pdf = PDF::loadView('transaction-report.export-pdf', compact('transactions'));
        return $pdf->download('laporan-transaksi');
    }
}
