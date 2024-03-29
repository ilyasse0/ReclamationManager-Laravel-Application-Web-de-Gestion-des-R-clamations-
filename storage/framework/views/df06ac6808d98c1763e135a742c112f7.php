


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

        <!-- Page Content  -->
        


        <!-- nav  -->

        
      <div id="content" class="p-4 p-md-5">

       

        <h2 class="mb-4">Mes Réclamations </h2>

        
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





 

<div class="row">
    <div class="col-md-6">
        <input type="text" class="form-control" id="search" placeholder="Rechercher...">
    </div>
</div>
<br>
<a href="#" data-toggle="modal" class="btn btn-primary" data-target="#exampleModal" id="creebtn">Créer une réclamation</a>
<br>
<div id="reclamationsContainer" class="row">
    <?php $__currentLoopData = $reclamations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reclamation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($reclamation->title); ?></h5>
                    <p class="card-text"><?php echo e($reclamation->description); ?></p>
                    <p class="card-text"><strong>Etat:</strong> <?php echo e($reclamation->etat); ?></p>
                    <a href="<?php echo e(route('rec',$reclamation)); ?>" class="btn btn-primary">Voir les détails</a>
                    <?php if($reclamation->etat == 0): ?>
                    <form action="<?php echo e(route('delete', ['id' => $reclamation->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer?')">Supprimer</button>
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
                url: '<?php echo e(route("reclamations.search")); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    query: query
                },
                success: function(response) {
                    var html = '';
                    $.each(response, function(index, reclamation) {
                        html += '<div class="col-md-4 mb-4"><div class="card"><div class="card-body">';
                        html += '<h5 class="card-title">' + reclamation.title + '</h5>';
                        html += '<p class="card-text">' + reclamation.description + '</p>';
                        html += '<p class="card-text"><strong>Etat:</strong> ' + reclamation.etat + '</p>';
                        html += '<a href="#" class="btn btn-primary">Voir les détails</a>';
                        if (reclamation.etat == 0) {
                            html += '<form action="<?php echo e(route('delete', ['id' => ' + reclamation.id + '])); ?>" method="POST">';
                            html += '<?php echo csrf_field(); ?>';
                            html += '<?php echo method_field('DELETE'); ?>';
                            html += '<button type="submit" class="btn btn-danger" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer?\')">Supprimer</button>';
                            html += '</form>';
}

                        html += '</div></div></div>';
                    });
                    $('#reclamationsContainer').html(html);
                }
            });
        });
    });
</script>




    
    


<div class="groups bg-white py-3 px-4 shadow-sm">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Créer une réclamation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create-reclamation-form" method="POST" action="<?php echo e(route('create')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="title">Titre</label>
                            <input type="text" class="form-control" id="title" name="title">
                            <div id="title-error" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            <div id="description-error" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="service">Service</label>
                            <select class="form-control" id="service" name="service_id">
                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                                <option value="<?php echo e($service->id); ?>"><?php echo e($service->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="file">Fichier pdf,doc,docx.png,jpeg,jpg</label>
                            <input type="file" class="form-control-file" id="file" name="file">
                            <div id="file-error" class="invalid-feedback"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Créer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // Validation des champs obligatoires avec JavaScript
    const form = document.getElementById('create-reclamation-form');

    form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }

        form.classList.add('was-validated');
    });
</script>


</section>

<div>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
 integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
 crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
 integrity="sha384-5IvlZ+PpViMnMbhdd1yTNDB/7o0t/J+nFV7uM8gSwhXSY58HjKONb7Ggmbf8yd4n"
 crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
 integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
 crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</div>
</html><?php /**PATH C:\xampp\htdocs\reclamation_stage\resources\views/emp/sideBar_myreclamation.blade.php ENDPATH**/ ?>