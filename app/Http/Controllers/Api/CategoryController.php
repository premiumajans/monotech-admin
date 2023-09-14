<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        if (Category::where('status', 1)->exists()) {
            return response()->json(['categories' => Category::where('status', 1)->with('projects')->get()], 200);
        } else {
            return response()->json(['message' => 'category-is-empty'], 404);
        }
    }

    public function show($slug)
    {
        if (Category::where('status', 1)->where('slug', $slug)->exists()) {
            return response()->json(['category' => Category::where('status', 1)->where('slug', $slug)->with('projects')->first()], 200);
        } else {
            return response()->json(['message' => 'category-is-empty'], 404);
        }
    }
}
