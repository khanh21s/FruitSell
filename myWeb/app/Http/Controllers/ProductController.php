<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 1️⃣ Hiển thị list sản phẩm (trang chủ)
    public function index(Request $request)
    {
        // build query
        $query = Product::with('category');

        // filter theo category nếu URL có ?category=slug
        if ($slug = $request->query('category')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $slug));
        }

        // phân trang 12/sp/trang
        $products = $query->orderBy('created_at','desc')->paginate(12);

        // trả view resources/views/products/index.blade.php
        return view('products.index', compact('products'));
    }
    public function importedFruits()
    {
        // Lấy danh sách sản phẩm nhập khẩu
        $products = Product:: where('category_id', 1)->paginate(12);

        // Trả về view với danh sách sản phẩm
        return view('products.imported', compact('products'));

    }
    public function localFruits()
    {
        // Lấy danh sách sản phẩm Việt Nam
        $products = Product::where('category_id', 2)->paginate(12);

        // Trả về view với danh sách sản phẩm
        return view('products.local', compact('products'));
    }
    public function search(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ yêu cầu
        $searchTerm = $request->input('search');

        // Kiểm tra nếu từ khóa tìm kiếm có ít nhất 3 ký tự
        if (strlen($searchTerm) >= 3) {
            // Tìm kiếm sản phẩm có tên gần giống với từ khóa, sử dụng 'like' để tìm kiếm gần đúng
            $products = Product::where('name', 'like', '%' . $searchTerm . '%')
                               ->paginate(12);  // Lấy tất cả sản phẩm có tên gần giống

            return view('products.search', compact('products', 'searchTerm'));  // Trả về view với danh sách sản phẩm
        } else {
            return redirect()->route('home')->with('error', 'Từ khóa tìm kiếm quá ngắn.');
        }
    }

    // 2️⃣ Hiển thị form tạo (chỉ admin, sau này)
    public function create()
    {
        // TODO: load category list, trả view form admin
    }

    // 3️⃣ Lưu product mới (chỉ admin)
    public function store(Request $request)
    {
        // TODO: validate + lưu vào DB
    }

    // 4️⃣ Hiển thị chi tiết 1 sản phẩm
    public function show($slug)
    {
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();
        return view('products.show', compact('product'));
    }

    // 5️⃣ Hiển thị form edit (chỉ admin)
    public function edit($id)
    {
        // TODO: load product + categories, view form
    }

    // 6️⃣ Cập nhật product (chỉ admin)
    public function update(Request $request, $id)
    {
        // TODO: validate + update DB
    }

    // 7️⃣ Xóa product (chỉ admin)
    public function destroy($id)
    {
        // TODO: delete and redirect
    }
}
