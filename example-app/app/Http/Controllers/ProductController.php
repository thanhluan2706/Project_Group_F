<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $relateproduct = Product::orderBy('id')
            ->orderBy('name')
            ->orderBy('manu_id')
            ->orderBy('type_id')
            ->orderBy('price')
            ->orderBy('image')
            ->orderBy('description')
            ->orderBy('feature')
            ->get();
        $allProduct = DB::table('manufactures')->get();
        $productid = DB::table('products')
            ->join('manufactures', 'products.manu_id', '=', 'manufactures.manu_id')
            ->join('protypes', 'products.type_id', '=', 'protypes.type_id')
            ->select('products.*', 'manufactures.*', 'protypes.*')
            ->orderBy('products.id', 'DESC')
            ->first();
            $product = DB::table('products')
            ->join('manufactures', 'products.manu_id', '=', 'manufactures.manu_id')
            ->join('protypes', 'products.type_id', '=', 'protypes.type_id')
            ->select('products.*', 'manufactures.*', 'protypes.*')
            ->where('products.id', '=', 1)
            ->first();

        $products = Product::latest()->paginate(4);
        $imgproducts = DB::table('products')
            ->join('protypes', 'products.type_id', '=', 'protypes.type_id')
            ->orderBy('products.id', 'desc')
            ->limit(4)
            ->get();
        $get4TopSellingProducts = DB::table('products')
        ->join('protypes', 'products.type_id', '=', 'protypes.type_id')
        ->orderBy('products.id', 'asc')
        ->limit(4)
        ->get();
        return view('relateproduct', compact('products', 'productid', 'imgproducts', 'get4TopSellingProducts', 'allProduct'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
