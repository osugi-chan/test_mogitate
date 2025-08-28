<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;

class ProductController extends Controller
{
//商品一覧表示
    public function index()
    {
        $products = Product::all();
        return view('products', ['products' => $products]);
    }
//商品登録画面表示
    public function create()
    {
        $seasons = Season::all();
        return view('register',compact('seasons'));
    }
//商品登録
    public function store(ProductRequest $request)
{
    $image = $request->file('image');
    $path = $image->store('public/images');

    $product = new Product();
    $product->name = $request->name;
    $product->price = $request->price;
    $product->image = str_replace('public/', 'storage/', $path);
    $product->description = $request->description;
    $product->save();
    $product->seasons()->sync($request->season_id);

    return redirect()->route('products.index');
}
//商品検索
    public function search(Request $request)
    {
        $search = $request->input('search');
        $query = Product::query();
        $products = $query->get();
        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%')->get();
        return view('products', ['products' => $products, 'search' => $search]);
        }
    }
//商品詳細情報表示画面
    public function show(Product $product)
{
    return view('detail', compact('product'));
}

//商品情報更新
    public function update(ProductRequest $request, Product $product)
{
    $image = $request->file('image');
    $path = $image->store('public/images');

    $product->name = $request->name;
    $product->price = $request->price;
    $product->image = str_replace('public/', 'storage/', $path);
    $product->description = $request->description;
    $product->save();
    $product->seasons()->sync($request->season_id);

    return redirect()->route('products.index');
}

//商品情報削除
    public function destroy(Product $product)
{
    $product->delete();
    return redirect()->route('products.index');
}
}