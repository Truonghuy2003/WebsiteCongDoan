<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use Illuminate\Http\Request;
use App\Models\VaiTro;
use Illuminate\Support\Facades\Hash;

class NguoiDungController extends Controller
{
    public function getDanhSach()
    {
        $nguoiDung = NguoiDung::all();
        return view('nguoidung.danhsach', compact('nguoiDung'));
    }

    public function getThem()
    {
        $vaiTro = VaiTro::all();
        return view('nguoidung.them', compact('vaiTro'));
    }

    public function postThem(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $nguoiDung = new NguoiDung();
        $nguoiDung->ho_ten = $request->ho_ten;
        $nguoiDung->email = $request->email;
        $nguoiDung->password = Hash::make($request->password);
        $nguoiDung->save();

        return redirect()->route('nguoidung.danhsach')->with('success', 'Thêm người dùng thành công');
    }

    public function getSua($id)
    {
        $nguoiDung = NguoiDung::findOrFail($id);
        return view('nguoidung.sua', compact('nguoiDung'));
    }

    public function postSua(Request $request, $id)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username,' . $request->id],
            'email' => ['required', 'email', 'unique:users,email,' . $request->id],
        ]);
        $nguoiDung = NguoiDung::findOrFail($id);
        $nguoiDung->ho_ten = $request->ho_ten;
        if ($request->password) {
            $nguoiDung->password = Hash::make($request->password);
        }
        $nguoiDung->save();

        return redirect()->route('nguoidung.danhsach')->with('success', 'Cập nhật thành công');
    }

    public function getXoa($id)
    {
        NguoiDung::destroy($id);
        return redirect()->route('nguoidung.danhsach')->with('success', 'Xóa thành công');
    }
}
