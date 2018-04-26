<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ServiceFee;

class ServiceFeeController extends Controller
{
    public function index()
    {
        $servicefees = ServiceFee::all();

        return view('backend.servicefee.index')->withServicefees($servicefees);
    }

    
    public function create()
    {
        return view('backend.servicefee.create');
    }

    
    public function store(Request $request)
    {
        $servicefee = new ServiceFee;

        $servicefee->servicefee = $request->servicefee;

        $servicefee->save();

        return redirect()->route('servicefee.index')->with('success', 'Service Fee has been saved !');
    }

    
    public function show($id)
    {

    }

    
    public function edit($id)
    {
        $servicefee = ServiceFee::find($id);

        return view('backend.servicefee.edit')->withServicefee($servicefee);
    }

    public function update(Request $request, $id)
    {
        $servicefee = ServiceFee::find($id);

        $servicefee->servicefee = $request->servicefee;

        $servicefee->save();

        return redirect()->route('servicefee.index')->with('success', 'Service Fee has been Updated !');
    }

    
    public function destroy($id)
    {
        //
    }
}
