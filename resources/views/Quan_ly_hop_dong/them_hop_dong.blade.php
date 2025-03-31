<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Thêm hợp đồng</title>
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
      <div class="card p-4"> <h4 class="mb-4">Thêm hợp đồng mới</h4>
          <form>
                <div class="mb-3">
                  <label for="addEmployeeId" class="form-label">Mã nhân viên</label>
                  <input type="text" class="form-control" id="addEmployeeId" placeholder="Nhập mã nhân viên" required>
              </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="addStartDate" class="form-label">Ngày bắt đầu</label>
                        <input type="date" class="form-control" id="addStartDate" required>
                    </div>
                    <div class="col-md-6">
                      <label for="addEndDate" class="form-label">Ngày kết thúc</label>
                      <input type="date" class="form-control" id="addEndDate">
                      <div class="form-text">Để trống nếu là hợp đồng không xác định thời hạn.</div>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="addState" class="form-label">Trạng thái</label>
                  <select class="form-select" id="addState" required>
                      <option selected disabled value="">Chọn trạng thái...</option>
                  </select>
              </div>

                <div class="mb-4"> <label for="addFile" class="form-label">Tải lên File hợp đồng</label>
                  <input class="form-control" type="file" id="addFile" accept=".pdf,.doc,.docx">
                    <div class="form-text">Chỉ chấp nhận file .pdf, .doc, .docx.</div>
              </div>

              <div class="d-flex justify-content-end gap-2"> 
                  <a href="{{url('ql_hd')}}" class="btn btn-secondary">
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