<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Invoice;
use App\Items;

class InvoiceController extends Controller
{
    public function show()
    {
    	$invoice = Invoice::paginate(5);
    	return view('invoice',['invoice' => $invoice]);
    }

    public function del($id)
    {
    	Invoice::where('id',$id)->delete();
    	Items::where('invoice_id',$id)->delete();

    	return redirect('/invoice');
    }

    public function edit($id) 
    {
    	$invoicelist = Invoice::where('id',$id)->get();
    	// $invoice = Invoice::find($id)->get();
    	// dd($invoice);

    	$itemlist = Items::where('invoice_id',$id)->get();
    	// dd($items);

    	return view('edit',compact('invoicelist','itemlist'));
    }

    public function update(Request $request)
    {
    	$id = $request->get('id');
    	 // dd($id);
    	Invoice::where('id',$id)->update(array(
    		'invoice_name'=>$request->get('invoice_name'),
    		'total_items'=>count($request->get('item_name')),
    		'price_total'=>$request->get('all_total')
    		));

    	Items::where('invoice_id',$id)->delete();

    	$item = [];
    	$count = count($request->get('item_name'));
    	for($i=0; $i<$count;$i++){
    		$item[$i]= [
                    'invoice_id' => $id,
                    'item_name' => $request->get('item_name')[$i],
                    'no_items' => $request->get('no_items')[$i],
                    'price' => $request->get('price')[$i],
                    'total' => $request->get('total')[$i],
                    'sub_total' => $request->get('sub_total'),
                    'tax' => $request->get('tax'),
                    'all_total' => $request->get('all_total')
    		];
	    	
    	}
    	Items::insert($item);

    	return redirect('/invoice');
    	 
    }

    public function autoSearch(Request $request)
    {
        $invlist = $request->get('inv');
        // dd($invlist);
        
        $invoice=Invoice::where('invoice_name','LIKE','%'.$invlist.'%')->paginate(5);
        // dd($invoice);
		return view('invoice',['invoice' => $invoice]);
    }

}
