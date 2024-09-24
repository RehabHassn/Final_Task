<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Questions;

class CategoryController extends Controller
{
    public function create() {
        return view('admin.categories.create');
    }

    public function store(Request $request) {
        $category = Categories::create($request->only('name'));
        foreach ($request->questions as $question) {
            Questions::create([
                'category_id' => $category->id,
                'question' => $question['question'],
                'type' => $question['type'],
                'is_required' => $question['is_required']
            ]);
        }
        return redirect()->to('admin/categories/create')->with('message','Category created successfully');
    }
}
