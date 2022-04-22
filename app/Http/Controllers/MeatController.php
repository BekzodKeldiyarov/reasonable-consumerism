<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMeatRequest;
use App\Http\Requests\UpdateMeatRequest;
use App\Models\Good;
use App\Models\Meat;
use App\Models\Package;
use App\Models\Plastic;
use Illuminate\Http\Request;


class MeatController extends Controller
{

    public function index()
    {
        $goods = Good::all();
        $meats = Meat::all();
        return view('admin.meat.index', ['meats' => $meats, 'goods' => $goods]);
    }

    public function create()
    {
        return view('admin.meat.create');
    }


    public function store(Request $request)
    {
        $good = Good::create(['label' => $request->label]);

        $meat['id'] = $good->id;
        $meat['carbon_rate'] = $request->carbon_rate;
        $meat['meat_type'] = $request->meat_type;

        Meat::create($meat);

        return redirect(route('meats.index'));
    }


    public function show(Meat $meat)
    {
        //
    }


    public function edit(Meat $meat)
    {
        $meat = Meat::find($meat->id);
        $good = Good::find($meat->id);

        return view('admin.meat.edit', ['meat' => $meat, 'good' => $good]);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $good = Good::find($id);
        $good->label = $request->label;
        $good->updated_at = now();
        $good->save();

        $meat = Meat::find($id);
        $meat->carbon_rate = $request->carbon_rate;
        $meat->meat_type = $request->meat_type;

        $meat->save();

        return redirect(route('meats.index'));
    }

    public function destroy(Meat $meat)
    {
        //
    }
}
