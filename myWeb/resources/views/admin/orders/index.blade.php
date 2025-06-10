@extends('layouts.admin')
@section('title','Admin - Đơn hàng')
@section('content')
<h1 class="text-2xl mb-4">Quản lý Đơn hàng</h1>
<table class="w-full bg-white shadow rounded">
  <thead class="bg-gray-200">
    <tr>
      <th class="p-2">#</th><th class="p-2">Người nhận</th>
      <th class="p-2">Tổng tiền</th><th class="p-2">Trạng thái</th>
      <th class="p-2">Ngày</th><th class="p-2">Chi tiết</th>
    </tr>
  </thead>
  <tbody>
    @foreach($orders as $o)
    <tr class="border-t">
      <td class="p-2">{{ $o->id }}</td>
      <td class="p-2">{{ $o->recipient_name }}<br>{{ $o->recipient_phone }}</td>
      <td class="p-2">{{ number_format($o->total_amount,0,',','.') }}₫</td>
      <td class="p-2">{{ ucfirst($o->status) }}</td>
      <td class="p-2">{{ $o->created_at->format('d/m/Y') }}</td>
      <td class="p-2">
        <a href="{{ route('admin.orders.show',$o) }}" class="text-blue-600">Xem</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="mt-4">{{ $orders->links() }}</div>
@endsection
