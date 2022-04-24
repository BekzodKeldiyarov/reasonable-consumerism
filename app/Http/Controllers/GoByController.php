<?php

namespace App\Http\Controllers;

use App\Models\Bottle;
use App\Models\Good;
use App\Models\PrivateTransport;
use App\Models\PublicTransport;
use App\Models\Transport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoByController extends Controller
{
    public function addPrivateGoBy()
    {
        return view('admin.consumes.private.add', ['privates' => PrivateTransport::all(), 'transports' => Transport::all()]);
    }

    public function storePrivateGoBy(Request $request)
    {
        $user_id = auth()->user()->id;
        $transport_id = $request->transport_id;
        $start_time = Carbon::parse($request->start_time);
        $duration = $request->duration;
        DB::table('go_by')->insert(
            ['user_id' => $user_id,
                'transport_id' => $transport_id,
                'start_time' => $start_time,
                'duration_time' => $duration]
        );

        return redirect('dashboard');
    }

    public function editPrivateGoBy(Request $request)
    {
        $goby = DB::table('go_by')
            ->where('user_id', auth()->user()->id)
            ->where('transport_id', $request->transport_id)
            ->where('start_time', $request->start_time)->first();

        return view('admin.consumes.private.edit', ['goby' => $goby, 'privates' => PrivateTransport::all(), 'transports' => Transport::all()]);
    }

    public function destroyPrivateGoBy(Request $request)
    {
        $goby = DB::table('go_by')
            ->where('user_id', auth()->user()->id)
            ->where('transport_id', $request->transport_id)
            ->where('start_time', $request->start_time)->delete();

        return redirect(route('dashboard'));
    }


    public function addPublicGoBy()
    {
        return view('admin.consumes.public.add', ['publics' => PublicTransport::all(), 'transports' => Transport::all()]);
    }

    public function storePublicGoBy(Request $request)
    {
        $user_id = auth()->user()->id;
        $transport_id = $request->transport_id;
        $start_time = Carbon::parse($request->start_time);
        $duration = $request->duration;
        DB::table('go_by')->insert(
            ['user_id' => $user_id,
                'transport_id' => $transport_id,
                'start_time' => $start_time,
                'duration_time' => $duration]
        );

        return redirect('dashboard');
    }

    public function editPublicGoBy(Request $request)
    {
        $goby = DB::table('go_by')
            ->where('user_id', auth()->user()->id)
            ->where('transport_id', $request->transport_id)
            ->where('start_time', $request->start_time)->first();

        return view('admin.consumes.private.edit', ['goby' => $goby, 'privates' => PrivateTransport::all(), 'transports' => Transport::all()]);
    }

    public function destroyPublicGoBy(Request $request)
    {
        $goby = DB::table('go_by')
            ->where('user_id', auth()->user()->id)
            ->where('transport_id', $request->transport_id)
            ->where('start_time', $request->start_time)->delete();

        return redirect(route('dashboard'));
    }
}
