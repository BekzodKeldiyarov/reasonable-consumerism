<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Models\Meat;
use App\Models\Package;
use App\Models\PrivateTransport;
use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrivateTransportController extends Controller
{
    public function index()
    {
        return view('admin.transport.private.index', ['transports' => Transport::all(), 'privates' => PrivateTransport::all()]);
    }

    public function create()
    {
        return view('admin.transport.private.create');
    }

    public function store(Request $request)
    {
        $transport = Transport::create(['emission_rate' => $request->emission_rate, 'capacity_efficiency' => $request->capacity_efficiency]);

        $private['id'] = $transport->id;
        $private['type'] = $request->type;

        PrivateTransport::create($private);

        return redirect(route('transports.private.index'));
    }

    public function edit($id)
    {
        $private = PrivateTransport::find($id);
        $transport = Transport::find($private->id);
        return view('admin.transport.private.edit', ['private' => $private, 'transport' => $transport]);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $transport = Transport::find($id);
        $transport->emission_rate = $request->emission_rate;
        $transport->capacity_efficiency = $request->capacity_efficiency;
        $transport->updated_at = now();
        $transport->save();

        $private = PrivateTransport::find($id);
        $private->type = $request->type;

        $private->save();

        return redirect(route('transports.private.index'));
    }



    public function destroy(Request $request)
    {
        PrivateTransport::find($request->id)->delete();
        return redirect(route('transports.private.index'));
    }
}
