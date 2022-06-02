@extends('layouts.app')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($product) ? 'Update Product' : 'Add New Product' }}
        </div>
        <div class="card-body">
            <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($product))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="Post">Title : </label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Product Title"
                        value="{{ isset($product) ? $product->title : '' }}">
                </div>
                @error('title')
                    <p>
                    <div class="alert alert-danger">{{ $message }}</div>
                    </p>
                @enderror
                <div class="form-group">
                    <label for="Post">Description : </label>
                    <textarea class="form-control" name="description" placeholder="Enter Product Description"
                        rows="2">{{ isset($product) ? $product->description : '' }}</textarea>
                </div>
                @error('description')
                    <p>
                    <div class="alert alert-danger">{{ $message }}</div>
                    </p>
                @enderror
                @if (isset($product))
                    <div class="form-group">
                        <img src="{{ asset('upload/products/' . $product->image) }}" width="100px" height="100px" />
                    </div>
                @endif
                <div class="form-group">
                    <label for="Post">Image : </label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>
                </div>
                @error('image')
                    <p>
                    <div class="alert alert-danger">{{ $message }}</div>
                    </p>
                @enderror
                <div class="form-group">
                    <label for="selectcategorie">Select categorie : </label>
                    <select class="form-control" name="category_id">
                        <option selected>Open this select menu</option>
                        @foreach ($categories as $categorie)
                            <option
                                @if (isset($product)) @if ($categorie->id == $product->categorie_id)
                                    selected @endif
                                @endif value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('categorie_id')
                <p>
                <div class="alert alert-danger">{{ $message }}</div>
                </p>
            @enderror
                <div class="form-group">
                    <label for="Price">Price : </label>
                    <input type="number" name="price" class="form-control" placeholder="Enter Price"
                        value="{{ isset($product) ? $product->price : '' }}">
                </div>
                @error('price')
                    <p>
                    <div class="alert alert-danger">{{ $message }}</div>
                    </p>
                @enderror
                <div class="form-group">
                    <label for="Discount">Discount : </label>
                    <input type="number" name="discount" class="form-control" placeholder="Enter Discount"
                        value="{{ isset($product) ? $product->discount : '' }}">
                </div>


                <div class="form-group">
                    <button class="btn btn-success mt-2">
                        {{ isset($product) ? 'Update' : 'Add' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.tags').select2();
            });
        </script>
    @endsection
@endsection
