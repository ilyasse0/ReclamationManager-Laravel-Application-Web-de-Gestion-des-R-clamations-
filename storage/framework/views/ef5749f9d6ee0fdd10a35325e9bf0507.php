


<head>
    <title>Sidebar 01</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
      
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo e(asset('side_bar/css/style.css')); ?>">
  
 
</head>
<body>
      
  <?php echo $__env->make('partials.sidebare', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div id="content" class="p-4 p-md-5">

     
      <?php if($user->type == 'emp'): ?>
      <h2 class="mb-4">Mes Réclamations </h2>
      <?php endif; ?>

      <?php if($user->type != 'emp'): ?>
      <h2 class="mb-4">Les Réclamations </h2>

  
      <?php endif; ?>
      
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
crossorigin="anonymous">
<section  id="about" class="about">
  <?php if(session('success')): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?php echo e(session('success')); ?>

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
<?php endif; ?>

<a type="button" id="btn1" href="/traiter" class="btn btn-primary">traiter</a>
<a type="button" id="btn2" href="/nontraiter" class="btn btn-danger">non traiter</a>
<a type="button"  href="/encour" class="btn btn-success">en cour</a>
<a type="button"  href="/all" class="btn btn-warning">All</a>

<?php if($errors->any()): ?>
<div class="alert alert-danger">
  <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif; ?>


<html>
 <head>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
 </head>
 <body>

 </body>
</html>





<div class="row">
  <div class="col-md-6">
      <input type="text" class="form-control" id="search" placeholder="Rechercher...">
  </div>
</div>
<br>


<br>
<div id="reclamationsContainer" class="row">
  
  <?php $__currentLoopData = $reclamations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reclamation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-4 mb-4">
          <div class="card">
              <div class="card-body">
                  <h5 class="card-title"><?php echo e($reclamation->title); ?></h5>
                  <p><b>employee :</b><?php echo e($reclamation->employee->username); ?> </p>
                  <?php if($reclamation->super): ?>
                      <p><b> superviseur:</b><?php echo e($reclamation->super->username); ?></p>
                  <?php endif; ?>
                  
                  <p><b>service :</b><?php echo e($reclamation->service->name); ?></p>
                  <p class="card-text"><?php echo e(substr($reclamation->description, 0, 30)); ?>...</p>
                  
                  <p class="card-text"><strong>Etat:</strong> 
                    <?php if($reclamation->etat  ==0): ?>
                    <span class="badge badge-danger"> non traiter</span>
                 <?php endif; ?>
                 
                 <?php if($reclamation->etat  ==1): ?>
                 <span class="badge badge-warning">  encour</span>
                 <?php endif; ?>
                 <?php if($reclamation->etat  ==2): ?>
                 <span class="badge badge-success">  traiter</span>
                 <?php endif; ?>
                    
                  </p>
                  <?php if($reclamation->etat != 0 &&$reclamation->supervisor == $user->id ): ?>
                  <a href="<?php echo e(route('recsup',$reclamation)); ?>" class="btn btn-primary">Voir les détails</a>
                  <?php endif; ?> 
                  <?php if($reclamation->etat == 0): ?>
                  <form action="<?php echo e(route('reclamations.update', ['reclamation' => $reclamation->id])); ?>" method="POST">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('PUT'); ?>
                      <button type="submit" class="btn btn-info">Traiter</button>
                  </form>
              <?php endif; ?>
               

              </div>
          </div>
      </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            var query = $(this).val();
            $.ajax({
                url: '<?php echo e(route("reclamations.searchnon")); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    query: query
                },
                success: function(response) {
                    var html = '';
                    if (response.length == 0) {
                        html += '<p>Aucune réclamation trouvée.</p>';
                    } else {
                        $.each(response, function(index, reclamation) {
                            var reclamationId = reclamation.id; // store the reclamation ID in a variable
                            html += '<div class="col-md-4 mb-4"><div class="card"><div class="card-body">';
                            html += '<h5 class="card-title">' + reclamation.title + '</h5>';
                            html += '<p class="card-text">' + reclamation.description + '</p>';
                            html += '<p class="card-text"><strong>Etat:</strong> ' + reclamation.etat + '</p>';
                            html += '<a href="<?php echo e(route('rec', '')); ?>' + reclamationId + '" class="btn btn-primary">Voir les détails</a>'; // construct the URL with the reclamation ID
                            if (reclamation.etat == 0) {
                                html += '<a href="#" class="btn btn-info">traiter</a>';
                            }
                            html += '</div></div></div>';
                        });
                    }
                    $('#reclamationsContainer').html(html);
                }
            });
        });
    });
  </script>
  
  




  <?php /**PATH C:\xampp1\htdocs\save_project\reclamation_stage_part2\reclamation_stage_part1\reclamation_stage\resources\views/supervisor/rec.blade.php ENDPATH**/ ?>