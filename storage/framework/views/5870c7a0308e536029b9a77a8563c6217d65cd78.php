<div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <b>Show Post</b>
                    <a href="javascript:void(0);" wire:click="posts" class="btn btn-primary btn-sm" style="float: right">Posts</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php if($post->image !== ''): ?>
                            <div class="col-12 text-center">
                                <img src="<?php echo e(asset('assets/images/'.$post->image)); ?>" class="img-fluid" style="max-width: 100%" alt="<?php echo e($post->title); ?>">
                            </div>
                        <?php endif; ?>
                        <div class="col-12 justify-content-center pt-5">
                            <h3><?php echo e($post->title); ?></h3>
                            <small><?php echo e($post->category->name); ?> || By: <?php echo e($post->user->name); ?></small>
                            <p> <?php echo $post->body; ?> } </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\xampp\htdocs\Laravel_Project\livewire\resources\views/livewire/show-post.blade.php ENDPATH**/ ?>