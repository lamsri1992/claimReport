<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class claimlist extends Controller
{
    public function index()
    {
        $list = DB::connection('mysql')->table('claim_list')->where('visit_status',9)->get();
        return view('claimlist.index',['list'=>$list]);
    }

    public function confirm($id)
    {
        DB::connection('mysql')->table('claim_list')->where('id',$id)->update([
            "visit_status" => 1
        ]);
        return back()->with('success','ยืนยันการชำระเงิน '.$id.' เรียบร้อย');
    }

    public function decline($id)
    {
        DB::connection('mysql')->table('claim_list')->where('id',$id)->update([
            "visit_status" => 0
        ]);
        return back()->with('success','บันทึกค้างชำระเงิน '.$id.' เรียบร้อย');
    }
}
