<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlasticRequest;
use App\Http\Requests\UpdatePlasticRequest;
use App\Models\Good;
use App\Models\Plastic;
use Illuminate\Support\Facades\Session;

class PlasticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plastics = Plastic::all();
        $goods = Good::all();
        return view('admin.plastic.index', ['plastics' => $plastics, 'goods' => $goods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StorePlasticRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlasticRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Plastic $plastic
     * @return \Illuminate\Http\Response
     */
    public function show(Plastic $plastic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Plastic $plastic
     * @return \Illuminate\Http\Response
     */
    public function edit(Plastic $plastic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdatePlasticRequest $request
     * @param \App\Models\Plastic $plastic
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlasticRequest $request, Plastic $plastic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Plastic $plastic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plastic $plastic)
    {
        //
    }
}
