@extends('layouts.homeLayout')

@section('content')
<section class="" style="margin-top:10rem">
    <div class="container">
        <div class="header-body text-center mt-5 mb-3">
            <div class="row justify-content-between mt-5">
                @if ($categories->count() > 0)
                    @foreach($categories as $category)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12  ">
                        <div class="sport_product border">
                            <figure><img src="{{ asset('upload/categories/' . $category->image) }}" alt="category-img"></figure>
                            <h3 class="card-title mt-2">{{$category->name}}</h3>
                            <a href="{{ route('category' , $category->id) }}" class="btn btn-info">View this</a>
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

@endsection
