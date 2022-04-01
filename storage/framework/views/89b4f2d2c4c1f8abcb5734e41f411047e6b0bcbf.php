<div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <b>Edit Post</b>
                    <a href="javascript:void(0);" wire:click="posts" class="btn btn-primary btn-sm" style="float: right">Posts</a>
                </div>
                <div class="card-body">

                    <form wire:submit.prevent="update" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label for="title"> Title </label>
                            <input type="text"  name="title" wire:model="title" class="form-control">
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label for="category"> Category </label>
                            <select  name="category" wire:model="category" class="form-control">
                                <option>Choose Category</option>

                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cat->id); ?>" <?php echo e(old('category') == $cat->id ? 'selected' : ''); ?>> <?php echo e($cat->name); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"> <?php echo e($message); ?> </span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label for="body"> Body </label>
                            <textarea  name="body" class="form-control" wire:model="body"  rows="5">  </textarea>
                            <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"> <?php echo e($message); ?> </span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <?php if($this->image_original !== ''): ?>
                            <div class="form-group my-2">
                                <img src="<?php echo e(asset('assets/images/'.$this->image_original)); ?>" alt="<?php echo e($this->title); ?>" width="100px">
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="image"> Image </label>
                            <input type="file" value="<?php echo e($post->image); ?>" name="image" class="form-control" wire:model="image" >
                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"> <?php echo e($message); ?> </span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <button type="submit" name="save" class="btn btn-primary mt-4"> Add Post </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\xampp\htdocs\Laravel_Project\livewire\resources\views/livewire/edit-post.blade.php ENDPATH**/ ?>