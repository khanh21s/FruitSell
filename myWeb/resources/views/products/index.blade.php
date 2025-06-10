@extends('layouts.app')

@section('title', 'Danh sách sản phẩm')

@section('content')
<h1 class="text-2xl mb-4">Tất cả sản phẩm</h1>
<div class="grid grid-cols-4 gap-6">
  @foreach($products as $p)
    <div class="bg-white p-4 rounded shadow flex flex-col justify-between">
      <a href="{{ route('product.show', $p->slug) }}">
        <img
          src="{{ $p->image_path
                  ? asset('storage/products/'.$p->image_path)
                  : 'https://via.placeholder.com/150' }}"
          alt="{{ $p->name }}"
          class="w-full h-32 object-cover mb-2"
        >
        <h2 class="font-semibold">{{ $p->name }}</h2>
        <p class="text-red-500">{{ number_format($p->price,0,',','.') }}₫</p>
      </a>

      @auth
        <form action="{{ route('cart.add') }}" method="POST" class="mt-4">
          @csrf
          <input type="hidden" name="product_id" value="{{ $p->id }}">
          <input type="number" name="quantity" value="1" min="1" class="w-16 border p-1 inline">
          <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded">
            Thêm vào giỏ hàng
          </button>
        </form>
      @else
        <a href="{{ route('login') }}" class="mt-4 block bg-blue-600 hover:bg-blue-700 text-white text-center py-2 rounded">
          Thêm vào giỏ hàng
        </a>
      @endauth
    </div>
  @endforeach
</div>

@auth
  <div class="mt-6 flex justify-between items-center">
    <a href="{{ route('cart.index') }}"
       class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded shadow">
      🛒 Xem giỏ hàng ({{ \App\Models\Cart::where('user_id', auth()->id())->count() }})
    </a>

    <div>
      {{ $products->links() }}
    </div>
  </div>
@else
  <div class="mt-6">
    {{ $products->links() }}
  </div>
@endauth
@endsection
