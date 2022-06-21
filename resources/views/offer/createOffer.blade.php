@extends('layouts.app')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($offer) ? 'Update Offer' : 'Add New Offer' }}
        </div>
        <div class="card-body">
            <form action="{{ isset($offer) ? route('offer.update', $offer->id) : route('offer.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($offer))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="Post">Title : </label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Offer Title"
                        value="{{ isset($offer) ? $offer->title : '' }}">
                </div>
                @error('title')
                    <p>
                    <div class="alert alert-danger">{{ $message }}</div>
                    </p>
                @enderror
                <div class="form-group">
                    <label for="Post">Description : </label>
                    <textarea class="form-control" name="description" placeholder="Enter Offer Description"
                        rows="2">{{ isset($offer) ? $offer->description : '' }}</textarea>
                </div>
                @error('description')
                    <p>
                    <div class="alert alert-danger">{{ $message }}</div>
                    </p>
                @enderror
                @if (isset($offer))
                    <div class="form-group">
                        <img src="{{ asset('upload/offer/' . $offer->image) }}" width="100px" height="100px" />
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
                    <label for="selectProduct">Select Product : </label>
                    <select class="form-control" name="product_id">
                        <option selected>Open this select menu</option>
                        @foreach ($products as $product)
                            <option
                                @if (isset($offer)) @if ($product->id == $offer->product_id)
                                    selected @endif
                                @endif value="{{ $product->id }}">{{ $product->title }}</option>
                        @endforeach
                    </select>
                </div>
                @error('product_id')
                <p>
                <div class="alert alert-danger">{{ $message }}</div>
                </p>
            @enderror

                <div class="form-group">
                    <button class="btn btn-success mt-2">
                        {{ isset($offer) ? 'Update' : 'Add' }}
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
