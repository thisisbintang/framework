<?php

namespace App\Http\Controllers;

use App\Good;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StocksController extends Controller
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
     * @return View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $stocks = Stock::where('itemCode', 'LIKE', "%$keyword%")
                ->orWhere('stockEntry', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $stocks = Stock::latest()->paginate($perPage);
        }

        return view('stocks.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $goods = Good::get();

        return view('stocks.create', compact('goods'));
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

        Stock::create($requestData);

        return redirect()->route('stocks.index')->with('flash_message', 'Stock added!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return View
     */
    public function show($id)
    {
        $stock = Stock::findOrFail($id);

        return view('stocks.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return View
     */
    public function edit($id)
    {
        $stock = Stock::findOrFail($id);

        return view('stocks.edit', compact('stock'));
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

        $stock = Stock::findOrFail($id);
        $stock->update($requestData);

        return redirect()->route('stocks.index')->with('flash_message', 'Stock updated!');
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
        Stock::destroy($id);

        return redirect()->route('stocks.index')->with('flash_message', 'Stock deleted!');
    }
}
