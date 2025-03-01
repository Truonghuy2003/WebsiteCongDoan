<?php

namespace App\Http\Controllers;

use App\Models\NguoiDungVaiTro;
use Illuminate\Http\Request;
use App\Models\VaiTro;
use App\Models\User;

class NguoiDungVaiTroController extends Controller
{
    public function getDanhSach()
    {
        $nguoiDung = User::with('vaiTro')->get();
        return view('nguoidungvaitro.danhsach', compact('nguoiDung'));
    }

    public function getThem()
    {
        $nguoiDung = User::all();
        $vaiTro = VaiTro::all();
        return view('nguoidungvaitro.them', compact('nguoiDung', 'vaiTro'));
    }

    public function postThem(Request $request)
    {
        $this->validate($request, [
            'nguoi_dung_id' => 'required|exists:nguoi_dung,id',
            'vai_tro_id' => 'required|exists:vai_tro,id',
        ]);

        $nguoiDung = User::find($request->nguoi_dung_id);
        $nguoiDung->vaiTro()->attach($request->vai_tro_id);

        return redirect()->route('nguoidungvaitro.danhsach')->with('success', 'Gán vai trò thành công');
    }

    public function getXoa($nguoi_dung_id, $vai_tro_id)
    {
        $nguoiDung = User::findOrFail($nguoi_dung_id);
        $nguoiDung->vaiTro()->detach($vai_tro_id);

        return redirect()->route('nguoidungvaitro.danhsach')->with('success', 'Xóa vai trò thành công');
    }
}
