

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>🛒 Giỏ hàng của bạn</h2>

    <?php if(session('success')): ?>
        <div style="color: green;"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if($cartItems->isEmpty()): ?>
        <p>Giỏ hàng của bạn đang trống.</p>
        <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary">Tiếp tục mua sắm</a>
    <?php else: ?>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $subtotal = $item->product->price * $item->quantity;
                        $total += $subtotal;
                    ?>
                    <tr>
                        <td><?php echo e($item->product->name); ?></td>
                        <td>
                            <?php if($item->product->image): ?>
                                <img src="<?php echo e(asset('storage/' . $item->product->image)); ?>" alt="" width="60">
                            <?php else: ?>
                                (Không có ảnh)
                            <?php endif; ?>
                        </td>
                        <td><?php echo e(number_format($item->product->price, 0, ',', '.')); ?> đ</td>
                        <td>
                            <form action="<?php echo e(route('cart.update', $item->id)); ?>" method="POST" style="display: inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <input type="number" name="quantity" value="<?php echo e($item->quantity); ?>" min="1" style="width: 60px;">
                                <button type="submit" class="btn btn-sm btn-secondary">Cập nhật</button>
                            </form>
                        </td>
                        <td><?php echo e(number_format($subtotal, 0, ',', '.')); ?> đ</td>
                        <td>
                            <form action="<?php echo e(route('cart.destroy', $item->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button onclick="return confirm('Xoá sản phẩm này?')" class="btn btn-sm btn-danger">Xoá</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-end"><strong>Tổng cộng:</strong></td>
                    <td colspan="2"><strong><?php echo e(number_format($total, 0, ',', '.')); ?> đ</strong></td>
                </tr>
            </tfoot>
        </table>
        <a href="<?php echo e(route('products.index')); ?>" class="btn btn-success">🛍 Tiếp tục mua sắm</a>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\unitop\Pet\pet\resources\views/cart/index.blade.php ENDPATH**/ ?>