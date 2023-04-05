<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Plate;

class CheckRole extends Controller
{
    public function index(){
        $post=Auth::user()->role;
        if($post==1){
            return redirect()->route('dashboard');
        }else{

            $data = Plate::all();
            return view('user', ['data' => $data]);
        }
    }
}




// return view('dashboard', ['data' => $data]);