<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class HtmxController extends Controller
{
    public function index(){

        return view('htmx.index');
    }


    public function hello(){

        return view('htmx.hello');
    }



    public function tableget(Request $request){

        if($request->session()->has('request_counter')) {
            $counter = $request->session()->get('request_counter')+1;
            $request->session()->put('request_counter', $counter);

        }else {
            $counter = 1;
            $request->session()->put('request_counter', $counter);

        }

        $books     = Book::with('purchaseinvoices.suppliers', 'salesInvoices.customers', 'purchaseinvoices.media',
            'salesInvoices.media')->get();
        $suppliers = Supplier::with('invoices')->get();
        $customers = Customer::all();
        $remains   = Book::where('sales_amount', null)->get();

        return view('htmx.htmx', compact('books', 'suppliers', 'customers', 'remains', 'counter'));
    }


    public function range(Request $request){




        if($request->session()->has('request_counter')) {
            $counter = $request->session()->get('request_counter')+1;
            $request->session()->put('request_counter', $counter);

        }else {
            $counter = 1;
            $request->session()->put('request_counter', $counter);

        }




        $range = $request->input('range');

        list($startDateString, $endDateString) = explode(' to ', $range);

        $startDate = Carbon::createFromFormat('Y-m-d', $startDateString);
        $endDate   = Carbon::createFromFormat('Y-m-d', $endDateString);

        $suppliers = Supplier::with('invoices')->get();
        $customers = Customer::all();
        $remains   = Book::where('sales_amount', null)->get();


        if ($request->invoice == 'all') {
            $books = Book::with('purchaseinvoices.suppliers', 'salesInvoices.customers', 'purchaseinvoices.media',
                'salesInvoices.media')->get();

            return view('htmx.htmx', compact('books', 'suppliers', 'customers', 'remains', 'counter'));
        }

        if ($request->invoice == 'purchase') {
//            dd($request);
            $startTime = microtime(true);
            $books = Book::whereHas('purchaseinvoices', function ($query) use ($startDate, $endDate) {
                $query->whereBetween('date', [$startDate, $endDate]);
            })->with('purchaseinvoices.suppliers', 'salesInvoices.customers', 'purchaseinvoices.media',
                'salesInvoices.media')->get();
            $endTime = microtime(true);
            $executionTime = ($endTime - $startTime)/60;

            Log::channel('time')->info('Date Range Execution Time: '.$executionTime);

            return view('htmx.htmx', compact('books', 'suppliers', 'customers', 'remains', 'counter'));
        }

        if ($request->invoice == 'sales') {
            $books = Book::whereHas('salesInvoices', function ($query) use ($startDate, $endDate) {
                $query->whereBetween('date', [$startDate, $endDate]);
            })->with('purchaseinvoices.suppliers', 'salesInvoices.customers', 'purchaseinvoices.media',
                'salesInvoices.media')->get();

            return view('htmx.htmx', compact('books', 'suppliers', 'customers', 'remains', 'counter'));
        }


    }



    public function sessionCounter(Request $request){


        if($request->session()->has('request_counter')) {
            $counter = $request->session()->get('request_counter')+1;
            $request->session()->put('request_counter', $counter);

        }else {
            $counter = 1;
            $request->session()->put('request_counter', $counter);

        }

        return $counter;
    }


    public function clicktoedit(Request $request){

        return view('htmx.clicktoedit');
    }

    public function statshtmx(Request $request){



        $books=Book::with('purchaseinvoices', 'salesInvoices')->get();

        $beforeYearSort=[];

        foreach ($books as $book) {
            $timestamp=strtotime($book->purchaseinvoices->date);

            $year = date('Y', $timestamp);
            $month = date('M', $timestamp);
            $amount = $book->purchase_gel;
            $beforeYearSort[$year][$month]['purchases'] = ($beforeYearSort[$year][$month]['purchases'] ?? 0) + $amount;


            $timestamp2=strtotime($book->salesInvoices?->date);
            $year = date('Y', $timestamp2);
            $month = date('M', $timestamp2);
            $amount = $book->sales_gel;
            $beforeYearSort[$year][$month]['sales'] = ($beforeYearSort[$year][$month]['sales'] ?? 0) + $amount;



            $timestamp3=strtotime($book->salesInvoices?->date);
            $year = date('Y', $timestamp3);
            $month = date('M', $timestamp3);

            // Because somehow sales invoice  31/12/2021 is counted even if empty
            if($book->sales_amount) {
                $amount = $book->purchase_gel;
            }



            $beforeYearSort[$year][$month]['COG'] = ($beforeYearSort[$year][$month]['COG'] ?? 0) + $amount;

        }

        $yearlyData=$beforeYearSort;
        ksort($yearlyData);

        return view('admin.pages.statshtmx',compact('yearlyData'));
    }



    public function indexhtmx(Request $request){

        $books     = Book::with('purchaseinvoices.suppliers', 'salesInvoices.customers', 'purchaseinvoices.media',
            'salesInvoices.media')->get();
        $suppliers = Supplier::with('invoices')->get();
        $customers = Customer::all();
        $remains   = Book::where('sales_amount', null)->get();

//        dd($remains);


        return view('admin.indexhtmx', compact('books', 'suppliers', 'customers', 'remains'));

    }
}
