@extends('layouts.homeLayout')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">{{ __('Welcome!') }}</h1>
                        <p class="text-lead text-light">
                            {{ __('Use Black Dashboard theme to create a great project.') }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    @if ($categories->count() > 0)
                        @foreach($categories as $category)
                        <div class="col-3">
                            <div class="card" style="width: 15rem ;">
                                <img src="{{ asset('upload/categories/' . $category->image) }}" class="card-img-top" alt="..."  style="height : 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">{{$category->name}}</h5>
                                    <a href="{{ route('category' , $category->id) }}" class="btn btn-primary">View this</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif    
                </div>
            </div>
        </div>
    </div>
@endsection
