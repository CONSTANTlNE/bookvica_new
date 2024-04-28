<?php

namespace App\Http\Controllers;

use App\Imports\BookImport;
use App\Models\Book;
use App\Models\Customer;
use App\Models\PurchaseInvoice;
use App\Models\SalesInvoice;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;


class UploadController extends Controller
{
    public function index(){


        return view('admin.upload');
    }


    public function import(Request $request){



        $array = Excel::toArray(new BookImport,  $request->file);

//        dd($array[0][49]);

        foreach ($array[0] as $data) {

            // Create Customer and Supplier if not exists
            if (Supplier::where('name', $data['supplier'])->exists()) {
                $supplier = Supplier::where('name', $data['supplier'])->first();
            } else {
                $supplier = new Supplier([
                    'name' => $data['supplier']
                ]);
                $supplier->save();
            }

            if (Customer::where('name', $data['customer'])->exists()) {
                $customer = Customer::where('name', $data['customer'])->first();
            } else {

                $customer = new Customer([
                    'name' => $data['customer']
                ]);
                $customer->save();
            }


            // Data Insert

            // Use existing purchase invoice or create new and attach supplier to it
            $purchaseInvoiceDate = Carbon::createFromFormat('d/m/Y', $data['purch_inv_date'])->format('Y-m-d');
            if (PurchaseInvoice::where('invoice_number',
                    $data['purch_inv_no'])->exists() && PurchaseInvoice::where('date',
                    $purchaseInvoiceDate)->exists()) {


                $purchaseinvoice = PurchaseInvoice::where('invoice_number', $data['purch_inv_no'])
                    ->where('date', $purchaseInvoiceDate)
                    ->where('supplier_id', $supplier->id)
                    ->first();


            } else {
                $purchaseinvoice = new PurchaseInvoice([
                    'date'   => Carbon::createFromFormat('d/m/Y', $data['purch_inv_date'])->format('Y-m-d'),
                    'invoice_number' => $data['purch_inv_no'],
                ]);
                $supplier->invoices()->save($purchaseinvoice);
            }

            // check if book exists or create new
            if ($purchaseinvoice->books()->where('title', $data['book_title'])
                ->where('purchase_gel', $data['purch_price_gel'])
                ->exists()) {
                $book = Book::where('title', $data['book_title'])
                    ->where('purchase_gel', $data['purch_price_gel'])
                    ->first();
            } else {
                $book = new Book([
                    'title'        => $data['book_title'],
                    'stock'             => 'USA',
                    'qty'     => $data['qty'],
                    'purchase_currency' => $data['purch_currency'],
                    'purchase_rate'     => $data['purch_ex'],
                    'purchase_amount'        => $data['purch_price'],
                    'purchase_gel'      => $data['purch_price_gel'],
                ]);

                $purchaseinvoice->books()->save($book);
            }



            // if book is sold in Excel file, format the invoice date
            if (!empty($data['sales_inv_date']) && $data['sales_inv_date'] !== null && $data['sales_inv_date'] !== '')  {
                $salesDate = Carbon::createFromFormat('d/m/Y', $data['sales_inv_date'])->format('Y-m-d');
            }



            // if both sales invoice number and supplier exists (might be same invoice number for same supplier ?! )
            if (SalesInvoice::where('invoice_number',
                    $data['sales_inv_no'])->exists() && Supplier::where('name',
                    $data['supplier'])->exists()) {
                $salesInvoice = SalesInvoice::where('invoice_number', $data['sales_inv_no'])->first();

                $book->update([
                    'sales_currency'   => $data['sales_currency'],
                    'sales_rate'       => $data['sales_ex'],
                    'sales_gel'        => $data['sales_price_gel'],
                    'sales_amount'      => $data['sales_price'],
                    'sales_invoice_id' => $salesInvoice->id
                ]);

            } else {
                $salesInvoice = new SalesInvoice([
                    'date'   => $salesDate,
                    'invoice_number' => $data['sales_inv_no'],
                ]);

                $customer->invoices()->save($salesInvoice);
                $updatable = Book::where('title', $data['book_title'])->first();
                $updatable->update([
                    'sales_currency'   => $data['sales_currency'],
                    'sales_rate'       => $data['sales_ex'],
                    'sales_gel'        => $data['sales_price_gel'],
                    'sales_amount'      => $data['sales_price'],
                    'sales_invoice_id' => $salesInvoice->id
                ]);

                $salesInvoice->books()->save($updatable);

            }
        }

        return redirect()->back();


    }
}
