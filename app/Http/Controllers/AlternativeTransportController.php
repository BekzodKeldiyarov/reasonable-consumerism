<?php

namespace App\Http\Controllers;

use App\Models\AlternativeTransport;
use App\Models\PrivateTransport;
use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlternativeTransportController extends Controller
{
    //

    public function create()
    {
        return view('admin.consumes.alternative.add');
    }

    public function store(Request $request)
    {
        $inputs['emission_rate'] = $request->emission_rate;
        $inputs['capacity_efficiency'] = $request->capacity_efficiency;
        $transport = Transport::create($inputs);

        $alternative['id'] = $transport->id;
        AlternativeTransport::create($alternative);

        DB::table('go_by')->insert(['user_id' => auth()->user()->id, 'transport_id' => $transport->id,
            'start_time' => $request->start_time, 'duration_time' => $request->duration]);

        return redirect(route('dashboard'));
    }


    public function edit(Request $request)
    {
        $start_time = $request->start_time;
        $alternative = AlternativeTransport::find($request->transport_id);
        $transport = Transport::find($request->transport_id);
        return view('admin.consumes.alternative.edit', ['alternative' => $alternative, 'transport' => $transport, 'start_time' => $start_time, 'duration_time' => $request->duration_time]);
    }

    public function update(Request $request)
    {
        $transport = Transport::find($request->transport_id);
        $transport->emission_rate = $request->emission_rate;
        $transport->capacity_efficiency = $request->capacity_efficiency;
        $transport->save();

        DB::table('go_by')->where('user_id', auth()->user()->id)
            ->where('transport_id', $request->transport_id)
            ->where('start_time', $request->start_time)
            ->update(['start_time' => $request->start_time_new, 'duration_time' => $request->duration]);

        return redirect(route('dashboard'));
    }

    public function destroy(Request $request)
    {

        DB::table('go_by')->where('user_id', auth()->user()->id)
            ->where('transport_id', $request->transport_id)
            ->where('start_time', $request->start_time)
            ->delete();
        AlternativeTransport::find($request->transport_id)->delete();
        Transport::find($request->transport_id)->delete();
        return redirect(route('dashboard'));
    }

}
