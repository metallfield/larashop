@extends('layouts.header_footer')
@section('title', 'Home')
@section('content')


<div class="container bg-info border border-dark rounded p-4">
  
        <h2 class="col-12 text-center">some conent</h2>
<form action="{{route('index')}}" method="GET" class="form-inline">
    <div class="form-group">
   <label for="price_from"> price from </label>
    <input type="text" name="price_from" id="price_from" class="form-control" value="{{request()->price_from}}">
    </div>
    <div class="form-group">
        <label for="price_to"> price to </label>
         <input type="text" name="price_to" id="price_to" class="form-control" value="{{request()->price_to}}">
         </div>
         <div class="custom-control custom-switch mx-2">
            <input type="checkbox" class="custom-control-input" name="new" id="new" @if(request()->has('new')) checked @endif>
            <label class="custom-control-label" for="new">NEW</label>
          </div>
          <div class="custom-control custom-switch mx-2">
            <input type="checkbox" class="custom-control-input" name="hit" id="hit" @if(request()->has('hit')) checked @endif>
            <label class="custom-control-label" for="hit">HIT</label>
          </div>
          <div class="custom-control custom-switch mx-2">
            <input type="checkbox" class="custom-control-input" name="recommend" id="recommend" @if(request()->has('recommend')) checked @endif>
            <label class="custom-control-label" for="recommend">recommend</label>
          </div>
          <button type="submit" class="btn btn-outline-light ">filter</button>
        <a href="{{route('index')}}" class="btn btn-warning mx-2">reset filter</a>
          @csrf
</form>
@error('price_from')
<p class="alert alert-danger my-3">{{$message}}</p>
@enderror
@error('price_to')
<p class="alert alert-danger my-3">{{$message}}</p>
@enderror
  <div class="row justify-content-center flex-wrap">

    @foreach($products as $product)
    @include('layouts.card', compact('product'))
    @endforeach    </div>
    <div class="w-100 d-flex justify-content-center">
    {{$products->links()}}
    </div>
</div>
    @endsection
