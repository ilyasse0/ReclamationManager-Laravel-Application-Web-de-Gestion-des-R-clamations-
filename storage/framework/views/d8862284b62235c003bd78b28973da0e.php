<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="p-4 pt-5">
          <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(side_bar/images/employes.png);"></a>
    <ul class="list-unstyled components mb-5">
      <li class="active">
        
      </li>




    <li class="active">
     <?php if (\Illuminate\Support\Facades\Blade::check('supervisor')): ?>
      <a href="/nontraiter" data-toggle="" aria-expanded="true" class="dropdown-toggle">réclamation</a>
 
      <?php endif; ?>

      <?php if (\Illuminate\Support\Facades\Blade::check('emp')): ?>
      <a href="/sidebar" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Gerer mes Réclamation</a>


      <?php endif; ?>



      </li>





    <li class="">
        <a href="<?php echo e(route('profile')); ?>" data-toggle="" aria-expanded="true" class="dropdown-toggle">Profile</a>
      </li>
    <br>
    <div>
        <a href="<?php echo e(route('logout')); ?>" class="btn btn-outline-warning" id="btnlog">Log Out</a>


    </div>


    
      
    </ul>

   

  </div>
</nav>



<?php /**PATH C:\xampp\htdocs\reclamation_stage_part2\reclamation_stage_part1\reclamation_stage\resources\views/partials/sidebare.blade.php ENDPATH**/ ?>