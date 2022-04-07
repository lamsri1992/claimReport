@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-dismissible fade show" role="alert" style="background-color: gray">
                <span class="font-weight-bold">
                    <i class="fa-solid fa-list-check"></i>
                    Todo List : รายการที่ต้องเคลมวันนี้ {{ count($ofc)+count($lgo) }} ราย
                </span>
                <ul>
                    <li>สิทธิ์เบิกได้จ่ายตรง {{ count($ofc) }} ราย</li>
                    <li>สิทธิ์เบิกได้จ่ายตรง (อปท.) {{ count($lgo) }} ราย</li>
                </ul>
                <a href="{{ url('todo/sendline') }}" class="btn btn-sm btn-success">
                    <i class="fa-brands fa-line"></i>
                    Send Line
                </a>
            </div>
            <div class="card-tp">
                <nav>
                    <div class="nav nav-pills" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-ofc-tab" data-toggle="tab" 
                        href="#nav-ofc" role="tab" aria-controls="nav-ofc" aria-selected="true">
                            สิทธิ์เบิกได้จ่ายตรง
                        </a>
                        <a class="nav-link" id="nav-lgo-tab" data-toggle="tab" 
                        href="#nav-lgo" role="tab" aria-controls="nav-lgo" aria-selected="false">
                            สิทธิ์เบิกได้จ่ายตรง (อปท.)
                        </a>
                    </div>
                </nav>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-ofc" role="tabpanel" aria-labelledby="nav-ofc-tab">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">
                                <i class="fa-solid fa-money-check"></i>
                                สิทธิ์เบิกได้จ่ายตรง
                            </h6>
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
                                        <th>เพศ</th>
                                        <th>อายุ</th>
                                        <th>ICD10</th>
                                        <th>ค่ารักษา</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $cost = 0; @endphp
                                    @foreach ($ofc as $res)
                                    @php $cost += $res->visit_cost @endphp
                                    <tr class="text-center">
                                        <td>{{ $res->visit_date }}</td>
                                        <td>
                                            @if ($res->p_type == 0)
                                            <span class="badge badge-success">
                                                ผู้ป่วยนอก
                                            </span>
                                            @else
                                            <span class="badge badge-danger">
                                                ผู้ป่วยใน
                                            </span>
                                            @endif
                                        </td>
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
                                        <td class="text-right" colspan="5">
                                            รวมค่ารักษาพยาบาล
                                        </td>
                                        <td class="text-left" colspan="5">
                                            {{ number_format($cost,2)." ฿" }}
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
                <div class="tab-pane fade" id="nav-lgo" role="tabpanel" aria-labelledby="nav-lgo-tab">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">
                                <i class="fa-solid fa-money-check"></i>
                                สิทธิ์เบิกได้จ่ายตรง (อปท.)
                            </h6>
                        </div>
                        <div class="card-body">
                            <table id="tableExport2" class="table table-borderless table-striped tableExport">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th>วันที่</th>
                                        <th>ประเภท</th>
                                        <th>CID</th>
                                        <th>HN</th>
                                        <th>สิทธิ์รักษา</th>
                                        <th class="text-left">ผู้ป่วย</th>
                                        <th>เพศ</th>
                                        <th>อายุ</th>
                                        <th>ICD10</th>
                                        <th>ค่ารักษา</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $cost = 0; @endphp
                                    @foreach ($lgo as $res)
                                    @php $cost += $res->visit_cost @endphp
                                    <tr class="text-center">
                                        <td>{{ $res->visit_date }}</td>
                                        <td>
                                            @if ($res->p_type == 0)
                                            <span class="badge badge-success">
                                                ผู้ป่วยนอก
                                            </span>
                                            @else
                                            <span class="badge badge-danger">
                                                ผู้ป่วยใน
                                            </span>
                                            @endif
                                        </td>
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
                                        <td class="text-right" colspan="5">
                                            รวมค่ารักษาพยาบาล
                                        </td>
                                        <td class="text-left" colspan="5">
                                            {{ number_format($cost,2)." ฿" }}
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
    </div>
</div>
@endsection
@section('script')

@endsection
