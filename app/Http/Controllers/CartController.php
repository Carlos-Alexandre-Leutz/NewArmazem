<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function budgets(Category $category)
    {
        $categories = $category->where('status', '1')->get();

        return view('cart.budgets', [
            'categories' => $categories
        ]);
    }
}
