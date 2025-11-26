<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function list(Category $category, Request $request)
    {
        $validated = $request->validate([
            'page'     => 'integer|min:1',
            'per_page' => 'integer|min:1|max:50',
            'q'        => 'string|nullable',
            'min_price'=> 'numeric|nullable',
            'max_price'=> 'numeric|nullable',
            'sort'     => 'in:price_asc,price_desc,name_asc,name_desc'
        ]);

        if ($request->min_price && $request->max_price && $request->min_price > $request->max_price) {
            return response()->json(['error' => 'min_price cannot be greater than max_price'], 400);
        }

        $items = $category->items();

        if ($request->q)
            $items->where('name', 'like', '%' . $request->q . '%');

        if ($request->min_price)
            $items->where('price', '>=', $request->min_price);

        if ($request->max_price)
            $items->where('price', '<=', $request->max_price);

        if ($request->sort) {
            $sortParts = explode('_', $request->sort);
            $items->orderBy($sortParts[0], $sortParts[1]);
        }

        return $items->paginate($request->per_page ?? 10);
    }
}
