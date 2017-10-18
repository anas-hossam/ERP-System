<?php

namespace App\Http\Controllers;

use App\Executer;
use App\ExecuterService;
use App\Service;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests;

class ExecutersController extends Controller
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
        $exes=Executer::all();
        return view('pages.executers.index', compact('exes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.executers.create');
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
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
            'phone1' => 'required|numeric',
            'phone2' => 'required|numeric',
            'address' => 'required',
        ]);
        $new=new Executer();
        $new->fname=$request->fname;
        $new->lname=$request->lname;
        $new->email=$request->email;
        $new->phone1=$request->phone1;
        $new->phone2=$request->phone2;
        $new->address=$request->address;
        $new->save();
        Session::flash('message', 'تم اضافة المنفذ بنجاح');
        return redirect('/executers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show=Executer::findOrFail($id);
        return view('pages.executers.show', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=Executer::findOrFail($id);
        return view('pages.executers.edit', compact('edit'));
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
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
            'phone1' => 'required|numeric',
            'phone2' => 'required|numeric',
            'address' => 'required',
        ]);
        $update=Executer::findOrFail($id);
        $update->fname=$request->fname;
        $update->lname=$request->lname;
        $update->email=$request->email;
        $update->phone1=$request->phone1;
        $update->phone2=$request->phone2;
        $update->address=$request->address;
        $update->created_at=$request->created_at;
        $update->save();
        return redirect('/executers');
    }

    public function showArchive()
    {
        $exes=Executer::all();
        return view('pages.executers.archive', compact('exes'));
    }

    public function archive($id)
    {
        $exe=Executer::findOrFail($id);
        $exe->flag=1;
        $exe->save();
        return redirect('/executers');
    }
    public function unarchive($id)
    {
        $exe=Executer::findOrFail($id);
        $exe->flag=0;
        $exe->save();
        return redirect('/executers');
    }

    public function exeService(){
        $exes=Executer::all();
        return view('pages.executers.exe_service', compact('exes'));
    }
    public function sotreExeService(Request $request)
    {
        $exe_id=$request->exes;
        $exe=Executer::findOrFail($exe_id);
        $servs=$exe->service;
        return view('pages.executers.exe_service_order', compact('servs', 'exe'));
    }

    public function storeExecService(Request $request)
    {
        $new= new ExecuterService();
        $new->executer_id=$request->executer_id;
        $new->executer_fname=$request->fname;
        $new->executer_lname=$request->lname;
        $servId=$request->servs;
        $serv=Service::findOrFail($servId);
        $new->type=$serv->name;
        $new->desc=$serv->type;
        $new->price=$serv->price;
        $new->time=$serv->executing_time;
        $new->save();
        Session::flash('message', 'تم الطلب بنجاح');
        return redirect('/exe_service');
    }


    public function excel()
    {
        // Execute the query used to retrieve the data. In this example
        // we're joining hypothetical users and payments tables, retrieving
        // the payments table's primary key, the user's first and last name,
        // the user's e-mail address, the amount paid, and the payment
        // timestamp.

        $executers = Executer::where('flag',0)->get();

        // Initialize the array which will be passed into the Excel
        // generator.
        $executersArray = [];

        // Define the Excel spreadsheet headers
        $executersArray[] = ['id', 'fname', 'lname', 'email', 'phone1', 'phone2', 'address'];

        // Convert each member of the returned collection into an array,
        // and append it to the payments array.
        foreach ($executers as $executer) {
            $executersArray[] = $executer->toArray();
        }

        // Generate and return the spreadsheet
        Excel::create('executers', function ($excel) use ($executersArray) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('executers');
            $excel->setCreator('Laravel')->setCompany('WJ Gilmore, LLC');
            $excel->setDescription('executers file');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function ($sheet) use ($executersArray) {
                $sheet->fromArray($executersArray, null, 'A1', false, false);
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
                        'address' => $value->address];

                }

                if(!empty($insert)){

                    DB::table('executers')->insert($insert);
                }

            }

        }

        return redirect('/executers');

    }
}
