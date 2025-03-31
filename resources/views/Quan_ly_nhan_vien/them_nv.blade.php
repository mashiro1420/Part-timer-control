<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Thêm nhân viên</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/ql_nv.css') }}">
</head>
<body>
    <!-- Navbar -->
    @include('components.navbar')

    <div class="container">
        <div class="card p-4"> <h4 class="mb-4">Thêm nhân viên mới</h4>
            <form>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="ho_ten" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" id="ho_ten" placeholder="Nhập họ tên đầy đủ" required>
                    </div>
                    <div class="col-md-3">
                        <label for="ca_mac_dinh" class="form-label">Ca mặc định</label>
                        <select class="form-select" id="ca_mac_dinh" required>
                            <option selected disabled value="">Chọn ca làm...</option>
                            <option value="Ca Sáng">Ca Sáng</option>
                            <option value="Ca Chiều">Ca Chiều</option>
                            <option value="Ca Tối">Ca Tối</option>
                            <option value="Hành chính">Hành chính</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="gioi_tinh" class="form-label">Giới tính</label>
                        <select class="form-select" id="gioi_tinh" required>
                            <option selected disabled value="">Chọn giới tính...</option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                            <option value="Khác">Khác</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="ngay_vao_lam" class="form-label">Ngày vào làm</label>
                        <input type="date" class="form-control" id="ngay_vao_lam" required>
                    </div>
                    <div class="col-md-4">
                        <label for="ngay_nghi_viec" class="form-label">Ngày nghỉ việc</label>
                        <input type="date" class="form-control" id="ngay_nghi_viec">
                        <div class="form-text">Để trống nếu nhân viên đang làm việc.</div>
                    </div>
                    <div class="col-md-4">
                        <label for="chuc_vu" class="form-label">Chức vụ</label>
                        <input type="text" class="form-control" id="chuc_vu" placeholder="Nhập chức vụ" required>
                    </div>

                    <div class="col-md-4">
                        <label for="cmnd" class="form-label">Số CMND/CCCD</label>
                        <input type="text" class="form-control" id="cmnd" placeholder="Nhập số CMND/CCCD" required>
                    </div>
                    <div class="col-md-4">
                        <label for="ngay_cap" class="form-label">Ngày cấp</label>
                        <input type="date" class="form-control" id="ngay_cap" required>
                    </div>
                    <div class="col-md-4">
                        <label for="noi_cap" class="form-label">Nơi cấp</label>
                        <input type="text" class="form-control" id="noi_cap" placeholder="Nhập nơi cấp CMND/CCCD" required>
                    </div>

                    <div class="col-md-4">
                        <label for="quoc_tich" class="form-label">Quốc tịch</label>
                        <input type="text" class="form-control" id="quoc_tich" placeholder="VD: Việt Nam" value="" required>
                    </div>
                    <div class="col-md-4">
                        <label for="dan_toc" class="form-label">Dân tộc</label>
                        <input type="text" class="form-control" id="dan_toc" placeholder="VD: Kinh" value="">
                    </div>
                    <div class="col-md-4">
                        <label for="ton_giao" class="form-label">Tôn giáo</label>
                        <input type="text" class="form-control" id="ton_giao" placeholder="VD: Không" value="">
                    </div>

                </div>


                <div class="d-flex justify-content-end gap-2 mt-4"> <button type="button" class="btn btn-secondary"> <i class="fas fa-arrow-left me-1"></i> Quay lại
                    </button>
                    <button type="submit" class="btn btn-primary"> <i class="fas fa-plus me-1"></i> Thêm nhân viên
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>