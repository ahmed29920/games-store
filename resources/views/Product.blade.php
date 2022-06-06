@extends('layouts.homeLayout')

@section('content')
<section class="" style="margin-top:10rem">
    <div class="container">
        <div class="header-body text-center mt-5 mb-3">
            <div class="row justify-content-between mt-5">
                @if ($products->count() > 0)
                    @foreach($products as $product)
                    <div class="col-3 mt-8">
                        <div class="card" style="width: 15rem ;" >
                            <img src="{{ asset('upload/products/' . $product->image) }}" class="card-img-top" alt="..."  style="height : 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{$product->title}}</h5>
                                <p class="card-title">{{$product->description}}</p>
                                <h5 class="card-title"> <del> {{$product->price}} </del></h5>
                                <h5 class="card-title">{{$product->discount}}</h5>
                                <a class="add" data-productid="{{$product->id}}"><i  class="fas fa-cart-plus btn btn-primary"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif    
            </div>
        </div>
    </div>
            
</section>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script>
        
        $('.add').on('click', function(event) {
            event.preventDefault()

                productId = event.target.parentNode.dataset['productid'];
            counter = $('.cart-counter').text();
            count = Number(counter);
            $('.cart-counter').text( count + 1  ); 
            $.ajax({
                method: 'GET',
                url:  '/add-to-cart/' + productId,
                cache: false,
                data: {product_id: productId},
                success: function() {
                    $('.cart-counter').text( count + 1  ); 
                }
            }) 
        });
    </script>
@endsection
