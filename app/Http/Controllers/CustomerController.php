<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Offer;
use Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
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
        $cus=Customer::all();
        return view('pages.customers.index', compact('cus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.customers.create');
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
            'username' => 'required',
            'password' => 'required|string|min:8',
            'phone1' => 'required|numeric',
            'phone2' => 'required|numeric',
            'address' => 'required',
        ]);
        $new=new Customer();
        $new->fname=$request->fname;
        $new->lname=$request->lname;
        $new->email=$request->email;
        $new->status=0;
        $new->username=$request->username;
        $new->password=$request->password;
        $new->phone1=$request->phone1;
        $new->phone2=$request->phone2;
        $new->address=$request->address;
        $new->flag=0;
        $new->save();
        Session::flash('message', 'تم اضافة العميل بنجاح');
        return redirect('/customers');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show=Customer::findOrFail($id);
        $offers=$show->offer;
        $bills=$show->bill;
        $cusServs=$show->service;
        return view('pages.customers.show', compact('show', 'offers', 'bills','cusServs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=Customer::findOrFail($id);
        return view('pages.customers.edit', compact('edit'));
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
            'username' => 'required',
            'password' => 'required|string|min:8',
            'phone1' => 'required|numeric',
            'phone2' => 'required|numeric',
            'address' => 'required',
        ]);
        $update=Customer::findOrFail($id);
        $update->fname=$request->fname;
        $update->lname=$request->lname;
        $update->email=$request->email;
        $update->username=$request->username;
        $update->password=$request->password;
        $update->status=$request->status;
        $update->phone1=$request->phone1;
        $update->phone2=$request->phone2;
        $update->created_at=$request->created_at;
        $update->flag=0;
        $update->save();
        return redirect('/customers');
    }
    public function desSel(Request $request)
    {
        $ids = Request::get('ids');
//        if ($request->session()->has('data')) {
//            $data=$request->session()->get('data');
            Customer::destroy($ids);
//        }
        //$data = $request->input('ids');
//        return redirect('/customers');
    }
    public function showArchive()
    {
        $cus=Customer::all();
        return view('pages.customers.archive', compact('cus'));
    }
   
    public function archive($id)
    {
        $cus=Customer::findOrFail($id);
        $cus->flag=1;
        $cus->save();
        return redirect('/customers');
    }
    public function unarchive($id)
    {
        $cus=Customer::findOrFail($id);
        $cus->flag=0;
        $cus->save();
        return redirect('/customer/archive');
    }
    

    
    public function excel()
    {
        // Execute the query used to retrieve the data. In this example
        // we're joining hypothetical users and payments tables, retrieving
        // the payments table's primary key, the user's first and last name,
        // the user's e-mail address, the amount paid, and the payment
        // timestamp.

        $customers = Customer::where('flag',0)->get();

        // Initialize the array which will be passed into the Excel
        // generator.
        $customersArray = [];

        // Define the Excel spreadsheet headers
        $customersArray[] = ['id', 'fname', 'lname', 'email', 'status', 'phone1', 'phone2', 'address', 'username', 'password'];

        // Convert each member of the returned collection into an array,
        // and append it to the payments array.
        foreach ($customers as $customer) {
            $customersArray[] = $customer->toArray();
        }

            // Generate and return the spreadsheet
            Excel::create('customers', function ($excel) use ($customersArray) {

                // Set the spreadsheet title, creator, and description
                $excel->setTitle('customers');
                $excel->setCreator('Laravel')->setCompany('WJ Gilmore, LLC');
                $excel->setDescription('customers file');

                // Build the spreadsheet, passing in the payments array
                $excel->sheet('sheet1', function ($sheet) use ($customersArray) {
                    $sheet->fromArray($customersArray, null, 'A1', false, false);
                    $sheet->setStyle(array(
                        'font' => array(
                            'name'      =>  'Calibri',
                            'size'      =>  15,
                            'bold'      =>  true
                        )
                    ));


                    // Font family
                    $sheet->setFontFamily('Comic Sans MS');
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



            })->store('xlsx')->download('xlsx');
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
                        'email' => $value->email,'status' => $value->status, 'phone1' => $value->phone1, 'phone2' => $value->phone2,
                        'address' => $value->address, 'username' => $value->username, 'password' => $value->password];

                }

                if(!empty($insert)){

                    DB::table('customers')->insert($insert);

                }

            }

        }

        return redirect('/customers');

    }
   
}
