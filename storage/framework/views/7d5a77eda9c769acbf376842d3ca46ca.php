

<?php $__env->startSection('main'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Services</li>
        </ol>
        <?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(session('success')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php if($errors->any()): ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
<?php endif; ?>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Employees</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/users">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Reclamations</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/recs">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Reclamations traiter</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/recT">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Reclamations encours</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/recEN">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Reclamations non traiter</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/recNO">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Services</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/servs">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Services
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>titre</th>
                            <th>description</th>
                            <th>action</th>
                            
                            
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>titre</th>
                            <th>description</th>
                            <th>action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                           
                            <td><?php echo e($service->name); ?></td>
                            <td><?php echo e($service->description); ?></td>
                         
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal<?php echo e($service->id); ?>">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?php echo e($service->id); ?>">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                               
                            </td>
                        </tr>
                       
<div class="modal fade" id="userModal<?php echo e($service->id); ?>" tabindex="-1" role="dialog" aria-labelledby="userModal<?php echo e($service->id); ?>Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModal<?php echo e($service->id); ?>Title"><?php echo e($service->name); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p onclick="show(<?php echo e($service->id); ?>)"style="cursor:pointer;"> <b> les employees de  <?php echo e($service->name); ?>:<?php echo e($service->users->where('type', 'emp')->count()); ?></b></p>
                <div id="reclamations-list-<?php echo e($service->id); ?>" style="display:none;">
                    <ul>
                        <?php $__currentLoopData = $service->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if( $user->type == "emp"): ?>
                        <li><?php echo e($user->username); ?></li>
                   <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>                                   
                <p onclick="show2(<?php echo e($service->id); ?>)"style="cursor:pointer;"> <b> les superviseurs de <?php echo e($service->name); ?>:<?php echo e($service->users->where('type', 'supervisor')->count()); ?></b></p>
                <div id="reclamations-list2-<?php echo e($service->id); ?>" style="display:none;">
                    <ul>
                        <?php $__currentLoopData = $service->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if( $user->type == "supervisor"): ?>
                             <li><?php echo e($user->username); ?></li>
                        <?php endif; ?>
                       
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <p onclick="show3(<?php echo e($service->id); ?>)"style="cursor:pointer;"> <b> les reclamations de <?php echo e($service->name); ?>:<?php echo e($service->reclamations->count()); ?></b></p>
                <div id="reclamations-list3-<?php echo e($service->id); ?>" style="display:none;">
                    <ul>
                        <?php $__currentLoopData = $service->reclamations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reclamation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     
                        <li><a href="<?php echo e(route('reclamation',$reclamation)); ?>"><?php echo e($reclamation->title); ?></a></li>
                 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>  
            </div>
        </div>
    </div>

    <script>
        function show(service) {
            var reclamationsListDiv = document.getElementById('reclamations-list-' + service);
            if (reclamationsListDiv.style.display == 'none') {
                reclamationsListDiv.style.display = 'block';
            } else {
                reclamationsListDiv.style.display = 'none';
            }
        }
    </script>
      <script>
        function show2(service) {
            var reclamationsListDiv = document.getElementById('reclamations-list2-' + service);
            if (reclamationsListDiv.style.display == 'none') {
                reclamationsListDiv.style.display = 'block';
            } else {
                reclamationsListDiv.style.display = 'none';
            }
        }
    </script>
      <script>
        function show3(service) {
            var reclamationsListDiv = document.getElementById('reclamations-list3-' + service);
            if (reclamationsListDiv.style.display == 'none') {
                reclamationsListDiv.style.display = 'block';
            } else {
                reclamationsListDiv.style.display = 'none';
            }
        }
    </script>
   
</div> 
<!-- Modal de modification de service -->
<div class="modal fade" id="editModal<?php echo e($service->id); ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo e($service->id); ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel<?php echo e($service->id); ?>">Modifier le service <?php echo e($service->name); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Ajouter le formulaire de modification pour ce service -->
                <form method="POST"  action="<?php echo e(route('services.update',$service)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group">
                        <label for="name">Titre</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name" value="<?php echo e(old('name', $service->name)); ?>" placeholder="Entrez le titre du service">
                        
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="description" name="description" rows="3" placeholder="Entrez la description du service"><?php echo e(old('description', $service->description)); ?></textarea>
                     
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>
             
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\save_project\reclamation_stage_part2\reclamation_stage_part1\reclamation_stage\resources\views/admin/service.blade.php ENDPATH**/ ?>