<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Sửa tài khoản</title>
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
      <div class="card p-4"> <h4 class="mb-4">Đổi mật khẩu</h4>
          <form action="{{ url('xl_doi_mk') }}" method="post">
            @csrf
              <div class="mb-3">
                <label for="tai_khoan" class="form-label">Tài khoản</label>
                <input type="text" class="form-control" name="tai_khoan" value="{{ $tai_khoan->tai_khoan }}" placeholder="Nhập tài khoản" readonly>
              </div>
              <div class="mb-3">
                <label for="mk_cu" class="form-label">Mật khẩu cũ</label>
                <input type="password" class="form-control" name="mk_cu" placeholder="Nhập mật khẩu cũ" required>
              </div>
              <div class="mb-3">
                <label for="mk_moi" class="form-label">Mật khẩu mới</label>
                <input type="password" class="form-control" name="mk_moi" placeholder="Nhập mật khẩu mới" required>
              </div>
              <div class="mb-3">
                <label for="mk_lai" class="form-label">Xác nhận mật khẩu</label>
                <input type="password" class="form-control" name="mk_lai" placeholder="Nhập lại mật khẩu mới" required>
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