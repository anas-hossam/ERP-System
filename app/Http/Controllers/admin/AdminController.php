<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){

        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.admin.index')->withUsers($users);
    }
}
