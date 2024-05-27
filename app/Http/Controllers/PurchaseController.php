<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseRequest;
use App\Http\Requests\PurchaseUpdteRequest;
use App\Models\Book;
use App\Models\Change;
use App\Models\PurchaseInvoice;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PurchaseController extends Controller
{
    public function store(PurchaseRequest $request)
    {

        $validated = $request->validated();
//dd($validated);

        $purchaseInvoice                 = new PurchaseInvoice();
        $purchaseInvoice->date           = $validated['date'];
        $purchaseInvoice->supplier_id    = $validated['supplier'];
        $purchaseInvoice->invoice_number = $validated['inv_number'];
        $purchaseInvoice->save();

        foreach ($request->title as $index => $title) {
            $book        = new Book();
            $book->title = $validated['title'][$index];

            $book->purchase_currency   = $validated['currency'];
            $book->purchase_amount     = $validated['price'][$index];
            $book->purchase_rate       = $validated['ex_rate'];
            $book->stock               = $validated['stock'][$index];
            $book->purchase_gel        = $validated['price_gel'][$index];
            $book->comment             = $validated['comment'][$index];
            $book->purchase_invoice_id = $purchaseInvoice->id;

//            Log::channel('CRUD')->info('Purchase Invoice created: '.$purchaseInvoice->invoice_number.' Book Title '.$book->title.' by user: '.auth()->user()->name);
            $book->save();
        }


        if ($request->hasFile('invoice')) {
            $purchaseInvoice->addMediaFromRequest('invoice')->toMediaCollection('purchase_invoice');
        }

        return back();

    }


    public function purchaseEdit(Request $request)
    {

        $suppliers = Supplier::all();
        $purchase  = PurchaseInvoice::with('suppliers', 'books')->find($request->id);

        return view('admin.pages.editPurchase', compact('suppliers', 'purchase'));

    }

    public function purchaseUpdate(PurchaseUpdteRequest $request)
    {


        $validated = $request->validated();
//        dd($validated);

        $purchaseInvoice = PurchaseInvoice::where('id', $validated['invoice_id'])
            ->with('books')
            ->with('suppliers')
            ->withCount('books')
            ->with('media')
            ->first();


        // Update Invoice
        if ($purchaseInvoice->date !== $validated['date']) {
            Log::channel('CRUD')->info('Purchase Invoice No: '.$purchaseInvoice->invoice_number.'  Date changed from: '.$purchaseInvoice->date.' to ' .$validated['date'].' by user: '.auth()->user()->name.'   Purchase Invoice ID: ' .$request->invoice_id);
            $purchaseInvoice->date = $validated['date'];
            $purchaseInvoice->update();


            if ($purchaseInvoice->books->first()->reviewed === 1) {
                $changes                   = new Change();
                $changes->purchase_invoice_id = $purchaseInvoice->id;
                $changes->save();
            }
        }

        if ($purchaseInvoice->supplier_id != $validated['supplier']) {
            Log::channel('CRUD')->info('Purchase Invoice No: '.$purchaseInvoice->invoice_number.' Supplier changed from: '.$purchaseInvoice->suppliers->name.' to '.$purchaseInvoice->suppliers->where('id',
                    $validated['supplier'])->first()->name.' by user: '.auth()->user()->name.'   Purchase Invoice ID: '.$request->invoice_id);
            $purchaseInvoice->supplier_id = $validated['supplier'];
            $purchaseInvoice->update();
        }

        if ($purchaseInvoice->invoice_number != $validated['inv_number']) {
            Log::channel('CRUD')->info('Purchase Invoice No: '.$purchaseInvoice->invoice_number.'  Invoice changed from: '.$purchaseInvoice->invoice_number.' to '.$validated['inv_number'].' by user: '.auth()->user()->name.'   Purchase Invoice ID: '.$validated['invoice_id']);
            $purchaseInvoice->invoice_number = $validated['inv_number'];
            $purchaseInvoice->update();
        }


        // update books
        foreach ($request->book_id as $index => $book_id) {
            $book = Book::find($book_id);
            if ($book->title != $validated['title'][$index]) {
                Log::channel('CRUD')->info('Book : '.$book->title.' Title changed to: '.$validated['title'][$index].' by user: '.auth()->user()->name.'  Book ID: '.$book->id .'   Purchase Invoice: '.$purchaseInvoice->invoice_number);
                Log::channel('CRUD')->info('Book : '.$book->title.' Title changed to: '.$validated['title'][$index].' by user: '.auth()->user()->name.'  Book ID: '.$book->id .'   Purchase Invoice: '.$purchaseInvoice->invoice_number);

                $book->title = $validated['title'][$index];

                if($book->reviewed===1){
                    $changes                      = new Change();
                    $changes->purchase_invoice_id = $purchaseInvoice->id;
                    $changes->save();

                }

            }
            if ($book->stock !=  $validated['stock'][$index]) {
                Log::channel('CRUD')->info('Book : '.$book->title.' Stock: '.$book->stock.'  changed to: '. $validated['stock'][$index].' by user: '.auth()->user()->name.'   Book ID: '.$book->id.'   Purchase Invoice: '.$purchaseInvoice->invoice_number);

                $book->stock = $validated['stock'][$index];

                if($book->reviewed===1){
                    $changes                      = new Change();
                    $changes->purchase_invoice_id = $purchaseInvoice->id;
                    $changes->save();

                }
            }
            if ($book->purchase_currency !== $validated['currency']) {
                Log::channel('CRUD')->info('Book : '.$book->title.'Purchase Currency: '.$book->purchase_currency.'  changed to: '.$validated['currency'].' by user: '.auth()->user()->name.'   Book ID: '.$book->id.'   Purchase Invoice: '.$purchaseInvoice->invoice_number);

                $book->purchase_currency = $validated['currency'];

                if($book->reviewed===1){
                    $changes                      = new Change();
                    $changes->purchase_invoice_id = $purchaseInvoice->id;
                    $changes->save();

                }
            }
            if ($book->purchase_amount != $validated['price'][$index]) {
                Log::channel('CRUD')->info('Book : '.$book->title.'Purchase Amount: '.$book->purchase_amount.'  changed to: '.$validated['price'][$index].' by user: '.auth()->user()->name.'   Book ID: '.$book->id.'   Purchase Invoice: '.$purchaseInvoice->invoice_number);

                $book->purchase_amount =$validated['price'][$index];

                if($book->reviewed===1){
                    $changes                      = new Change();
                    $changes->purchase_invoice_id = $purchaseInvoice->id;
                    $changes->save();

                }
            }
            if ($book->purchase_rate !=$validated['ex_rate']) {
                Log::channel('CRUD')->info('Book : '.$book->title.'Purchase Rate: '.$book->purchase_rate.'  changed to: '.$validated['ex_rate'].' by user: '.auth()->user()->name.'   Book ID: '.$book->id.'   Purchase Invoice: '.$purchaseInvoice->invoice_number);

                $book->purchase_rate = $validated['ex_rate'];

                if($book->reviewed===1){
                    $changes                      = new Change();
                    $changes->purchase_invoice_id = $purchaseInvoice->id;
                    $changes->save();

                }
            }
            if ($book->purchase_gel != $validated['price_gel'][$index]) {
                Log::channel('CRUD')->info('Book : '.$book->title.'Purchase GEL: '.$book->purchase_gel.'  changed to: '.$validated['price_gel'][$index].' by user: '.auth()->user()->name.'   Book ID: '.$book->id.'   Purchase Invoice: '.$purchaseInvoice->invoice_number);

                $book->purchase_gel = $validated['price_gel'][$index];

                if($book->reviewed===1){
                    $changes                      = new Change();
                    $changes->purchase_invoice_id = $purchaseInvoice->id;
                    $changes->save();

                }

            }

            if ($book->comment !=$validated['comment'][$index]) {

                $book->comment =$validated['comment'][$index];

                if($book->reviewed===1){
                    $changes                      = new Change();
                    $changes->purchase_invoice_id = $purchaseInvoice->id;
                    $changes->save();

                }
            }



            $book->update();
        }


        // Add new books
        foreach ($validated['title'] as $index2 => $title) {
            $exists = Book::where('title', $title)->first();
            if (!$exists) {
                $book                      = new Book();
                $book->title               = $title;
                $book->purchase_currency   = $validated['currency'];
                $book->purchase_amount     = $validated['price'][$index2];
                $book->purchase_rate       = $validated['ex_rate'];
                $book->stock               = $validated['stock'][$index2];
                $book->purchase_gel        = $validated['price_gel'][$index2];
                $book->purchase_invoice_id = $purchaseInvoice->id;

                $book->save();
                Log::channel('CRUD')->info('Book Added: '.$validated['title'].' To Purchase Invoice : '.$purchaseInvoice->invoice_number.' by user: '.auth()->user()->name);

                if($book->reviewed===1){
                    $changes                      = new Change();
                    $changes->purchase_invoice_id = $purchaseInvoice->id;
                    $changes->save();

                }

            }
        }


        // Delete book if deleted
        foreach ($purchaseInvoice->books as $index => $book) {
            if (!in_array($book->id, $validated['book_id'])) {
                Log::channel('CRUD')->info('Book : '.$validated['title'].' Deleted From Purchase Invoice : '.$purchaseInvoice->invoice_number.' by user: '.auth()->user()->name);
                if($book->reviewed===1){
                    $changes                      = new Change();
                    $changes->purchase_invoice_id = $purchaseInvoice->id;
                    $changes->save();

                }


                $book->delete();
            }
        }




        if ($request->hasFile('invoice')) {
            $media = $purchaseInvoice->getMedia('purchase_invoice');
            $media[0]->delete();
            Log::channel('CRUD')->info('Purchase Invoice No: '.$purchaseInvoice->invoice_number.' New Purchase Invoice uploaded: '.'by user: '.auth()->user()->name.'   Sales Invoice ID: '.$request->invoice_id);

            $purchaseInvoice->addMediaFromRequest('invoice')->toMediaCollection('purchase_invoice');

        }






        return back();

    }


    public function purchaseDelete(Request $request)
    {

        $purchaseInvoice = PurchaseInvoice::find($request->id);





        $books = Book::where('purchase_invoice_id', $request->id)->get();

        foreach ($books as $book) {
            Log::channel('CRUD')->info('Purchase Invoice and books Deleted: '.$purchaseInvoice->invoice_number.' Book : '.$book->title.' by user: '.auth()->user()->name);
            if($book->reviewed===1){


                $changes                      = new Change();
                $changes->purchase_invoice_id = $purchaseInvoice->id;
                $changes->save();

            }

        }

        $purchaseInvoice->delete();

        return back();

    }

}
