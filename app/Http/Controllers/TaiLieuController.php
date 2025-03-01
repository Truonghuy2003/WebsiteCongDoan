<?php

namespace App\Http\Controllers;

use App\Models\TaiLieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaiLieuController extends Controller
{
    public function getDanhSach()
    {
        $taiLieu = TaiLieu::all();
        return view('tailieu.danhsach', compact('taiLieu'));
    }

    public function getThem()
    {
        return view('tailieu.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request, [
            'ten_tai_lieu' => 'required|string',
            'file' => 'required|file|max:10240',
        ]);

        $filePath = $request->file('file')->store('tai_lieu');

        TaiLieu::create([
            'ten_tai_lieu' => $request->ten_tai_lieu,
            'file_path' => $filePath,
        ]);

        return redirect()->route('tailieu.danhsach')->with('success', 'Thêm tài liệu thành công');
    }

    public function getXoa($id)
    {
        $taiLieu = TaiLieu::findOrFail($id);
        Storage::delete($taiLieu->file_path);
        $taiLieu->delete();

        return redirect()->route('tailieu.danhsach')->with('success', 'Xóa tài liệu thành công');
    }
}
