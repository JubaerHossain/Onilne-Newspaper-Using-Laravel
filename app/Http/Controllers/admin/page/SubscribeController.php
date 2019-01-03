<?php

namespace App\Http\Controllers\admin\page;

use App\model\frontend\Subscribe;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscribeController extends Controller
{
   public  function index(){
       $subscribes=Subscribe::latest()->get();
       return view('admin.page.subscribe.index',compact('subscribes'));

}

    public function destroy($subscriber)
    {
        $subscriber = Subscribe::findOrFail($subscriber);
        $subscriber->delete();
        Toastr::success('Subscriber Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
