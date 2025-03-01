<?php

namespace App\Http\Controllers;

use App\Models\ThongBao;
use Illuminate\Http\Request;

class ThongBaoController extends Controller
{
    public function getDanhSach()
    {
        $thongBao = ThongBao::all();
        return view('thongbao.danhsach', compact('thongBao'));
    }

    public function getThem()
    {
        return view('thongbao.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request, [
            'tieu_de' => 'required|string',
            'noi_dung' => 'required',
            'ngay_gui' => 'required|date',
        ]);

        ThongBao::create($request->all());

        return redirect()->route('thongbao.danhsach')->with('success', 'Thêm thông báo thành công');
    }

    public function getXoa($id)
    {
        ThongBao::destroy($id);
        return redirect()->route('thongbao.danhsach')->with('success', 'Xóa thông báo thành công');
    }
}
