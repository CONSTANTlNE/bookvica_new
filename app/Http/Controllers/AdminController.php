<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Change;
use App\Models\Customer;
use App\Models\PurchaseInvoice;
use App\Models\SalesInvoice;
use App\Models\Supplier;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {

        $startTime = microtime(true);
        $books     = Book::with('purchaseinvoices.suppliers', 'salesInvoices.customers', 'purchaseinvoices.media',
            'salesInvoices.media')->get();
        $suppliers = Supplier::with('invoices')->get();
        $customers = Customer::all();
        $remains   = Book::where('sales_amount', null)->get();

        $endTime = microtime(true);
        $executionTime = ($endTime - $startTime);

        Log::channel('time')->info('Date Range Execution Time: '.$executionTime);
//        dd($remains);


        return view('admin.index', compact('books', 'suppliers', 'customers', 'remains'));


    }


    public function dateRange(Request $request)
    {

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

            return view('admin.index', compact('books', 'suppliers', 'customers', 'remains'));
        }

        if ($request->invoice == 'purchase') {
//            dd($request);
            $books = Book::whereHas('purchaseinvoices', function ($query) use ($startDate, $endDate) {
                $query->whereBetween('date', [$startDate, $endDate]);
            })->with('purchaseinvoices.suppliers', 'salesInvoices.customers', 'purchaseinvoices.media',
                'salesInvoices.media')->get();

            return view('admin.index', compact('books', 'suppliers', 'customers', 'remains'));
        }

        if ($request->invoice == 'sales') {
            $books = Book::whereHas('salesInvoices', function ($query) use ($startDate, $endDate) {
                $query->whereBetween('date', [$startDate, $endDate]);
            })->with('purchaseinvoices.suppliers', 'salesInvoices.customers', 'purchaseinvoices.media',
                'salesInvoices.media')->get();

            return view('admin.index', compact('books', 'suppliers', 'customers', 'remains'));
        }


    }

    public function closePeriod(Request $request)
    {

        $range = $request->input('range');

        list($startDateString, $endDateString) = explode(' to ', $range);

        $startDate = Carbon::createFromFormat('Y-m-d', $startDateString);
        $endDate   = Carbon::createFromFormat('Y-m-d', $endDateString);

        $books = Book::whereHas('purchaseinvoices', function ($query) use ($startDate, $endDate) {
            $query->whereBetween('date', [$startDate, $endDate]);
        })->get();

        foreach ($books as $book) {
            $book->update([
                'reviewed' => 1,
            ]);
        }

        return back();

    }

    public
    function sendsms()
    {

        $client = new Client();
        $url    = 'https://api.ubill.dev/v1/sms/send';
        $params = [
            'query' => [
                'key'      => '7f68684f4b1c6adb630c4d71a2ee0f3e66b14a3d',
                'brandID'  => 1,
                'numbers'  => '995551507697',
                'text'     => 'message',
                'stopList' => false,
            ],
        ];

        try {
            $response = $client->get($url, $params);
            echo $response->getBody();
        } catch (RequestException $e) {
            // Handle request exceptions, e.g., connection errors, HTTP errors, etc.
            echo 'Error: '.$e->getMessage();
        }

    }


    public function deleted()
    {

//    $books = purchaseInvoice::onlyTrashed()->with('books')->get();
//    dd($books);
//    $books     = Book::onlyTrashed()-> with('purchaseinvoices.suppliers', 'salesInvoices.customers')->get();

        $books = Book::onlyTrashed()
            ->with([
                'purchaseinvoices.suppliers' => function ($query) {
                    $query->trashed();
                }, 'salesInvoices.customers' => function ($query) {
                    $query->trashed();
                }
            ])
            ->get();


        $suppliers = Supplier::with('invoices')->get();
        $customers = Customer::all();

        return view('admin.pages.deleted', compact('books', 'suppliers', 'customers'));

    }


    public function users()
    {

        $users = User::all();

        return view('admin.pages.users', compact('users'));
    }

    public function createUser(Request $request)
    {


        $user           = new User();
        $user->name     = $request->input('name');
        $user->email    = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        $user->assignRole($request->input('role'));

        return back();
    }

    public function updateUser(Request $request)
    {


        $user = User::find($request->input('id'));
        if (!empty($request->input('email'))) {
            $user->email = $request->input('email');
        }

        if (!empty($request->input('password'))) {
            $user->password = bcrypt($request->input('password'));
        }


        if (!empty($request->input('password'))) {
            $user->password = bcrypt($request->input('password'));
        }


        $user->update();
        if (!empty($request->input('role'))) {
            $user->assignRole($request->input('role'));
        }

        return back();
    }


    public function stock(Request $request)
    {


        if ($request->stock == 'USA' && $request->date !== null) {
            $books = Book::where('stock', 'USA')
//                ->where('sales_gel', null)
                ->whereHas('purchaseinvoices', function ($query) use ($request) {
                    $query->whereDate('date', '<=', $request->date);
                })
                ->whereHas('salesInvoices', function ($query) use ($request) {
                    $query->whereDate('date', '>', $request->date);
                })
                ->with('purchaseinvoices.suppliers', 'salesInvoices.customers', 'purchaseinvoices.media', 'salesInvoices.media')
                ->get();

            return view('admin.pages.stock', compact('books'));
        }

        if ($request->stock == 'GEO' && $request->date !== null) {
            $books = Book::where('stock', 'GEO')
//                ->where('sales_gel', null)
                ->whereHas('purchaseinvoices', function ($query) use ($request) {
                    $query->whereDate('date', '<=', $request->date);
                })
                ->whereHas('salesInvoices', function ($query) use ($request) {
                    $query->whereDate('date', '>', $request->date);
                })
                ->with('purchaseinvoices.suppliers', 'salesInvoices.customers', 'purchaseinvoices.media', 'salesInvoices.media')
                ->get();

            return view('admin.pages.stock', compact('books'));
        }


        if ($request->stock == 'USA' && $request->date === null) {
            $books = Book::where('stock', 'USA')
                ->where('sales_gel', null)
                ->with('purchaseinvoices.suppliers', 'salesInvoices.customers', 'purchaseinvoices.media',
                    'salesInvoices.media')
                ->get();

            return view('admin.pages.stock', compact('books'));
        }

        if ($request->stock == 'GEO' && $request->date === null) {

            $books = Book::where('stock', 'GEO')
                ->where('sales_gel', null)
                ->with('purchaseinvoices.suppliers', 'salesInvoices.customers', 'purchaseinvoices.media',
                    'salesInvoices.media')
                ->get();

            return view('admin.pages.stock', compact('books'));
        }

        if ($request->stock == 'ALL' && $request->date !== null) {
            $books = Book::
               whereHas('purchaseinvoices', function ($query) use ($request) {
                    $query->whereDate('date', '<=', $request->date);
                })
                ->whereHas('salesInvoices', function ($query) use ($request) {
                    $query->whereDate('date', '>', $request->date);
                })
                ->with('purchaseinvoices.suppliers', 'salesInvoices.customers', 'purchaseinvoices.media', 'salesInvoices.media')
                ->get();

            return view('admin.pages.stock', compact('books'));
        }


        $books = Book::where('sales_gel', null)
            ->with('purchaseinvoices.suppliers', 'salesInvoices.customers', 'purchaseinvoices.media',
                'salesInvoices.media')
            ->get();

        return view('admin.pages.stock', compact('books'));
    }

    public function dateRangeStock(Request $request)
    {


        $enddate = $request->input('date');

        if ($request->stock === 'USA') {
            $books = Book::where('stock', 'USA')
                ->where('sales_gel', null)
                ->with('purchaseinvoices.suppliers', 'salesInvoices.customers', 'purchaseinvoices.media',
                    'salesInvoices.media')
                ->get();

            return view('admin.pages.stock', compact('books'));
        }

        if ($request->stock === 'GEO') {

            $books = Book::where('stock', 'GEO')
                ->where('sales_gel', null)
                ->with('purchaseinvoices.suppliers', 'salesInvoices.customers', 'purchaseinvoices.media',
                    'salesInvoices.media')
                ->get();

            return view('admin.pages.stock', compact('books'));
        }

        $books = Book::where('sales_gel', null)
            ->with('purchaseinvoices.suppliers', 'salesInvoices.customers', 'purchaseinvoices.media',
                'salesInvoices.media')
            ->get();

        return view('admin.pages.stock', compact('books'));
    }





}