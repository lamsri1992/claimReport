@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        <i class="fa-solid fa-clipboard-list"></i>
                        รายงานค่ารักษาพยาบาล
                    </h5>
                    <div class="row card-category">
                        <div class="col-md-3 text-center">
                            <span>
                                <i class="fa-regular fa-calendar-check"></i>
                                {{ DateThai($_REQUEST['start']) ." ถึง ".DateThai($_REQUEST['end']) }}
                            </span>
                        </div>
                        <div class="col-md-3">
                            <i class="fa-regular fa-square-check"></i>
                            <span>สิทธิ์ที่เลือก</span>
                            <ul>
                                @foreach ($splan as $plan)
                                    <li>{{ $plan->contract_plans_description }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <i class="fa-regular fa-rectangle-xmark"></i>
                            <span>ICD10 ที่คัดออก</span>
                            @php $icd = explode(",",$icds); @endphp
                            <ul>
                                @foreach ($icd as $res)
                                    <li>{{ $res }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-3 text-center">
                            <i class="fa-regular fa-hospital"></i>
                            <span>ประเภทผู้ป่วย : </span>
                            @if ($_REQUEST['vtype'] == 0)
                            <span class="badge badge-success">ผู้ป่วยนอก</span>
                            @else
                            <span class="badge badge-info">ผู้ป่วยใน</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="tableExport" class="table table-borderless table-striped">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th>วันที่เข้ารับบริการ</th>
                                <th>หมายเลข 13 หลัก</th>
                                <th>HN</th>
                                <th>สิทธิ์รักษา</th>
                                <th class="text-left">ผู้ป่วย</th>
                                <th>เพศ</th>
                                <th>อายุ</th>
                                <th>ICD10</th>
                                <th>ค่ารักษาพยาบาล</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $cost = 0; @endphp
                            @foreach ($data as $res)
                            @php $cost += $res->visit_cost @endphp
                            <tr class="text-center">
                                <td>{{ $res->visit_date }}</td>
                                <td>{{ $res->visit_pid }}</td>
                                <td>{{ $res->visit_hn }}</td>
                                <td>{{ $res->visit_plan }}</td>
                                <td class="text-left">{{ $res->visit_patient }}</td>
                                <td>{{ $res->visit_gender }}</td>
                                <td>{{ $res->visit_age }}</td>
                                <td>{{ $res->visit_icd10 }}</td>
                                <td class="text-right">{{ number_format($res->visit_cost,2)." ฿" }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="font-weight-bold">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center">
                                    รวมค่ารักษาพยาบาล
                                </td>
                                <td class="text-right">
                                    {{ number_format($cost,2)." ฿" }}
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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
