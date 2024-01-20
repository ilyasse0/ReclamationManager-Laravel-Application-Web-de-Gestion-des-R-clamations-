<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="p-4 pt-5">
          <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(side_bar/images/logo.jpg);"></a>
    <ul class="list-unstyled components mb-5">
      <li class="active">
        <a href="#" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> réclamations</a>
      </li>




    <li class="">
     <?php if (\Illuminate\Support\Facades\Blade::check('supervisor')): ?>
      <a href="/nontraiter" data-toggle="" aria-expanded="true" class="dropdown-toggle">réclamation</a>
 
      <?php endif; ?>

      <?php if (\Illuminate\Support\Facades\Blade::check('emp')): ?>
      <a href="/home" data-toggle="" aria-expanded="true" class="dropdown-toggle">réclamation</a>
      <?php endif; ?>



      </li>





    <li class="">
        <a href="#homeSubmenu" data-toggle="" aria-expanded="true" class="dropdown-toggle">Profile</a>
      </li>
    <br>
    <div>
        <a href="<?php echo e(route('logout')); ?>" class="btn btn-outline-primary">Log Out</a>

    </div>


    
      
    </ul>

   

  </div>
</nav><?php /**PATH C:\xampp1\htdocs\save_project\reclamation_stage\resources\views/partials/sidebare.blade.php ENDPATH**/ ?>