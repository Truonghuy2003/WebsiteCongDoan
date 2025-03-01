<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;
use Illuminate\Http\Request;

class BaiVietController extends Controller
{
    public function getDanhSach()
    {
        $baiViet = BaiViet::all();
        return view('baiviet.danhsach', compact('baiViet'));
    }

    public function getThem()
    {
        return view('baiviet.them');
    }

    public function postThem(Request $request)
    {
        // Kiểm tra dữ liệu nhập vào
        $request->validate([
            'tieu_de' => 'required|string|max:255|unique:bai_viets,tieu_de',
            'noi_dung' => 'required|string',
        ]);

        BaiViet::create($request->all());

        return redirect()->route('baiviet.danhsach')->with('success', 'Thêm bài viết thành công');
    }

    public function getSua($id)
    {
        $baiViet = BaiViet::findOrFail($id);
        return view('baiviet.sua', compact('baiViet'));
    }

    public function postSua(Request $request, $id)
    {
        $baiViet = BaiViet::findOrFail($id);

        // Kiểm tra dữ liệu nhập vào
        $request->validate([
            'tieu_de' => 'required|string|max:255' . $id,
            'noi_dung' => 'required|string',
        ]);

        $baiViet->update($request->all());

        return redirect()->route('baiviet.danhsach')->with('success', 'Cập nhật thành công');
    }

    public function getXoa($id)
    {
        BaiViet::destroy($id);
        return redirect()->route('baiviet.danhsach')->with('success', 'Xóa thành công');
    }
}
