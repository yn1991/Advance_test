<?php if($paginator->hasPages()): ?>
<div class="paginationWrap">
    <ul class="pagination" role="navigation">
        
        <?php if($paginator->onFirstPage()): ?>
            <li  aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
                «
            </li>
        <?php else: ?>
            <li>
                <a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">«</a>
            </li>
        <?php endif; ?>

        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if(is_string($element)): ?>
                <li aria-disabled="true"><?php echo e($element); ?></li>
            <?php endif; ?>

            
            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <li aria-current="page"><a class="active" href="#"><?php echo e($page); ?></a></li>
                    <?php else: ?>
                        <li><a href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($paginator->hasMorePages()): ?>
            <li>
                <a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">»</a>
            </li>
        <?php else: ?>
            <li aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
            »
            </li>
        <?php endif; ?>
    </ul>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\laravelpj\resources\views/vendor/pagination/default.blade.php ENDPATH**/ ?>