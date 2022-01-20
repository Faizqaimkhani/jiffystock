@extends('new-layouts.app',['title' => 'Jiffystock - Shipment Companies ','top_bar' => 'hide'])

@section('content')
<div class="container my-5">
  <div class="opening-card-data my-3">
    <h1>{{ $service->title }}</h1>
    <img src="{{ $service->thumbnail }}" alt="">
  </div>
  {!! $service->data !!}
</div>
@endsection
