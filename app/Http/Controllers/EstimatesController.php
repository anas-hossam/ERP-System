<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Offer;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class EstimatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $offs=Offer::all();
        return view('pages.offers.index', compact('offs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cus=Customer::all();
        $pros=Product::all();
        return view('pages.offers.create', compact('cus', 'pros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required',
            'quantity' => 'required|numeric',
            'unit' => 'required',
            'unit_price' => 'required',
        ]);
        $store=new Offer();
        $store->customer_id=$request->customers;
        $store->desc=$request->products;
        $store->status=$request->status;
        $store->unit=$request->unit;
        $store->quantity=$request->quantity;
        $store->unit_price=$request->unit_price;
        $store->tot_price=($request->unit_price)*($request->quantity);
        $store->save();
        Session::flash('message', 'تم اضافة طلب بنجاح');
        return redirect('estimates/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show=Offer::findOrFail($id);
        $cusId=$show->customer_id;
        $cus=Customer::findOrFail($cusId);
        $cusName=$cus->fname." ".$cus->lname;
        return view('pages.offers.show', compact('show', 'cusName', 'cus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $edit=Offer::findOrFail($id);
        $cusId=$edit->customer_id;
        $cus=Customer::findOrFail($cusId);
        $cusName=$cus->fname." ".$cus->lname;
        $pros=Product::all();
        return view('pages.offers.edit', compact('edit', 'cusName', 'cus', 'pros'));

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
        $this->validate($request, [
            'status' => 'required',
            'quantity' => 'required|numeric',
            'unit' => 'required',
            'unit_price' => 'required',
        ]);
        $update=Offer::findOrFail($id);
        $update->customer_id=$request->cusId;
        $update->desc=$request->products;
        $update->status=$request->status;
        $update->quantity=$request->quantity;
        $update->unit=$request->unit;
        $update->unit_price=$request->unit_price;
        $update->tot_price=($request->unit_price)*($request->quantity);
        $update->save();
        return redirect('/estimates/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=Offer::findOrFail($id);
        $del->delete();
        return redirect('/estimates');
    }
}
