<?php

namespace App\Http\Controllers;
use App\Customer;
use App\Offer;
use App\Product;
use App\Bill;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests;

class BillsController extends Controller
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
        $bills=Bill::all();
        return view('pages.bills.index', compact('bills'));
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
        return view('pages.bills.create', compact('cus', 'pros'));
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
        $store=new Bill();
        $store->customer_id=$request->customers;
        $store->desc=$request->products;
        $store->status=$request->status;
        $store->unit=$request->unit;
        $store->quantity=$request->quantity;
        $store->unit_price=$request->unit_price;
        $store->tot_price=($request->unit_price)*($request->quantity);
        $store->save();
        Session::flash('message', 'تمت اضافة الفاتورة بنجاح');
        return redirect('bills/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show=Bill::findOrFail($id);
        $cusId=$show->customer_id;
        $cus=Customer::findOrFail($cusId);
        $cusName=$cus->fname." ".$cus->lname;
        return view('pages.bills.show', compact('show', 'cusName', 'cus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=Bill::findOrFail($id);
        $cusId=$edit->customer_id;
        $cus=Customer::findOrFail($cusId);
        $cusName=$cus->fname." ".$cus->lname;
        $pros=Product::all();
        return view('pages.bills.edit', compact('edit', 'cusName', 'cus', 'pros'));
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
        $update=Bill::findOrFail($id);
        $update->customer_id=$request->cusId;
        $update->desc=$request->products;
        $update->status=$request->status;
        $update->quantity=$request->quantity;
        $update->unit=$request->unit;
        $update->unit_price=$request->unit_price;
        $update->tot_price=($request->unit_price)*($request->quantity);
        $update->save();
        return redirect('/bills/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=Bill::findOrFail($id);
        $del->delete();
        return redirect('/bills');
    }

    public function excel($id)
    {
        // Execute the query used to retrieve the data. In this example
        // we're joining hypothetical users and payments tables, retrieving
        // the payments table's primary key, the user's first and last name,
        // the user's e-mail address, the amount paid, and the payment
        // timestamp.
        $bill = Bill::findOrFail($id);

        // Initialize the array which will be passed into the Excel
        // generator.
        $billArray = [];

        // Define the Excel spreadsheet headers
        $billArray[] = ['id', 'customer_id', 'desc', 'status', 'quantity', 'unit', 'unit_price', 'tot_price'];

        // Convert each member of the returned collection into an array,
        // and append it to the payments array.
            $billArray[] = $bill->toArray();


        // Generate and return the spreadsheet
        Excel::create('bill', function ($excel) use ($billArray) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('bill');
            $excel->setCreator('Laravel')->setCompany('WJ Gilmore, LLC');
            $excel->setDescription('bill file');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function ($sheet) use ($billArray) {
                $sheet->fromArray($billArray, null, 'A1', false, false);
//                $sheet->setStyle(array(
//                    'font' => array(
//                        'name'      =>  'Calibri',
//                        'size'      =>  15,
//                        'bold'      =>  true
//                    )
//                ));
//                // Font family
//                $sheet->setFontFamily('Comic Sans MS');
//                // Font size
//                $sheet->setFontSize(15);
//                // Font bold
//                $sheet->setFontBold(true);
//                // Sets all borders
//                $sheet->setAllBorders('thin');
//                // Set border for cells
//                $sheet->setBorder('A1', 'thin');
//                // Set border for range
//                $sheet->setBorder('A1:F10', 'thin');
//                // Freeze first row
//                $sheet->freezeFirstRow();
//                // Freeze the first column
//                $sheet->freezeFirstColumn();
//                // Freeze the first row and column
//                $sheet->freezeFirstRowAndColumn();
//                // Set freeze
//                $sheet->setFreeze('A2');
//                // Auto filter for entire sheet
//                $sheet->setAutoFilter();
//                // Set auto filter for a range
//                $sheet->setAutoFilter('A1:E10');
//                // Set width for a single column
//                $sheet->setWidth('A', 5);
//                // Set width for multiple cells
//                $sheet->setWidth(array(
//                    'A'     =>  5,
//                    'B'     =>  10
//                ));
//                // Set height for a single row
//                $sheet->setHeight(1, 100);
//                // Set height for multiple rows
//                $sheet->setHeight(array(
//                    1     =>  50,
//                    2     =>  25
//                ));
            });


        })->store('pdf')->download('pdf');
    }

}
