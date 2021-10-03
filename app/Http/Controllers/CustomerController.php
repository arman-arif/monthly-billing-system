<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function getCustomers(){
        return view('customer.customer-list',['title'=>'Customers']);
    }
}
