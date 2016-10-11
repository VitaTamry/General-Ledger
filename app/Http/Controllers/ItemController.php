<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Http\Requests;
use App\Item;

class ItemController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('role:admin',['only'=>['create','show']]);
        $this->middleware('auth',['only'=>['create','show']]);


    }

    public function getItembyName($name)
    {
        $items = Item::where('name','LIKE',"%$name%")->get();
        $res =response()->json(['items'=>$items]) ;
        return $res;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('item.all')->with(['title'=>'المنتجات','items'=>$items]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $item = Item::find($id);
        $itemInvoices = $item->invoices()->get();
       return view('item.show')->with(['item'=>$item, 'title'=>$id,'invoices'=>$itemInvoices]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
