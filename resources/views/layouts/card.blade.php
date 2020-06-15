<div class="col-3 mx-2 my-2 border border-dark d-flex justify-content-center card">
    <div class="thumbnail d-flex flex-column ">
        <div class="actions">
        @if($product->isHit())
          <span class="badge badge-success">HIT</span>
         @endif 
         @if($product->isNew())
         <span class="badge badge-info">NEW</span>
        @endif 
        @if($product->isRecommend())
        <span class="badge badge-warning">recommend</span>
       @endif 
    </div>
    <img src="{{Storage::url($product->image)}}" alt="" width="150" height="250" class="w-100">
        <div class="caption">
            <a href="{{route('product', [$product->category->code, $product->code])}}" class="text-white">       <span class="d-block text-info">{{$product->name}}</span></a> 
            {{$product->category->name}}

            <span class="d-block">{{$product->price}}</span>
            @if($product->isAvaible())
            <form action="{{route('basketAdd', $product)}}" method="post">
            <button class="btn-outline-dark" type="submit">v korzinu</button>
            @else
            <span class="font-weight-bold text-dark">нет в наличии</span>
            @endif
            <a href="{{route('product', [$product->category->code, $product->code])}}" class="d-block">learn more</a>
                @csrf
            </form>
        </div>

    </div>

</div>

