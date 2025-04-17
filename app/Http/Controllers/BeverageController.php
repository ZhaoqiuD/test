<?php

namespace App\Http\Controllers;

use App\Models\Beverage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeverageController extends Controller
{
    // 1. Read all beverages
    public function index()
    {
        return response()->json(Beverage::all());
    }

    // 2. Read beverage by ID
    public function show($id)
    {
        $beverage = Beverage::find($id);
        if (!$beverage) {
            return response()->json(['message' => 'Beverage not found'], 404);
        }
        return response()->json($beverage);
    }

    // 3. Read beverage by country-of-origin
    public function byOrigin($origin)
    {
        $results = Beverage::where('Origin', $origin)->get();
        return response()->json($results);
    }

    // 4. Read beverages by type
    public function byType($type)
    {
        $results = Beverage::where('Type', $type)->get();
        return response()->json($results);
    }

    // 5. Read beverages by main ingredient
    public function byIngredient($ingredient)
    {
        $results = Beverage::where('MainIngredient', $ingredient)->get();
        return response()->json($results);
    }

    // 6. Count of beverages by country-of-origin
    public function countByOrigin()
    {
        $results = Beverage::select('Origin', DB::raw('count(*) as count'))
                           ->groupBy('Origin')
                           ->orderByDesc('count')
                           ->get();
        return response()->json($results);
    }

    // 7. Beverages in descending CaloriesPerServing order
    public function orderByCalories()
    {
        $results = Beverage::orderByDesc('CaloriesPerServing')->get();
        return response()->json($results);
    }
}
