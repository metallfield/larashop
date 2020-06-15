@extends('layouts.header_footer')
@section('title', 'categories')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center ">
                <h1>categories page</h1>
                @foreach($categories as $category)
                    <ul class="category-list"><li class="category-list"><a href="{{route('category', $category->code)}}"><h2>{{$category->name}}</h2></a></li></ul>
               <span>{{$category->description}}</span>
                @endforeach
            </div>
        </div>
    </div>

@endsection
