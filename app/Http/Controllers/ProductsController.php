<?php

namespace App\Http\Controllers;


use App\Models\Categorie;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkCategory')->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index', ['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create', [
            'categories' => Categorie::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $extention = $file->getClientOriginalExtension();
        $filename = time().'.'.$extention;
        $file->move('upload/products/' , $filename);
        Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $filename,
            'price' => $request->price,
            'discount' => $request->discount,
            'category_id' => $request->category_id,
        ]);

        Session()->flash('SucessMessage', 'Product added successfuly.');
        return redirect(route('products.index',  [
            'categories' => Categorie::all(),
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product, 'categories' => Categorie::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view(
            'products.create',
            [
                'product' => $product,
                'categories' => Categorie::all(),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->only(['title', 'description', 'price', 'discount', 'brand_id']);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/products/' , $filename);
            $data['image'] = $filename;
        }
        $product->update($data);
        Session()->flash('SucessMessage', 'Product Updated successfully.');
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Session()->flash('success', 'Product Deleted Successfully');
        return redirect(route('products.index'));
    }

    //add to cart some items
    function addToCart(Request $request)
    {
        if(Auth::check())
        {   
            $cart = new Cart;
            $cart->user_id = Auth::user()->id;
            $cart->product_id = $request->input('product_id');
            $cart->save(); 
            return redirect()->back();
        } else {
            return redirect('/login');
        }            
    }

    //get num of items in thev cart
    static function cartItems()
    {
        $user_id = Auth::user()->id;
        $cart = Cart::where('user_id' , $user_id)->count();
        return $cart;
    }
    //display cart items
    function cartList()
    {
        $user_id = Auth::user()->id;
        $carts = DB::select('select * FROM `products` INNER JOIN `carts` ON products.id = `product_id` WHERE user_id = ' . $user_id );
        return view('products/cartList' , ['carts' => $carts]);
    }
    //remove product from cart
    function removeCart($id)
    {
        Cart::destroy($id);
        Session()->flash('message', 'product removed from cart successfuly.');

        return redirect()->back();
    }
}
