
@extends('layouts.app')

@section('content')


   <div class="container">
      <div class="row">
         <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               <div class="panel-heading">orders</div>
               <div class="panel-body">

                  @if(!$orders->count())
                     <a href="ss">sada</a>
                  @else
                     @foreach($orders as $order)
                        {{$order->name}}<br>
                     @endforeach
                  @endif

               </div>
            </div>
         </div>
      </div>
   </div>

@endsection