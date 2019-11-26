<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Transaction;
use Illuminate\Http\Request;

class TransactionsController extends Controller
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
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $transactions = Transaction::where('transactionCode', 'LIKE', "%$keyword%")
                ->orWhere('stockOut', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $transactions = Transaction::latest()->paginate($perPage);
        }

        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $getRow = Transaction::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();

        $lastId = $getRow->first();
        $transactionCode = "TR00001";

        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                $transactionCode = "TR0000" . '' . ($lastId->id + 1);
            } else if ($lastId->id < 99) {
                $transactionCode = "TR000" . '' . ($lastId->id + 1);
            } else if ($lastId->id < 999) {
                $transactionCode = "TR00" . '' . ($lastId->id + 1);
            } else if ($lastId->id < 9999) {
                $transactionCode = "TR0" . '' . ($lastId->id + 1);
            } else {
                $transactionCode = "TR" . '' . ($lastId->id + 1);
            }
        }

        return view('transactions.create', compact('transactionCode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        Transaction::create($requestData);

        return redirect('transactions')->with('flash_message', 'Transaction added!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);

        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);

        return view('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $transaction = Transaction::findOrFail($id);
        $transaction->update($requestData);

        return redirect('transactions')->with('flash_message', 'Transaction updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Transaction::destroy($id);

        return redirect('transactions')->with('flash_message', 'Transaction deleted!');
    }
}
