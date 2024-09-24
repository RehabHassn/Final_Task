<?php

namespace App\Http\Controllers;

use App\Models\product_answers;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Categories;
class ProductController extends Controller
{
    public function create()
    {
        $categories = categories::with('questions')->get();
        return view('client.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $product = Products::create($request->only('category_id', 'name'));

        if (is_array($request->answers)) {
            foreach ($request->answers as $questionId => $answer) {
                product_answers::create([
                    'product_id' => $product->id,
                    'question_id' => $questionId,
                    'answer' => $answer
                ]);
            }
           // return redirect()->route('products.index');
        }

    }
}

