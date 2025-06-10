@extends('layouts.app')

@section('title', 'Đơn hàng của tôi')

@section('content')
    <h1 class="text-2xl mb-4">Đơn hàng của bạn</h1>

    @if($orders->isEmpty())
        <p>Bạn chưa có đơn hàng nào.</p>
    @else
        @foreach($orders as $order)
            <div class="bg-white shadow rounded p-4 mb-6">
                <div class="flex justify-between items-center mb-2">
                    <div>
                        <span class="font-medium">Mã đơn:</span> #{{ $order->id }}
                    </div>
                    <div class="text-sm text-gray-600">
                        {{ $order->created_at->format('d/m/Y H:i') }}
                    </div>
                </div>
                <table class="w-full text-left mb-4">
                    <thead>
                        <tr>
                            <th class="py-2">Sản phẩm</th>
                            <th class="py-2">Số lượng</th>
                            <th class="py-2">Đơn giá</th>
                            <th class="py-2">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderItems as $item)
                            <tr class="border-t">
                                <td class="py-2">{{ $item->product->name }}</td>
                                <td class="py-2">{{ $item->quantity }}</td>
                                <td class="py-2">{{ number_format($item->price_each,0,',','.') }}₫</td>
                                <td class="py-2">
                                    {{ number_format($item->quantity * $item->price_each,0,',','.') }}₫
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-right font-semibold">
                    Tổng cộng: {{ number_format($order->total_amount,0,',','.') }}₫
                </div>
            </div>
        @endforeach
    @endif
@endsection
