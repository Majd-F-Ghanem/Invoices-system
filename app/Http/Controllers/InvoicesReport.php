<?php

namespace App\Http\Controllers;
use App\Invoices;
use Illuminate\Http\Request;

class InvoicesReport extends Controller
{
    public function index(){

     return view('Reports.Invoices_Report');
        
    }

    public function Search_invoices(Request $request){

    $rdio = $request->rdio;


 // في حالة البحث بنوع الفاتورة
    
    if ($rdio == 1) {
       
       
 // في حالة عدم تحديد تاريخ
        if ($request->type && $request->start_at =='' && $request->end_at =='') {
            
           $invoices = Invoices::select('*')->where('Status','=',$request->type)->get();
           $type = $request->type;
           return view('Reports.Invoices_Report',compact('type'))->withDetails($invoices);
        }
        
        // في حالة تحديد تاريخ الفاتورة
        else {
           
          $start_at = date($request->start_at);
          $end_at = date($request->end_at);
          $type = $request->type;
          
          $invoices = Invoices::whereBetween('invoice_Date',[$start_at,$end_at])->where('Status','=',$request->type)->get();
          return view('Reports.Invoices_Report',compact('type','start_at','end_at'))->withDetails($invoices);
          
        }

 
        
    } 
    
//====================================================================
    
// في البحث برقم الفاتورة
    else {
        
        $invoices = Invoices::select('*')->where('invoice_number','=',$request->invoice_number)->get();
        return view('Reports.Invoices_Report')->withDetails($invoices);
        
    }

    
     
    }
    
}
