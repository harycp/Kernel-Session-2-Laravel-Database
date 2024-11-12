<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function getColor(Request $request)
    {
        $color = DB::table('categories')->where('color', 'red')->first();

        $result['name'] = $color->name;
        $result['color'] = $color->color;


        return response()->json($result);
    }

    public function EloquentExample(Request $request)
    {
        $category = Category::with(['posts' => function ($query) {
            $query->limit(1);
        }])->find(1);
    
        return response()->json($category);
    }
}
