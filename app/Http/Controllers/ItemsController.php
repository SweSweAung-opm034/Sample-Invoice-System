<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use App\Invoice;
use DB;
use PDF;

class ItemsController extends Controller
{
    public function index()
    {
    	return view('item');
    }

    public function create(Request $request)
    {
    	$count = count(request('item_name'));
    	// dd($count);
    	$inv = new Invoice;
    	$inv->invoice_name = request('invoice_name');
    	$inv->total_items = $count;
    	$inv->price_total = request('all_total');
    	$inv->save();

    	$id = $inv->id;
    	$all_total = $inv->price_total;

    	$item = [];
    	
    	for($i=0; $i<$count;$i++){
    		$item[$i]= [
                    'invoice_id' => $id,
                    'item_name' => $request->get('item_name')[$i],
                    'no_items' => $request->get('no_items')[$i],
                    'price' => $request->get('price')[$i],
                    'total' => $request->get('total')[$i],
                    'sub_total' => $request->get('sub_total'),
                    'tax' => $request->get('tax'),
                    'all_total' => $all_total
    		];
	    	
    	}
    	Items::insert($item);
    	return redirect('/invoice');
	}

    public function pdfview($id)
    {
        $invoices = Invoice::where('id',$id)->get();
        $items = Items::where('invoice_id',$id)->get();
        view()->share('items',$items);
        view()->share('invoices',$invoices);

       
        $pdf = PDF::loadView('pdfview');
        return $pdf->download('pdfview.pdf');
		return view('pdfview');
    }

}