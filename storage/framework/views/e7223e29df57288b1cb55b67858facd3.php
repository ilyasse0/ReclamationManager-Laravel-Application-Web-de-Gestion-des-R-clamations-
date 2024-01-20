
<?php
  $services = App\Models\service::all();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Reclamations - Admin</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="<?php echo e(asset('admin/css/styles.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.com/libraries/Chart.js"></script>
   
    
  <!-- Favicons -->
  <link href="<?php echo e(asset('assets/img/favicon.png')); ?>" rel="icon">
  <link href="<?php echo e(asset('assets/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

 

<link href="<?php echo e(asset('assets/chat.css')); ?>" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">
    
 
   
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">enhanced tech</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
       
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>">Deconnexion</a></li>
                </ul>
            </li>
        </ul>
    </nav> 
    
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">home</div>
                        <a class="nav-link" href="/recs">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Formulaires
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="#" data-toggle="modal" data-target="#modalService">cree service</a>
                                <a  class="nav-link" data-toggle="modal" data-target="#exampleModal">
                                  cree employee
                                 </a>
                                 <a  class="nav-link" data-toggle="modal" data-target="#super">
                                  cree superviseur
                                 </a>
                           </nav>
                        </div>
                         
                        
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="/chars">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Statistiques
                        </a>
                       
                    </div>
                </div>
               
            </nav>
        </div>
        <div id="layoutSidenav_content">
           <?php echo $__env->yieldContent('main'); ?>
          
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Reclamation 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <div class="modal fade" id="modalService" tabindex="-1" role="dialog" aria-labelledby="modalServiceLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalServiceLabel">Ajouter un service</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Formulaire pour ajouter un service -->
          <form method="POST" action="<?php echo e(route('services.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
              <label for="titre">Titre</label>
              <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="titre" name="name" value="<?php echo e(old('titre')); ?>" placeholder="Entrez le titre du service" >
          
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
unset($__errorArgs, $__bag); ?>" id="description" name="description" rows="3" placeholder="Entrez la description du service" ><?php echo e(old('description')); ?></textarea>
            
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter Employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="<?php echo e(route('registerEmp')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
              <label for="nom">Nom *:</label>
              <input type="text" name="last_name"  class="form-control">
            </div>
            <div class="form-group">
              <label for="prenom">Prénom * :</label>
              <input type="text" name="first_name" class="form-control">
            </div>
            <div class="form-group">
              <label for="username">Username *:</label>
              <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
              <label for="password">Mot de passe  *:</label>
              <div class="input-group">
                <input type="password" name="password"  class="form-control">
                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                  <i class="bi bi-eye-fill"></i>
                </button>
              </div>
            </div>
            <div class="form-group">
              <label for="retypepassword">Confirmer le mot de passe * :</label>
              <div class="input-group">
                <input type="password" name="password_confirmation"  class="form-control">
                <button class="btn btn-outline-secondary" type="button" id="toggleRetypePassword">
                  <i class="bi bi-eye-fill"></i>
                </button>
              </div>
            </div>
            <div class="form-group">
              <label for="service">Service *:</label>
              <div class="input-group">
                <select name="service" class="form-control">
                  <option value="">Sélectionnez...</option>
                 <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <option value="<?php echo e($service->id); ?>"><?php echo e($service->name); ?></option>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>
         
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button> 
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="super" tabindex="-1" aria-labelledby="superLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="superLabel">Ajouter superviseur</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="<?php echo e(route('registerSuper')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
              <label for="nom">Nom* :</label>
              <input type="text" name="last_name" id="nom" class="form-control">
            </div>
            <div class="form-group">
              <label for="prenom">Prénom* :</label>
              <input type="text" name="first_name" id="prenom" class="form-control">
            </div>
            <div class="form-group">
              <label for="username">Username*:</label>
              <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
              <label for="password1">Mot de passe* :</label>
              <div class="input-group">
                <input type="password" name="password" id="password1" class="form-control">
                <button class="btn btn-outline-secondary" type="button" id="togglePassword1">
                  <i class="bi bi-eye-fill"></i>
                </button>
              </div>
            </div>
            <div class="form-group">
              <label for="retypepassword1">Confirmer le mot de passe* :</label>
              <div class="input-group">
                <input type="password" name="password_confirmation" id="retypepassword1" class="form-control">
                <button class="btn btn-outline-secondary" type="button" id="toggleRetypePassword1">
                  <i class="bi bi-eye-fill"></i>
                </button>
              </div>
            </div>
            <div class="form-group">
              <label for="service">Service*:</label>
              <div class="input-group">
                <select id="service" name="service" class="form-control">
                  <option id="service"  value="">Sélectionnez...</option>
                 <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <option value="<?php echo e($service->id); ?>"><?php echo e($service->name); ?></option>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>
            <div class="form-group" id="mains">
              <label for="mains">Ce superviseur la main à :</label>
              <br>
              <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="mains[]" value="<?php echo e($service->id); ?>">
                      <label class="form-check-label" for="mains"><?php echo e($service->name); ?></label>
                  </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button> 
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </div>
    </form>
      </div>
    </div>
  </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('admin/js/scripts.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
      <script src="<?php echo e(asset('admin/assets/demo/chart-area-demo.js')); ?>"></script>
      <script src="<?php echo e(asset('admin/assets/demo/chart-bar-demo.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
      crossorigin="anonymous"></script>
  <script src="<?php echo e(asset('admin/js/datatables-simple-demo.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/js.js')); ?>"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
   
    </script>  <script src="https://cdnjs.com/libraries/Chart.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo e(asset('assets/js/main.js')); ?>">
</script>

</body>


</html><?php /**PATH C:\xampp1\htdocs\save_project\reclamation_stage_part2\reclamation_stage_part1\reclamation_stage\resources\views/admin/master.blade.php ENDPATH**/ ?>