<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Supplier;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
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
        $pros=Product::all();
        return view('pages.products.index', compact('pros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat=Category::all();
        $sup=Supplier::all();

    return view('pages.products.create', compact('cat', 'sup'));
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
            'desc' => 'required',
            'img' => 'required',
            'unit' => 'required',
            'cost_price' => 'required',
            'buy_price' => 'required',
            'parcode' => 'required|numeric',
        ]);
       // dd($request->get('cats'));
        $store=new Product();
        $store->supplier_id=$request->sups;
        $store->category_id=$request->cats;
        $store->name=$request->name;
        $store->desc=$request->desc;
        $img=Input::file('img');
        $extension = Input::file('img')->getClientOriginalExtension();
        $name = Input::file('img')->getClientOriginalName();
        $destinationPath="images";
        //dd($destinationPath);
        //$size = Input::file('img')->getSize();
        if($extension=='jpg' || $extension=='png' || $extension=='jpeg' || $extension=='JPG' || $extension=='PNG') {

            Input::file('img')->move($destinationPath,$name);
            $store->img = $destinationPath."/".$name;
        }

        $store->unit=$request->unit;
        $store->cost_price=$request->cost_price;
        $store->buy_price=$request->buy_price;
        $store->parcode=$request->parcode;
        $store->save();
        Session::flash('message', 'تم اضافة المنتج بنجاح');
        return redirect('products/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show=Product::findOrFail($id);
        $catId=$show->category_id;
       $cat=Category::findOrFail($catId);
        $catName=$cat->category;
        return view('pages.products.show', compact('show', 'catName'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=Product::findOrFail($id);
        //$catId=$edit->category_id;
        $cats=Category::all();
        //$cat=Category::findOrFail($catId);
        //$supId=$edit->supplier_id;
        $sups=Supplier::all();
        //$sup=Supplier::findOrFail($supId);
        return view('pages.products.edit', compact('edit', 'cats', 'sups'));
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
            'name' => 'required|string',
            'desc' => 'required',
            'img' => 'required',
            'unit' => 'required',
            'cost_price' => 'required',
            'buy_price' => 'required',
            'parcode' => 'required|numeric',
        ]);
        $update=Product::findOrFail($id);
        $pId=$update->id;
        $update->supplier_id=$request->sups;
        $update->category_id=$request->cats;
        $update->name=$request->name;
        $update->desc=$request->desc;
        $img=Input::file('img');
        $extension = Input::file('img')->getClientOriginalExtension();
        $name = Input::file('img')->getClientOriginalName();
        $destinationPath="images";
        if($extension=='jpg' || $extension=='png' || $extension=='jpeg' || $extension=='JPG' || $extension=='PNG'
            || $extension=='gif' || $extension=='bmp' || $extension=='svg') {

            Input::file('img')->move($destinationPath,$name);
            $update->img = $destinationPath."/".$name;
        }

        $update->unit=$request->unit;
        $update->cost_price=$request->cost_price;
        $update->buy_price=$request->buy_price;
        $update->parcode=$request->parcode;
        $update->save();
        return redirect('products/'.$pId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=Product::findOrFail($id);
        $del->delete();
        return redirect('products/');
    }
    
    public function createPro($id){
        $cat=Category::all();
        
        return view('pages.suppliers.addSupPro', compact('id', 'cat'));
    }
    
    public function storePro(Request $request){
        $this->validate($request, [
            'name' => 'required|string',
            'desc' => 'required',
            'img' => 'required',
            'unit' => 'required',
            'cost_price' => 'required',
            'buy_price' => 'required',
            'parcode' => 'required|numeric',
        ]);
        $store=new Product();
        $store->supplier_id=$request->supplier_id;
        $id=$store->supplier_id;
        $store->category_id=1;
        $store->name=$request->name;
        $store->desc=$request->desc;
        $img=Input::file('img');
                $extension = Input::file('img')->getClientOriginalExtension();
                $name = Input::file('img')->getClientOriginalName();
                $destinationPath="images";
                 //dd($destinationPath);
                //$size = Input::file('img')->getSize();
                if($extension=='jpg' || $extension=='png' || $extension=='jpeg' || $extension=='JPG' || $extension=='gif'
                    || $extension=='bmp' || $extension=='svg') {

                    Input::file('img')->move($destinationPath,$name);
                    $store->img = $destinationPath."/".$name;
               }

        $store->unit=$request->unit;
        $store->cost_price=$request->cost_price;
        $store->buy_price=$request->buy_price;
        $store->parcode=$request->parcode;
        $store->save();
        Session::flash('message', 'تم اضافة المنتج بنجاح');
        return redirect('/sup_product/'.$id);
        
    }
}
