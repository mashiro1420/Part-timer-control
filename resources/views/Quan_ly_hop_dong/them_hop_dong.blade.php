<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Thêm hợp đồng</title>
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
      <div class="card p-4"> <h4 class="mb-4">Thêm hợp đồng mới</h4>
          <form action="{{ url('xl_them_hd') }}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="col-md-3">
                  <label for="nhan_vien" class="form-label">Mã nhân viên</label>
                  <select class="form-select" name="nhan_vien">
                    @foreach ($nhan_viens as $nhan_vien)
                        <option value="{{ $nhan_vien->id }}" >{{ $nhan_vien->id." - ".$nhan_vien->ho_ten }}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-md-3">
                  <label for="tu_ngay" class="form-label">Ngày hiệu lực</label>
                  <input type="date" class="form-control" name="tu_ngay" >
              </div>
              <div class="col-md-3">
                  <label for="den_ngay" class="form-label">Ngày hết hiệu lực</label>
                  <input type="date" class="form-control" name="den_ngay" >
              </div>
                <div class="mb-4"> 
                  <label for="file_hd" class="form-label">Tải lên File hợp đồng</label>
                  <input class="form-control" type="file" name="file_hd" id="file_hd" accept=".pdf,.doc,.docx">
                <div class="form-text">Chỉ chấp nhận file .pdf, .doc, .docx.</div>
              </div>
              <div class="d-flex justify-content-end gap-2"> 
                  <a href="{{route('ql_hd')}}" class="btn btn-secondary">
                      <i class="fas fa-arrow-left me-1"></i> Quay lại
                  </a>
                  <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i> Thêm hợp đồng
                  </button>
              </div>
          </form>
      </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>