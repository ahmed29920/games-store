<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    
    /**
     * Show the application home.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        return view('welcome' , ['categories' => Categorie::all() , 'offers' => Offer::all()]);
    }


    /**
     * Show the application home.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {

        return view('about');
    }

    /**
     * Show the application home.
     *
     * @return \Illuminate\View\View
     */
    public function clients()
    {

        return view('clients');
    } 
    /**
     * Show the application home.
     *
     * @return \Illuminate\View\View
     */
    public function testmonial()
    {

        return view('testmonial');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function CategoryIndex($id)
    {

        return view('Category' , ['products' => Product::where('category_id' , $id)->get()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function ProductIndex($id)
    {

        return view('Product' , ['products' => Product::where('id' , $id)->get()]);
    }
}
