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
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header mb-5">
          <h3 class="card-title">عرض الاصناف  </h3>
        </div>
        <div class="clearfix">
            <a href="{{ route('categories.create') }}" class="btn btn-success mb-2 float-end">Create New Category</a>
        </div>
        <div class="card-body">
        @if ($categories->count() > 0)
            <table class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Image</th>
                            <th class="">Oprerations</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $categorie)
                            <tr>
                                <td class="text-center">
                                    {{ $categorie->name }}
                                </td>
                                <td class="text-center">
                                    <img class="img-fluid" src="{{ asset('upload/categories/' . $categorie->image) }}"
                                        width="70px" height="50px">
                                </td>
                                
                                <td class="ms-5 d-flex text-center">
                                    <form class=" ml-2" action="{{ route('categories.destroy', $categorie->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm ">
                                            Delete
                                        </button>
                                    </form>
                                    <a href="{{ route('categories.edit', $categorie->id) }}"
                                        class="btn btn-primary float-right btn-sm ms-3">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </table>
        @else
            <div class="card-body text-center">
                <h4>No Categories Yet.</h4>
            </div>
        @endif
        
        </div>
      </div>
    </div>
  </div>
@endsection
