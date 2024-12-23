<?php echo $__env->make('components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #D1D1D1;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="card-title text-black">Tagihan:</h3>
            <a href="<?php echo e(route('iuran.create')); ?>" class="btn btn-primary">Create New Tagihan</a>
        </div>
        <div class="col grid-margin stretch-card">
            <div class="card" style="background-color: #2A2A2A;">
                <div class="card-body">
                <div class="mb-4">
                    <div class="mb-4 d-flex justify-content-between align-items-center">
                    <form action="<?php echo e(route('iuran.index')); ?>" method="GET" class="">
                        <select name="per_page" onchange="this.form.submit()" class="form-control text-white">
                            <option value="10" <?php echo e(request('per_page') == 10 ? 'selected' : ''); ?>>Show 10</option>
                            <option value="25" <?php echo e(request('per_page') == 25 ? 'selected' : ''); ?>>Show 25</option>
                            <option value="50" <?php echo e(request('per_page') == 50 ? 'selected' : ''); ?>>Show 50</option>
                            <option value="100" <?php echo e(request('per_page') == 100 ? 'selected' : ''); ?>>Show 100</option>
                        </select>
                    </form>

                    <form action="<?php echo e(route('iuran.index')); ?>" method="GET" class="d-flex align-items-center">
                        <input type="text" name="search" class="form-control" placeholder="Cari iuran..." value="<?php echo e(request('search')); ?>" onfocus="this.style.backgroundColor='#2A3038'; this.style.color='#ffffff';">
                        <button type="submit" class="btn btn-primary ml-2">Search</button>
                    </form>
                </div>

                <table class="table table-hover text-white">
                    <thead>
                        <tr style="background-color: #D1D1D1;">
                            <th style="color: black;">No</th>
                            <th style="color: black;">
                                <a href="<?php echo e(route('iuran.index', array_merge(request()->all(), ['sort_by' => 'tahun', 'order' => request('order') === 'asc' ? 'desc' : 'asc']))); ?>" style="color: black;   text-decoration: none!important;">
                                    Tahun <span class="mdi mdi-arrow-expand
                                <?php echo e(request('order') === 'asc' ? 'asc' : 'desc'); ?>"></span>
                                </a>
                            </th>
                            <th style="color: black;">
                                <a href="<?php echo e(route('iuran.index', array_merge(request()->all(), ['sort_by' => 'jumlah', 'order' => request('order') === 'asc' ? 'desc' : 'asc']))); ?>" style="color: black;   text-decoration: none!important;">
                                Jumlah <span class="mdi mdi-arrow-expand
                                <?php echo e(request('order') === 'asc' ? 'asc' : 'desc'); ?>"></span>
                                </a>
                            </th>
                            <th style="color: black;">Keterangan</th>
                            <th style="color: black;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $iuran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr onclick="location.href='<?php echo e(route('iuran.show', $item->id)); ?>'" style="cursor: pointer;">
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($item->tahun); ?></td>
                            <td><?php echo e('Rp ' . number_format($item->jumlah, 0, ',', '.')); ?></td>
                            <td><?php echo e($item->keterangan); ?></td>
                            <td>
                                <a href="<?php echo e(route('iuran.edit', $item->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                                <form action="<?php echo e(route('iuran.destroy', $item->id)); ?>" method="POST" style="display: inline-block;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus iuran ini?')">Delete</button>
                                </form>
                                <a href="<?php echo e(route('iuran.enroll', $item->id)); ?>" class="btn btn-sm btn-primary">Enroll</a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php if($iuran->isEmpty()): ?>
                <p class="text-center text-muted mt-3">Tidak ada iuran yang tersedia.</p>
                <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            <?php echo e($iuran->links('pagination::bootstrap-4')); ?>

        </div>
    </div>
        <!-- Footer -->
        <footer class="footer" style="background-color: #2A2A2A; padding: 10px 0;">
            <div class="container text-center">
                <span class="text-muted d-block text-white">Copyright © digikom.com <?php echo e(date('Y')); ?></span>
                <span class="text-muted d-block text-white">All Rights Reserved</span>
            </div>
        </footer>
</div>

<?php /**PATH /home/azrayaal/Downloads/digikom/be/resources/views/pages/iuran/index.blade.php ENDPATH**/ ?>