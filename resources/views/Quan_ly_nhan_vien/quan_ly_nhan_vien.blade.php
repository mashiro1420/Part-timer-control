<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Quản lý nhân viên</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/ql_nv.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- Navbar -->
    @include('components.navbar')

    <div class="container">
        <div class="search-section">
            <h4 class="mb-3">Tìm kiếm nhân viên</h4>
            <form>
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label for="searchHoTen" class="form-label">Họ tên</label>
                        <input type="text" class="form-control" id="searchHoTen" placeholder="Nhập họ tên">
                    </div>
                    <div class="col-md-4">
                        <label for="searchCaMacDinh" class="form-label">Ca mặc định</label>
                        <select class="form-select" id="searchCaMacDinh">
                            <option value="">Tất cả</option>
                            <option value="Ca Sáng">Ca Sáng</option>
                            <option value="Ca Chiều">Ca Chiều</option>
                            <option value="Ca Tối">Ca Tối</option>
                            <option value="Hành chính">Hành chính</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="searchGioiTinh" class="form-label">Giới tính</label>
                        <select class="form-select" id="searchGioiTinh">
                            <option value="">Tất cả</option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                            <option value="Khác">Khác</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="searchNgayVaoLam" class="form-label">Ngày vào làm</label>
                        <input type="date" class="form-control" id="searchNgayVaoLam">
                    </div>
                    <div class="col-md-4">
                        <label for="searchNgayNghiViec" class="form-label">Ngày nghỉ việc</label>
                        <input type="date" class="form-control" id="searchNgayNghiViec">
                    </div>
                    <div class="col-md-4">
                        <label for="searchChucVu" class="form-label">Chức vụ</label>
                        <input type="text" class="form-control" id="searchChucVu" placeholder="Nhập chức vụ">
                    </div>

                    <div class="col-md-4">
                        <label for="searchCMND" class="form-label">Số CMND/CCCD</label>
                        <input type="text" class="form-control" id="searchCMND" placeholder="Nhập số CMND/CCCD">
                    </div>
                    <div class="col-md-2">
                        <label for="searchQuocTich" class="form-label">Quốc tịch</label>
                        <input type="text" class="form-control" id="searchQuocTich" placeholder="VD: Việt Nam">
                    </div>
                    <div class="col-md-2">
                        <label for="searchDanToc" class="form-label">Dân tộc</label>
                        <input type="text" class="form-control" id="searchDanToc" placeholder="VD: Kinh">
                    </div>
                    <div class="col-md-4">
                        <label for="searchTonGiao" class="form-label">Tôn giáo</label>
                        <input type="text" class="form-control" id="searchTonGiao" placeholder="VD: Không">
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
                        <tr class="table-light"> <th scope="col">ID</th>
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
                        <tr>
                            <th scope="row">NV001</th>
                            <td>Nguyễn Văn A</td>
                            <td>Hành chính</td>
                            <td>Nam</td>
                            <td>2023-01-15</td>
                            <td>-</td>
                            <td>Lập trình viên</td>
                            <td>Việt Nam</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning action-btn" title="Sửa">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger action-btn" title="Xóa">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">NV002</th>
                            <td>Trần Thị B</td>
                            <td>Ca Sáng</td>
                            <td>Nữ</td>
                            <td>2023-03-01</td>
                            <td>-</td>
                            <td>Nhân viên Kinh doanh</td>
                            <td>Việt Nam</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning action-btn" title="Sửa">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger action-btn" title="Xóa">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">NV003</th>
                            <td>Lê Văn C</td>
                            <td>Ca Chiều</td>
                            <td>Nam</td>
                            <td>2022-11-10</td>
                            <td>2024-12-31</td>
                            <td>Nhân viên Kho</td>
                            <td>Việt Nam</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning action-btn" title="Sửa">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger action-btn" title="Xóa">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">NV004</th>
                            <td>Phạm Thị D</td>
                            <td>Hành chính</td>
                            <td>Nữ</td>
                            <td>2024-02-20</td>
                            <td>-</td>
                            <td>Kế toán</td>
                            <td>Việt Nam</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning action-btn" title="Sửa">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger action-btn" title="Xóa">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>

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