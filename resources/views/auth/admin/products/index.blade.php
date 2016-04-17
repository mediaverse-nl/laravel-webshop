
@extends('layouts.app')

@section('content')

    @foreach($products as $product)
        {{$product->id}}
        {{$product->name}}<br>
    @endforeach

@endsection