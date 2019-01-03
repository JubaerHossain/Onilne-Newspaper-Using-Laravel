<?php

namespace App\Http\Controllers\frontend;

use App\model\frontend\Subscribe;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscribeController extends Controller
{
    public function store(Request $request){

        $this->validate($request,[
            'email'=>'required|email|unique:subscribes|max:255',
        ]);

        $data=new Subscribe();
        $data->email=$request->email;
        $data->save();
        Toastr::success('Thank you for subscribe','Success');
        return redirect()->back();

    }
}
