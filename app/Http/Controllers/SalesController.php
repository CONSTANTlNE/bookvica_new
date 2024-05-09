<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesRequest;
use App\Http\Requests\SalesUpdateRequest;
use App\Models\Book;
use App\Models\Change;
use App\Models\Customer;
use App\Models\SalesInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SalesController extends Controller
{

    public function storeSales(SalesRequest $request)
    {

        $validated = $request->validated();

        $salesInvoice                 = new SalesInvoice();
        $salesInvoice->date           = $validated['date'];
        $salesInvoice->customer_id    = $validated['customer'];
        $salesInvoice->invoice_number = $validated['inv_number'];
        $salesInvoice->save();

        foreach ($validated['title'] as $index => $book) {
            Book::find($book)->update([
                'sales_invoice_id' => $salesInvoice->id,
                'sales_currency'   => $validated['currency'],
                'sales_rate'       => $validated['ex_rate'],
                'sales_amount'     => $validated['price'][$index],
                'sales_gel'        => $validated['price_gel'][$index],
            ]);
        }


        if ($request->hasFile('invoice')) {
            $salesInvoice->addMediaFromRequest('invoice')->toMediaCollection('sales_invoice');
        }

        return back();

    }

    public function salesEdit(Request $request)
    {

        $customers    = Customer::all();
        $salesInvoice = SalesInvoice::with('customers', 'books',)->find($request->id);
        $remains      = Book::where('sales_amount', null)->get();

        return view('admin.pages.editSales', compact('customers', 'salesInvoice', 'remains'));

    }


    public function salesUpdate(SalesUpdateRequest $request)
    {

        $validated = $request->validated();
//        dd($request->title,$request->price);

        $salesInvoice = SalesInvoice::where('id', $validated['invoice_id'])
            ->with('books')
            ->with('customers')
            ->with('media')
            ->first();

//        dd($salesInvoice);
        // Update Invoice
        if ($salesInvoice->date !== $validated['date']) {
            Log::channel('CRUD')->info('Sales Invoice No: '.$salesInvoice->invoice_number.' Date changed from: '.$salesInvoice->date.' to '.$validated['date'].' by user: '.auth()->user()->name.'   Sales Invoice ID: '.$validated['invoice_id']);
            $salesInvoice->date = $validated['date'];
            $salesInvoice->update();


            if ($salesInvoice->books->first()->reviewed === 1) {
                $changes                   = new Change();
                $changes->sales_invoice_id = $salesInvoice->id;
                $changes->save();
            }
        }

        if ($salesInvoice->customer_id != $validated['customer']) {
            Log::channel('CRUD')->info('Sales Invoice No: '.$salesInvoice->invoice_number.' Customer changed from: '.$salesInvoice->customers->name.' to '.$salesInvoice->customers->where('id',
                    $validated['customer'])->first()->name.' by user: '.auth()->user()->name.'   Sales Invoice ID: '.$validated['inv_number']);
            $salesInvoice->customer_id = $validated['customer'];
            $salesInvoice->update();
        }

        if ($salesInvoice->invoice_number != $validated['inv_number']) {
            Log::channel('CRUD')->info('Sales Invoice No: '.$salesInvoice->invoice_number.' Invoice No changed from: '.$salesInvoice->invoice_number.' to '.$validated['inv_number'].' by user: '.auth()->user()->name.'   Sales Invoice ID: '.$validated['invoice_id']);
            $salesInvoice->invoice_number = $validated['inv_number'];
            $salesInvoice->update();
        }


        // update existing books
        if ($validated['book_id']) {
            foreach ($validated['book_id'] as $index => $book_id) {
                $oldBook1 = $salesInvoice->books->pluck('id')->toArray();


//                if only book title changed
                if ($oldBook1[$index] != $book_id) {
//                   Remove Old Book
                    $salesInvoice->books->where('id', $oldBook1[$index])->first()->sales_invoice_id = null;
                    $salesInvoice->books->where('id', $oldBook1[$index])->first()->sales_currency   = null;
                    $salesInvoice->books->where('id', $oldBook1[$index])->first()->sales_rate       = null;
                    $salesInvoice->books->where('id', $oldBook1[$index])->first()->sales_amount     = null;
                    $salesInvoice->books->where('id', $oldBook1[$index])->first()->sales_gel        = null;
                    Log::channel('CRUD')->info('Book : '.$salesInvoice->books->where('id',
                            $oldBook1[$index])->first()->title.' removed from Sales invoice: '.$salesInvoice->invoice_number.' by user: '.auth()->user()->name.'  Book ID: '.$oldBook1[$index]);
                    $salesInvoice->books->where('id', $oldBook1[$index])->first()->update();
//                    Add New Book
                    $newBook                   = Book::find($book_id);
                    $newBook->sales_invoice_id = $salesInvoice->id;
                    $newBook->sales_currency   = $validated['currency'];
                    $newBook->sales_rate       = $validated['ex_rate'];
                    $newBook->sales_amount     = $validated['price'][$index];
                    $newBook->sales_gel        = $validated['price_gel'][$index];
                    Log::channel('CRUD')->info('Book Added: '.$newBook->title.' To Sales Invoice : '.$salesInvoice->invoice_number.' by user: '.auth()->user()->name);
                    $newBook->save();
                }

                // if price changed
                if ($salesInvoice->books->where('id', $book_id)->first()->sales_amount != $validated['price'][$index]) {
                    Log::channel('CRUD')->info('Book : '.$salesInvoice->books->where('id',
                            $oldBook1[$index])->first()->title.' Changed Sales price from: '.$salesInvoice->books->where('id',
                            $oldBook1[$index])->first()->sales_amount.' to '.$validated['price'][$index].' in Sales invoice: '.$salesInvoice->invoice_number.' by user: '.auth()->user()->name.'  Book ID: '.$oldBook1[$index]);

                    $salesInvoice->books->where('id', $book_id)->first()->sales_amount   = $validated['price'][$index];
                    $salesInvoice->books->where('id',
                        $book_id)->first()->sales_gel                                    = $validated['price_gel'][$index];
                    $salesInvoice->books->where('id', $book_id)->first()->sales_currency = $validated['currency'];
                    $salesInvoice->books->where('id', $book_id)->first()->sales_rate     = $validated['ex_rate'];
                    $salesInvoice->books->where('id', $book_id)->first()->update();

                    if ($salesInvoice->books->where('id', $book_id)->first()->reviewed === 1) {
                        $changes                   = new Change();
                        $changes->sales_invoice_id = $salesInvoice->id;
                        $changes->save();
                    }
                }

                //if currency changed
                if ($salesInvoice->books->where('id', $book_id)->first()->sales_currency != $validated['currency']) {
                    Log::channel('CRUD')->info('Book : '.$salesInvoice->books->where('id',
                            $oldBook1[$index])->first()->title.' Changed Sales Currency from: '.$salesInvoice->books->where('id',
                            $oldBook1[$index])->first()->sales_currency.' to '.$validated['currency'].' in Sales invoice: '.$salesInvoice->invoice_number.' by user: '.auth()->user()->name.'  Book ID: '.$oldBook1[$index]);
                    $salesInvoice->books->where('id', $book_id)->first()->sales_amount   = $validated['price'][$index];
                    $salesInvoice->books->where('id',
                        $book_id)->first()->sales_gel                                    = $validated['price_gel'][$index];
                    $salesInvoice->books->where('id', $book_id)->first()->sales_currency = $validated['currency'];
                    $salesInvoice->books->where('id', $book_id)->first()->sales_rate     = $validated['ex_rate'];
                    $salesInvoice->books->where('id', $book_id)->first()->update();

                    if ($salesInvoice->books->where('id', $book_id)->first()->reviewed === 1) {
                        $changes                   = new Change();
                        $changes->sales_invoice_id = $salesInvoice->id;
                        $changes->save();
                    }
                }

                //if rate changed
                if ($salesInvoice->books->where('id', $book_id)->first()->sales_rate != $validated['ex_rate']) {
                    Log::channel('CRUD')->info('Book : '.$salesInvoice->books->where('id',
                            $oldBook1[$index])->first()->title.' Changed Sales Rate from: '.$salesInvoice->books->where('id',
                            $oldBook1[$index])->first()->sales_rate.' to '.$validated['ex_rate'].' in Sales invoice: '.$salesInvoice->invoice_number.' by user: '.auth()->user()->name.'  Book ID: '.$oldBook1[$index]);

                    $salesInvoice->books->where('id', $book_id)->first()->sales_amount   = $validated['price'][$index];
                    $salesInvoice->books->where('id', $book_id)->first()->sales_gel      = $validated['price_gel'][$index];
                    $salesInvoice->books->where('id', $book_id)->first()->sales_currency = $validated['currency'];
                    $salesInvoice->books->where('id', $book_id)->first()->sales_rate     = $validated['ex_rate'];
                    $salesInvoice->books->where('id', $book_id)->first()->update();

                    if ($salesInvoice->books->where('id', $book_id)->first()->reviewed === 1) {
                        $changes                   = new Change();
                        $changes->sales_invoice_id = $salesInvoice->id;
                        $changes->save();
                    }
                }

                if ($salesInvoice->books->where('id', $book_id)->first()->comment != $validated['comment'][$index]) {
                    $salesInvoice->books->where('id', $book_id)->first()->comment = $validated['comment'][$index];
                    $salesInvoice->books->where('id', $book_id)->first()->update();
                }

            }


        }


        // Add new books
        if ($request->title) {
            foreach ($validated['title'] as $index2 => $book) {
                if (!in_array($book, $salesInvoice->books->pluck('id')->toArray())) {
                    $newBook                   = Book::find($book);
                    $newBook->sales_invoice_id = $salesInvoice->id;
                    $newBook->sales_currency   = $validated['currency'];
                    $newBook->sales_rate       = $validated['ex_rate'];
                    $newBook->sales_amount     = $validated['price_nb'][$index2];
                    $newBook->sales_gel        = $validated['price_gel_nb'][$index2];
                    Log::channel('CRUD')->info('Book Added: '.$newBook->title.' To Sales Invoice : '.$salesInvoice->invoice_number.' by user: '.auth()->user()->name);
                    $newBook->save();
                }
            }
        }


        // Delete book if deleted
        foreach ($salesInvoice->books as $index => $book2) {
            if (!in_array($book2->id, $request->book_id)) {
                Log::channel('CRUD')->info('Book : '.$book2->title.'Deleted From Sales Invoice : '.$salesInvoice->invoice_number.' by user: '.auth()->user()->name);
                $removeBook                   = Book::find($book2->id);
                $removeBook->sales_invoice_id = null;
                $removeBook->sales_currency   = null;
                $removeBook->sales_rate       = null;
                $removeBook->sales_amount     = null;
                $removeBook->sales_gel        = null;
                $removeBook->save();
            }
        }


        if ($request->hasFile('invoice')) {
            $media = $salesInvoice->getMedia('sales_invoice');
            $media[0]->delete();
            Log::channel('CRUD')->info('Sales Invoice No: '.$salesInvoice->invoice_number.' New Sales Invoice uploaded: '.'by user: '.auth()->user()->name.'   Sales Invoice ID: '.$request->invoice_id);

            $salesInvoice->addMediaFromRequest('invoice')->toMediaCollection('sales_invoice');

        }



        return back();


    }

    public function salesDelete(Request $request)
    {

        $salesInvoice = SalesInvoice::with('books')->find($request->id);

        Log::channel('CRUD')->info('Sales Invoice No: '.$salesInvoice->invoice_number.' Deleted '.' by user: '.auth()->user()->name.'   Sales Invoice ID: '.$request->invoice_id);

        foreach ($salesInvoice->books as $book) {

            Log::channel('CRUD')->info('Book : '.$book->title.' Removed From Sales Invoice'.$salesInvoice->invoice_number.' by user: '.auth()->user()->name);

            if ($book->reviewed === 1) {
                $changes                   = new Change();
                $changes->sales_invoice_id = $salesInvoice->id;
                $changes->save();
            }


            $book->sales_invoice_id = null;
            $book->sales_currency   = null;
            $book->sales_rate       = null;
            $book->sales_amount     = null;
            $book->sales_gel        = null;
            $book->update();

        }


        $changes                   = new Change();
        $changes->sales_invoice_id = $salesInvoice->id;
        $changes->save();


        $salesInvoice->delete();


        return back();
    }
}
