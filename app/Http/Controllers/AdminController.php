<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Customer;
use App\Models\PurchaseInvoice;
use App\Models\Supplier;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        $books=Book::with('purchaseinvoices.suppliers','salesInvoices.customers')->get();
        $suppliers=Supplier::with('invoices')->get();
        $customers=Customer::all();
        $remains=Book::where('sales_invoice_id',null)->get();


        return view('admin.index',compact('books','suppliers','customers','remains'));
    }


    public function store (Request $request){
//        dd($request->all());


        $purchaseInvoice=new PurchaseInvoice();
        $purchaseInvoice->date=$request->date;
        $purchaseInvoice->supplier_id=$request->supplier;
        $purchaseInvoice->invoice_number=$request->inv_number;
        $purchaseInvoice->save();

        foreach ($request->title as $index => $title){
            $book = new Book();
            $book->title = $request->title[$index];
            $book->stock = $request->stock;
            $book->purchase_currency = $request->currency;
            $book->purchase_amount = $request->price[$index];
            $book->purchase_rate = $request->ex_rate;
            $book->purchase_gel = $request->price_gel[$index];
            $book->purchase_invoice_id=$purchaseInvoice->id;
            $book->save();
        }



        return back();

    }
}
