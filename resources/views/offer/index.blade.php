@extends('layouts.app')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="table-container">
<!-- start table -->
    <table  class="table  table-striped">
        <!-- row -->
        <tr class="">
            <td class="" >IMAGE</td>
            <td class="" >TITLE</td>
            <td class="" >DESCRIPTION</td>
            <td>OPREATION</td>
        </tr>
        @foreach ($offers as $offer)
        <!-- row -->
        <tr class=" ">
            <td class="" > 
                <img src="{{ asset('upload/offer/' . $offer->image) }}"  class="image" style="width : 150px">
            </td>
            <td class="" >{{$offer->title }}</td> 
            <td class="" >{{$offer->description }}</td> 
            <td class="d-flex">
                <form class=" ml-2" action="{{ route('offer.destroy', $offer->id) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        Delete
                    </button>
                </form>
                <a class="btn btn-warning btn-sm" href = "{{ route('offer.edit', $offer->id) }}">EDIT </a>
            </td>   
        </tr>
        @endforeach
    </table>
</div>        
@endsection