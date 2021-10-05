<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Package;

class CustomerController extends Controller
{
    public function getCustomers(){
        $customers = Customer::orderBy('name')->get();
        return view('customer.customer-list',['title'=>'Customers'], compact('customers'));
    }

    public function getAddCustomer()
    {
        $packages = Package::all();
        return view('customer.customer-add',['title'=>'Add Customer'], compact('packages'));
    }

    public function postAddCustomer(Request $request)
    {
        $request->validate([
            'name'          => ['required','string'],
            'username'      => ['required', 'string'],
            'description'   => ['max:100'],
            'package_id'    => ['required', 'numeric'],
            'connection_date' => ['required','date']
        ]);

        $customer = new Customer([
            'name'          => $request->name,
            'username'      => $request->username,
            'description'   => $request->description,
            'package_id'    => $request->package_id,
            'connection_date' => $request->connection_date
        ]);
        $customer->save();

        return redirect()
                ->route('customers')
                ->with('success', "Customer added successfully");
    }
}
