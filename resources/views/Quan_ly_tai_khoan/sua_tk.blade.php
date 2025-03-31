<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Sửa tài khoản</title>
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
      <div class="card p-4"> <h4 class="mb-4">Sửa tài khoản mới</h4>
          <form>
              <div class="mb-3">
                <label for="tai_khoan" class="form-label">Tài khoản</label>
                <input type="text" class="form-control" id="tai_khoan" value="" placeholder="Nhập tài khoản" readonly>
              </div>
              <div class="mb-3">
                <label for="ma_nhan_vien" class="form-label">Mã nhân viên</label>
                <input type="text" class="form-control" id="ma_nhan_vien" placeholder="Nhập mã nhân viên" required>
              </div>
              <div class="mb-3">
                <label for="mat_khau" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="mat_khau" placeholder="Nhập mật khẩu" required>
              </div>
              <div class="mb-3">
                <label for="id_quyen" class="form-label">Quyền</label>
                <select class="form-select" id="id_quyen" required>
                    <option selected disabled value="">Chọn quyền...</option>
                    <option value="1">Quản lý</option>
                </select>
              </div>
              <div class="d-flex justify-content-end gap-2"> 
                  <a href="{{url('ql_tk')}}" class="btn btn-secondary">
                      <i class="fas fa-arrow-left me-1"></i> Quay lại
                  </a>
                  <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-file-pen"></i> Sửa tài khoản
                  </button>
              </div>
          </form>
      </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>