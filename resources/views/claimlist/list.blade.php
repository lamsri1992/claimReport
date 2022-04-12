@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        <i class="fa-solid fa-clipboard text-secondary"></i>
                        รายการเคลมรอดำเนินการ
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
                                <th class="text-center">
                                    <i class="fa-solid fa-bars"></i>
                                </th>
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
                                <td class="text-center">
                                    <a href="{{ route('claim.confirm',$res->id) }}" class="btn btn-success btn-sm">
                                        <i class="fa-solid fa-circle-check"></i>
                                    </a>
                                    <a href="{{ route('claim.decline',$res->id) }}" class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="font-weight-bold">
                                <td class="text-right" colspan="5">
                                    รวมค่ารักษาพยาบาล
                                </td>
                                <td class="text-left" colspan="5">
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
<script>

</script>
@endsection
