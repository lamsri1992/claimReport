@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
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
                                    {{ number_format($op_cost,2) }}
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
        <div class="col-lg-3 col-md-6 col-sm-6">
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
                                    {{ number_format($ip_cost,2) }}
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
        <div class="col-lg-3 col-md-6 col-sm-6">
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
                                    {{ number_format($cost->cost,2) }}
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
        <div class="col-lg-3 col-md-6 col-sm-6">
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
                                    {{ number_format($cost->cost,2) }}
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
            <div class="card ">
                <div class="card-header">
                    <h5 class="card-title">รายงานค่ารักษาพยาบาลแยกตามเดือน</h5>
                    <p class="card-category">ปีงบประมาณ 2565</p>
                </div>
                <div class="card-body">
                    <canvas id=chartHours width="400" height="100"></canvas>
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
