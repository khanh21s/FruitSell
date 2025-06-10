@extends('layouts.app')
@section('title','Giỏ hàng')

@section('content')
<h1 class="text-2xl mb-4">Giỏ hàng của bạn</h1>
@if($carts->isEmpty())
  <p>Giỏ trống rồi!</p>
@else
  <table class="w-full bg-white rounded shadow">
    <tr><th>SP</th><th>Qty</th><th>Giá</th><th>Thao tác</th></tr>
    @foreach($carts as $c)
      <tr class="border-t">
        <td>{{ $c->product->name }}</td>
        <td>{{ $c->quantity }}</td>
        <td>{{ number_format($c->product->price * $c->quantity,0,',','.') }}₫</td>
        <td>
          <form action="{{ route('cart.remove',$c->id) }}" method="POST" onsubmit="return confirm('Xóa?')">
            @csrf
            <button class="text-red-500">Xóa</button>
          </form>
        </td>
      </tr>
    @endforeach
  </table>
  <a href="{{ route('order.create') }}" class="mt-4 inline-block bg-green-600 text-white px-4 py-2 rounded">Thanh toán</a>
@endif
@endsection
