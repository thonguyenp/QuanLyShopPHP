<div class="modal fade" id="liton_wishlist_modal-<?php echo e($product->id); ?>" tabindex="-1" aria-labelledby="wishlistModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow rounded-3">
      <div class="modal-body d-flex align-items-center">
        <img src="<?php echo e($product->image_url); ?>" alt="product" width="70" height="70" class="rounded me-3">
        <div class="flex-grow-1">
          <h6 class="mb-1 fw-semibold"><?php echo e($product->name); ?></h6>
          <p class="mb-2 text-success"><i class="bi bi-check-circle-fill"></i> Successfully added to your Wishlist</p>
          <a href="<?php echo e(route('wishlist.index')); ?>" class="btn btn-primary rounded-pill fw-semibold">Xem Wishlist</a>
        </div>
        <button type="button" class="btn-close ms-2" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    </div>
  </div>
</div>
<?php /**PATH E:\laragon\www\QuanLyShop\resources\views/clients/components/modals/liton_wishlist_modal.blade.php ENDPATH**/ ?>