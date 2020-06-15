@extends('layouts.header_footer')
@section('title', 'category'.$category->name)
@section('content')
<h1>{{$category->name}}</h1>
<div class="container">
    <table class="table table-light">
        <thead>
            <tr>
                <th>field</th>
                <th>value</th>
            </tr>
        </thead>
        <tbody>
            
       
            <tr>
                <td>id</td>
                <td scope="row">{{$category->id}}</td>
            </tr>
            <tr>
                <td>name</td>
            <td>{{$category->name}}</td>
        </tr>
        <tr>
            <td>code</td>
            <td>{{$category->code}}</td>
        </tr>
        <tr>
            <td>description</td>
            <td>{{$category->description}}</td>
        </tr>
<tr>
    <td>image</td>
<td> <img src="{{Storage::url($category->image)}}" alt="" width="300" height="200"></td>
            </tr>
            <tr>
                <td>count of products</td>
            <td>{{$category->products->count()}}</td>
            </tr>
            

        </tbody>
    </table>
    
    </div>

@endsection