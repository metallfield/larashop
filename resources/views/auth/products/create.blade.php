@extends('layouts.header_footer')
@isset($product)
@section('title', 'edit product' . $product->name)
@else
@section('title', 'create product')

@endisset
@section('content')
 <div class="container">
    @isset($product)
    <h1>Редактировать товар <b>{{ $product->name }}</b></h1>
@else
    <h1>Добавить товар</h1>
@endisset
<form method="POST" enctype="multipart/form-data"
      @isset($product)
      action="{{ route('products.update', $product) }}"
      @else
      action="{{ route('products.store') }}"
    @endisset
>
    <div>
        @isset($product)
            @method('PUT')
        @endisset
        @csrf
    <div class="form-group">
    <label for="name">name</label>
    @error('name')
    <p class="alert alert-warning">{{$message}}</p>
    @enderror
    <input type="text" name="name" id="name" class="form-control" value="{{old('name', isset($product) ? $product->name : null)}}"  >
</div>    
<div class="form-group">
<label for="code">code</label>
@error('code')
<p class="alert alert-warning">{{$message}}</p>
@enderror
  <input type="text" name="code" id="code" class="form-control" value="{{old('code', isset($product) ? $product->code : null)}}" >
</div>
<div class="form-group">
    <label for="price">price</label>
    @error('price')
    <p class="alert alert-warning">{{$message}}</p>
    @enderror
      <input type="number" name="price" id="price" class="form-control" value="{{old('price', isset($product) ? $product->price : null)}}" >
</div>
<div class="form-group ">
    <label for="category_id">categories</label>
    @error('category_id')
    <p class="alert alert-warning">{{$message}}</p>
    @enderror
      <select   name="category_id" id="category_id" class="form-control my-4">
          @foreach($categories as $category)
      <option value="{{$category->id}}" 
        @isset($product)
            @if ($product->category_id == $category->id)
            selected                
            @endif
        @endisset
        >{{$category->name}}</option>
      @endforeach
</div>
    

<div class="form-group ">
<label for="description">description</label>
@error('description')
<p class="alert alert-warning">{{$message}}</p>
@enderror
  <textarea name="description" id="description" cols="30" rows="10" class="form-control "  >{{old('name', isset($product) ? $product->name : null)}}</textarea>
</div>
<div class="form-group">
   load image <input type="file" name="image" id="image" class="form-control-file">
</div>
<div class="w-100 my-3 d-flex ">
<div class="custom-control custom-switch mx-2">
  <input type="checkbox" class="custom-control-input" name="new" id="new" @if (@isset($product) && $product->isNew() == 1)
  checked="checked"
@endif >
  <label class="custom-control-label" for="new">NEW</label>
</div>
<div class="custom-control custom-switch mx-2">
  <input type="checkbox" class="custom-control-input" name="hit" id="hit" @if (@isset($product) && $product->isHit() == 1)
  checked="checked"
@endif>
  <label class="custom-control-label" for="hit">HIT</label>
</div>
<div class="custom-control custom-switch mx-2">
  <input type="checkbox" class="custom-control-input" name="recommend" id="recommended" @if (@isset($product) && $product->isRecommend() == 1)
  checked="checked"
@endif >
  <label class="custom-control-label" for="recommended">recommend</label>
</div>
</div>
<div class="form-group">
  <label for="count">Count of products</label>
  <input type="number" name="count" id="count" value="{{old('name', isset($product) ? $product->count : null)}}">
</div>
   <button type="submit" class="btn btn-outline-success">create</button>
 @csrf
</form>

</div>



@endsection
