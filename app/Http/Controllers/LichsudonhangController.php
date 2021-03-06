<?php

namespace App\Http\Controllers;

use App\Models\Lichsudonhang;
use Illuminate\Http\Request;

class LichsudonhangController extends Controller
{
    //Lưu sự kiện của đơn hàng
    public function luusukien($id_donhang, $matracuu, $id_nhanvienquanly, $id_chuyenhang, $id_khogui, $id_khonhan, $id_trangthai, $ghichu)
    {
        $lichsudonhang = new Lichsudonhang;
        $lichsudonhang->id_donhang = $id_donhang;
        $lichsudonhang->matracuu = $matracuu;
        $lichsudonhang->id_nhanvienquanly = $id_nhanvienquanly;
        $lichsudonhang->id_chuyenhang = $id_chuyenhang;
        $lichsudonhang->id_khogui = $id_khogui;
        $lichsudonhang->id_khonhan = $id_khonhan;
        $lichsudonhang->id_trangthai = $id_trangthai;
        $lichsudonhang->ghichu = $ghichu;
        $lichsudonhang->save();
    }



    //Hiển thị Lịch sử đơn hàng
    public function lichsudonhang($id_donhang)
    {
        $lichsudonhang = Lichsudonhang::where('lichsudonhangs.id_donhang', $id_donhang)
            ->join('users', 'users.id', 'lichsudonhangs.id_nhanvienquanly')
            ->join('trangthais', 'trangthais.id', 'lichsudonhangs.id_trangthai')
            ->join('khohangs as khogui', 'khogui.id', 'lichsudonhangs.id_khogui')
            ->leftJoin('khohangs as khonhan', 'khonhan.id', 'lichsudonhangs.id_khonhan')
            ->select('lichsudonhangs.*', 'trangthais.tentrangthai', 'khogui.tenkhohang as khogui', 'khogui.diachi as diachikhogui', 'khonhan.tenkhohang as khonhan', 'khonhan.diachi as diachikhonhan', 'users.name')
            ->orderBy('id', 'asc')
            ->get();

        return $lichsudonhang;
    }

    //Xóa Lịch sử đơn hàng
    

}
