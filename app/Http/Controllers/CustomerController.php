<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
        public function index()
    {
        return Customer::all();
    }

    public function show(Customer $customer)
    {
        return $customer;
    }

    public function update(Request $request,Customer $customer)
    {
    $customer->update($request->all());
    return response()->json($customer,200);
    }

    public function delete(Request $request ,Customer $customer)
    {

    $customer->delete();
    return response()->json(null,204);
    }

}
