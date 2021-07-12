@extends('adminlte::page')

@section('title', 'Đơn hàng')

@section('content_header')

@stop

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ĐƠN HÀNG</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('donhang.xuatkho') }}" method="post" id="donhang-index">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-auto">
                                                <a href="{{ route('donhang.create') }}"><button type="button"
                                                        class="btn btn-primary float-left"
                                                        style="width: 100px; margin-right: 10px">THÊM
                                                        MỚI</button></a>
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-outline-success float-left"
                                                    style="width: 100px; margin-right: 10px">XUẤT KHO</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="donhang-table" class="table table-bordered table-striped">
                                        <thead style="text-align: center">
                                            <tr>
                                                <th>ID</th>
                                                <th>Chọn</th>
                                                <th>Người gửi</th>
                                                <th>Số điện thoại Người gửi</th>
                                                <th>Người nhận</th>
                                                <th>Số điện thoại Người nhận</th>
                                                <th>Tổng chi phí</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($donhangs as $donhang)
                                                <tr>
                                                    <td style="text-align: center"><a
                                                            href="{{ route('donhang.show', $donhang->id) }}">{{ $donhang->id }}</a>
                                                    </td>
                                                    <td style="text-align: center">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="id_donhangduocchon" value="{{ $donhang->id }}" name="id_donhangduocchon[]">
                                                        </div>
                                                    </td>
                                                    <td><a
                                                            href="{{ route('donhang.show', $donhang->id) }}">{{ $donhang->tennguoigui }}</a>
                                                    </td>
                                                    <td style="text-align: center"><a
                                                            href="{{ route('donhang.show', $donhang->id) }}">{{ $donhang->sodienthoainguoigui }}</a>
                                                    </td>
                                                    <td><a
                                                            href="{{ route('donhang.show', $donhang->id) }}">{{ $donhang->tennguoinhan }}</a>
                                                    </td>
                                                    <td style="text-align: center"><a
                                                            href="{{ route('donhang.show', $donhang->id) }}">{{ $donhang->sodienthoainguoinhan }}</a>
                                                    </td>
                                                    <td><a
                                                            href="{{ route('donhang.show', $donhang->id) }}">{{ $donhang->tongchiphi }}</a>
                                                    </td>
                                                    <td style="text-align: center">
                                                        <a href="{{ route('donhang.lichsudonhang', $donhang->id) }}"
                                                            style="padding: 3px">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('donhang.edit', $donhang->id) }}"
                                                            style="padding: 3px">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        @if ($donhang->id_trangthai > 0)
                                                            <a href="{{ route('donhang.delete', $donhang->id) }}"
                                                                onclick="return confirm('Bạn muốn xóa Đơn hàng này?')">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </a>
                                                        @else
                                                            <a href="{{ route('donhang.restore', $donhang->id) }}"
                                                                onclick="return confirm('Bạn muốn phục hồi Đơn hàng này?')">
                                                                <i class="fas fa-undo"></i>
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </form>
                        <!-- /.form -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/vendor/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/vendor/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/vendor/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.min.css">
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
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#donhang-table").DataTable({
                "responsive": true,
                "lengthChange": false,
                "lengthChange": true,
                "pageLength": 25,
                "autoWidth": false,
                "searching": true,
                //"buttons": ["copy", "excel", "pdf", "print", ]
            }).buttons().container().appendTo('#donhang-table_wrapper .col-md-6:eq(0)');
        });
    </script>
@stop