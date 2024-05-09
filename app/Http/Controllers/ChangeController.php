<?php

namespace App\Http\Controllers;

use App\Models\Change;
use Illuminate\Http\Request;

class ChangeController extends Controller
{

    public function changes()
    {


        $changes = Change::with('salesInvoice', 'purchaseInvoice')->get();

//        dd($changes);
        return view('admin.pages.changes', compact('changes'));
    }

    public function review(Request $request)
    {

//        dd($request);
        $change           = Change::find($request->id);
//        dd($change);
        if($request->has('review')){
            $change->checked = 1;
            $change->save();
        } else {
            $change->checked = 0;
            $change->save();
        }


        return back();
    }

}
