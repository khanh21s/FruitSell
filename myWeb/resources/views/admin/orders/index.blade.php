@extends('layouts.admin')
@section('content')
<h1>Đơn hàng</h1>
<table>
  <thead>
    <tr>
      <th>#</th><th>Khách</th><th>Tổng</th><th>Trạng thái</th><th>Ngày đặt</th>
    </tr>
  </thead>
  <tbody>
  @foreach($orders as $o)
    <tr>
      <td>{{ $o->id }}</td>
      <td>{{ $o->user->name }}</td>
      <td>{{ number_format($o->total_amount) }}₫</td>
      <td>{{ ucfirst($o->status) }}</td>
      <td>{{ $o->created_at->format('d/m/Y H:i') }}</td>
    </tr>
  @endforeach
  </tbody>
</table>
{{ $orders->links() }}
@endsection
