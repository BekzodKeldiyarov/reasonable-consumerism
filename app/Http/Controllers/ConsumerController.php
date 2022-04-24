<?php

namespace App\Http\Controllers;

use App\Models\Bottle;
use App\Models\Good;
use App\Models\Meat;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsumerController extends Controller
{
    public function addBottleConsume()
    {

        return view('admin.consumes.bottles.add', ['bottles' => Bottle::all(), 'goods' => Good::all()]);
    }

    public function storeBottleConsume(Request $request)
    {
        $user_id = auth()->user()->id;
        $good_id = $request->good_id;
        $consume_date = Carbon::parse($request->consume_date)->format('Y-m-d\TH:i');
        $amount = $request->amount;
        DB::table('consume')->insert(
            ['user_id' => $user_id,
                'good_id' => $good_id,
                'consume_date' => $consume_date,
                'amount' => $amount]
        );

        return redirect('dashboard');
    }

    public function editBottleConsume(Request $request)
    {
        $consume = DB::table('consume')
            ->where('user_id', auth()->user()->id)
            ->where('good_id', $request->good_id)
            ->where('consume_date', $request->consume_date)->first();

        return view('admin.consumes.bottles.edit', ['consume' => $consume, 'bottles' => Bottle::all(), 'goods' => Good::all()]);
    }

    public function updateBottleConsume(Request $request)
    {
        DB::table('consume')
            ->where('user_id', auth()->user()->id)
            ->where('good_id', $request->good_id)
            ->where('consume_date', $request->consume_date)->update(['amount' => $request->amount, 'consume_date' => $request->consume_date_new, 'good_id' => $request->good_id_new]);

        return redirect('dashboard');
    }

    public function destroyBottleConsume(Request $request)
    {
        $consume = DB::table('consume')
            ->where('user_id', auth()->user()->id)
            ->where('good_id', $request->good_id)
            ->where('consume_date', $request->consume_date)->delete();

        return redirect(route('dashboard'));
    }


// Package functions

    public function addPackageConsume()
    {

        return view('admin.consumes.packages.add', ['packages' => Package::all(), 'goods' => Good::all()]);
    }

    public function storePackageConsume(Request $request)
    {
        $user_id = auth()->user()->id;
        $good_id = $request->good_id;
        $consume_date = Carbon::parse($request->consume_date)->format('Y-m-d\TH:i');
        $amount = $request->amount;
        DB::table('consume')->insert(
            ['user_id' => $user_id,
                'good_id' => $good_id,
                'consume_date' => $consume_date,
                'amount' => $amount]
        );

        return redirect('dashboard');
    }

    public function editPackageConsume(Request $request)
    {
        $consume = DB::table('consume')
            ->where('user_id', auth()->user()->id)
            ->where('good_id', $request->good_id)
            ->where('consume_date', $request->consume_date)->first();

        return view('admin.consumes.bottles.edit', ['consume' => $consume, 'packages' => Package::all(), 'goods' => Good::all()]);
    }

    public function updatePackageConsume(Request $request)
    {
        DB::table('consume')
            ->where('user_id', auth()->user()->id)
            ->where('good_id', $request->good_id)
            ->where('consume_date', $request->consume_date)->update(['amount' => $request->amount, 'consume_date' => $request->consume_date_new, 'good_id' => $request->good_id_new]);

        return redirect('dashboard');
    }

    public function destroyPackageConsume(Request $request)
    {
        $consume = DB::table('consume')
            ->where('user_id', auth()->user()->id)
            ->where('good_id', $request->good_id)
            ->where('consume_date', $request->consume_date)->delete();

        return redirect(route('dashboard'));
    }


    public function addMeatConsume()
    {

        return view('admin.consumes.meats.add', ['meats' => Meat::all(), 'goods' => Good::all()]);
    }

    public function storeMeatConsume(Request $request)
    {
        $user_id = auth()->user()->id;
        $good_id = $request->good_id;
        $consume_date = Carbon::parse($request->consume_date)->format('Y-m-d\TH:i');
        $amount = $request->amount;
        DB::table('consume')->insert(
            ['user_id' => $user_id,
                'good_id' => $good_id,
                'consume_date' => $consume_date,
                'amount' => $amount]
        );

        return redirect('dashboard');
    }

    public function editMeatConsume(Request $request)
    {
        $consume = DB::table('consume')
            ->where('user_id', auth()->user()->id)
            ->where('good_id', $request->good_id)
            ->where('consume_date', $request->consume_date)->first();

        return view('admin.consumes.meats.edit', ['consume' => $consume, 'meats' => Meat::all(), 'goods' => Good::all()]);
    }

    public function updateMeatConsume(Request $request)
    {
        DB::table('consume')
            ->where('user_id', auth()->user()->id)
            ->where('good_id', $request->good_id)
            ->where('consume_date', $request->consume_date)->update(['amount' => $request->amount, 'consume_date' => $request->consume_date_new, 'good_id' => $request->good_id_new]);

        return redirect('dashboard');
    }

    public function destroyMeatConsume(Request $request)
    {
        $consume = DB::table('consume')
            ->where('user_id', auth()->user()->id)
            ->where('good_id', $request->good_id)
            ->where('consume_date', $request->consume_date)->delete();

        return redirect(route('dashboard'));
    }
}
