<?php

namespace App\Http\Controllers;

use App\SellingAgent;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class SellingAgentController extends Controller
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
        $agents=SellingAgent::all();
        return view('pages.agents.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.agents.create');
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
            'username' => 'required',
            'password' => 'required|string|min:8',
            'phone1' => 'required|numeric',
            'phone2' => 'required|numeric',
            'address' => 'required',
        ]);
        $new=new SellingAgent();
        $new->fname=$request->fname;
        $new->lname=$request->lname;
        $new->email=$request->email;
        $new->username=$request->username;
        $new->password=$request->password;
        $new->phone1=$request->phone1;
        $new->phone2=$request->phone2;
        $new->address=$request->address;
        $new->save();
        Session::flash('message', 'تم اضافة وكيل البيع بنجاح');
        return redirect('/agents');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=SellingAgent::findOrFail($id);
        return view('pages.agents.edit', compact('edit'));
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
            'username' => 'required',
            'password' => 'required|string|min:8',
            'phone1' => 'required|numeric',
            'phone2' => 'required|numeric',
            'address' => 'required',
        ]);
        $update=SellingAgent::findOrFail($id);
        $update->fname=$request->fname;
        $update->lname=$request->lname;
        $update->email=$request->email;
        $update->username=$request->username;
        $update->address=$request->address;
        $update->phone1=$request->phone1;
        $update->phone2=$request->phone2;
        $update->created_at=$request->created_at;
        $update->save();
        return redirect('/agents');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=SellingAgent::findOrFail($id);
        $del->delete();
        return redirect('/agents');
    }
}
