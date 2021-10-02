<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function getPackage()
    {
        $packages = Package::all();
        return view('package.package-list', ['title' => 'Packages'], compact('packages'));
    }

    public function getAddPackage()
    {
        return view('package.package-add', ['title' => 'Add Package']);
    }

    public function postAddPackage(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'code' => 'string|max:5',
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

        return redirect()->route('package');
    }
}
