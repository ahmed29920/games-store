<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Offer;
use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use DB;
class OffersController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkProduct')->only('create');
    }

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
        Session()->flash('SucessMessage', 'offer added successfulyy.');
        return redirect(route('offers.index'));
    }

    function destroy($id) {
        DB::delete('delete from offers where id = ?',[$id]);
        Session()->flash('message', 'offer deleted successfuly.');
        return redirect(route('offers.index'));
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
        
        Session()->flash('SucessMessage', 'offer updated successfuly.');
        
        return redirect(route('offers.index'));

    }
}