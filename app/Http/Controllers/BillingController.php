<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function getBills()
    {
        $bills = Billing::orderByDesc('id');
        return view('billing.index', compact('bills'))->with('title',"Bills");
    }

    public function getAddBill()
    {

    }

    public function getEditBill()
    {

    }

}
