<div class="btn btn-success mt-3 mobile-cart-total" style="background: #697b2b; border-color: #697b2b">
    <div onclick="window.location = '<?php echo e(route('carrinho')); ?>'" class="ml-2 mobile-cart-total-wrapper">
        <span style="font-size: 15px;">
            <i class="icofont-shopping-cart"></i>
        </span>
        R$ <?php echo e(number_format($total, 2, ',', '.')); ?>

    </div>

    <style>
        .mobile-cart-total {
            display: flex;
            float: right;
            max-height: 35px;
            min-width: 130px;
            margin-left: 10px;
        }

        .mobile-cart-total-wrapper {
            margin-left: 0 !important;
            width: 100%
        }
    </style>
</div>
<?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/livewire/site/carrinho_header_mobile.blade.php ENDPATH**/ ?>