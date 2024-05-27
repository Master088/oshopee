<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Inertia\Inertia;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        // Retrieving query parameters
        $searchQuery = $request->input('q');
        $currentPage = $request->input('_page');
        $perPage = $request->input('_limit', 5); // Default per page limit as 5
        $sortKey = $request->input('_sort', 'id');
        $sortOrder = strtoupper($request->input('_order', 'ASC'));

        // Your dynamic filter logic here
        $filters = []; // Initialize an empty array for filters

        // Add your dynamic filters here, for example:
        // if (some_condition) {
        //     $filters['some_column'] = some_value;
        // }

        // Fetching categories with query parameters
        $categoriesQuery = Category::query();

        if (!empty($searchQuery)) {
            $categoriesQuery->where('name', 'like', '%' . $searchQuery . '%');
        }

        foreach ($filters as $column => $value) {
            $categoriesQuery->where($column, $value);
        }

        $categories = $categoriesQuery->orderBy($sortKey, $sortOrder)
            ->paginate($perPage)->appends([
                    'q' => $searchQuery,
                    '_limit' => $perPage,
                    '_sort' => $sortKey,
                    '_order' => $sortOrder,
                    // // Append dynamic filters
                    // ...$request->only($filterKeys),
                ]);
        ;

        return Inertia::render(
            'Product/Category/Category',
            [
                'categories' => $categories,
                'search' => $searchQuery,
                'currentPage' => $currentPage,
                'size' => $perPage,
                'sort' => $sortKey,
                'order' => $sortOrder
            ]
        );
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $category = new Category;
        $category->name = $request->name;

        // Validation


        $category->save();

        return redirect()->intended('product/category')->with('success', 'Product category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Update the category
        $category->name = $request->name;
        $category->update();

        // Redirect with a success message
        return redirect()->route('product.category')->with('success', 'Product category updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id)->delete();

        return redirect()->route('product.category')->with('success', 'Product category deleted successfully.');
    }
}
