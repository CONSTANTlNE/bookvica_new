<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Supplier;
use Illuminate\Http\Request;

class StatsController extends Controller
{

    public function index(){




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

        return view('admin.pages.stats',compact('yearlyData'));
    }


    public function contrahents(Request $request){

        $books=Book::with('purchaseinvoices.suppliers', 'salesInvoices.customers')->get();

        $beforeYearSort=[];

        foreach ($books as $book) {

            $timestamp=strtotime($book->purchaseinvoices->date);

            $year = date('Y', $timestamp);
            $month = date('M', $timestamp);
            $supplier = $book->purchaseinvoices->suppliers->name;
            $inv=$book->purchaseinvoices->invoice_number;

            $amount = $book->purchase_gel;

            $beforeYearSort[$year][$month][$supplier][$inv]['purchases'] = ($beforeYearSort[$year][$month]['purchases'] ?? 0) + $amount;


        }

        $yearlyData=$beforeYearSort;
        ksort($yearlyData);

//dd($yearlyData);

        return view('admin.pages.contrahents', compact('yearlyData'));


    }

    public function test(){
        $sumOfPurchases2 = Book::whereHas('salesInvoices', function ($query) {
            $query->whereMonth('date', 12)
                ->whereYear('date', 2021); // Filter salesInvoices by December
        })->with('purchaseinvoices', 'salesInvoices')->get();

//        dd($sumOfPurchases2);

        return view('admin.pages.test',compact('sumOfPurchases2'));
    }
}
