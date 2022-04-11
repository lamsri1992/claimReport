@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa-solid fa-hospital-user text-warning"></i>
                            </div>
                        </div>
                        @php $op_cost = 0; @endphp
                        @foreach ($opd as $cost) 
                            @php $op_cost += $cost->visit_cost @endphp
                        @endforeach
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">ค่ารักษาผู้ป่วยนอก</p>
                                <p class="card-title" style="font-size: 1.5rem;">
                                    {{ number_format($op_cost,2) }} ฿
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="stats"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa-solid fa-bed text-primary"></i>
                            </div>
                        </div>
                        @php $ip_cost = 0; @endphp
                        @foreach ($ipd as $cost) 
                            @php $ip_cost += $cost->visit_cost @endphp
                        @endforeach
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">ค่ารักษาผู้ป่วยใน</p>
                                <p class="card-title" style="font-size: 1.5rem;">
                                    {{ number_format($ip_cost,2) }} ฿
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="stats"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa-solid fa-pills text-success"></i>
                            </div>
                        </div>
                        @foreach ($phopd as $cost) @endforeach
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">ค่ายาผู้ป่วยนอก</p>
                                <p class="card-title" style="font-size: 1.5rem;">
                                    {{ number_format($cost->cost,2) }} ฿
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="stats"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa-solid fa-clipboard-list text-secondary"></i>
                            </div>
                        </div>
                        @foreach ($phipd as $cost) @endforeach
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">ค่ายาผู้ป่วยใน</p>
                                <p class="card-title" style="font-size: 1.5rem;">
                                    {{ number_format($cost->cost,2) }} ฿
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="stats"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        <i class="fa-solid fa-file-invoice-dollar text-secondary"></i>
                        รายงานลูกหนี้ค้างชำระ สิทธิ์เบิกได้จ่ายตรง
                        <span class="badge badge-danger">
                            {{ count($list) }} ราย
                        </span>
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless table-striped tableExport">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th>วันที่</th>
                                <th>ประเภท</th>
                                <th>CID</th>
                                <th>HN</th>
                                <th>สิทธิ์รักษา</th>
                                <th class="text-left">ผู้ป่วย</th>
                                <th>อายุ</th>
                                <th>ICD10</th>
                                <th>ค่ารักษา</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $cost = 0; @endphp
                            @foreach ($list as $res)
                            @php $cost += $res->visit_cost @endphp
                            <tr class="text-center">
                                <td>{{ $res->visit_date }}</td>
                                <td>
                                    {{ ($res->visit_type == 0) ? 'OPD':'IPD' }}
                                </td>
                                <td>{{ $res->visit_pid }}</td>
                                <td>{{ $res->visit_hn }}</td>
                                <td>{{ $res->visit_plan }}</td>
                                <td class="text-left">{{ $res->visit_patient }}</td>
                                <td>{{ $res->visit_age }}</td>
                                <td>{{ $res->visit_icd10 }}</td>
                                <td class="text-right">{{ number_format($res->visit_cost,2) }} ฿</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="font-weight-bold">
                                <td class="text-right" colspan="4">
                                    รวมลูกหนี้ค้างชำระ
                                </td>
                                <td class="text-left" colspan="5">
                                    {{ number_format($cost,2) }} ฿
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="stats"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection
