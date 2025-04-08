<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quản lý hợp đồng</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ql_hd.css') }}">
</head>
<body>
    @include('components.navbar')

    <div class="container">
        <div class="search-section">
            <h4 class="mb-3">Tìm kiếm hợp đồng</h4>
            <form action="{{ route('ql_hd') }}" method="get">
                @csrf
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="id_hop_dong_tk" class="form-label">Mã nhân viên</label>
                        <input type="text" class="form-control" name="id_hop_dong_tk" value="{{ !empty($id_hop_dong_tk)?$id_hop_dong_tk:"" }}" placeholder="Nhập mã nhân viên">
                    </div>
                    <div class="col-md-3">
                        <label for="tu_ngay_tk" class="form-label">Ngày bắt đầu</label>
                        <input type="date" class="form-control" name="tu_ngay_tk" value="{{ !empty($tu_ngay_tk)?$tu_ngay_tk:"" }}">
                    </div>
                    <div class="col-md-3">
                        <label for="den_ngay_tk" class="form-label">Ngày kết thúc</label>
                        <input type="date" class="form-control" name="den_ngay_tk" value="{{ !empty($den_ngay_tk)?$den_ngay_tk:"" }}">
                    </div>
                    <div class="col-md-3">
                        <label for="trang_thai_tk" class="form-label">Trạng thái</label>
                        <select class="form-select" name="trang_thai_tk">
                            <option value="">Tất cả trạng thái</option>
                            @foreach ($trang_thais as $trang_thai)
                                <option value="{{ $trang_thai->id }}" {{ !empty($trang_thai_tk)&&$trang_thai_tk==$trang_thai->id?"selected":"" }}>{{ $trang_thai->ten_trang_thai }}</option>
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
                    <a href="{{route('them_hd')}}" class="btn btn-success ms-auto">
                        <i class="fas fa-plus me-1"></i> Thêm mới
                    </a>
                </div>
            </form>
        </div>
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
                        @foreach ($hop_dongs as $hop_dong)
                        <?php 
                        switch ($hop_dong->id_trang_thai) {
                            case 1:
                                $badge = "infinity";
                                break;
                            case 2:
                                $badge = "active";
                              break;
                            case 3:
                                $badge = "expired";
                              break;
                            default:
                                $badge = "pending";
                          } ?>
                            <tr>
                                <th scope="row">{{$hop_dong->id_hop_dong}}</th>
                                <td>{{$hop_dong->id_hop_dong." - ".$hop_dong->NhanVien->ho_ten}}</td>
                                <td>{{$hop_dong->tu_ngay}}</td>
                                <td>{{$hop_dong->den_ngay}}</td>
                                <td><span class="badge badge-{{$badge}}">{{$hop_dong->TrangThai->ten_trang_thai}}</span></td>
                                @if (!empty($hop_dong->link_hop_dong))
                                    <td><a href="{{ asset('Hop_dong_data'.$hop_dong->link_hop_dong) }}" download class="file-link"><i class="fas fa-file-pdf me-1"></i>Tải xuống</a></td>
                                @else
                                    <td>Không có file</td>
                                @endif
                                <td class="text-center">
                                    <a class="btn btn-sm btn-primary action-btn" href="{{route('sua_hd',['id' => $hop_dong->id_hop_dong])}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger action-btn" href="{{route('xoa_hd',['id' => $hop_dong->id_hop_dong])}}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                @if ($hop_dongs->onFirstPage())
                    <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                    </li>
                @else
                    <li class="page-item">
                    <a class="page-link" href="{{ $hop_dongs->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                    </li>
                @endif
                @foreach ($hop_dongs->getUrlRange(1, $hop_dongs->lastPage()) as $page => $url)
                    @if ($page == $hop_dongs->currentPage())
                    <li class="page-item active">
                        <a class="page-link" href="#">{{ $page }}</a>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                    @endif
                @endforeach
                @if ($hop_dongs->hasMorePages())
                    <li class="page-item">
                    <a class="page-link" href="{{ $hop_dongs->nextPageUrl() }}" aria-label="Next">
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