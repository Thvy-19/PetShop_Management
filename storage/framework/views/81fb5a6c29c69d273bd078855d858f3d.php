<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Cửa hàng thú cưng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card:hover {
            transform: scale(1.03);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease-in-out;
            z-index: 2;
        }

        .card {
            transition: all 0.3s ease-in-out;
        }

        .card:hover .btn {
            background-color: #198754;
            border-color: #198754;
            transform: scale(1.05);
        }

        .card-img-top {
            max-height: 200px;
            object-fit: contain;
            font-size: 0.875rem;
        }

        .card:hover .card-img-top {
            transform: scale(1.05);
        }

        .carousel-img {
            height: 400px;
            width: 100%;
            object-fit: cover;
            background-color: #f8f9fa;
        }

        .logo-img {
            height: 40px;
            width: auto;
            margin-right: 10px;
        }
    </style>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between align-items-center py-2">
        <a class="navbar-brand d-flex align-items-center gap-2" href="#">
            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" class="logo-img">
            <span class="fw-bold fs-4 text-white">PetShop</span>
        </a>
        <ul class="navbar-nav d-flex flex-row gap-3 align-items-center mb-0">
            <li class="nav-item">
                <a class="nav-link <?php echo e(request()->is('/') ? 'text-info' : 'text-white'); ?>" href="#">Trang chủ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Đăng xuất</a>
            </li>
        </ul>
    </div>
</nav>

<div class="w-100">
    <div id="petCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo e(asset('images/banner1.jpg')); ?>" class="d-block carousel-img" alt="Banner 1">
            </div>
            <div class="carousel-item">
                <img src="<?php echo e(asset('images/banner2.jpg')); ?>" class="d-block carousel-img" alt="Banner 2">
            </div>
            <div class="carousel-item">
                <img src="<?php echo e(asset('images/banner3.jpg')); ?>" class="d-block carousel-img" alt="Banner 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#petCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#petCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>

<div class="container">
    <h2 class="mb-4 text-center d-flex justify-content-center align-items-center gap-2">
    🛒 <span>Danh sách sản phẩm</span>
</h2>
    <div class="row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <?php if($product->image): ?>
                        <img src="<?php echo e(asset('images/' . $product->image)); ?>" class="card-img-top" alt="Ảnh sản phẩm">
                    <?php else: ?>
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Không có ảnh">
                    <?php endif; ?>
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title"><?php echo e($product->name); ?></h5>
                            <p class="card-text"><?php echo e(Str::limit($product->description, 80)); ?></p>
                            <p class="text-success fw-bold"><?php echo e(number_format($product->price, 0, ',', '.')); ?> VND</p>
                        </div>
                        <div class="text-center mt-3">
                            <a href="<?php echo e(route('user.buy', $product->id)); ?>" class="btn btn-primary d-block mx-auto text-center">
                                🛍️ Mua ngay
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php if($products->isEmpty()): ?>
        <div class="alert alert-warning text-center">Không có sản phẩm nào để hiển thị.</div>
    <?php endif; ?>
</div>
<footer class="text-center text-light py-3 mt-4 bg-dark">
    &copy; <?php echo e(date('Y')); ?> <span class="fw-bold">PetShop</span> - All rights reserved.
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\webnc\PetShop_Management\resources\views/user/home.blade.php ENDPATH**/ ?>