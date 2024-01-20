

<?php $__env->startSection('main'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Utilisateurs</li>
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
                DataTable Example
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>username</th>
                            <th>role</th>
                            <th>service</th>
                            <th>cree a</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>username</th>
                            <th>role</th>
                            <th>service</th>
                            <th>cree a</th>
                            <th>action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($user->first_name); ?><?php if($user->type=='supervisor'): ?>
                                <i class="bi bi-person-check"></i>


                            <?php endif; ?></td>
                            <td><?php echo e($user->last_name); ?></td>
                            <td><?php echo e($user->username); ?></td>
                            <td><?php echo e($user->type); ?></td>
                            <td><?php echo e($user->service->name); ?> </td>
                            <td><?php echo e($user->created_at->format('h:i A, F d')); ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal<?php echo e($user->id); ?>">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Modal -->
                     <!-- Modal -->
<div class="modal fade" id="userModal<?php echo e($user->id); ?>" tabindex="-1" role="dialog" aria-labelledby="userModal<?php echo e($user->id); ?>Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModal<?php echo e($user->id); ?>Title"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               
                <?php if($user->type =='emp'): ?>
                    <p onclick="showReclamations(<?php echo e($user->id); ?>)"style="cursor:pointer;"> <b> Réclamations créées par <?php echo e($user->username); ?>:<?php echo e(App\Models\Reclamation::where('employee_id', $user->id)->count()); ?></b></p>
                <div id="reclamations-list-<?php echo e($user->id); ?>" style="display:none;">
                    <ul>
                        <?php $__currentLoopData = App\Models\Reclamation::where('employee_id', $user->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reclamation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(route('reclamation',$reclamation)); ?>"><?php echo e($reclamation->title); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <?php else: ?>
                <p onclick="showReclamations(<?php echo e($user->id); ?>)"style="cursor:pointer;"> <b> Réclamations traiter par <?php echo e($user->username); ?>:<?php echo e(App\Models\Reclamation::where('supervisor', $user->id)->count()); ?></b></p>
                <div id="reclamations-list-<?php echo e($user->id); ?>" style="display:none;">
                    <ul>
                        <?php $__currentLoopData = App\Models\Reclamation::where('supervisor', $user->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reclamation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(route('reclamation',$reclamation)); ?>"><?php echo e($reclamation->title); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <p onclick="showmains(<?php echo e($user->id); ?>)"style="cursor:pointer;"> <b> <?php echo e($user->username); ?> la main a:<?php echo e($user->mains->count()); ?> services</b></p>
                <div id="mains-list-<?php echo e($user->id); ?>" style="display:none;">
                    <ul>
                        <?php $__currentLoopData = $user->mains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $main): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($main->service->name); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
                
            </div>
        </div>
    </div>

    <script>
        function showReclamations(userId) {
            var reclamationsListDiv = document.getElementById('reclamations-list-' + userId);
            if (reclamationsListDiv.style.display == 'none') {
                reclamationsListDiv.style.display = 'block';
            } else {
                reclamationsListDiv.style.display = 'none';
            }
        }
    </script>
    <script>
        function showmains(userId) {
            var reclamationsListDiv = document.getElementById('mains-list-' + userId);
            if (reclamationsListDiv.style.display == 'none') {
                reclamationsListDiv.style.display = 'block';
            } else {
                reclamationsListDiv.style.display = 'none';
            }
        }
    </script>
   
</div>

                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\save_project\reclamation_stage_part2\reclamation_stage_part1\reclamation_stage\resources\views/admin/Users.blade.php ENDPATH**/ ?>