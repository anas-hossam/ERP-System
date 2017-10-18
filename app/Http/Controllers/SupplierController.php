<?php

namespace App\Http\Controllers;

use App\BuyOrder;
use App\Product;
use App\Supplier;
use Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests;

class SupplierController extends Controller
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
        $suppliers=Supplier::all();
        return view('pages.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\Illuminate\Http\Request $request)
    {
        $this->validate($request, [
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
            'phone1' => 'required|numeric',
            'phone2' => 'required|numeric',
            'fax' => 'required|numeric',
            'address' => 'required',
        ]);
        $store=new Supplier();
        $store->fname=$request->fname;
        $store->lname=$request->lname;
        $store->email=$request->email;
        $store->phone1=$request->phone1;
        $store->phone2=$request->phone2;
        $store->fax=$request->fax;
        $store->address=$request->address;
        $store->flag=0;
        $store->save();
        Session::flash('message', 'تم اضافة المورد بنجاح');
        return redirect('/suppliers');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show=Supplier::findOrFail($id);
        return view('pages.suppliers.show', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=Supplier::findOrFail($id);
        return view('pages.suppliers.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\Illuminate\Http\Request $request, $id)
    {
        $this->validate($request, [
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
            'phone1' => 'required|numeric',
            'phone2' => 'required|numeric',
            'fax' => 'required|numeric',
            'address' => 'required',
        ]);
        $update=Supplier::findOrFail($id);
        $update->fname=$request->fname;
        $update->lname=$request->lname;
        $update->email=$request->email;
        $update->phone1=$request->phone1;
        $update->phone2=$request->phone2;
        $update->fax=$request->fax;
        $update->address=$request->address;
        $update->flag=0;
        $update->created_at=$request->created_at;
        $update->save();
        return redirect('/suppliers');
    }
    
    
    public function supplierProduct($id){
        $pro=Supplier::findOrFail($id);
        $sup_pro=$pro->product;
        return view('pages.suppliers.sup_pro', compact('sup_pro', 'id'));
    }
    
//    public function addSuppPro(){
//        dd('hh');
//        return view('pages.suppliers.addSupPro');
//    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function desSel(Request $request)
    {
        $ids = Request::get('ids');

        Supplier::destroy($ids);
        
    }
    public function showArchive()
    {
        $suppliers=Supplier::all();
        return view('pages.suppliers.archive', compact('suppliers'));
    }

    public function archive($id)
    {
        $sup=Supplier::findOrFail($id);
        $sup->flag=1;
        $sup->save();
        return redirect('/suppliers');
    }
    public function unarchive($id)
    {
        $sup=Supplier::findOrFail($id);
        $sup->flag=0;
        $sup->save();
        return redirect('/suppliers');
    }
    public function supOrder(){
        $sups=Supplier::all();
        return view('pages.suppliers.sup_order', compact('sups'));
    }
    
    public function sotreSupOrder(Request $request){
        $sup_id=$request->sups;
        $sup=Supplier::findOrFail($sup_id);
        $pros=$sup->product;
        return view('pages.suppliers.sup_order_pros', compact('pros', 'sup'));
    }
    
    public function sotreSupOrderPros(Request $request)
    {
        $new= new BuyOrder();
        $new->supplier_id=$request->supplier_id;
        $new->supplier_fname=$request->fname;
        $new->supplier_lname=$request->lname;
        $proId=$request->pros;
        $pro=Product::findOrFail($proId);
        $new->unit=$pro->unit;
        $new->product_name=$pro->name;
        $new->buy_price=$pro->buy_price;
        $new->save();
        Session::flash('message', 'تم الطلب بنجاح');
        return redirect('/sup_order');
    }

    public function excel()
    {
        // Execute the query used to retrieve the data. In this example
        // we're joining hypothetical users and payments tables, retrieving
        // the payments table's primary key, the user's first and last name,
        // the user's e-mail address, the amount paid, and the payment
        // timestamp.

        $suppliers = Supplier::where('flag', 0)->get();

        // Initialize the array which will be passed into the Excel
        // generator.
        $suppliersArray = [];

        // Define the Excel spreadsheet headers
        $suppliersArray[] = ['id', 'fname', 'lname', 'email', 'phone1', 'phone2', 'fax', 'address'];

        // Convert each member of the returned collection into an array,
        // and append it to the payments array.
        foreach ($suppliers as $supplier) {
            $suppliersArray[] = $supplier->toArray();
        }

        // Generate and return the spreadsheet
        Excel::create('suppliers', function ($excel) use ($suppliersArray) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('suppliers');
            $excel->setCreator('Laravel')->setCompany('WJ Gilmore, LLC');
            $excel->setDescription('suppliers file');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function ($sheet) use ($suppliersArray) {
                $sheet->fromArray($suppliersArray, null, 'A1', false, false);
                $sheet->setStyle(array(
                    'font' => array(
                        'name'      =>  'Calibri',
                        'size'      =>  15,
                        'bold'      =>  true
                    )
                ));
                // Font family
                $sheet->setFontFamily('adobe');
                // Font size
                $sheet->setFontSize(15);
                // Font bold
                $sheet->setFontBold(true);
                // Sets all borders
                $sheet->setAllBorders('thin');
                // Set border for cells
                $sheet->setBorder('A1', 'thin');
                // Set border for range
                $sheet->setBorder('A1:F10', 'thin');
                // Freeze first row
                $sheet->freezeFirstRow();
                // Freeze the first column
                $sheet->freezeFirstColumn();
                // Freeze the first row and column
                $sheet->freezeFirstRowAndColumn();
                // Set freeze
                $sheet->setFreeze('A2');
                // Auto filter for entire sheet
                $sheet->setAutoFilter();
                // Set auto filter for a range
                $sheet->setAutoFilter('A1:E10');
                // Set width for a single column
                $sheet->setWidth('A', 5);
                // Set width for multiple cells
                $sheet->setWidth(array(
                    'A'     =>  5,
                    'B'     =>  10
                ));
                // Set height for a single row
                $sheet->setHeight(1, 100);
                // Set height for multiple rows
                $sheet->setHeight(array(
                    1     =>  50,
                    2     =>  25
                ));
            });


        })->store('csv')->download('csv');
    }

    public function import()
    {
        if(Input::hasFile('import_file')){

            $path = Input::file('import_file')->getRealPath();

            $data = Excel::load($path, function($reader) {

            })->get();

            if(!empty($data) && $data->count()){

                foreach ($data as $key => $value) {

                    $insert[] = ['fname' => $value->fname, 'lname' => $value->lname,
                        'email' => $value->email, 'phone1' => $value->phone1, 'phone2' => $value->phone2,
                        'fax' => $value->fax,
                        'address' => $value->address];

                }

                if(!empty($insert)){

                    DB::table('suppliers')->insert($insert);
                }

            }

        }

        return redirect('/suppliers');

    }
}
