<div class="modal fade" id="add_to_cart_modal-<?php echo e($product->id); ?>" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow rounded-3">
      <div class="modal-body d-flex align-items-center">
        <!-- Product image -->
        <img src="<?php echo e($product->image_url); ?>" 
             alt="<?php echo e($product->name); ?>" width="70" height="70" class="rounded me-3">

        <!-- Content -->
        <div class="flex-grow-1">
          <h6 class="mb-1 fw-semibold"><?php echo e($product->name); ?></h6>
          <p class="mb-2 text-success"><i class="bi bi-check-circle-fill"></i> Successfully added to your Cart</p>

          <!-- Buttons -->
          <div class="d-flex gap-2">
            <a href="<?php echo e(route('cart.index')); ?>">
              <button class="btn btn-primary btn-sm fw-semibold px-3">View Cart</button>
            </a>
            <button class="btn btn-dark btn-sm fw-semibold px-3">Checkout</button>
          </div>
        </div>

        <!-- Close button -->
        <button type="button" class="btn-close ms-2" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    </div>
  </div>
</div>
<?php /**PATH E:\laragon\www\QuanLyShop\resources\views/clients/components/modals/add_to_cart_modal.blade.php ENDPATH**/ ?>