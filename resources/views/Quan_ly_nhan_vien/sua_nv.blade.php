<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Sửa nhân viên</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ql_nv.css') }}">
</head>
<body>
    <!-- Navbar -->
    @include('components.navbar')

    <div class="container">
        <div class="card p-4"> <h4 class="mb-4">Sửa nhân viên mới</h4>
            <form action="{{ url('xl_sua_nv') }}" method="post">
                @csrf
                <div class="row g-3 mb-3">
                    <div class="col-md-2">
                        <label for="id" class="form-label">Mã nhân viên</label>
                        <input type="text" class="form-control" value="{{ $nhan_vien->id }}" name="id" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="ho_ten" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" value="{{ $nhan_vien->ho_ten }}" name="ho_ten" placeholder="Nhập họ tên đầy đủ" required>
                    </div>
                    <div class="col-md-4">
                        <label for="ca_mac_dinh" class="form-label">Ca mặc định</label>
                        <select class="form-select" name="ca_mac_dinh" required>
                            @foreach ($cas as $ca)
                                <option value="{{ $ca->id }}" {{ $nhan_vien->ca_mac_dinh==$ca->id?"selected":"" }}>{{ $ca->ten_ca }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="gioi_tinh" class="form-label">Giới tính</label>
                        <select class="form-select" name="gioi_tinh" required>
                            <option value="Nam" {{ $nhan_vien->ca_mac_dinh=="Nam"?"selected":"" }}>Nam</option>
                            <option value="Nữ" {{ $nhan_vien->ca_mac_dinh=="Nữ"?"selected":"" }}>Nữ</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="ngay_sinh" class="form-label">Ngày sinh</label>
                        <input type="date" class="form-control" value="{{ $nhan_vien->ngay_sinh }}" name="ngay_sinh" required>
                    </div>
                    <div class="col-md-4">
                        <label for="noi_sinh" class="form-label">Nơi sinh</label>
                        <input type="text" class="form-control" value="{{ $nhan_vien->noi_sinh }}" name="noi_sinh" placeholder="Nhập nơi sinh" required>
                    </div>
                    <div class="col-md-4">
                        <label for="ngay_vao_lam" class="form-label">Ngày vào làm</label>
                        <input type="date" class="form-control" value="{{ $nhan_vien->ngay_vao_lam }}" name="ngay_vao_lam" required>
                    </div>
                    <div class="col-md-4">
                        <label for="ngay_nghi_viec" class="form-label">Ngày nghỉ việc</label>
                        <input type="date" class="form-control" value="{{ $nhan_vien->ngay_nghi_viec }}" name="ngay_nghi_viec">
                    </div>
                    <div class="col-md-4">
                        <label for="chuc_vu" class="form-label">Chức vụ</label>
                        <select class="form-select" name="chuc_vu" required>
                            @foreach ($chuc_vus as $chuc_vu)
                                <option value="{{ $chuc_vu->id }}" {{ $nhan_vien->ca_mac_dinh==$chuc_vu->id?"selected":"" }}>{{ $chuc_vu->ten_chuc_vu }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="cmnd" class="form-label">Số CMND/CCCD</label>
                        <input type="text" class="form-control" value="{{ $nhan_vien->cmnd }}" name="cmnd" placeholder="Nhập số CMND/CCCD" required>
                    </div>
                    <div class="col-md-4">
                        <label for="ngay_cap" class="form-label">Ngày cấp</label>
                        <input type="date" class="form-control" value="{{ $nhan_vien->ngay_cap }}" name="ngay_cap" required>
                    </div>
                    <div class="col-md-4">
                        <label for="noi_cap" class="form-label">Nơi cấp</label>
                        <input type="text" class="form-control" value="{{ $nhan_vien->noi_cap }}" name="noi_cap" placeholder="Nhập nơi cấp CMND/CCCD" required>
                    </div>

                    <div class="col-md-4">
                        <label for="quoc_tich" class="form-label">Quốc tịch</label>
                        <input type="text" class="form-control" value="{{ $nhan_vien->quoc_tich }}" name="quoc_tich" placeholder="VD: Việt Nam" value="" required>
                    </div>
                    <div class="col-md-4">
                        <label for="dan_toc" class="form-label">Dân tộc</label>
                        <input type="text" class="form-control" value="{{ $nhan_vien->dan_toc }}" name="dan_toc" placeholder="VD: Kinh" value="">
                    </div>
                    <div class="col-md-4">
                        <label for="ton_giao" class="form-label">Tôn giáo</label>
                        <input type="text" class="form-control" value="{{ $nhan_vien->ton_giao }}" name="ton_giao" placeholder="VD: Không" value="">
                    </div>
                </div>
                <div class="d-flex justify-content-end gap-2 mt-4"> 
                    <a type="button" href="{{url('ql_nv')}}" class="btn btn-secondary"> <i class="fas fa-arrow-left me-1"></i> Quay lại
                    </a>
                    <button type="submit" class="btn btn-primary"> <i class="fa-solid fa-file-pen"></i> Sửa nhân viên
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>