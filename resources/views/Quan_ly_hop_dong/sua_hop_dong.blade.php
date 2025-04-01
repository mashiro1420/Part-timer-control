<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Sửa hợp đồng mới</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ql_hd.css') }}">
</head>
<body>
    <!-- Navbar -->
    @include('components.navbar')
    <div class="container">
      <div class="card p-4"> <h4 class="mb-4">Sửa hợp đồng mới</h4>
          <form  action="{{ url('xl_sua_hd') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-3">
                <label for="id" class="form-label">Mã hợp đồng</label>
                <input type="text" class="form-control" name="id" value="{{ $hop_dong->id }}" readonly>
              </div>
              <div class="col-md-3">
                <label for="nhan_vien" class="form-label">Mã nhân viên</label>
                <input type="text" class="form-control" name="nhan_vien" value="{{ $hop_dong->NhanVien->id." - ".$hop_dong->NhanVien->ho_ten }}" readonly>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                  <label for="tu_ngay" class="form-label">Ngày hiệu lực</label>
                  <input type="date" class="form-control" value="{{ $hop_dong->tu_ngay }}" name="tu_ngay" required>
              </div>
              <div class="col-md-3">
                  <label for="den_ngay" class="form-label">Ngày hết hiệu lực</label>
                  <input type="date" class="form-control" value="{{ $hop_dong->den_ngay }}" name="den_ngay" required>
              </div>
            </div>
            <div class="col-md-3"> <label for="file_hd" class="form-label">Tải lên File hợp đồng</label>
              <input class="form-control" type="file" name="file_hd" accept=".pdf,.doc,.docx">
                <div class="form-text">Chỉ chấp nhận file .pdf, .doc, .docx.</div>
            </div>

              <div class="d-flex justify-content-end gap-2"> 
                  <a href="{{url('ql_hd')}}" class="btn btn-secondary"> 
                      <i class="fas fa-arrow-left me-1"></i> Quay lại
                  </a>
                  <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-file-pen"></i> Sửa hợp đồng
                  </button>
              </div>
          </form>
      </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>