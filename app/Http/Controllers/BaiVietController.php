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
        $this->validate($request, [
            'tieu_de' => 'required|string',
            'noi_dung' => 'required',
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
        $baiViet->update($request->all());

        return redirect()->route('baiviet.danhsach')->with('success', 'Cập nhật thành công');
    }

    public function getXoa($id)
    {
        BaiViet::destroy($id);
        return redirect()->route('baiviet.danhsach')->with('success', 'Xóa thành công');
    }
}
