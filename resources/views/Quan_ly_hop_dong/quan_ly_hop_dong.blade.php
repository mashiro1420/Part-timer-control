<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quản lý hợp đồng</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/ql_hd.css') }}">
</head>
<body>
    <!-- Navbar -->
    @include('components.navbar')

    <div class="container">
        <!-- Search Section -->
        <div class="search-section">
            <h4 class="mb-3">Tìm kiếm hợp đồng</h4>
            <form>
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="employeeId" class="form-label">Mã nhân viên</label>
                        <input type="text" class="form-control" id="employeeId" placeholder="Nhập mã nhân viên">
                    </div>
                    <div class="col-md-3">
                        <label for="startDate" class="form-label">Ngày bắt đầu</label>
                        <input type="date" class="form-control" id="startDate">
                    </div>
                    <div class="col-md-3">
                        <label for="endDate" class="form-label">Ngày kết thúc</label>
                        <input type="date" class="form-control" id="endDate">
                    </div>
                    <div class="col-md-3">
                        <label for="state" class="form-label">Trạng thái</label>
                        <select class="form-select" id="state">
                            <option value="">Tất cả trạng thái</option>
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
                    <a href="{{url('them_hd')}}" class="btn btn-success ms-auto">
                        <i class="fas fa-plus me-1"></i> Thêm mới
                    </a>
                </div>
            </form>
        </div>

        <!-- Table Section -->
        <div class="table-section">
            <h4 class="mb-3">Danh sách hợp đồng</h4>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Mã nhân viên</th>
                            <th scope="col">Ngày bắt đầu</th>
                            <th scope="col">Ngày kết thúc</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">File</th>
                            <th scope="col" class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">HD001</th>
                            <td>NV001</td>
                            <td>01/01/2024</td>
                            <td>31/12/2024</td>
                            <td><span class="badge badge-infinity">Vô thời hạn</span></td>
                            <td><a href="#" class="file-link"><i class="fas fa-file-pdf me-1"></i>HD_NV001.pdf</a></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary action-btn">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger action-btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">HD002</th>
                            <td>NV002</td>
                            <td>15/02/2024</td>
                            <td>15/02/2025</td>
                            <td><span class="badge badge-active">Đang có hiệu lực</span></td>
                            <td><a href="#" class="file-link"><i class="fas fa-file-pdf me-1"></i>HD_NV002.pdf</a></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary action-btn">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger action-btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">HD003</th>
                            <td>NV003</td>
                            <td>01/03/2024</td>
                            <td>-</td>
                            <td><span class="badge badge-pending">Chưa có hiệu lực</span></td>
                            <td><a href="#" class="file-link"><i class="fas fa-file-pdf me-1"></i>HD_NV003.pdf</a></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary action-btn">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger action-btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">HD004</th>
                            <td>NV004</td>
                            <td>01/01/2023</td>
                            <td>31/12/2023</td>
                            <td><span class="badge badge-expired">Hết hiệu lực</span></td>
                            <td><a href="#" class="file-link"><i class="fas fa-file-pdf me-1"></i>HD_NV004.pdf</a></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary action-btn">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger action-btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">HD005</th>
                            <td>NV005</td>
                            <td>15/03/2024</td>
                            <td>15/09/2024</td>
                            <td><span class="badge badge-active">Đang có hiệu lực</span></td>
                            <td><a href="#" class="file-link"><i class="fas fa-file-pdf me-1"></i>HD_NV005.pdf</a></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary action-btn">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger action-btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>