<?php

namespace App\Http\Controllers;

use App\ProductOrder;
use App\ReqDesign;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class ProductOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders=ProductOrder::all();
        return view('pages.proOrders.show', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|string',
            'email' => 'required|email|unique:product_orders',
            'street' => 'required',
            'city' => 'required',
            'mobile' => 'required|numeric',
            'fax' => 'required|numeric',
            'country' => 'required',
            'budget' => 'required',
            'des_draw' => 'required',
            'beg_time' => 'required',
            'team_need' => 'required',
            'tot_floor' => 'required',
            'floors' => 'required',
            'shape_roof' => 'required',

        ]);
        $store=new ProductOrder();
        $store->cusId=$request->cusId;
        $idOrder=$store->cusId;
        $id=$store->cusId;
        $store->name=$request->name;
        $store->company=$request->company;
        $store->mobile=$request->mobile;
        $store->tel=$request->tel;
        $store->fax=$request->fax;
        $store->email=$request->email;
        $store->website=$request->website;
        $store->street=$request->street;
        $store->city=$request->city;
        $store->country=$request->country;
        $store->reason=$request->reason;
        if(!empty($request->res_build)){
        $store->res_build=serialize($request->res_build);
        }
        if(!empty($request->comm_build)){
            $store->comm_build=serialize($request->comm_build);
        }
        if(!empty($request->pub_build)){
            $store->pub_build=serialize($request->pub_build);
        }
        $store->others=$request->others;
        $store->budget=$request->budget;
        if(!empty($request->des_draw)){
            $store->des_draw=serialize($request->des_draw);
        }
        $store->beg_time=$request->beg_time;
        if(!empty($request->team_need)){
            $store->team_need=serialize($request->team_need);
        }
        $store->save();
        
        $storeReq =new  ReqDesign();
        $storeReq->cusId=$idOrder;
        $storeReq->tot_floor=$request->tot_floor;
        $storeReq->floors=$request->floors;
        $storeReq->capacity=$request->capacity;
        if(!empty($request->shape_roof)){
            $storeReq->shape_roof=serialize($request->shape_roof);
        }
        $storeReq->liv_room=$request->liv_room;
        $storeReq->din_room=$request->din_room;

        $storeReq->tot_br = serialize($request->tot_br);

        $storeReq->bedrooms=$request->bedrooms;
        $storeReq->shar_bathr=$request->shar_bathr;
        $storeReq->kitch=$request->kitch;
        $storeReq->balecony=$request->balecony;
        $storeReq->study_r=$request->study_r;
        $storeReq->laundry_r=$request->laundry_r;
        $storeReq->servant_r=$request->servant_r;
        $storeReq->garage=$request->garage;
        $storeReq->reqs=$request->reqs;
        $storeReq->save();
        Session::flash('message', 'تم اضافة الطلب بنجاح');
        return redirect('/customers/'.$id);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.proOrders.order', compact('id'));
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
