<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quản lý tài khoản</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ql_tk.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- Navbar -->
    @include('components.navbar')
    <div class="container">
        <!-- Search Section -->
        <div class="search-section">
            <h4 class="mb-3">Tìm kiếm tài khoản</h4>
            <form action="{{ route('ql_tk') }}" method="get">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="tai_khoan" class="form-label">Tên tài khoản</label>
                        <input type="text" class="form-control" name="tai_khoan" placeholder="Nhập tên tài khoản">
                    </div>
                    <div class="col-md-4">
                        <label for="nhan_vien" class="form-label">Họ tên</label>
                        <input type="text" class="form-control" name="ho_ten" placeholder="Nhập họ tên nhân viên">
                    </div>
                    <div class="col-md-4">
                        <label for="id_quyen" class="form-label">Quyền</label>
                        <select class="form-select" name="id_quyen">
                            <option value="">Tất cả quyền</option>
                            @foreach ($quyens as $quyen)
                                <option value="{{ $quyen->id }}">{{ $quyen->ten_quyen }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="d-flex mt-3 gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search me-1"></i> Tìm kiếm
                    </button>
                    <button type="reset" class="btn btn-outline-secondary">
                        <i class="fas fa-sync-alt me-1"></i> Làm mới
                    </button>
                    <a href="{{url('them_tk')}}" class="btn btn-success ms-auto">
                        <i class="fas fa-plus me-1"></i> Thêm mới
                    </a>
                </div>
            </form>
        </div>

        <!-- Table Section -->
        <div class="table-section">
            <h4 class="mb-3">Danh sách tài khoản</h4>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tài khoản</th>
                            <th scope="col">Tên nhân viên</th>
                            <th scope="col">Quyền</th>
                            <th scope="col" class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tai_khoans as $tai_khoan)
                        <?php $count++?>
                            <tr>
                                <th scope="row">{{$count}}</th>
                                <td>{{$tai_khoan->tai_khoan}}</td>
                                <td>{{!empty($tai_khoan->NhanVien->ho_ten)?$tai_khoan->NhanVien->ho_ten:""}}</td>
                                <td>{{!empty($tai_khoan->Quyen->ten_quyen)?$tai_khoan->Quyen->ten_quyen:""}}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-primary action-btn" href="{{route('sua_tk',['id' => $tai_khoan->tai_khoan])}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                @if ($tai_khoans->onFirstPage())
                    <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                    </li>
                @else
                    <li class="page-item">
                    <a class="page-link" href="{{ $tai_khoans->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                    </li>
                @endif
                @foreach ($tai_khoans->getUrlRange(1, $tai_khoans->lastPage()) as $page => $url)
                    @if ($page == $tai_khoans->currentPage())
                    <li class="page-item active">
                        <a class="page-link" href="#">{{ $page }}</a>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                    @endif
                @endforeach
                @if ($tai_khoans->hasMorePages())
                    <li class="page-item">
                    <a class="page-link" href="{{ $tai_khoans->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    </li>
                @else
                    <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    </li>
                @endif
                </ul>
            </nav>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>