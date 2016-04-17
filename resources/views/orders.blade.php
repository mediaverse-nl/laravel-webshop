
@extends('layouts.app')

@section('content')

   {{$user->name}}

   @foreach($orders as $order)
      {{$order->name}}
   @endforeach

@endsection