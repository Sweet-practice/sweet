@extends('layouts.app_shop')

@section('content')

@foreach($order_details->order_details as $order_detail)
  {{ $order_detail->sweet_name }}
@endforeach

@endsection