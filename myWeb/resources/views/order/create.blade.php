@extends('layouts.app')
<form action="{{ route('order.store') }}" method="POST">
  @csrf

  <div class="mb-4">
    <label class="block">Tên người nhận</label>
    <input type="text" name="recipient_name" required class="w-full border p-2" value="{{ old('recipient_name') }}">
  </div>

  <div class="mb-4">
    <label class="block">Số điện thoại</label>
    <input type="text" name="recipient_phone" required class="w-full border p-2" value="{{ old('recipient_phone') }}">
  </div>

  <div class="mb-4">
    <label class="block">Địa chỉ giao hàng</label>
    <textarea name="shipping_address" required class="w-full border p-2">{{ old('shipping_address') }}</textarea>
  </div>

  <div class="mb-4">
    <label class="block">Ghi chú (tuỳ chọn)</label>
    <textarea name="note" class="w-full border p-2">{{ old('note') }}</textarea>
  </div>

  <!-- Hiển thị giỏ hàng và tổng tiền ở trên -->
  <button class="bg-blue-600 text-white px-6 py-2 rounded">Đặt hàng</button>
</form>
