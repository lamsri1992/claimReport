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
                    <p style="font-size: 0.85rem;">หน้าหลัก</p>
                </a>
            </li>
            <li class="{{ request()->is('report*') ? 'active':'' }}">
                <a href="{{ url('report') }}">
                    <i class="fa-solid fa-file-medical"></i>
                    <p style="font-size: 0.85rem;">ข้อมูลค่ารักษาพยาบาล</p>
                </a>
            </li>
            <li class="{{ request()->is('todo*') ? 'active':'' }}">
                <a href="{{ url('todo') }}">
                    <i class="fa-solid fa-clipboard-list"></i>
                    <p style="font-size: 0.85rem;">Todo List</p>
                </a>
            </li>
            <li>
                <a href="{{ url('http://172.20.55.254:8850/RPClient/index/') }}" target="_blank">
                    <i class="fa-solid fa-file-lines"></i>
                    <p style="font-size: 0.85rem;">Report Center</p>
                </a>
            </li>
        </ul>
    </div>
</div>