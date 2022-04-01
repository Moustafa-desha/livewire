<?php if(session('message')): ?>

    <div class="alert alert-<?php echo e(session('alert-type')); ?> alert-dismissible fade show" role="alert" id="alert-session">

    <?php echo e(session('message')); ?>




    </div>

    <?php endif; ?>
<?php /**PATH D:\xampp\htdocs\Laravel_Project\livewire\resources\views/partial/flash.blade.php ENDPATH**/ ?>