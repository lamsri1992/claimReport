@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <h6>
                <i class="fa-solid fa-chart-line text-secondary"></i>
                สรุปยอดรายการเคลมค่ารักษาพยาบาล
            </h6>
        </div>
        <div class="col-lg-3">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa-solid fa-clipboard text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">ทั้งหมด</p>
                                <p class="card-title" style="font-size: 2rem;">
                                    {{ count($all) }}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="card-footer">
                    <div class="text-center">
                        <a href="#">รายละเอียด</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa-solid fa-spinner fa-spin text-info"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">รอดำเนินการ</p>
                                <p class="card-title" style="font-size: 2rem;">
                                    {{ $wait }}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="card-footer">
                    <div class="text-center">
                        <a href="#">รายละเอียด</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa-solid fa-clipboard-check text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">ดำเนินการแล้ว</p>
                                <p class="card-title" style="font-size: 2rem;">
                                   {{ $res }}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="card-footer">
                    <div class="text-center">
                        <a href="#">รายละเอียด</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa-solid fa-circle-exclamation text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">ค้างชำระ</p>
                                <p class="card-title" style="font-size: 2rem;">
                                    {{ count($list) }}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="card-footer">
                    <div class="text-center">
                        <a href="#">รายละเอียด</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h6>
                <i class="fa-solid fa-clipboard-list text-secondary"></i>
                รายงานข้อมูลการรับบริการแยกตามสิทธิ์
            </h6>
            <div class="card">
                <div class="card-body">
                    <table class="table table-borderless table-striped tableExport">
                        <thead class="thead-dark">
                            <tr>
                                <th>สิทธิ์รักษา</th>
                                <th class="text-center">จำนวนครั้ง(ผู้ป่วยใน)</th>
                                <th class="text-center">จำนวนครั้ง(ผู้ป่วยนอก)</th>
                                <th class="text-center">จำนวนผู้ป่วย(ผู้ป่วยใน)</th>
                                <th class="text-center">จำนวนผู้ป่วย(ผู้ป่วยนอก)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $ipd = 0; $opd = 0; @endphp
                            @foreach ($report as $res)
                            {{-- @php $ipd = count($res->count_patient_ipd) @endphp --}}
                            {{-- @php $opd = count($res->count_patient_opd) @endphp --}}
                            <tr>
                                <td>{{ $res->contract_plans_description }}</td>
                                <td class="text-center">{{ $res->count_visit_ipd }}</td>
                                <td class="text-center">{{ $res->count_visit_opd }}</td>
                                <td class="text-center">{{ $res->count_patient_ipd }}</td>
                                <td class="text-center">{{ $res->count_patient_opd }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="font-weight-bold">
                                <td></td>
                                <td class="text-center">
                                    <i class="fa-solid fa-bed"></i>
                                    ผู้ป่วยในทั้งหมด : {{ $ipd }} คน
                                </td>
                                <td class="text-center">
                                    <i class="fa-solid fa-hospital-user"></i>
                                    ผู้ป่วยนอกทั้งหมด : {{ $opd }} คน
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <h6>
                <i class="fa-solid fa-file-invoice-dollar text-secondary"></i>
                รายงานลูกหนี้ค้างชำระ
            </h6>
            <div class="card">
                <div class="card-body">
                    <table class="table table-borderless table-striped tableExport">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th>วันที่รับบริการ</th>
                                <th>HN</th>
                                <th>สิทธิ์รักษา</th>
                                <th class="text-left">ผู้ป่วย</th>
                                <th>ค่ารักษา</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $cost = 0; @endphp
                            @foreach ($list as $res)
                            @php $cost += $res->visit_cost @endphp
                            <tr class="text-center">
                                <td>{{ $res->visit_date }}</td>
                                <td>{{ $res->visit_hn }}</td>
                                <td>{{ $res->visit_plan }}</td>
                                <td class="text-left">{{ $res->visit_patient }}</td>
                                <td class="text-right">{{ number_format($res->visit_cost,2) }} ฿</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="font-weight-bold">
                                <td class="text-right" colspan="3">
                                    รวมลูกหนี้ค้างชำระ
                                </td>
                                <td class="text-left" colspan="2">
                                    {{ number_format($cost,2) }} ฿
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection
