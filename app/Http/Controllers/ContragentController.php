<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ContragentController extends Controller
{

    public function customers()
    {

        $customers = Customer::all();

        return view('admin.pages.customers', compact('customers'));

    }

    public function customerStore(Request $request)
    {
        $data           = $request->validate([
            'name' => ['required', 'unique:customers', 'string'],
        ]);
        $customer       = new Customer();
        $customer->name = $data['name'];
        $customer->save();

        return back();
    }

    public function customerDelete(Request $request)
    {

        $customer = Customer::find($request->id);
        $customer->delete();

        return back();
    }

    public function customerUpdate(Request $request)
    {

//        dd($request->all());
        $data           = $request->validate([
            'name' => ['required', 'string'],
        ]);
        $customer       = Customer::find($request->id);
        $customer->name = $data['name'];
        $customer->update();

        return back();
    }



    public function suppliers()
    {

        $suppliers = Supplier::all();

        return view('admin.pages.suppliers', compact('suppliers'));

    }


    public function supplierStore(Request $request)
    {
        $data           = $request->validate([
            'name' => ['required', 'unique:suppliers', 'string'],
        ]);
        $supplier       = new Supplier();
        $supplier->name = $data['name'];
        $supplier->save();

        return back();
    }

    public function supplierDelete(Request $request)
    {

        $supplier = Supplier::find($request->id);
        $supplier->delete();

        return back();
    }

    public function supplierUpdate(Request $request)
    {


        $data           = $request->validate([
            'name' => ['required', 'string'],
        ]);
        $supplier       = Supplier::find($request->id);
        $supplier->name = $data['name'];
        $supplier->update();

        return back();
    }


}
