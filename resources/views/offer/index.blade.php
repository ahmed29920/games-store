@extends('layouts.app')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
@if(Session::has('SucessMessage'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{ Session::get('SucessMessage') }}
  <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
      <i class="tim-icons icon-simple-remove"></i>
  </button>
</div>
@endif
<div class="table-container">
<!-- start table -->
    <div class="clearfix">
        <a href="{{ route('offer.create') }}" class="btn btn-success mb-2 float-end">Create Offer</a>
    </div>
    <div>All Offers</div>
    @if ($offers->count() > 0)
        <table  class="table  table-striped">
            <tr>
                <td>IMAGE</td>
                <td>TITLE</td>
                <td>DESCRIPTION</td>
                <td>OPREATION</td>
            </tr>
            @foreach ($offers as $offer)
            <!-- row -->
            <tr class=" ">
                <td> 
                    <img src="{{ asset('upload/offer/' . $offer->image) }}"  class="image" style="width : 150px">
                </td>
                <td>{{$offer->title }}</td> 
                <td>{{$offer->description }}</td> 
                <td class="d-flex">
                    <form class=" ml-2" action="{{ route('offer.destroy', $offer->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </form>
                    <a class="btn btn-primary btn-sm" href = "{{ route('offer.edit', $offer->id) }}">EDIT </a>
                </td>   
            </tr>
            @endforeach
        </table>
    @else
        <div class="card-body text-center">
            <h4>No Offers Yet.</h4>
        </div>
    @endif

</div>        
@endsection