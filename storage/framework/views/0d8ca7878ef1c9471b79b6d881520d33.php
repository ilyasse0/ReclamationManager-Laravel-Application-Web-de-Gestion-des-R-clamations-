<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Arsha Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo e(asset('assets/img/favicon.png')); ?>" rel="icon">
  <link href="<?php echo e(asset('assets/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo e(asset('assets/vendor/aos/aos.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/vendor/boxicons/css/boxicons.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/vendor/glightbox/css/glightbox.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/vendor/remixicon/remixicon.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/vendor/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo e(asset('assets/chat.css')); ?>" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo e(asset('side_bar/css/style.css')); ?>">


  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>







<?php echo $__env->make('partials.sidebare', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Vendor JS Files -->
<script src="<?php echo e(asset('assets/vendor/aos/aos.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/glightbox/js/glightbox.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/swiper/swiper-bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/waypoints/noframework.waypoints.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/php-email-form/validate.js')); ?>"></script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
  
</script>

<!-- Template Main JS File -->
<script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>


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

<?php $__currentLoopData = $reclamations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reclamation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li class="clearfix">
  <a  href="<?php echo e(route('rec',$reclamation)); ?>">
<div class="about">
  <div class="name"><?php echo e($reclamation->title); ?></div>
  <div class="status"> <i class="fa fa-circle offline"></i><?php echo e($reclamation->created_at->format('h:i A, F d')); ?></div>
  </div>
  </li>
</a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</div>
<div class="chat" id="chat">
  <div class="chat-header clearfix">
      <div class="row">
          <div class="col-lg-6" >
              <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info"></a>
              <button type="button" class="btn btn-outline-primary" id="baccckbtn">Back</button>
              <div class="chat-about">
                  <h6 class="m-b-0" id="user-name"><?php echo e($rec->title); ?></h6>
                  <small><?php echo e($rec->created_at->format('h:i A, F d')); ?> </small>
              </div>
          </div>
          <div class="col-lg-6 hidden-sm text-right">
              
          </div>
      </div>
  </div>
  <div class="chat-history" id="chat-history" style="min-height: 400px; max-height: 400px; overflow-y: scroll;">
    <ul class="m-b-0 " >
        <?php $__currentLoopData = $rec->conversation->messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
  <?php if($rec->etat!=2): ?>
  <div class="chat-message clearfix">
    <div class="input-group mb-0">
      <form action="<?php echo e(route('addmsg',[$rec->conversation])); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="input-group">
          <input type="text" name="content" class="form-control" id="message-input" placeholder="Enter text here...">
          <div class="input-group-append" id="submit-container" style="display:none">
            <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-send"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php endif; ?>
</div>
<script>
  var chatHistory = document.getElementById("chat-history");
  chatHistory.scrollTop = chatHistory.scrollHeight;
</script>
<script>
  const messageInput = document.querySelector('#message-input');
  const submitContainer = document.querySelector('#submit-container');
  
  messageInput.addEventListener('input', function() {
    if (messageInput.value.trim().length > 0) {
      submitContainer.style.display = 'block';
    } else {
      submitContainer.style.display = 'none';
    }
  });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>$(document).ready(function() {
  $('#send-message').click(function(e) {
    e.preventDefault();

    // Récupérer le contenu du message à envoyer
    var messageContent = $('#message-content').val();

    // Récupérer l'ID de la conversation en cours
    var conversationId = $('#conversation-id').val();

    // Envoyer la requête AJAX pour ajouter le message à la conversation
    $.ajax({
      type: 'POST',
      url: '/convsation/' + conversationId + '/message',
      data: {
        content: messageContent
      },
      success: function(data) {
        // Mettre à jour la vue avec le nouveau message
        var messageHtml = '<li class="clearfix">';
        messageHtml += '<div class="message-data">';
        messageHtml += '<span class="message-data-time">' + data.created_at + '</span>';
        messageHtml += '</div>';
        messageHtml += '<div class="message my-message">' + data.content + '</div>';
        messageHtml += '</li>';

        $('.chat-history ul').append(messageHtml);

        // Réinitialiser le champ de saisie du message
        $('#message-content').val('');
      },
      error: function(xhr, status, error) {
        console.log(xhr.responseText);
      }
    });
  });
});

</script>
<script>$(document).ready(function(){
  $('#search-form').on('keyup', function(e){
      e.preventDefault();
      var query = $(this).val();
      $.ajax({
          url: '/search',
          method: 'GET',
          data: {'query': query},
          dataType: 'json',
          success: function(data){
              var items = '';
              $.each(data, function(key, value){
                  items += '<li class="clearfix"><a href="/reclamation/'+value.id+'"><div class="about"><div class="name">'+value.title+'</div><div class="status"><i class="fa fa-circle offline"></i>'+value.created_at+'</div></div></a></li>';
              });
              $('.chat-list').html(items);
          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
          }
      });
  });
});

</script>



<?php /**PATH C:\xampp\htdocs\reclamation_stage_part1\reclamation_stage\resources\views/emp/conversation.blade.php ENDPATH**/ ?>