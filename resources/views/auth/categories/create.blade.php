@extends('layouts.header_footer')
@isset($category)
@section('title', 'edit category' . $category->name)
@else
@section('title', 'create categories')

@endisset
@section('content')
 <div class="container">
     @isset($category)
 <h1>Edit category {{$category->name}}</h1>
@else
<h1>Add category</h1>
@endisset
 <form method="post" enctype="multipart/form-data"
 @isset($category)
     action="{{route('categories.update', $category)}}"
      @else 
     action="{{route('categories.store')}}"
 @endisset
 >
 
 @isset($category)
     @method('PUT')
 @endisset
    <div class="form-group">
    <label for="name">name</label>
    @error('name')
    <p class="alert alert-warning">{{$message}}</p>  
    @enderror
    <input type="text" name="name" id="name" class="form-control" @isset($category) value="{{$category->name}}" @endisset >
</div>    
<div class="form-group">
<label for="code">code</label>
@error('code')
<p class="alert alert-warning">{{$message}}</p>  
@enderror
  <input type="text" name="code" id="code" class="form-control" value="{{old('code', isset($category) ? $category->code : null)}}" >
</div>
<div class="form-group">
<label for="description">description</label>
@error('description')
<p class="alert alert-warning">{{$message}}</p>  
@enderror
  <textarea name="description" id="description" cols="30" rows="10" class="form-control"  >@isset($category){{$category->description}}@endisset</textarea>
</div>
<div class="form-group">
   load image <input type="file" name="image" id="image" class="form-control-file">
</div>
   <button type="submit" class="btn btn-outline-success">create</button>
 @csrf
</form>

</div>



@endsection