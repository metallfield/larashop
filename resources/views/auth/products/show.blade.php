@extends('layouts.header_footer')
@section('title', 'product '.$product->name)
@section('content')
<h1>{{$product->name}}</h1>
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
                <td scope="row">{{$product->id}}</td>
            </tr>
            <tr>
                <td>name</td>
            <td>{{$product->name}}</td>
        </tr>
        <tr>
            <td>code</td>
            <td>{{$product->code}}</td>
        </tr>
        <tr>
            <td>description</td>
            <td>{{$product->description}}</td>
        </tr>
<tr>
    <td>image</td>
<td><img src="{{Storage::url($product->image)}}" alt="" width="300" height="200"></td>
            </tr>
          
            <tr>
                <td>labels</td>
                <td>    @if($product->isHit())
                    <span class="badge badge-success">HIT</span>
                   @endif 
                   @if($product->isNew())
                   <span class="badge badge-info">NEW</span>
                  @endif 
                  @if($product->isRecommend())
                  <span class="badge badge-warning">recommend</span>
                 @endif </td>
            </tr>
        </tbody>
    </table>
    
    </div>

@endsection