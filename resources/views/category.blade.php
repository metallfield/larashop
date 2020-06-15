@extends('layouts.header_footer')
@section('title', 'category ' .$category->name)
@section('content')
<div class="cat-block text-center">
    <h1 >category {{$category->name}} {{$category->products->count()}}</h1>
    <p>{{$category->description}}</p>
</div>
<div class="container">
    <div class="row">
        @foreach($category->products()->with('category')->get() as $product)
        @include('layouts.card', ['category' => $category], compact('product'))
        @endforeach
    </div>
</div>

@endsection
