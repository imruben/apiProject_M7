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
        return response([
            'message' => 'Retrieved successfully',
            'pizzas' => $pizzas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'id' => 'integer',
                'name' => 'required|string|max:255',
                'amount' => 'required|integer|max:5000',
                'price' => 'required|numeric|max:199.99',
                'provider' => 'required|integer',
            ]);
        } catch (\Exception $e) {
            return response([
                'message' => 'Error en los datos de entrada'
            ], 400);
        }

        try {
            $pizza = Pizza::create($validated);
            return response([
                'message' => 'Created successfully',
                'pizza' => $pizza,
            ], 201);
        } catch (\Exception $e) {
            if ($e->getCode() == 23000) {
                return response([
                    'message' => 'Provider with id ' . $request->provider . ' not found',
                ], 400);
            } else {
                return response([
                    'message' => 'Error SQL',
                    'error' => $e->getCode(),
                ], 400);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pizza = Pizza::find($id);

        if (!$pizza) return response([
            'message' => 'Pizza with id ' . $id . ' not found',
        ], 400);

        return response([
            'message' => 'Retrieved successfully',
            'pizza' => $pizza,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function showProvider($id)
    {
        $pizza = Pizza::find($id);

        if (!$pizza) return response([
            'message' => 'Pizza with id ' . $id . ' not found',
        ], 400);

        $provider = Provider::find($pizza->provider);
        if (!$provider) return 'Pizza with id ' . $pizza->provider . ' not found';

        return response([
            'message' => 'Retrieved successfully',
            'provider' => $provider,
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $validated = $request->validate([
                'id' => 'required|integer',
                'name' => 'string|max:255',
                'amount' => 'integer|max:5000',
                'price' => 'numeric|max:199.99',
                'provider' => 'integer',
            ]);
        } catch (\Exception $e) {
            return response([
                'message' => 'Error en los datos de entrada'
            ], 400);
        }

        $pizza = Pizza::find($validated['id']);

        if (!$pizza) {
            return response([
                'message' => 'Pizza with id ' . $validated['id'] . ' not found',
            ], 400);
        } else {
            try {
                $pizza->update($validated);
                return response([
                    'message' => 'Updated successfully',
                    'pizza' => $pizza,
                ], 201);
            } catch (\Exception $e) {
                if ($e->getCode() == 23000) {
                    return response([
                        'message' => 'Provider with id ' . $validated['provider'] . ' not found'
                    ], 400);
                } else {
                    return response([
                        'message' => 'Error SQL',
                        'error' => $e->getCode(),
                    ], 400);
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pizza = Pizza::find($id);

        if (!$pizza) {
            return response([
                'message' => 'Pizza with id ' . $id . ' not found',
            ], 400);
        } else {
            $pizza->delete();
            return response([
                'message' => 'Pizza with id ' . $id . ' deleted successfully',
            ], 201);
        }
    }
}
