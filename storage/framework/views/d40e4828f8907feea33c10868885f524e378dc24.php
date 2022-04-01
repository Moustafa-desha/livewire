<div>
        <?php if(session()->has('message_success')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('message_success')); ?>

            </div>

        <?php elseif(session()->has('message_error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo e(session('message_error')); ?>

                </div>
        <?php endif; ?>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <b>Posts</b>
                        <a href="javascript:void(0);" wire:click="create_post" class="btn btn-primary btn-sm" style="float: right">Create Post</a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Owner</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><img src="<?php echo e(asset("assets/images/$post->image")); ?>" style="width: 150px;height: 100px;display: block;"></img></td>
                                        <td>
                                            <a href="javascript:void(0);" wire:click="show_post(<?php echo e($post->id); ?>)" style="text-decoration: none">
                                                <?php echo e(str_limit($post->title ,$limit = 30)); ?>

                                            </a>
                                        </td>
                                        <td><?php echo e($post->user->name); ?></td>
                                        <td><?php echo e($post->category->name); ?></td>
                                        <td>
                                            <a href="javascript:void(0);" wire:click="edit_post(<?php echo e($post->id); ?>);" class="btn btn-info btn-sm">Edit</a>
                                            <a href="javascript:void(0);" wire:click="delete_post(<?php echo e($post->id); ?>);" class="btn btn-danger btn-sm"
                                               onclick="confirm('Are You Sure?'); return false;">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <span class="alert-danger"> No Post's Found </span>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <div style="float: right">
                            <?php echo e($posts->links()); ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>


</div>
<?php /**PATH D:\xampp\htdocs\Laravel_Project\livewire\resources\views/livewire/posts.blade.php ENDPATH**/ ?>