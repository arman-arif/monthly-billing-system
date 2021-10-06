<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function getPackages()
    {
        $packages = Package::all()->sortBy('speed');
        return view('package.index', ['title' => 'Packages'], compact('packages'));
    }

    public function getAddPackage()
    {
        return view('package.add', ['title' => 'Add Package']);
    }

    public function postAddPackage(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'code' => 'max:5',
            'speed' => 'numeric|required',
            'duration' => 'numeric|required',
            'price' => 'numeric|required',
        ]);

        $package = new Package([
            'title' => $request->title,
            'code' => $request->code,
            'speed' => $request->speed,
            'duration' => $request->duration,
            'price' => $request->price,
        ]);
        $package->save();

        return redirect()
                ->route('package')
                ->with('success', 'Package created successfully');
    }

    public function deletePackage($id)
    {
        (Package::find($id))->delete();

        return redirect()
                ->route('package')
                ->with('success', 'Package deleted successfully');
    }
}
