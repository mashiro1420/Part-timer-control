<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Quản lý nhân viên</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ql_nv.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- Navbar -->
    @include('components.navbar')

    <div class="container">
        <div class="search-section">
            <h4 class="mb-3">Tìm kiếm nhân viên</h4>
            <form action="{{ route('ql_nv') }}">
                @csrf
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label for="ho_ten_tk" class="form-label">Họ tên</label>
                        <input type="text" class="form-control" name="ho_ten_tk" value="{{ !empty($ho_ten_tk)?$ho_ten_tk:"" }}" placeholder="Nhập họ tên">
                    </div>
                    <div class="col-md-4">
                        <label for="ca_tk" class="form-label">Ca mặc định</label>
                        <select class="form-select" name="ca_tk">
                            <option value="">Tất cả</option>
                            @foreach ($cas as $ca)
                                <option value="{{ $ca->id }}" {{!empty($ca_tk)&&$ca_tk==$ca->id?"selected":""}}>{{ $ca->ten_ca }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="gioi_tinh_tk" class="form-label">Giới tính</label>
                        <select class="form-select" name="gioi_tinh_tk">
                            <option value="">Tất cả</option>
                            <option value="Nam" {{!empty($gioi_tinh_tk)&&$gioi_tinh_tk=="Nam"?"selected":""}}>Nam</option>
                            <option value="Nữ" {{!empty($gioi_tinh_tk)&&$gioi_tinh_tk=="Nữ"?"selected":""}}>Nữ</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="ngay_vao_lam_tk" class="form-label">Ngày vào làm</label>
                        <input type="date" class="form-control" value="{{ !empty($ngay_vao_lam_tk)?$ngay_vao_lam_tk:"" }}" name="ngay_vao_lam_tk">
                    </div>
                    <div class="col-md-2">
                        <label for="trang_thai_tk" class="form-label">Trạng thái</label>
                        <select class="form-select" name="trang_thai_tk">
                            <option value="">Tất cả</option>
                            <option value="active" {{!empty($trang_thai_tk)&&$trang_thai_tk=="active"?"selected":""}}>Đang làm</option>
                            <option value="inactive" {{!empty($trang_thai_tk)&&$trang_thai_tk=="inactive"?"selected":""}}>Đã nghỉ việc</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="chuc_vu_tk" class="form-label">Chức vụ</label>
                        <select class="form-select" name="chuc_vu_tk">
                            <option value="">Tất cả</option>
                            @foreach ($chuc_vus as $chuc_vu)
                                <option value="{{ $chuc_vu->id }}" {{!empty($chuc_vu_tk)&&$chuc_vu_tk==$chuc_vu->id?"selected":""}}>{{ $chuc_vu->ten_chuc_vu }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="cmnd_tk" class="form-label">Số CMND/CCCD</label>
                        <input type="text" class="form-control" value="{{ !empty($cmnd_tk)?$cmnd_tk:"" }}" name="cmnd_tk" placeholder="Nhập số CMND/CCCD">
                    </div>

                </div>
                <div class="d-flex mt-3 gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search me-1"></i> Tìm kiếm
                    </button>
                    <button type="reset" class="btn btn-outline-secondary">
                        <i class="fas fa-sync-alt me-1"></i> Làm mới
                    </button>
                    <a href="{{url('them_nv')}}" class="btn btn-success ms-auto">
                        <i class="fas fa-plus me-1"></i> Thêm mới
                    </a>
                </div>
            </form>
        </div>

        <div class="table-section">
            <h4 class="mb-3">Danh sách nhân viên</h4>
            <div class="table-responsive">
                <table class="table table-hover align-middle"> <thead>
                        <tr class="table-light"> 
                            <th scope="col">ID</th>
                            <th scope="col">Họ tên</th>
                            <th scope="col">Ca mặc định</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Ngày vào làm</th>
                            <th scope="col">Ngày nghỉ việc</th>
                            <th scope="col">Chức vụ</th>
                            <th scope="col">Quốc tịch</th>
                            <th scope="col" class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nhan_viens as $nhan_vien)
                            <tr>
                                <th scope="row">{{$nhan_vien->id}}</th>
                                <td>{{$nhan_vien->ho_ten}}</td>
                                <td>{{!empty($nhan_vien->Ca->ten_ca)?$nhan_vien->Ca->ten_ca:""}}</td>
                                <td>{{$nhan_vien->gioi_tinh}}</td>
                                <td>{{$nhan_vien->ngay_vao_lam}}</td>
                                <td>{{$nhan_vien->ngay_nghi_viec}}</td>
                                <td>{{$nhan_vien->ChucVu->ten_chuc_vu}}</td>
                                <td>{{$nhan_vien->quoc_tich}}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-warning action-btn" href="{{route('sua_nv',['id' => $nhan_vien->id])}}" title="Sửa">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <nav aria-label="Page navigation example" class="mt-4">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">&laquo;</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">&raquo;</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>