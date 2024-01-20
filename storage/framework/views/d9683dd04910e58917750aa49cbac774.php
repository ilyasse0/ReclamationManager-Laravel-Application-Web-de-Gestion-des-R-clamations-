

<?php $__env->startSection('main'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Statistiques</li>
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
    <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Reclamtions</h5>
                            <h6 class="card-subtitle text-muted"></h6>
                        </div>
                        <div class="card-body">
                            <div class="chart chart-sm">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Services</h5>
                            <h6 class="card-subtitle text-muted"></h6>
                        </div>
                        <div class="card-body">
                            <div class="chart chart-sm">
                                <canvas id="myChart2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>
</main>
<script>
    const ctx = document.getElementById('myChart');
    
    const reclamions = [
      <?php $__currentLoopData = $reclamions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reclamion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        {
          etat: "<?php echo e($reclamion->etat); ?>",
        },
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    ];
    
    // créer un objet avec les états de réclamation et le nombre correspondant de réclamations
    const etatsReclamions = {encour: 0, traite: 0, non_traite: 0};
    reclamions.forEach(reclamion => {
      if (reclamion.etat == "1") {
        etatsReclamions.encour += 1;
      } else if (reclamion.etat == "2") {
        etatsReclamions.traite += 1;
      } else if (reclamion.etat == "0") {
        etatsReclamions.non_traite += 1;
      }
    });
    
    // créer un tableau de données pour Chart.js à partir de l'objet étatsReclamions
    const data = {
      labels: ['Encour', 'Traité', 'Non traité'],
      datasets: [{
        label: 'reclamations',
        data: [etatsReclamions.encour, etatsReclamions.traite, etatsReclamions.non_traite],
        borderWidth: 1
      }]
    };
    
    // initialiser le graphique avec les données créées
    new Chart(ctx, {
      type: 'polarArea',
      data: data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
    </script>
  
  <script>
    // Code pour le premier graphique
    const ctx1 = document.getElementById('myChart2');
    const labels1 = [];
    const data1 = [];
  
    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      labels1.push('<?php echo e($service->name); ?>');
      data1.push(<?php echo e($service->reclamations->count()); ?>);
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
    new Chart(ctx1, {
      type: 'bar',
      data: {
        labels: labels1,
        datasets: [{
          label: '# reclamtions',
          data: data1,
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  
   
  </script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\save_project\reclamation_stage_part2\reclamation_stage_part1\reclamation_stage\resources\views/admin/chars.blade.php ENDPATH**/ ?>