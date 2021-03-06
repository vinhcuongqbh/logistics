@extends('adminlte::page')

@section('title', 'Thêm mới Đơn hàng')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-3">
            <h1>ĐƠN HÀNG</h1>
        </div>
        <div class="col-sm-9">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="/admin/donhang/dmdangluukho">Đơn hàng</a></li>
                <li class="breadcrumb-item active">Tạo mới</li>
            </ol>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tạo Đơn hàng</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('donhang.store') }}" method="post"
                        id="donhang-create">
                        @csrf
                        {{-- Thông tin Hình thức gửi --}}
                        <div class="row">
                            <div class="col-sm-5" >
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label for="hinhthucgui" class="col-form-label">Vận tải</label>
                                    </div>
                                    <div class="col-9">
                                        <select id="hinhthucgui" name="hinhthucgui" class="form-control custom-select">
                                            @foreach ($hinhthucgui as $i)
                                                <option value="{{ $i->id }}">{{ $i->tenhinhthucgui }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        {{-- Thông tin Người gửi và Người nhận --}}
                        <div class="row justify-content-between">
                            {{-- Thông tin người nhận --}}
                            <div class="col-sm-5">
                                <div style="text-align: center">
                                    <label for="nguoigui">THÔNG TIN NGƯỜI GỬI</label>
                                </div>
                                <div class="form-group row">
                                    <div class="col-3 col-md-3">
                                        <label for="sodienthoainguoigui" class="col-form-label">Số ĐT</label>
                                    </div>
                                    <div class="col-6 col-md-7">
                                        <input type="tel" id="sodienthoainguoigui" name="sodienthoainguoigui"
                                            value="{{ old('sodienthoainguoigui') }}"
                                            class="form-control">
                                    </div>
                                    <div class="col-3 col-md-2">
                                        <button type="button" class="btn btn-block btn-primary" id="timKiemNguoiGui">TÌM
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label for="tennguoigui" class="col-form-label">Họ tên</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" id="tennguoigui" name="tennguoigui"
                                            value="{{ old('tennguoigui') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label for="diachinguoigui" class="col-form-label">Địa chỉ</label>
                                    </div>
                                    <div class="col-9">
                                        <textarea id="diachinguoigui" name="diachinguoigui" class="form-control"
                                            cols="2" style="resize: none">{{ old('diachinguoigui') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label for="emailnguoigui" class="col-form-label">Email</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="email" id="emailnguoigui" name="emailnguoigui"
                                            value="{{ old('emailnguoigui') }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            {{-- Thông tin người gửi --}}
                            <div class="col-sm-5">
                                <div style="text-align: center">
                                    <label for="nguoigui">THÔNG TIN NGƯỜI NHẬN</label>
                                </div>
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label for="sodienthoainguoinhan" class="col-form-label">Số ĐT</label>
                                    </div>
                                    <div class="col-6 col-md-7">
                                        <input type="tel" id="sodienthoainguoinhan" name="sodienthoainguoinhan"
                                            value="{{ old('sodienthoainguoinhan') }}"
                                            class="form-control">
                                    </div>
                                    <div class="col-3 col-md-2">
                                        <button type="button" class="btn btn-block btn-primary"
                                            id="timKiemNguoiNhan">TÌM
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label for="tennguoinhan" class="col-form-label">Họ tên</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" id="tennguoinhan" name="tennguoinhan"
                                            value="{{ old('tennguoinhan') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label for="diachinguoinhan" class="col-form-label">Địa chỉ</label>
                                    </div>
                                    <div class="col-9">
                                        <textarea id="diachinguoinhan" name="diachinguoinhan" class="form-control"
                                            rows="2" style="resize: none">{{ old('diachinguoinhan') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label for="emailnguoinhan" class="col-form-label">Email</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="email" id="emailnguoinhan" name="emailnguoinhan"
                                            value="{{ old('emailnguoinhan') }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        {{-- Thêm mới đơn hàng --}}
                        <div class="d-block">
                            {{-- Các nút Thêm, Sửa, Xóa --}}
                            <div class="form-group" style="margin-bottom: 5px;">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#create-modal" style="width: 60px;">THÊM
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" id="editRow" data-toggle="modal"
                                    data-target="#edit-modal" style="width: 60px; margin-left: 10px;" disabled>SỬA
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" id="deleteRow"
                                    style="width: 60px; margin-left: 10px;" disabled>XÓA
                                </button>
                            </div>
                            {{-- Table Danh sách mặt hàng --}}
                            <div id="donhang-table-div" class="form-group">
                                <table id="donhang-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th>STT</th>
                                            <th data-priority="1">Tên Mặt hàng</th>
                                            <th data-priority="2">Số lượng (cái)</th>
                                            <th data-priority="3">Khối lượng (kg)</th>
                                            <th>Kích thước</th>
                                            <th>Giá trị ước tính (VNĐ)</th>
                                            <th data-priority="4">Chi phí (VNĐ)</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr style="text-align: center">
                                            <th></th>
                                            <th>Tổng</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <td id="tongchiphi"
                                                style="text-align: right; padding-right:10px; text; font-weight: bold;">
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div id="tongkhoiluong" class="form-group">
                                <label for="tongkhoiluong">Tổng khối lượng đơn hàng (kg)</label>
                                <input type="number" step="0.01" id="tongkhoiluong" name="tongkhoiluong" value="{{ old('tongkhoiluong') }}" class="form-control">
                            </div>
                            <div id="ghichu" class="form-group">
                                <label for="ghichu">Ghi chú</label>
                                <input type="text" id="ghichu" name="ghichu" value="{{ old('ghichu') }}" class="form-control">
                            </div>
                            <div class="form-group justify-content-end">
                                <button type="submit" id="submitForm" class="btn btn-primary float-right">TẠO
                                    ĐƠN</button>
                            </div>
                        </div>
                        <input type="hidden" id="tongchiphi2" name="tongchiphi2">
                        <input type="hidden" id="chietkhau" name="chietkhau">
                        <input type="hidden" id="chiTietDonHang" name="chiTietDonHang">
                    </form>
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
<!-- /.container-fluid -->

{{-- Thêm mới mặt hàng --}}
<div class="modal fade" id="create-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm mới Mặt hàng</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-4">
                        <label for="tenmathang" class="col-form-label">Tên Mặt
                            hàng</label>
                    </div>
                    <div class="col-8">
                        <input type="text" id="tenmathang" list="danhmucmathang" class="form-control">
                        <datalist id="danhmucmathang">
                            @foreach ($dongiatinhtheosoluong as $danhmucmathang)
                            <option value="{{ $danhmucmathang->tenmathang }}" />
                            @endforeach
                        </datalist>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-4">
                        <label for="soluong" class="col-form-label">Số lượng
                            (cái)</label>
                    </div>
                    <div class="col-8">
                        <input type="number" id="soluong" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-4">
                        <label for="khoiluong" class="col-form-label">Khối lượng
                            (kg)</label>
                    </div>
                    <div class="col-8">
                        <input type="number" id="khoiluong" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-4">
                        <label for="kichthuoc" class="col-form-label">Kích thước</label>
                    </div>
                    <div class="col-8">
                        <input type="number" id="kichthuoc" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-4">
                        <label for="giatriuoctinh" class="col-form-label">Giá trị ước
                            tính (VNĐ)</label>
                    </div>
                    <div class="col-8">
                        <input type="text" id="giatriuoctinh" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-4">
                        <label for="chiphi" class="col-form-label">Chi phí (VNĐ)</label>
                    </div>
                    <div class="col-8">
                        <input type="text" id="chiphi" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary" id="addRow" data-dismiss="modal">Thêm mới</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

{{-- Sửa Mặt hàng --}}
<div class="modal fade" id="edit-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sửa Mặt hàng</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-4">
                        <label for="tenmathangEdit" class="col-form-label">Tên Mặt
                            hàng</label>
                    </div>
                    <div class="col-8">
                        <input type="text" id="tenmathangEdit" list="danhmucmathang" class="form-control">
                        <datalist id="danhmucmathang">
                            @foreach ($dongiatinhtheosoluong as $danhmucmathang)
                            <option value="{{ $danhmucmathang->tenmathang }}" />
                            @endforeach
                        </datalist>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-4">
                        <label for="soluongEdit" class="col-form-label">Số lượng
                            (cái)</label>
                    </div>
                    <div class="col-8">
                        <input type="number" id="soluongEdit" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-4">
                        <label for="khoiluongEdit" class="col-form-label">Khối lượng
                            (kg)</label>
                    </div>
                    <div class="col-8">
                        <input type="number" id="khoiluongEdit" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-4">
                        <label for="kichthuocEdit" class="col-form-label">Kích
                            thước</label>
                    </div>
                    <div class="col-8">
                        <input type="number" id="kichthuocEdit" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-4">
                        <label for="giatriuoctinhEdit" class="col-form-label">Giá trị
                            ước
                            tính (VNĐ)</label>
                    </div>
                    <div class="col-8">
                        <input type="text" id="giatriuoctinhEdit" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-4">
                        <label for="chiphiEdit" class="col-form-label">Chi phí
                            (VNĐ)</label>
                    </div>
                    <div class="col-8">
                        <input type="text" id="chiphiEdit" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="updateRow" data-dismiss="modal">Cập nhật</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@stop

@section('css')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="/vendor/fontawesome-free/css/all.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/vendor/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/vendor/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Theme style -->
{{-- <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.min.css"> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@stop

@section('js')
<script src="/vendor/jquery/jquery.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/vendor/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/vendor/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/vendor/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/vendor/jszip/jszip.min.js"></script>
<script src="/vendor/pdfmake/pdfmake.min.js"></script>
<script src="/vendor/pdfmake/vfs_fonts.js"></script>
<script src="/vendor/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/vendor/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/vendor/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- jquery-validation -->
<script src="/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="/vendor/jquery-validation/additional-methods.min.js"></script>
<!-- Page specific script -->

{{-- Tìm thông tin Người gửi --}}
<script>
    var khachhang = @json($khachhang);
    $('#timKiemNguoiGui').on('click', function() {
        var sodienthoaikhachhang = document.querySelector("#sodienthoainguoigui").value;
        if (sodienthoaikhachhang != null) {
            //var ketqua = khachhang.filter(e => e.sodienthoai.indexOf(sodienthoaikhachhang) > -1) || 0;
            var ketqua = khachhang.find(e => e.sodienthoai == sodienthoaikhachhang) || 0;
            document.querySelector("#tennguoigui").value = ketqua.tenkhachhang || null;
            document.querySelector("#diachinguoigui").value = ketqua.diachi || null;
            document.querySelector("#emailnguoigui").value = ketqua.email || null;
        }
    });
</script>

{{-- Tìm thông tin Người nhận --}}
<script>
    $('#timKiemNguoiNhan').on('click', function() {
        var sodienthoaikhachhang = document.querySelector("#sodienthoainguoinhan").value;
        if (sodienthoaikhachhang != null) {
            //var ketqua = khachhang.filter(e => e.sodienthoai.indexOf(sodienthoaikhachhang) > -1) || 0;
            var ketqua = khachhang.find(e => e.sodienthoai == sodienthoaikhachhang) || 0;
            document.querySelector("#tennguoinhan").value = ketqua.tenkhachhang || null;
            document.querySelector("#diachinguoinhan").value = ketqua.diachi || null;
            document.querySelector("#emailnguoinhan").value = ketqua.email || null;
        }
    });
</script>

<script>
    var chiTietDonHang = [];

    var rowIndex;

    jQuery.fn.dataTable.Api.register( 'sum()', function ( ) {
        return this.flatten().reduce( function ( a, b ) {
            x = a.toString().replaceAll(".","");
            y = b.toString().replaceAll(".","");
            return parseInt(x) + parseInt(y);
        }, 0 );
    } );

    $(document).ready(function() {
        //Start: Tạo Table Đơn hàng
        var donhangTable = $('#donhang-table').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "searching": false,
            "paging": false,
            "info": false,
            "language": {
                "search": "Tìm kiếm:",
                "emptyTable": "Không có dữ liệu phù hợp",
                "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
                "": "Hiển thị _START_ - _END_ trong tổng _TOTAL_ kết quả",
                "infoEmpty": "",
                "infoFiltered": "(Tìm kiếm trong tổng _MAX_ bản ghi)",
                "paginate": {
                    "first": "Đầu tiên",
                    "last": "Cuối cùng",
                    "next": "Sau",
                    "previous": "Trước"
                },
            },
            "columns": [
                {
                    "data": "stt",
                    "className": "dt-body-center",
                },
                {
                    "data": "tenmathang",
                    "className": "dt-body-left",
                },
                {
                    "data": "soluong",
                    "className": "dt-body-center",
                },
                {
                    "data": "khoiluong",
                    "className": "dt-body-center",
                },
                {
                    "data": "kichthuoc",
                    "className": "dt-body-center",
                    "responsivePriority": 5,
                },
                {
                    "data": "giatriuoctinh",
                    "className": "dt-body-center",
                },
                {
                    "data": "chiphi",
                    "className": "dt-body-right",
                }
            ],
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": "_all",
            }],
            "order": [
                [0, 'desc']
            ],
        });
        //End: Tạo Table Đơn hàng



        //Start: Tạo cột Số thứ tự
        donhangTable.on('order.dt search.dt', function() {
            donhangTable.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
        //End: Tạo cột Số thứ tự



        //Start: Lựa chọn row
        donhangTable.on('click', 'tbody tr', function() {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
                document.querySelector("#editRow").disabled = true;
                document.querySelector("#deleteRow").disabled = true;
            } else {
                donhangTable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
                document.querySelector("#editRow").disabled = false;
                document.querySelector("#deleteRow").disabled = false;
                rowIndex = donhangTable.row(this).index();
            }
        });
        //End: Lựa chọn row



        //Start: Thêm Row
        $('#addRow').on('click', function() {
            //Start: Lấy dữ liệu từ các input
            if (document.querySelector("#chiphi").value.replace(".","") > 0) {
            donhangTable.row.add({
                "stt": null,
                "tenmathang": document.querySelector("#tenmathang").value,
                "soluong": document.querySelector("#soluong").value,
                "khoiluong": document.querySelector("#khoiluong").value,
                "kichthuoc": document.querySelector("#kichthuoc").value,
                "giatriuoctinh": document.querySelector("#giatriuoctinh").value,
                "chiphi": document.querySelector("#chiphi").value,
            }).draw();

            lamtrongdulieu();
            }
        });
        //End: Thêm Row

        //Start: Sửa Row
        $('#editRow').on('click', function() {
            document.querySelector("#tenmathangEdit").value = donhangTable.row(rowIndex).data()
                .tenmathang;
            document.querySelector("#soluongEdit").value = donhangTable.row(rowIndex).data().soluong;
            document.querySelector("#khoiluongEdit").value = donhangTable.row(rowIndex).data()
                .khoiluong;
            document.querySelector("#kichthuocEdit").value = donhangTable.row(rowIndex).data()
                .kichthuoc;
            document.querySelector("#giatriuoctinhEdit").value = donhangTable.row(rowIndex).data()
                .giatriuoctinh;
            document.querySelector("#chiphiEdit").value = donhangTable.row(rowIndex).data().chiphi;
        });
        //End: Sửa Row

        //Start: Cập nhật Row
        $('#updateRow').on('click', function() {
            donhangTable.row(rowIndex).data({
                "stt": null,
                "tenmathang": document.querySelector("#tenmathangEdit").value,
                "soluong": document.querySelector("#soluongEdit").value,
                "khoiluong": document.querySelector("#khoiluongEdit").value,
                "kichthuoc": document.querySelector("#kichthuocEdit").value,
                "giatriuoctinh": document.querySelector("#giatriuoctinhEdit").value || null,
                "chiphi": document.querySelector("#chiphiEdit").value,
            }).draw();
        });
        //End: Cập nhật Row

        //Start: Xóa Row
        $('#deleteRow').click(function() {
            donhangTable.row('.selected').remove().draw(false);
            document.querySelector("#editRow").disabled = true;
            document.querySelector("#deleteRow").disabled = true;
        }); //End: Xóa row

        //Start: Tính chi chí
        var dongiatinhtheokhoiluong = @json($dongiatinhtheokhoiluong);
        var dongiatinhtheosoluong = @json($dongiatinhtheosoluong);
        var dongiahangcongkenh = @json($dongiahangcongkenh);

        var tinhChiPhi = function() {
            let soluong = document.querySelector("#soluong").value;
            let khoiluong = document.querySelector("#khoiluong").value;

            let e = document.getElementById("hinhthucgui");
            let hinhthucgui = e.options[e.selectedIndex].value;
            if (hinhthucgui == 1) {
                document.querySelector("#chiphi").value = "";

                if (soluong != 0 && khoiluong == "") {
                    let tenmathang = document.querySelector("#tenmathang").value;
                    let chiphi = soluong * parseInt(dongiatinhtheosoluong.find(e => e.tenmathang ==
                            tenmathang)?.dongiaduongkhong ||
                        0);
                    document.querySelector("#chiphi").value = chiphi.toLocaleString();
                }

                if (khoiluong != 0 && soluong == "") {
                    for (var i = 0; i < dongiatinhtheokhoiluong.length; i++) {
                        if (khoiluong < dongiatinhtheokhoiluong[i].khoiluongmax) {
                            dongia = dongiatinhtheokhoiluong[i].dongiaduongkhong;
                        }
                    }
                    let chiphi = khoiluong * parseInt(dongia || 0);
                    document.querySelector("#chiphi").value = chiphi.toLocaleString();
                }
            } else if (hinhthucgui == 2) {
                document.querySelector("#chiphi").value = "";

                if (soluong != 0 && khoiluong == "") {
                    let tenmathang = document.querySelector("#tenmathang").value;
                    let chiphi = soluong * parseInt(dongiatinhtheosoluong.find(e => e.tenmathang ==
                            tenmathang)?.dongiaduongbien ||
                        0);
                    document.querySelector("#chiphi").value = chiphi.toLocaleString();
                }

                if (khoiluong != 0 && soluong == "") {
                    for (var i = 0; i < dongiatinhtheokhoiluong.length; i++) {
                        if (khoiluong < dongiatinhtheokhoiluong[i].khoiluongmax) {
                            dongia = dongiatinhtheokhoiluong[i].dongiaduongbien;
                        }
                    }
                    let chiphi = khoiluong * parseInt(dongia || 0);
                    document.querySelector("#chiphi").value = chiphi.toLocaleString();
                }
            }
        }

        document.querySelector("#tenmathang").addEventListener('blur', tinhChiPhi);
        document.querySelector("#soluong").addEventListener('blur', tinhChiPhi);
        document.querySelector("#khoiluong").addEventListener('blur', tinhChiPhi);
        //End: Tính Chi Phí

        //Start: Tính Chi phí Edit
        var tinhChiPhiEdit = function() {
            let soluong = document.querySelector("#soluongEdit").value;
            let khoiluong = document.querySelector("#khoiluongEdit").value;

            let e = document.getElementById("hinhthucgui");
            let hinhthucgui = e.options[e.selectedIndex].value;
            if (hinhthucgui == 1) {
                document.querySelector("#chiphiEdit").value = "";

                if (soluong != 0 && khoiluong == "") {
                    let tenmathang = document.querySelector("#tenmathangEdit").value;
                    let chiphi = soluong * parseInt(dongiatinhtheosoluong.find(e => e.tenmathang ==
                            tenmathang)?.dongiaduongkhong ||
                        0);
                    document.querySelector("#chiphiEdit").value = chiphi.toLocaleString();
                }

                if (khoiluong != 0 && soluong == "") {
                    for (var i = 0; i < dongiatinhtheokhoiluong.length; i++) {
                        if (khoiluong < dongiatinhtheokhoiluong[i].khoiluongmax) {
                            dongia = dongiatinhtheokhoiluong[i].dongiaduongkhong;
                        }
                    }
                    let chiphi = khoiluong * parseInt(dongia || 0);
                    document.querySelector("#chiphiEdit").value = chiphi.toLocaleString();
                }
            } else if (hinhthucgui == 2) {
                document.querySelector("#chiphiEdit").value = "";

                if (soluong != 0 && khoiluong == "") {
                    let tenmathang = document.querySelector("#tenmathangEdit").value;
                    let chiphi = soluong * parseInt(dongiatinhtheosoluong.find(e => e.tenmathang ==
                            tenmathang)?.dongiaduongbien ||
                        0);
                    document.querySelector("#chiphiEdit").value = chiphi.toLocaleString();
                }

                if (khoiluong != 0 && soluong == "") {
                    for (var i = 0; i < dongiatinhtheokhoiluong.length; i++) {
                        if (khoiluong < dongiatinhtheokhoiluong[i].khoiluongmax) {
                            dongia = dongiatinhtheokhoiluong[i].dongiaduongbien;
                        }
                    }
                    let chiphi = khoiluong * parseInt(dongia || 0);
                    document.querySelector("#chiphiEdit").value = chiphi.toLocaleString();
                }
            }
        }

        document.querySelector("#tenmathangEdit").addEventListener('blur', tinhChiPhiEdit);
        document.querySelector("#soluongEdit").addEventListener('blur', tinhChiPhiEdit);
        document.querySelector("#khoiluongEdit").addEventListener('blur', tinhChiPhiEdit);
        //End: Tính Chi phí Edit

        //Start: Hàm tính tổng chi phí
        const tongchiphi = function() {
            document.querySelector("#tongchiphi").innerHTML = (donhangTable.column(6).data().sum()).toLocaleString();
        }
        //End: Hàm tính tổng chi phí

        //Start: Cập nhật lại Tổng Chi phí khi Table thay đổi
        donhangTable.on('draw', function() {
            tongchiphi();
        }).draw();
        //End: Cập nhật lại Tổng Chi phí khi Table thay đổi

        //Gán giá trị cho #chiTietDonHang, #chietkhau và #tongChiPhi2
        $('#submitForm').on('click', function() {
            var tilechietkhau = @json($tilechietkhau);
            document.querySelector("#chiTietDonHang").value = JSON.stringify(donhangTable.data().toArray());
            document.querySelector("#tongchiphi2").value = donhangTable.column(6).data().sum();
            document.querySelector("#chietkhau").value = donhangTable.column(6).data().sum()*tilechietkhau/100;  
        });

        //Start: Hàm làm trống dữ liệu input
        const lamtrongdulieu = function() {
            document.querySelector("#tenmathang").value = "";
            document.querySelector("#soluong").value = "";
            document.querySelector("#khoiluong").value = "";
            document.querySelector("#kichthuoc").value = "";
            document.querySelector("#giatriuoctinh").value = "";
            document.querySelector("#chiphi").value = "";
        }
        //End: Hàm làm trống dữ liệu input

    });
</script>

<script>
    //Kiểm tra dữ liệu đầu vào
    $(function() {
        $('#donhang-create').validate({
            rules: {
                sodienthoainguoigui: {
                    required: true,
                    number: true,
                },
                tennguoigui: {
                    required: true,
                },
                sodienthoainguoinhan: {
                    required: true,
                    number: true,
                },
                tennguoinhan: {
                    required: true,
                },
                diachinguoinhan: {
                    required: true,
                },
                tongchiphi: {
                    required: true,
                    min: 1,
                },
                tongkhoiluong: {
                    required: true,
                }

            },
            messages: {
                sodienthoainguoigui: {
                    required: "Nhập Số điện thoại của Người gửi",
                    number: "Nhập kiểu số",
                },
                tennguoigui: {
                    required: "Nhập Họ tên của Người gửi",
                },
                sodienthoainguoinhan: {
                    required: "Nhập Số điện thoại của Người nhận",
                    number: "Nhập kiểu số",
                },
                tennguoinhan: {
                    required: "Nhập Họ tên của Người nhận",
                },
                diachinguoinhan: {
                    required: "Nhập Địa chỉ của Người nhận",
                },
                tongchiphi: {
                    required: "Nhập Mặt hàng",
                },
                tongkhoiluong: {
                    required: "Nhập Tổng khối lượng đơn hàng",
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('div').append(error);

            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
@stop
