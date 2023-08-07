<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use DB;

class ProductController extends Controller
{
    public function create_product()
    {
        return view('create_product');
    }

    public function store_product(Request $request)
    {
        $request->validate([
            'category_id'=> 'required',
            'name' => 'required',
            'slug'=> 'required',
            'price' => 'required',
            'description' => 'required',
            'description2' => 'required',
            'image' => 'required',
            'quantity' => 'required',
            'height_id' => 'required',
            'type_id' => 'required',
            'size_id' => 'required',
            'stock' => 'required',


        ]);

        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        Product::create([
            'category_id'=> $request->category_id,
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price,
            'description' => $request->description,
            'description2' => $request->description2,
            'stock' => $request->stock,
            'image' => $path,
            'quantity' => $request->quantity,
            'type_id' => $request->type_id,
            'height_id' => $request->height_id,
            'size_id' => $request->size_id,

        ]);

        if($request->ajax()){
            return response()->json(['success'=>true]);
        }
        return Redirect::route('create_product');
    }

    public function index_product(Request $request)
    {
        $user = Auth::user();
        $category=DB::table('maincategory')->where('id',$request->id)->first();

        $products = Product::where('category_id',$request->id)->get()->unique('slug');
        return view('index_product', [
            'products' => $products,
            'user' => $user,
            'category_name'=>$category->name
        ]);
    }

    public function show_product(Request $request)
    {
        //dd($request);
        $type=1;$size=1;$height=1;
        if(isset($request->type)){
            $type=$request->type;
        }
        if(isset($request->size)){
            $size=$request->size;
        }
        if(isset($request->height)){
            $height=$request->height;
        }
        if($request->product_id){
            $product=Product::findorfail($request->product_id);
        }else{
            $product=Product::where('size_id',$size)->where('height_id',$height)->where('type_id',$type)->first();
        }

        return view('show_product', compact('product'));
    }

    public function get_product(Request $request){
        $type=1;$size=1;$height=1;
        if(isset($request->type)){
            $type=$request->type;
        }
        if(isset($request->size)){
            $size=$request->size;
        }
        if(isset($request->height)){
            $height=$request->height;
        }
        $product=Product::where('size_id',$size)->where('height_id',$height)->where('type_id',$type)->first();
        return response()->json(['product'=>$product]);
    }
    public function edit_product(Product $product)
    {
        return view('edit_product', compact('product'));
    }

    public function update_product(Product $product, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $path,
        ]);

        return Redirect::route('show_product', $product);
    }

    public function delete_product(Product $product)
    {
        $product->delete();
        return Redirect::route('index_product');
    }
}
