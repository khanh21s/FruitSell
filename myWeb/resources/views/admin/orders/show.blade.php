@extends('layouts.admin')
@section('title','Đơn #'.$order->id)
@section('content')
<h1 class="text-2xl mb-4">Chi tiết Đơn #{{ $order->id }}</h1>

<div class="bg-white p-4 rounded shadow mb-6">
  <p><strong>Người nhận:</strong> {{ $order->recipient_name }}</p>
  <p><strong>Phone:</strong> {{ $order->recipient_phone }}</p>
  <p><strong>Địa chỉ:</strong> {{ $order->shipping_address }}</p>
  @if($order->note)<p><strong>Ghi chú:</strong> {{ $order->note }}</p>@endif
</div>

<table class="w-full bg-white rounded shadow mb-6">
  <thead class="bg-gray-100">
    <tr>
      <th class="p-2">Sản phẩm</th><th class="p-2">SL</th>
      <th class="p-2">Giá</th><th class="p-2">Thành tiền</th>
    </tr>
  </thead>
  <tbody>
    @foreach($order->orderItems as $item)
    <tr class="border-t">
      <td class="p-2">{{ $item->product->name }}</td>
      <td class="p-2">{{ $item->quantity }}</td>
      <td class="p-2">{{ number_format($item->price_each,0,',','.') }}₫</td>
      <td class="p-2">{{ number_format($item->quantity * $item->price_each,0,',','.') }}₫</td>
    </tr>
    @endforeach
  </tbody>
</table>

<form action="{{ route('admin.orders.update',$order) }}" method="POST" class="mb-4">
  @csrf @method('PUT')
  <label class="block mb-2">Trạng thái đơn:</label>
  <select name="status" class="border p-2">
    @foreach(['pending','processing','shipped','delivered','canceled'] as $st)
      <option value="{{ $st }}" {{ $order->status===$st?'selected':'' }}>
        {{ ucfirst($st) }}
      </option>
    @endforeach
  </select>
  <button class="ml-2 bg-green-600 text-white px-4 py-1 rounded">Cập nhật</button>
</form>
@endsection
