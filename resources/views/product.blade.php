@extends('layouts.header_footer')
@section('title', 'product')
@section('content')

<div class="container">
    <h1>product page</h1>
    <div class="row ">
        <div class="d-flex mx-3">
        <img src="{{Storage::url($product_info->image)}}" alt="" height="300" width="300">
        </div>
<article class="d-flex flex-column ">

<h2>{{$product}}</h2>
<span>{{$product_info->category->name}}</span>
<span>prise: {{$product_info->price}}</span>

<form action="{{route('basketAdd', $product_info->id)}}" method="post">
    @if($product_info->isAvaible())
    <button class="btn-outline-dark" type="submit">v korzinu</button>
    @else
    <span class="font-weight-bold text-dark">нет в наличии</span>
    @endif
        @csrf
    </form>
    
</article>
</div>
<div class="descr my-3">
    <h3>description</h3>
    <hr>
<p>{{$product_info->description}}</p>
</div>
</div>
    @endsection
