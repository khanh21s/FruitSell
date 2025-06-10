@extends('layouts.app')
@section('title',$product->name)

@section('content')
<div class="flex gap-6">
  <img src="{{ $product->image_path ? asset('storage/products/'.$product->image_path) : 'https://via.placeholder.com/300' }}" class="w-1/3 object-cover">
  <div class="w-2/3">
    <h1 class="text-3xl font-bold mb-2">{{ $product->name }}</h1>
    <p class="text-red-600 text-2xl mb-4">{{ number_format($product->price,0,',','.') }}₫</p>
    <p class="mb-4">{{ $product->description }}</p>
    @auth
    <form action="{{ route('cart.add') }}" method="POST">
      @csrf
      <input type="hidden" name="product_id" value="{{ $product->id }}">
      <input type="number" name="quantity" value="1" min="1" class="w-20 border p-1 inline">
      <button class="bg-blue-500 text-white px-4 py-2 rounded">Thêm vào giỏ</button>
    </form>
    @endauth
  </div>
</div>
@endsection
