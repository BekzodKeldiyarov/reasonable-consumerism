<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGoodRequest;
use App\Http\Requests\UpdateGoodRequest;
use App\Models\Bottle;
use App\Models\Good;
use App\Models\Plastic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoodController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        $plastics = Plastic::all();
        $goods = Good::all();
        return view('admin.plastic.index', ['plastics' => $plastics, 'goods' => $goods]);
    }

    public function create()
    {
        return view('admin.plastic.create');
    }

    public function indexBottle()
    {
        $goods = Good::all();
        $bottles = Bottle::all();
        $plastics = Plastic::all();
        return view('admin.plastic.bottle.index', ['bottles' => $bottles, 'plastics' => $plastics, 'goods' => $goods]);
    }

    public function createBottle()
    {
        return view('admin.plastic.bottle.create');
    }

    public function store(Request $request)
    {
        $good['good_type'] = $request->good_type;
        $good['label'] = $request->label;

//        $id = DB::table('goods')->insertGetId(
//            ['good_type' => $request->good_type, 'label' => $request->label]
//        );

        Good::insert($good);
        $plastics = Plastic::all();
        $goods = Good::all();
        return view('admin.plastic.index', ['plastics' => $plastics, 'goods' => $goods]);
    }

    public function storeBottle(Request $request)
    {
//        $good['good_type'] = $request->good_type;
//        $good['label'] = $request->label;
        $label = strval($request->label);
//        $id = DB::table('goods')->insertGetId(
//            ['label' => $label]
//        );
        $good = Good::create(['label' => $request->label]);

        $plastic['id'] = $good->id;
        $plastic['biodigration_time'] = $request->biodigration_time;
        $plastic['toxic_spread_emission'] = $request->toxic_spread_emission;
        $plastic['polyethylene_density'] = $request->polyethylene_density;

        Plastic::create($plastic);

        $bottle['id'] = $good->id;
        $bottle['volume'] = $request->volume;
        Bottle::create($bottle);

        return redirect()->route('goods.bottle.index');
    }

    public function editBottle(Bottle $bottle)
    {

        $good = Good::find($bottle->id);
        $plastic = Plastic::find($bottle->id);

        return view('admin.plastic.bottle.edit', ['bottle' => $bottle, 'good' => $good, 'plastic' => $plastic]);
    }

    public function updateBottle(Request $request)
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

        $bottle = Bottle::find($id);
        $bottle->volume = $request->volume;
        $bottle->save();


        return redirect(route('goods.bottle.index'));
    }


    public function show(Good $good)
    {
        //
    }


    public function edit(Good $good)
    {
        return view('');
    }

    public function update(UpdateGoodRequest $request, Good $good)
    {
        //
    }


    public function destroy(Good $good)
    {
        //
    }
}
