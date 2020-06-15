@extends('layouts.header_footer')
@section('title', 'Korzina')
@section('content')
<h1>this is KORZINA</h1> <span class="font-weight-bold text-center my-4">{{ $order->countOfProducts()}}</span>
<div class="container">
    <div class="row">
        <ul>
            @foreach($order->products()->with('category')->get() as $o)
                <div class="row align-items-center">
                    <div class="col">
                    <img src="{{Storage::url($o->image)}}" alt="" width="150" height="150">
                    </div>
                    <div class="col ">
                        <a href="{{route('product', [$o->category->code, $o->code])}}"><span>{{$o->name}}</span></a>
                        <span>{{$o->price}}</span>
                    </div>
                    <form action="{{route('basketRemove', $o)}}" method="post">
                        <button class="btn-outline-white" type="submit">-</button>
                        @csrf
                    </form>
                    {{$o->pivot->count}}
                    <form action="{{route('basketAdd', $o)}}" method="post">
                        <button class="btn-outline-dark" type="submit">+</button>
                        @csrf
                    </form>
                    <div class="col ">
                        <p>{{$o->description}}</p>
                    </div>
                    <div class="col">
                        {{$o->price}}
                    </div>
                    <div class="col">
                        {{$o->getPriceForCount($o->pivot->count)}}
                    </div>
                  
                </div>

            @endforeach  <div class="col ml-auto text-right">
                       Full price: {{$order->getSumOrder()}}
                    </div>
        </ul>
    </div>

    <a  class="btn btn-outline-info float-right" href="{{route('basketPlace')}}">Create order</a>
</div>


@endsection
