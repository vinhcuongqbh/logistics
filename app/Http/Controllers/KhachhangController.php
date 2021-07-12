<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Khachhang;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class KhachhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Hiển thị danh sách Tài khoản đang sử dụng
        $khachhang = Khachhang::where('khachhangs.id_trangthai', 1)
            ->join('users', 'users.id', 'khachhangs.id_nhanvienquanly')
            ->select('khachhangs.*', 'users.name')
            ->orderBy('id', 'asc')
            ->get();

        return view('admin.khachhang.index', ['khachhangs' => $khachhang]);
    }

    public function daxoa()
    {
        //Hiển thị danh sách Tài khoản đã xóa
        $khachhang = Khachhang::where('khachhangs.id_trangthai', 0)
            ->join('users', 'users.id', 'khachhangs.id_nhanvienquanly')
            ->select('khachhangs.*', 'users.name')
            ->orderBy('id', 'asc')
            ->get();

        return view('admin.khachhang.index', ['khachhangs' => $khachhang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.khachhang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Kiểm tra thông tin đầu vào
        $validated = $request->validate([
            'tenkhachhang' => 'required',
            'sodienthoai' => 'required|unique:App\Models\Khachhang,sodienthoai',
            'email' => 'required',
            'diachi' => 'required',
        ]);


        //Tạo Khách hàng mới
        $khachhang = new Khachhang;
        $khachhang->tenkhachhang = $request->tenkhachhang;
        $khachhang->sodienthoai = $request->sodienthoai;
        $khachhang->email = $request->email;
        $khachhang->diachi = $request->diachi;
        $khachhang->lienhekhac = $request->lienhekhac;
        $khachhang->id_nhanvienquanly = Auth::id();
        $khachhang->id_trangthai = 1;
        $khachhang->save();

        return redirect()->action([KhachhangController::class, 'show'], ['id' => $khachhang->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Hiển thị thông tin Khách hàng
        $khachhang = Khachhang::where('khachhangs.id', $id)
            ->join('users', 'users.id', 'khachhangs.id_nhanvienquanly')
            ->select('khachhangs.*', 'users.name')
            ->first();
        return view('admin.khachhang.show', ['khachhang' => $khachhang]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $khachhang = Khachhang::find($id);
        $nhanvien = User::select('id', 'name')
            ->where('id_loainhanvien', '>', 1)
            ->where('id_trangthai', 1)
            ->get();

        return view('admin.khachhang.edit', ['khachhang' => $khachhang, 'nhanviens' => $nhanvien]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Kiểm tra thông tin đầu vào
        $validated = $request->validate([
            'tenkhachhang' => 'required',
            'sodienthoai' => 'required',    //|unique:App\Models\Khachhang,sodienthoai
            'diachi' => 'required',
        ]);

        //Cập nhật thông tin Nhân viên
        $khachhang = Khachhang::find($id);
        $khachhang->tenkhachhang = $request->tenkhachhang;
        $khachhang->sodienthoai = $request->sodienthoai;
        $khachhang->diachi = $request->diachi;
        $khachhang->lienhekhac = $request->lienhekhac;
        $khachhang->id_nhanvienquanly = $request->id_nhanvienquanly;
        $khachhang->save();

        return redirect()->action([KhachhangController::class, 'show'], ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $khachhang = Khachhang::find($id);
        $khachhang->id_trangthai = 0;
        $khachhang->save();

        return back();
    }

    public function restore($id)
    {
        $khachhang = Khachhang::find($id);
        $khachhang->id_trangthai = 1;
        $khachhang->save();

        return back();
    }
}