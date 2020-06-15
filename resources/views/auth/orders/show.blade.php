@extends('layouts.header_footer')
@section('title', 'order' . $order->id)
@section('content')
<div class="container">
<h1>order № {{$order->id}} </h1>
<span>name {{$order->name}}</span><br>
<span>phone {{$order->phone}}</span>

<table class="table table-light">
    <thead>
        <tr>
            
            <th>name</th>
            <th>count</th>
            <th>price</th>
            <th>full price</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach($products as $product)
        <tr>
        <td><a href="{{route('product', [$product->category->code, $product->code])}}">
            <img src="{{Storage::url($product->image)}}" alt="" width="100" height="100"><br>
            {{$product->name}}
        </a></td>
        <td>{{$product->countProduct()}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->getPriceForCount()}}</td> 
        </tr>
        @endforeach
        <tr>
        <td>{{$order->getSumOrder()}}</td>
        </tr>
    </tbody>
</table>
</div>
@endsection