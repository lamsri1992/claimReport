<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper/assets/img/logo-small.png') }}">
            </div>
        </a>
        <a href="#" class="simple-text logo-normal">
            Watchan Claim
        </a>
    </div>
    <div class="sidebar-wrapper" style="overflow: hidden;">
        <ul class="nav">
            <li class="{{ request()->is('/') ? 'active':'' }}">
                <a href="/">
                    <i class="fa-solid fa-chart-line"></i>
                    <p style="font-size: 1rem;">หน้าหลัก</p>
                </a>
            </li>
            <li class="{{ request()->is('report*') ? 'active':'' }}">
                <a href="{{ url('report') }}">
                    <i class="fa-regular fa-clipboard"></i>
                    <p style="font-size: 1rem;">ดึงข้อมูลรายงาน</p>
                </a>
            </li>
        </ul>
    </div>
</div>