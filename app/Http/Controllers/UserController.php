<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\User;
class UserController extends Controller
{
    //

    public function index(User $user, Request $request){
       
        //obtengo todos los usuarios
        $users = User::select('id','name','email','status');
        return datatables::of($users)->make(true);
    }

    public function listDisabled(User $user,Request $request){
        $users = User::select('id','name','email','status')->where('status',0);
        return datatables::of($users)->make(true);

    }
    public function listEnabled(User $user,Request $request){
        $users = User::select('id','name','email','status')->where('status',1);
        return datatables::of($users)->make(true);

    }
}
