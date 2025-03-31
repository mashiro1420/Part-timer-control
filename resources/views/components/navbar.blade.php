<nav class="navbar navbar-expand-lg navbar-light sticky-top mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">
            <div class="d-flex align-items-center">
                <div class="d-flex align-items-center justify-content-center me-2" style="width: 2rem; height: 2rem; background-color: var(--primary); border-radius: 0.5rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-person-workspace" viewBox="0 0 16 16">
                        <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                        <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z"/>
                    </svg>
                </div>
                <span>Quản lý nhân sự</span>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('ql_tk')}}">Quản lý tài khoản</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('ql_hd')}}">Quản lý hợp đồng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('ql_nv')}}">Quản lý nhân viên</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('ql_dv')}}">Quản lý đầu việc</a>
                </li>
            </ul>
        </div>
    </div>
</nav>