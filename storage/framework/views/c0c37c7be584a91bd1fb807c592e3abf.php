

<?php $__env->startSection('content'); ?>
<style>
    .checkout-card {
        max-width: 1000px;
        margin: 50px auto;
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }
    .checkout-title {
        font-size: 28px;
        font-weight: bold;
        color: #4f46e5;
        margin-bottom: 20px;
    }
    .order-total {
        font-size: 24px;
        color: #22c55e;
        font-weight: bold;
    }
    .btn-order {
        background-color: #22c55e;
        color: white;
        padding: 12px 20px;
        font-size: 16px;
        font-weight: 500;
        border: none;
        border-radius: 6px;
        transition: all 0.3s ease;
    }
    .btn-order:hover {
        background-color: #16a34a;
    }
</style>

<div class="checkout-card row">
    <div class="col-md-6">
        <h2 class="checkout-title">Thanh toán</h2>
        <form method="POST" action="#">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label class="form-label">Họ tên:</label>
                <input type="text" name="name" class="form-control" required value="<?php echo e(old('name')); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Số điện thoại:</label>
                <input type="text" name="phone" class="form-control" required value="<?php echo e(old('phone')); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Địa chỉ nhận hàng:</label>
                <textarea name="address" class="form-control" rows="4" required><?php echo e(old('address')); ?></textarea>
            </div>
            <button type="submit" class="btn-order w-100">Đặt hàng</button>
        </form>
    </div>

    <div class="col-md-6">
        <h2 class="checkout-title">Đơn hàng của bạn</h2>
        <ul class="list-group mb-3">
            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong><?php echo e($item['product']->name); ?></strong><br>
                        <small><?php echo e(number_format($item['product']->price, 0, ',', '.')); ?> VND x <?php echo e($item['quantity']); ?></small>
                    </div>
                    <span class="text-primary fw-bold">
                        <?php echo e(number_format($item['product']->price * $item['quantity'], 0, ',', '.')); ?> VND
                    </span>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <hr>
        <div class="text-end order-total">
            Tổng cộng: <?php echo e(number_format($total, 0, ',', '.')); ?> VND
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\webnc\PetShop_Management\resources\views/user/checkout.blade.php ENDPATH**/ ?>