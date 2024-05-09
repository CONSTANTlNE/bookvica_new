<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Http\Request;

class HtmxController extends Controller
{
    public function index(){

        return view('htmx.index');
    }


    public function hello(){

        return view('htmx.hello');
    }

    public function table(){
        $books     = Book::with('purchaseinvoices.suppliers', 'salesInvoices.customers', 'purchaseinvoices.media',
            'salesInvoices.media')->get();
        $suppliers = Supplier::with('invoices')->get();
        $customers = Customer::all();
        $remains   = Book::where('sales_amount', null)->get();

        return view('htmx.htmx', compact('books', 'suppliers', 'customers', 'remains'));
    }
}
