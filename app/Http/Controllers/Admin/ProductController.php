<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Exception;
use Excel;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Excel as ExcelExcel;

class ProductController extends Controller
{
    //Product listing 
    public function index()
    {
        $products = Product::select('id','name','price','category','stock','image','description','created_at')
                        ->orderBy('created_at', 'desc')
                        ->paginate(20); 
        return view('admin.product.index', compact('products'));
    }

    //Product create
    public function create()
    {
        return view('admin.product.create');
    }

    //Product store
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|max:255',
            'price'    => 'required|numeric',
            'category' => 'required',
            'stock'    => 'required|integer|min:0',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
        ]);
        
        try {
            $imageName = '';
            if($request->hasFile('image')) {
                $file = $request->file('image');
                $imageName = time(). '.' . $file->getClientOriginalExtension();
                $path = $file->move(public_path('assets/img/products'), $imageName);
            }

            $product = new Product;
            $product->name = $request->name;
            $product->price = $request->price;
            $product->category = $request->category;
            $product->stock = $request->stock??0;
            $product->description = $request->description??null;
            $product->image = $imageName;
            $product->save();

            return redirect()->route('admin.product.index')->with('success', 'Product added successfully');
                
        } catch(Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred.');
        }
    }

    // Product View
    public function view($id)
    {
        $productId = base64_decode($id);
        $product = Product::findOrFail($productId);

        return view('admin.product.view', compact('product'));
    }

    // Product edit 
    public function edit($id)
    {
        $productId = base64_decode($id);
        $product = Product::findOrFail($productId);
         
        return view('admin.product.edit', compact('product'));
    }

    //Update Product details
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'     => 'required|max:255',
            'price'    => 'required|numeric',
            'category' => 'required',
            'stock'    => 'required|integer|min:0',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
        ]);
        
        try {
            $productId = base64_decode($id);
            $product = Product::findOrFail($productId);

            // Keep old image by default
            $imageName = $product->image ?? '';

            if ($request->hasFile('image')) {

                // Delete old image 
                if ($imageName !== '' && file_exists(public_path('assets/img/products/' . $imageName))) {
                    unlink(public_path('assets/img/products/' . $imageName));
                }

                $file = $request->file('image');
                $imageName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/img/products'), $imageName);
            }

            // Update fields
            $product->update([
                'name'        => $request->name,
                'price'       => $request->price,
                'category'    => $request->category,
                'stock'       => $request->stock ?? 0,
                'image'       => $imageName,
                'description' => $request->description ?? null,
            ]);

            return redirect()->back()->with('success', 'Product updated successfully');
                
        } catch(Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred.');
        }
    }

    //Delete the product
    public function delete($id)
    {
        try {
            $productId = base64_decode($id);
            $product = Product::findOrFail($productId);
            $product->delete();

            return response()->json(['success' => true, 'msg' => 'Deleted Successfully.']);
        } catch(Exception $e) {
            return response()->json(['success' => false, 'msg' => 'You are not allowed to delete this record.']);
        }
    }

    //Product Export function
    public function export()
    {
        set_time_limit(0);          // Infinite execution time
        ini_set('memory_limit', '-1'); // Unlimited memory 
        return Excel::download(
            new ProductExport,
            'products_sample_import.csv',
            ExcelExcel::CSV
        );
        // Excel::queue(new ProductExport, 'public/products_sample_import.csv', \Maatwebsite\Excel\Excel::CSV);
        // return back()->with('success', 'Export started successfully');
    }

    //Import Products 
    public function import(Request $request)
    {
        $request->validate([
            'file'  => 'required|mimes:xlsx,csv'
        ]);
        
        Excel::queueImport(new ProductImport, $request->file('file'));

        return back()->with('success', 'Import started. Data will be inserted in background.');
    }
}
