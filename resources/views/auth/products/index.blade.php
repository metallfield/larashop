@extends('layouts.header_footer')
@section('title', 'products')
@section('content')


<div class="container">
<table class="table table-light">
    <thead>
        <tr>
            <th>#</th>
            <th>image</th>
            <th>name</th>
            <th>slug</th>
            <th>category</th>
            <th>price</th>
           <th>count of products</th>
            <th>actions</th>
         
            
        </tr>
    </thead>
    <tbody>
        
       @foreach($products as $product)
        <tr>
            <th scope="row">{{$product->id}}</th>
        <td><img src="{{Storage::url($product->image)}}" alt="" width="150" height="150" ></td>
        <td>{{$product->name}}</td>
        <td>{{$product->code}}</td>
        <td>{{$product->category->name}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->count}}</td>
        <td>
        <form action="{{route('products.destroy', $product)}}" method="POST"><a href="{{route('products.show', [$product])}}" class="btn btn-outline-success">show</a>
        <a class="btn btn-group btn-warning" href="{{route('products.edit', [$product])}}">edit</a>
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger" value="delete"></form>
        </td>

        </tr>
        @endforeach
    </tbody>
</table>

<a class="btn btn-group btn-success" href="{{route('products.create')}}">create</a>
<div class="w-100 d-flex justify-content-center">
{{$products->links()}}
</div>
</div>
@endsection