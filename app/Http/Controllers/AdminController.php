<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\Writer;
require '../../vendor/autoload.php';
class AdminController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.index', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
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

        Product::create($data);

        return redirect()->route('admin.index')->with('success', 'Product added successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
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

        $product->update($data);

        return redirect()->route('admin.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.index')->with('success', 'Product deleted successfully.');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');

        $csv = Reader::createFromPath($file->getPathname(), 'r');
        $csv->setHeaderOffset(0);

        $records = (new Statement())->process($csv);

        foreach ($records as $record) {
            Product::create($record);
        }

        return redirect()->route('admin.index')->with('success', 'CSV file uploaded and data added successfully.');
    }

    public function export()
    {
        $products = Product::all();

        $csv = Writer::createFromString('');
        $csv->insertOne([
            'ID',
            'SKU',
            'TSI',
            'VENDOR',
            'BRAND',
            'SHIPPING_TEMPLATE',
            'TEMPLATE_CODE',
            'INSTOCK_LEADTIME',
            'NOSTOCK_LEADTIME',
            'QUANTITY',
            'OBSOLETE',
            'IS UPDATED',
        ]);

        foreach ($products as $product) {
            $csv->insertOne($product->toArray());
        }

        $csv->output('products.csv');
    }

    public function create()
    {
        // Logic to render the create form
        return view('admin.create');
    }
}

