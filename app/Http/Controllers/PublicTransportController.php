<?php

namespace App\Http\Controllers;


use App\Models\PrivateTransport;
use App\Models\PublicTransport;
use App\Models\Transport;
use Illuminate\Http\Request;

class PublicTransportController extends Controller
{
    public function index()
    {
        return view('admin.transport.public.index', ['transports' => Transport::all(), 'publics' => PublicTransport::all()]);
    }

    public function create()
    {
        return view('admin.transport.public.create');
    }

    public function store(Request $request)
    {
        $transport = Transport::create(['emission_rate' => $request->emission_rate, 'capacity_efficiency' => $request->capacity_efficiency]);

        $public['id'] = $transport->id;
        $public['type'] = $request->type;

        PublicTransport::create($public);

        return redirect(route('transports.public.index'));
    }

    public function edit($id)
    {
        $public = PublicTransport::find($id);
        $transport = Transport::find($public->id);
        return view('admin.transport.public.edit', ['public' => $public, 'transport' => $transport]);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $transport = Transport::find($id);
        $transport->emission_rate = $request->emission_rate;
        $transport->capacity_efficiency = $request->capacity_efficiency;
        $transport->updated_at = now();
        $transport->save();

        $public = PublicTransport::find($id);
        $public->type = $request->type;

        $public->save();

        return redirect(route('transports.public.index'));
    }

    public function destroy(Request $request)
    {
        PublicTransport::find($request->id)->delete();
        return redirect(route('transports.public.index'));
    }
}
