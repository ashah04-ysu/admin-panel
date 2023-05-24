<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAll()
    {
        $products = Product::all();

        return response()->json($products);
    }

    public function getByDate(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
        ]);

        $date = $request->input('date');

        $products = Product::whereDate('created_at', $date)->get();

        return response()->json($products);
    }

    public function add(Request $request)
    {
        $request->validate([
            'SKU' => 'required',
            'TSI' => 'required',
            'VENDOR' => 'required',
            'BRAND' => 'required',
            'SHIPPING_TEMPLATE' => 'required',
            'TEMPLATE_CODE' => 'required',
            'INSTOCK_LEADTIME' => 'required',
            'NOSTOCK_LEADTIME' => 'required',
            'QUANTITY' => 'required',
            'OBSOLETE' => 'required',
            'IS_UPDATED' => 'required',
            // ... add validation rules for other fields
        ]);

        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    public function update(Request $request)
    {
        $request->validate([
            'SKU' => 'required',
            // ... add validation rules for other fields
        ]);

        $product = Product::where('SKU', $request->input('SKU'))->first();

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->update($request->all());

        return response()->json($product);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'SKU' => 'required',
        ]);

        $product = Product::where('SKU', $request->input('SKU'))->first();

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted']);
    }
}
