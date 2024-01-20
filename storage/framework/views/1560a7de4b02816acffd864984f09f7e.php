



<?php $__env->startSection('main'); ?>
<div class="card mx-auto" style="max-width: 500px;">
    <div class="card-header">
      <h5 class="card-title">Créer une réclamation</h5>
    </div>
    <div class="card-body">
      <form method="POST" action="<?php echo e(route('create')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
          <label for="title">Titre</label>
          <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
          <label for="service_id">Service</label>
          <select class="form-control" id="service_id" name="service_id" required>
            <option value="">-- Sélectionner un service --</option>
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($service->id); ?>"><?php echo e($service->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
      </form>
    </div>
  </div>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\stage_projet\reclamation\reclamation_stage\resources\views/emp/create.blade.php ENDPATH**/ ?>