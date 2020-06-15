@extends('layouts.header_footer')
@section('title', 'categories')
@section('content')


<div class="container">
<table class="table table-light">
    <thead>
        <tr>
            <th>#</th>
            <th>image</th>
            <th>name</th>
            <th>slug</th>
            <th>description</th>
            <th>actions</th>
            
        </tr>
    </thead>
    <tbody>
        
       @foreach($categories as $category)
        <tr>
            <th scope="row">{{$category->id}}</th>
        <td><img src="{{Storage::url($category->image)}}" alt="" width="150" height="150" ></td>
        <td>{{$category->name}}</td>
        <td>{{$category->code}}</td>
        <td>{{$category->description}}</td>
        <td>
        <form action="{{route('categories.destroy', $category)}}" method="POST"><a href="{{route('categories.show', [$category])}}" class="btn btn-outline-success">show</a>
        <a class="btn btn-group btn-warning" href="{{route('categories.edit', [$category])}}">edit</a>
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger" value="delete"></form>
        </td>

        </tr>
        @endforeach
    </tbody>
</table>
<a class="btn btn-group btn-success" href="{{route('categories.create')}}">create</a>
<div class="w-100 d-flex justify-content-center">
    {{$categories->links()}}
</div>
</div>
@endsection