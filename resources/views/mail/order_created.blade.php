Hello {{$name}}!
Yor order on sum {{$fullSum}} confirm.

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
        
        @foreach($order->products as $product)
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
        <td>{{$fullSum}}</td>
        </tr>
    </tbody>
</table>