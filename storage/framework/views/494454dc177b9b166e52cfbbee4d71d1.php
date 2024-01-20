

<?php $__env->startSection('main'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">conversation</li>
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
        <div class="container h-100 overflow-auto">
            <div class="row clearfix">
            <div class="col-lg-12">
            <div class="card chat-app">
            <div id="plist" class="people-list">
            <div class="input-group">
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-search"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Search...">
            </div>
            <ul class="list-unstyled chat-list mt-2 mb-0" style="min-height: 400px; max-height: 400px; overflow-y: scroll;">
            <?php $__currentLoopData = $reclamations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="clearfix">
              <a  href="<?php echo e(route('reclamation',$rec)); ?>">
            <div class="about">
              <div class="name"><?php echo e($rec->title); ?></div>
              <div class="status"> <i class="fa fa-circle offline"></i><?php echo e($rec->created_at->format('h:i A, F d')); ?></div>
              
              </div>
              </li>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            </div>
        <div class="chat" id="chat">
            <div class="chat-header clearfix">
                <div class="row">
                    <div class="col-lg-6">
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info"></a>
                        <a href="/recs" class="btn btn-outline-primary" id="baccckbtn">Back</a>  
          
          
                          
          
                        <div class="chat-about">
                            <h6 class="m-b-0" id="user-name"><?php echo e($reclamation->title); ?></h6>
                            <small><?php echo e($reclamation->created_at->format('h:i A, F d')); ?> </small>
                        </div>
                        <?php if($reclamation->etat  ==0): ?>
                        <span class="badge badge-danger"> non traiter</span>
                     <?php endif; ?>
                     
                     <?php if($reclamation->etat  ==1): ?>
                     <span class="badge badge-warning">  encour</span>
                     <?php endif; ?>
                     <?php if($reclamation->etat  ==2): ?>
                     <span class="badge badge-success">  traiter</span>
                     <?php endif; ?>
                    </div>
                    <div class="col-lg-6 hidden-sm text-right">
                     
                    </div>
                </div>
            </div>
            <div class="chat-history" id="chat-history" style="min-height: 400px; max-height: 400px; overflow-y: scroll;">
              <ul class="m-b-0 " >
                  <?php $__currentLoopData = $reclamation->conversation->messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li class="clearfix">
                          <?php if( $message->user->type=='emp'): ?>
                          <div class="message-data">
                              <span class="message-data-time"><?php echo e($message->created_at->format('h:i A, F d')); ?></span>
                          </div>
                          <div class="message my-message" style="max-width: 400px"> <?php echo e($message->content); ?> </div>
                          <?php else: ?>
                          <div class="message-data text-right">
                              <span class="message-data-time"><?php echo e($message->created_at->format('h:i A, F d')); ?></span>
                          </div>
                          <div class="message other-message float-right" style="max-width: 400px"> <?php echo e($message->content); ?> </div>
                          <?php endif; ?>
                      </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
        </div>
      </div>    
    </div>      
  </div> 
<main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\save_project\reclamation_stage_part2\reclamation_stage_part1\reclamation_stage\resources\views/admin/reclamation.blade.php ENDPATH**/ ?>