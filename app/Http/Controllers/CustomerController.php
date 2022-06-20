<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Package;

class CustomerController extends Controller
{
    public function getCustomers()
    {
        $customers = Customer::orderBy('name')->with(['user', 'package'])->latest('id')->paginate(10);
        return view('customer.index', compact('customers'))->with('title', 'Customers');
    }

    public function getAddCustomer()
    {
        $packages = Package::all();
        return view('customer.add', compact('packages'))->with('title', 'Add Customer');
    }

    public function postAddCustomer(Request $request)
    {
        $request->validate([
            'name'          => ['required', 'string'],
            'username'      => ['required', 'string'],
            'description'   => ['max:100'],
            'package_id'    => ['required', 'numeric'],
            'connection_date' => ['required', 'date']
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

    public function getEditCustomer($id)
    {
        $packages = Package::all();
        $customer = Customer::find($id);
        return view('customer.edit', compact('packages', 'customer'))->with('title', 'Edit Customer');
    }
    public function postUpdateCustomer(Request $request)
    {
        $request->validate([
            'name'          => ['required', 'string'],
            'username'      => ['required', 'string'],
            'description'   => ['max:100'],
            'package_id'    => ['required', 'numeric'],
            'connection_date' => ['required', 'date']
        ]);

        $customer = Customer::find($request->id);
        $customer->name          = $request->name;
        $customer->username      = $request->username;
        $customer->description   = $request->description;
        $customer->package_id    = $request->package_id;
        $customer->connection_date = $request->connection_date;
        $customer->save();

        return redirect()
            ->route('customers')
            ->with('success', "Customer updated successfully");
    }

    public function deleteCustomer($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect()
            ->route('customers')
            ->with('success', "Customer successfully deleted");
    }
}
