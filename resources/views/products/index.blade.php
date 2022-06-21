@extends('layouts.app')



@section('content')
@if(Session::has('message'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
{{ Session::get('message') }}
  <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
      <i class="tim-icons icon-simple-remove"></i>
  </button>
</div>
@endif
@if(Session::has('SucessMessage'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{ Session::get('SucessMessage') }}
  <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
      <i class="tim-icons icon-simple-remove"></i>
  </button>
</div>
@endif
    <div class="clearfix">
        <a href="{{ route('products.create') }}" class="btn btn-success mb-2 float-end">Create Product</a>
    </div>
    <div class="card card-default">
        <div class="card-header">All Product</div>
          @if ($products->count() > 0)
            <table class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Price after Discount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    <img class="img-fluid" src="{{ asset('upload/products/' . $product->image) }}" alt="" width="70px" height="50px">
                                </td>
                                <td>
                                    {{ $product->title }}
                                </td>
                                <td>
                                    {{ $product->description }}
                                </td>
                                <td>
                                    {{ $product->price }} EGP
                                </td>
                                <td>
                                    {{ $product->discount}} EGB
                                </td>
                                <td class="d-flex">
                                    <form class=" ml-2" action="{{ route('products.destroy', $product->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            Delete
                                        </button>
                                    </form>
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="btn btn-primary float-right btn-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </table>
          @else
            <div class="card-body text-center">
                <h4>No Products Yet.</h4>
            </div>
          @endif
    </div>

@endsection
