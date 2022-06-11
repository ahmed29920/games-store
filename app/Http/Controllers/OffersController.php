<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Offer;
use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use DB;
class OffersController extends Controller
{
    //display 
    // function index(){
    //     $offers = Offer::all();
    //     return view('welcome',  ['offers' => $offers]);
    // }

    function index(){
        $offers = Offer::all();
        return view('offer/index', ['offers' => $offers]);    
    }

    function create()
    {
        return view('offer/createOffer' , ['products' => Product::all()]);        
    }

    function store(Request $request)
    {
        $offer = new Offer;
        $offer->title = $request->input('title');
        $offer->description = $request->input('description');
        $offer->product_id = $request->input('product_id');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/offer/' , $filename);
            $offer->image = $filename;
        }

        $offer->save();
        return redirect()->back()->with('status' , 'offer added successfuly');
    }

    function destroy($id) {
        DB::delete('delete from slider where id = ?',[$id]);
        return redirect()->back()->with('status' , 'offer add successfuly');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        return view(
            'offer.createOffer',
            [
                'offer' => $offer,
                'products' => Product::all(),
            ]
        );
    }

    function update(Request $request, Offer $offer) {


        $data = $request->only(['title', 'description', 'offer_id']);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/offers/' , $filename);
            $data['image'] = $filename;
        }
        $offer->update($data);
        
        session()->flash('success', 'Offer Updated successfully');
        // return redirect(route('offer.index'));
        return redirect()->back()->with('status' , 'offer updated successfuly');
    }
}