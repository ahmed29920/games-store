<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use App\Models\Product;
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

        return view('welcome' , ['categories' => Categorie::all()]);
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
}
