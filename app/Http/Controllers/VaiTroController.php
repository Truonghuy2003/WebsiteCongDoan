<?php

namespace App\Http\Controllers;

use App\Models\VaiTro;
use Illuminate\Http\Request;

class VaiTroController extends Controller
{
    public function getDanhSach()
    {
        $vaiTro = VaiTro::all();
        return view('vaitro.danhsach', compact('vaiTro'));
    }

    public function getThem()
    {
        return view('vaitro.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request, [
            'ten_vai_tro' => 'required|string|unique:vai_tro,ten_vai_tro',
        ]);

        VaiTro::create($request->all());

        return redirect()->route('vaitro.danhsach')->with('success', 'Thêm vai trò thành công');
    }

    public function getXoa($id)
    {
        VaiTro::destroy($id);
        return redirect()->route('vaitro.danhsach')->with('success', 'Xóa thành công');
    }
}
