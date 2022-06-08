<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="#" class="simple-text logo-normal">
            <div class="logo-image-small">
                <img src="{{ asset('img/wc_logo_1.png') }}">
            </div>
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
                    <p style="font-size: 0.85rem;">รายการรอตรวจสอบ</p>
                </a>
            </li>
            <li class="{{ request()->is('claim*') ? 'active':'' }}">
                <a href="{{ url('claim') }}">
                    <i class="fa-solid fa-list-check"></i>
                    <p style="font-size: 0.85rem;">ข้อมูลรายการเคลม</p>
                </a>
            </li>
            <li class="{{ request()->is('covid*') ? 'active':'' }}">
                <a href="{{ url('covid') }}">
                    <i class="fa-solid fa-virus-covid"></i>
                    <p style="font-size: 0.85rem;">ข้อมูลเคลม Covid-19</p>
                </a>
            </li>
            <li>
                <a href="{{ url('http://172.20.55.254:8850/RPClient/index/') }}" target="_blank">
                    <i class="fa-solid fa-file-lines"></i>
                    <p style="font-size: 0.85rem;">Report Center</p>
                </a>
            </li>
            <li>
                <a href="{{ url('https://www.newcb.ktb.co.th/#/') }}" target="_blank">
                    <i class="fa-solid fa-money-check-dollar"></i>
                    <p style="font-size: 0.85rem;">Report KTB</p>
                </a>
            </li>
        </ul>
    </div>
</div>