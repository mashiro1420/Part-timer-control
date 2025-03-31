<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign In</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/dang_nhap.css') }}">
</head>
<body style="background-image: url('{{ asset('/imgs/signin_bg.jpg') }}')">
	<div class="container" id="signin_container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <h3 class="card-title text-center">
							<i class="fa-solid fa-paw"></i>
							Đăng nhập
							<i class="fa-solid fa-paw"></i>
						</h3>
                        <form>
                            <div class="mb-3">
                                <label for="email" class="form-label">Tài khoản</label>
                                <input type="text" class="form-control" id="tai_khoan" name="tai_khoan" placeholder="Nhập tài khoản của bạn">
                            </div>
                            <div class="mb-3">
                                <label for="mat_khau" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" id="mat_khau" placeholder="Nhập mật khẩu của bạn">
                            </div>
							<div class="button_container d-flex justify-content-center align-items-center">
								<button type="submit" class="btn btn-warning w-50">Đăng nhập</button>
							</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>