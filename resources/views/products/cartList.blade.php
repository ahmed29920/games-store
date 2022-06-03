@extends('layouts.app')



@section('content')
@if($carts)
@if(Session('status'))
    <div class="alert alert-success">
        {{ Session('status') }}
    </div>
@endif
<div class=" d-flex justify-content-center">
    <a class="btn btn-success text-center " href="order-now"> BUY NOW </a>
</div>
        @foreach ($carts as $cart)
        <div class="row" style="margin-top:2rem; margin-left:5%; border-bottom: 1px solid #eee ; padding-bottom: 2rem">
            <div class="col-sm-6">
                <img src="{{ asset('upload/products/' . $cart->image) }}"class="detailes-img" style=" height:23rem ; width:20rem">
            </div>
            <div class="col-sm-6 mt-5">
                <h2>    {{$cart->title}} </h3>
                <h3> Price :  {{$cart->discount}}</h3>
                <a class="btn btn-danger" Type="submit" href="remove-cart/{{$cart->id}}">REMOVE FROM CART </a>
                
            </div>
        </div>
        @endforeach
    @else
        <h4 class="text-center mt-5"> Your Cart Is Empty </h4>  
    @endif    
@endsection