@extends('layouts.app')

@section('content')
  <div class="row" >
    <div class="col-md-12">
      <div class="card">
        <div class="card-header mb-5">
          <h3 class="card-title">أضافة صنف جديد</h3>
        </div>
        <div class="card-body">
        <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST" enctype="multipart/form-data" style="color:#fff !important">
              @csrf
              @if (isset($category))
                @method('PUT')
              @endif
                <div class="form-group">
                    <label for="Category">أسم الصنف : </label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="أدخل أسم الصنف" value="{{ isset($category) ? $category->name : "" }}">
                        @error('name')
                            <div class="alert alert-danger">
                              {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="Post"> الصورة : </label>
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
                    <button class="btn btn-success mt-2">
                      {{isset($category) ? "Update" : "Add"}}
                    </button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
