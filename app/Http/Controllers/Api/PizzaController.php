<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pizza;
use App\Models\Provider;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizzas = Pizza::all();
        return $pizzas;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pizza = new Pizza();
        $pizza->name = $request->name;
        $pizza->amount = $request->amount;
        $pizza->price = $request->price;
        $pizza->provider = $request->provider;
        $pizza->save();

        return $pizza;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pizza = Pizza::find($id);
        return $pizza;
    }

    /**
     * Display the specified resource.
     */
    public function showProvider($id)
    {
        $pizza = Pizza::find($id);
        $provider = Provider::find($pizza->provider);
        return $provider;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $pizza = Pizza::findorFail($request->id);

        $pizza->name = $request->name;
        $pizza->amount = $request->amount;
        $pizza->price = $request->price;
        $pizza->provider = $request->provider;

        $pizza->update();
        return $pizza;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pizza = Pizza::findorFail($id);
        $pizza->delete();
        return 'Pizza deleted';
    }
}
