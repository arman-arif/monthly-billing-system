<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class CustomerController extends Controller
{
    public function getCustomers(){
        return view('customer.customer-list',['title'=>'Customers']);
    }

    public function getAddCustomer()
    {
        $packages = Package::all();
        return view('customer.customer-add',['title'=>'Add Customer'], compact('packages'));
    }

    public function postAddCustomer()
    {
        
        return redirect()->route('add-customer');
    }
}
