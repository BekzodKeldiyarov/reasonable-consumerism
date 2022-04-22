<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Models\Good;
use App\Models\Package;
use App\Models\Plastic;
use Illuminate\Http\Request;

class PackageController extends Controller
{

    public function index()
    {
        $packages = Package::all();
        $plastics = Plastic::all();
        $goods = Good::all();
        return view('admin.plastic.package.index', ['packages' => $packages, 'plastics' => $plastics, 'goods' => $goods]);
    }


    public function create()
    {
        return view('admin.plastic.package.create');
    }


    public function store(Request $request)
    {
        $good = Good::create(['label' => $request->label]);

        $plastic['id'] = $good->id;
        $plastic['biodigration_time'] = $request->biodigration_time;
        $plastic['toxic_spread_emission'] = $request->toxic_spread_emission;
        $plastic['polyethylene_density'] = $request->polyethylene_density;

        Plastic::create($plastic);

        $package['id'] = $good->id;
        $package['size'] = $request->size;
        Package::create($package);

        return redirect(route('packages.index'));
    }


    public function show(Package $package)
    {
        //
    }


    public function edit(Package $package)
    {

        $plastic = Plastic::find($package->id);
        $good = Good::find($package->id);

        return view('admin.plastic.package.edit', ['plastic' => $plastic, 'good' => $good, 'package' => $package]);
    }


    public function update(Request $request)
    {
        $id = $request->id;
        $good = Good::find($id);
        $good->label = $request->label;
        $good->updated_at = now();
        $good->save();

        $plastic = Plastic::find($id);
        $plastic->biodigration_time = $request->biodigration_time;
        $plastic->toxic_spread_emission = $request->toxic_spread_emission;
        $plastic->polyethylene_density = $request->polyethylene_density;

        $plastic->save();

        $package = Package::find($id);
        $package->size = $request->size;
        $package->save();


        return redirect(route('packages.index'));
    }


    public function destroy(Package $package)
    {
        //
    }
}
