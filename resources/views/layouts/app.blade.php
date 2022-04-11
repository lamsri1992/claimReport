<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('paper/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('paper/assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Watchan Hospital - Claim Report</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('paper/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('paper/assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
    <link href="{{ asset('paper/assets/demo/demo.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome6/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/preload/preload.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/datepicker/jquery.datetimepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <div class="preloader">
        <div class="spinner"></div>
        <span id="loading-msg"></span>
    </div>
    <div class="wrapper">
        @include('layouts.side')
        <div class="main-panel">
            @include('layouts.head')
            @yield('content')
            @include('layouts.foot')
        </div>
    </div>
</body>

<script src="{{ asset('paper/assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('paper/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('paper/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('paper/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('paper/assets/js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('paper/assets/js/plugins/bootstrap-notify.js') }}"></script>
    <script src="{{ asset('paper/assets/js/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript"></script>
    <script src="{{ asset('paper/assets/demo/demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('vendor/datepicker/jquery.datetimepicker.full.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('vendor/preload/preload.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            demo.initChartsPages();
        });
    </script>
<script>
 // DATATABLES
 $(document).ready(function () {
    $('#tableBasic').dataTable({
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true,
        scrollX: true,
            oLanguage: {
            oPaginate: {
                sFirst: '<small>หน้าแรก</small>',
                sLast: '<small>หน้าสุดท้าย</small>',
                sNext: '<small>ถัดไป</small>',
                sPrevious: '<small>กลับ</small>'
            },
                sSearch: '<small><i class="fa fa-search"></i> ค้นหา</small>',
                sInfo: '<small>ทั้งหมด _TOTAL_ รายการ</small>',
                sLengthMenu: '<small>แสดง _MENU_ รายการ</small>',
                sInfoEmpty: '<small>ไม่มีข้อมูล</small>'
            },
        });
    });

    $(document).ready(function () {
        $('.tableExport').dataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            dom: '<"top"Blf>rt<"bottom"ip><"clear">',
            buttons: {
                buttons: [
                    {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i> พิมพ์',
                        className: 'btn btn-info',
                        footer: true
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fa fa-file-excel"></i> Excel',
                        className: 'btn btn-success',
                        footer: true
                    }
                ],
                dom: {
                    button: {
                        className: 'btn-sm'
                    }
                }
            },
            ordering: false,
            bLengthChange: false,
            oLanguage: {
                oPaginate: {
                    sFirst: '<small>หน้าแรก</small>',
                    sLast: '<small>หน้าสุดท้าย</small>',
                    sNext: '<small>ถัดไป</small>',
                    sPrevious: '<small>กลับ</small>'
                },
                sSearch: '<small><i class="fa fa-search"></i> ค้นหา</small>',
                sInfo: '<small>ทั้งหมด _TOTAL_ รายการ</small>',
                sLengthMenu: '<small>แสดง _MENU_ รายการ</small>',
                sInfoEmpty: '<small>ไม่มีข้อมูล</small>'
            },
        });
    });
            
    // SELECT2
    $(document).ready(function() {
        $('.basic-select2').select2({ 
            width: '100%',
            placeholder: 'กรุณาเลือก',
        });
    });

    $(document).ready(function() {
        $('.basic-multiple').select2({
            width: '100%',
            tags: false,
        });
    });

    // Disabled Sorting When Select
    $("select").on("select2:select", function (evt) {
    var element = evt.params.data.element;
    var $element = $(element);

    $element.detach();
    $(this).append($element);
    $(this).trigger("change");
    });

    // DATATIME_PICKER 
    $(function() {
        $.datetimepicker.setLocale('th');
        $(".basicDate").datetimepicker({
            format: 'Y-m-d',
            lang: 'th',
            timepicker: false,
        });
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>
@if($errors->any())
    <script>
        Swal.fire({
            title: 'พบข้อผิดพลาด',
            icon: 'warning',
            html: '<div class="text-left"><ul>@foreach ($errors->all() as $error)' +
                '<li>{{ $error }}</li>' +
                '@endforeach</ul></div>',
        })
    </script>
@endif
@if($message = Session::get('success'))
    <script>
        $(function() {
            var Toast = Swal.mixin({
                position: 'top-end',
                toast: true,
                showConfirmButton: false,
                timer: 10000
            });
                Toast.fire({
                icon: 'success',
                title: '{{ $message }}'
            })
        });
    </script>
@endif
@section('script')
@show

</html>
