@extends('layouts.header_footer')
@section('title', 'order')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Подтвердите заказ</h1>
            
        <span class="w-100 text-center font-weight-bold">full price : {{$order->getSumOrder()}}</span>
   <div class="col-12 text-center">



        <p> enter your phone number , name and email</p>
   <form action="{{route('basketConfirm')}}" class="form" method="POST">
    <label for="phone">phone</label>
            <input type="text" name="phone" id="phone" class="form-control my-2">
    <label for="name">name</label>
            <input type="text" name="name" id="name" class="form-control my-2 d-block">
            @guest
                 <label for="email">email</label>
            <input type="email" name="email" id="email" class="form-control my-2 d-block"> 
            @endguest
        <button type="submit" class="btn-outline-dark btn btn-block rounded btn-lg" >order this</button>
        @csrf
        </form>
    </div> </div>
    </div>
    @endsection
