

<?php $__env->startSection('main'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Reclamations</li>
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
<div class="alert alert-danger">
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
                            <th>Titre</th>
                            <th>description</th>
                            <th>service</th>
                            <th>employee</th>
                            <th>etat</th>
                            <th>superviseur</th>
                            <th>fichier</th>
                            <th>cree a</th>
                            <th>traiter a</th>
                            <th>fermer a</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Titre</th>
                            <th>description</th>
                            <th>service</th>
                            <th>employee</th>
                            <th>etat</th>
                            <th>superviseur</th>
                            <th>fichier</th>
                            <th>cree a</th>
                            <th>traiter a</th>
                            <th>fermer a</th>
                            <th>action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                   
                        <?php $__currentLoopData = $reclamations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reclamation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <tr>
                            <td><?php echo e($reclamation->title); ?></td>
                            <td>
                                <div class="description">
                                    <p class="truncated-description"><?php echo e(Str::limit($reclamation->description, 15)); ?></p>
                                    <?php if(strlen($reclamation->description) > 15): ?>
                                        <span class="full-description" style="display: none;"><?php echo e($reclamation->description); ?></span>
                                        <a href="#" class="read-more-link">Read more</a>
                                        <a href="#" class="read-less-link" style="display: none;">Read less</a>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td><?php echo e($reclamation->service->name); ?></td>
                          
                            <td><?php echo e($reclamation->employee->username); ?></td>
                            <td>  <?php if($reclamation->etat  ==0): ?>
                                <span class="badge badge-danger"> non traiter</span>
                             <?php endif; ?>
                             
                             <?php if($reclamation->etat  ==1): ?>
                             <span class="badge badge-warning">  encour</span>
                             <?php endif; ?>
                             <?php if($reclamation->etat  ==2): ?>
                             <span class="badge badge-success">  traiter</span>
                             <?php endif; ?></td>
                            <td>
                                <?php if( $reclamation->super): ?>
                                    <?php echo e($reclamation->super->username); ?>

                                    
                                <?php endif; ?></td>
                            <td> <?php if($reclamation->file !=0): ?>
                                <a id="aficherBtn"  target="_blank" class="" href="<?php echo e(route('telecharger', ['nomFichier' => $reclamation->file])); ?>"><i class="bi bi-box-arrow-down"></i></a>
                                <?php endif; ?></td>
                            <td><?php echo e($reclamation->created_at->format('h:i A, F d')); ?></td>

                            <td>
                                <?php if($reclamation->traite_at): ?>
                                 <?php echo e($reclamation->traite_at); ?>

                                    
                                <?php endif; ?>
                               
                            </td>
                            <td> <?php if( $reclamation->finish_at ): ?>
                                <?php echo e($reclamation->finish_at); ?>

                                   
                               <?php endif; ?></td>
                               <td><a href="<?php echo e(route('reclamation',$reclamation)); ?>" class="btn btn-primary"><i class="bi bi-eye"></i>

                               </a></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    <style>
                        .description {
                            position: relative;
                        }
                    
                        .full-description {
                            display: none;
                        }
                    
                        .read-more-link,
                        .read-less-link {
                            display: block;
                            text-align: right;
                            color: blue;
                            text-decoration: underline;
                            cursor: pointer;
                        }
                    
                        .read-less-link {
                            margin-top: 5px;
                        }
                    </style>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\save_project\reclamation_stage_part2\reclamation_stage_part1\reclamation_stage\resources\views/admin/home.blade.php ENDPATH**/ ?>