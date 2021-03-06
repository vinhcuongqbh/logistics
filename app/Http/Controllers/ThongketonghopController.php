<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Donhang;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


class ThongketonghopController extends Controller
{
    public function thongKeTongHopDashBoard(Request $request)
    {
        $nhanvien = User::where('id_loainhanvien', '>', 1)->get();
        $id_nhanvien = $request->nhanvien;
        return view('admin.thongke.thongketonghop', [
            'nhanviens' =>  $nhanvien,
            'id_nhanvien' => $id_nhanvien,
        ]);
    }


    //Kết quả thống kê
    public function ketQuaThongKe(Request $request)
    {
        $nhanviens = User::where('id_loainhanvien', '>', 1)->get();
        $id_nhanvien = $request->nhanvien; if ($id_nhanvien == null) $id_nhanvien = Auth::id();
        if ($request->ngaybatdau == null) $ngayBatDau = Carbon::now()->startOfDay();
        else $ngayBatDau = new Carbon($request->ngaybatdau);         
        if ($request->ngayketthuc == null) $ngayKetThuc = Carbon::now()->endOfDay();
        else $ngayKetThuc = new Carbon($request->ngayketthuc);

        $thongkedonhang = new ThongkedonhangController;
        $thongkekhoiluong = new ThongkekhoiluongController;
        $thongkedoanhthu = new ThongkedoanhthuController;
        $thongkechietkhau = new ThongkechietkhauController;

        //Tạo Collection để lưu trữ dữ liệu thống kê
        $thongke = collect();

        if ($id_nhanvien == 2) {
            foreach ($nhanviens as $nhanvien) {
                $sodonhangdanhanduongkhong = $thongkedonhang->thongKeDonHangDuongKhong($nhanvien->id, $ngayBatDau, $ngayKetThuc);
                $sodonhangdanhanduongbien = $thongkedonhang->thongKeDonHangDuongBien($nhanvien->id, $ngayBatDau, $ngayKetThuc);
                $sodonhangdanhan = $sodonhangdanhanduongkhong + $sodonhangdanhanduongbien;
                $khoiluongdanhanduongkhong = $thongkekhoiluong->thongKeKhoiLuongDuongKhong($nhanvien->id, $ngayBatDau, $ngayKetThuc);
                $khoiluongdanhanduongbien = $thongkekhoiluong->thongKeKhoiLuongDuongBien($nhanvien->id, $ngayBatDau, $ngayKetThuc);
                $khoiluongdanhan = $khoiluongdanhanduongkhong + $khoiluongdanhanduongbien;
                $sodonhangthatlacduongkhong = $thongkedonhang->thongKeDonHangThatLacDuongKhong($nhanvien->id, $ngayBatDau, $ngayKetThuc);
                $sodonhangthatlacduongbien = $thongkedonhang->thongKeDonHangThatLacDuongBien($nhanvien->id, $ngayBatDau, $ngayKetThuc);
                $sodonhangthatlac = $sodonhangthatlacduongkhong + $sodonhangthatlacduongbien;
                $doanhthu =  $thongkedoanhthu->thongKeDoanhThu($nhanvien->id, $ngayBatDau, $ngayKetThuc);
                $doanhthuduongkhong =  $thongkedoanhthu->thongKeDoanhThuDuongKhong($nhanvien->id, $ngayBatDau, $ngayKetThuc);
                $doanhthuduongbien =  $thongkedoanhthu->thongKeDoanhThuDuongBien($nhanvien->id, $ngayBatDau, $ngayKetThuc);
                $chietkhau =  $thongkechietkhau->thongKeChietKhau($nhanvien->id, $ngayBatDau, $ngayKetThuc);
                $chietkhauduongkhong =  $thongkechietkhau->thongKeChietKhauDuongKhong($nhanvien->id, $ngayBatDau, $ngayKetThuc);
                $chietkhauduongbien =  $thongkechietkhau->thongKeChietKhauDuongBien($nhanvien->id, $ngayBatDau, $ngayKetThuc);


                $thongke->push([
                    'id_nhanvien' => $nhanvien->id,
                    'tennhanvien' => $nhanvien->name,
                    'sodonhangdanhan' => $sodonhangdanhan,
                    'sodonhangdanhanduongkhong' => $sodonhangdanhanduongkhong,
                    'sodonhangdanhanduongbien' => $sodonhangdanhanduongbien,
                    'khoiluongdanhan' => $khoiluongdanhan,
                    'khoiluongdanhanduongkhong' => $khoiluongdanhanduongkhong,
                    'khoiluongdanhanduongbien' => $khoiluongdanhanduongbien,
                    'sodonhangthatlac' => $sodonhangthatlac,
                    'sodonhangthatlacduongkhong' => $sodonhangthatlacduongkhong,
                    'sodonhangthatlacduongbien' => $sodonhangthatlacduongbien,
                    'doanhthu' => $doanhthu,
                    'doanhthuduongkhong' => $doanhthuduongkhong,
                    'doanhthuduongbien' => $doanhthuduongbien,
                    'chietkhau' => $chietkhau,
                    'chietkhauduongkhong' => $chietkhauduongkhong,
                    'chietkhauduongbien' => $chietkhauduongbien,
                ]);
            }
        } else {
            $sodonhangdanhanduongkhong = $thongkedonhang->thongKeDonHangDuongKhong($id_nhanvien, $ngayBatDau, $ngayKetThuc);
            $sodonhangdanhanduongbien = $thongkedonhang->thongKeDonHangDuongBien($id_nhanvien, $ngayBatDau, $ngayKetThuc);
            $sodonhangdanhan = $sodonhangdanhanduongkhong + $sodonhangdanhanduongbien;
            $khoiluongdanhanduongkhong = $thongkekhoiluong->thongKeKhoiLuongDuongKhong($id_nhanvien, $ngayBatDau, $ngayKetThuc);
            $khoiluongdanhanduongbien = $thongkekhoiluong->thongKeKhoiLuongDuongBien($id_nhanvien, $ngayBatDau, $ngayKetThuc);
            $khoiluongdanhan = $khoiluongdanhanduongkhong + $khoiluongdanhanduongbien;
            $sodonhangthatlacduongkhong = $thongkedonhang->thongKeDonHangThatLacDuongKhong($id_nhanvien, $ngayBatDau, $ngayKetThuc);
            $sodonhangthatlacduongbien = $thongkedonhang->thongKeDonHangThatLacDuongBien($id_nhanvien, $ngayBatDau, $ngayKetThuc);
            $sodonhangthatlac = $sodonhangthatlacduongkhong + $sodonhangthatlacduongbien;
            $doanhthu =  $thongkedoanhthu->thongKeDoanhThu($id_nhanvien, $ngayBatDau, $ngayKetThuc);
            $doanhthuduongkhong =  $thongkedoanhthu->thongKeDoanhThuDuongKhong($id_nhanvien, $ngayBatDau, $ngayKetThuc);
            $doanhthuduongbien =  $thongkedoanhthu->thongKeDoanhThuDuongBien($id_nhanvien, $ngayBatDau, $ngayKetThuc);
            $chietkhau =  $thongkechietkhau->thongKeChietKhau($id_nhanvien, $ngayBatDau, $ngayKetThuc);
            $chietkhauduongkhong =  $thongkechietkhau->thongKeChietKhauDuongKhong($id_nhanvien, $ngayBatDau, $ngayKetThuc);
            $chietkhauduongbien =  $thongkechietkhau->thongKeChietKhauDuongBien($id_nhanvien, $ngayBatDau, $ngayKetThuc);

            $thongke->push([
                'id_nhanvien' => $id_nhanvien,
                'tennhanvien' => User::find($id_nhanvien)->name,
                'sodonhangdanhan' => $sodonhangdanhan,
                'sodonhangdanhanduongkhong' => $sodonhangdanhanduongkhong,
                'sodonhangdanhanduongbien' => $sodonhangdanhanduongbien,
                'khoiluongdanhan' => $khoiluongdanhan,
                'khoiluongdanhanduongkhong' => $khoiluongdanhanduongkhong,
                'khoiluongdanhanduongbien' => $khoiluongdanhanduongbien,
                'sodonhangthatlac' => $sodonhangthatlac,
                'sodonhangthatlacduongkhong' => $sodonhangthatlacduongkhong,
                'sodonhangthatlacduongbien' => $sodonhangthatlacduongbien,                
                'doanhthu' => $doanhthu,
                'doanhthuduongkhong' => $doanhthuduongkhong,
                'doanhthuduongbien' => $doanhthuduongbien,
                'chietkhau' => $chietkhau,
                'chietkhauduongkhong' => $chietkhauduongkhong,
                'chietkhauduongbien' => $chietkhauduongbien,
            ]);
        }

        $ngayBatDau = $ngayBatDau->toDateString();
        $ngayKetThuc = $ngayKetThuc->toDateString();

        return view('admin.thongke.ketquathongke', [
            'nhanviens' => $nhanviens,
            'id_nhanvien' => $id_nhanvien,
            'ngaybatdau' => $ngayBatDau,
            'ngayketthuc' => $ngayKetThuc,
            'thongkes' => $thongke,
        ]);
    }
}
