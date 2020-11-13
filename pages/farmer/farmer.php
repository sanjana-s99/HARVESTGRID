<?php
  include("../../includes/farmer.php");
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HarvestGrid Pickup-Request</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
  

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="../../index.php"><span>Harvestgrid</span></a></h1>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
            <li class="active"><a href="../../index.php">Home</a></li>
            <li><a href="../admindashboard.php">Dashboard</a></li>
            <li><a href="../../chatapplication/">Direct Message</a></li>
            <li><a><?php echo "Hi, " . $_SESSION['username']; ?></a></li>
            <li class="get-started"><a href="../../includes/signout.php">Sign Out</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Request Details</h2>
          <ol>
            <li><a href="../../index.php">Home</a></li>
            <li>Request Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
        <div class="row">

          <div class="col-lg-8">
            <h2 class="portfolio-title">Request Id : <?php echo $rqst_id ?></h2>
            <div class="owl-carousel portfolio-details-carousel">
              <img src="../../uploads/<?php echo $img1 ?>" class="img-fluid" alt="" style = "width: 800px; height: 390px;">
              <img src="../../uploads/<?php echo $img2 ?>" class="img-fluid" alt="" style = "width: 800px; height: 390px;">
              <img src="../../uploads/<?php echo $img3 ?>" class="img-fluid" alt="" style = "width: 800px; height: 390px;">
            </div>
          </div>

          <div class="col-lg-4 portfolio-info">
            <div class="table-responsive">				
                  <div id="user_details"></div>
            </div> 
            <ul>
              <li><strong>Crop Type</strong>: <?php echo $user_crop ?></li>
              <li><strong>Total Weight</strong>: <?php echo $rqst_weight ?></li>
              <li><strong>Harvested date</strong>: <?php echo $rqst_date ?></li>
              <li><strong>Requested date</strong>: <?php echo $rqst_date ?></li>
              <li><strong>Request Status</strong>: <?php echo $rqst_status ?></li>
              <li><strong>Quality After Collected</strong>: <?php echo $rqst_quality ?></li>
              <?php if($rqst_status=="New Request") { ?>
                <li><strong>Action</strong>: <a onclick='clicked1();' class="btn btn-sm btn-outline-success">Approve</a>   <a onclick='clicked2();' class="btn btn-sm btn-outline-danger">Reject</a></li> 
              <?php }elseif($rqst_status=="Approved") { 
                if($_SESSION['user_role']=="K" || $_SESSION['user_role']=="A"){ ?>
                <li><strong>Action</strong>: <a onclick='clicked4();' class="btn btn-sm btn-outline-warning">Collected</a>   <a onclick='clicked3();' class="btn btn-sm btn-outline-danger">Reject</a></li> 
              <?php }}elseif($rqst_status == "Collected"){ 
                if($_SESSION['user_role']=="K" || $_SESSION['user_role']=="A"){ ?>
                <li><strong>Mark As</strong>: <a onclick='clicked5();' class="btn btn-sm btn-outline-success">Good Quality</a>   <a onclick='clicked6();' class="btn btn-sm btn-outline-danger">Poor Quality</a></li> 
              <?php }} ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="container">
        <div id="user_model_details"></div>
      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
          Made with <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" style="width:16px;overflow:visible"><path class="breathing" d="M24.85 10.126c2.018-4.783 6.628-8.125 11.99-8.125 7.223 0 12.425 6.179 13.079 13.543 0 0 .353 1.828-.424 5.119-1.058 4.482-3.545 8.464-6.898 11.503L24.85 48 7.402 32.165c-3.353-3.038-5.84-7.021-6.898-11.503-.777-3.291-.424-5.119-.424-5.119C.734 8.179 5.936 2 13.159 2c5.363 0 9.673 3.343 11.691 8.126z" fill="#d75a4a"></path></svg> in <strong>Sri Lanka</strong>.
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="#intro" class="scrollto">Home</a>
            <a href="#about" class="scrollto">About</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Use</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../../assets/vendor/counterup/counterup.min.js"></script>
  <script src="../../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../../assets/vendor/venobox/venobox.min.js"></script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>


  <script>  

    function clicked1() {
      Swal.fire({
        title: 'are your sure??',
        text: 'do you want approve this request',
        imageUrl: '../../images/confirmed.svg',
        imageHeight: 250,
        imageAlt: 'approved',
        showCancelButton: true,
        confirmButtonColor: '#ff5454',
        cancelButtonColor: '#ff5454',
        confirmButtonText: 'Approve',
        cancelButtonText: 'Cancel'
      }).then((result) => {
          if (result.value) {
              window.location.href = "../../includes/cropaction.php?action=approve&rqst_id=<?php echo $rqst_id ?>";
          }
      })
    }

    function clicked2() {
      Swal.fire({
        title: 'are your sure??',
        text: 'do you want reject this request',
        imageUrl: '../../images/invalid.svg',
        imageHeight: 250,
        imageAlt: 'rejected',
        showCancelButton: true,
        confirmButtonColor: '#ff5454',
        cancelButtonColor: '#ff5454',
        confirmButtonText: 'Reject',
        cancelButtonText: 'Cancel'
      }).then((result) => {
          if (result.value) {
              window.location.href="../../includes/cropaction.php?action=reject&rqst_id=<?php echo $rqst_id ?>";
          }
      })
    }

    function clicked3() {
      Swal.fire({
        title: 'are your sure??',
        text: 'do you want reject this request',
        imageUrl: '../../images/invalid.svg',
        imageHeight: 250,
        imageAlt: 'rejected',
        showCancelButton: true,
        confirmButtonColor: '#ff5454',
        cancelButtonColor: '#ff5454',
        confirmButtonText: 'Reject',
        cancelButtonText: 'Cancel'
      }).then((result) => {
          if (result.value) {
              window.location.href="../../includes/cropaction.php?action=reject&rqst_id=<?php echo $rqst_id ?>";
          }
      })
    }

    function clicked4() {
      Swal.fire({
        title: 'are your sure??',
        text: 'do you want marks as collected',
        imageUrl: '../../images/pwresetdone.svg',
        imageHeight: 250,
        imageAlt: 'collected',
        showCancelButton: true,
        confirmButtonColor: '#ff5454',
        cancelButtonColor: '#ff5454',
        confirmButtonText: 'Collected',
        cancelButtonText: 'Cancel'
      }).then((result) => {
          if (result.value) {
              window.location.href="../../includes/cropaction.php?action=collected&rqst_id=<?php echo $rqst_id ?>";
          }
      })
    }

    function clicked6() {
      Swal.fire({
        title: 'are your sure??',
        text: 'do you want mark as poor quality product',
        imageUrl: '../../images/invalid.svg',
        imageHeight: 250,
        imageAlt: 'poor',
        showCancelButton: true,
        confirmButtonColor: '#ff5454',
        cancelButtonColor: '#ff5454',
        confirmButtonText: 'Poor Product',
        cancelButtonText: 'Cancel'
      }).then((result) => {
          if (result.value) {
              window.location.href="../../includes/cropaction.php?action=pquality&rqst_id=<?php echo $rqst_id ?>";
          }
      })
    }

    function clicked5() {
      Swal.fire({
        title: 'are your sure??',
        text: 'do you want marks as good quality product',
        imageUrl: '../../images/pwresetdone.svg',
        imageHeight: 250,
        imageAlt: 'good',
        showCancelButton: true,
        confirmButtonColor: '#ff5454',
        cancelButtonColor: '#ff5454',
        confirmButtonText: 'Good Product',
        cancelButtonText: 'Cancel'
      }).then((result) => {
          if (result.value) {
              window.location.href="../../includes/cropaction.php?action=gquality&rqst_id=<?php echo $rqst_id ?>";
          }
      })
    }


    $(document).ready(function(){

      fetch_user();

      setInterval(function(){
        update_last_activity();
        fetch_user();
        update_chat_history_data();
      }, 5000);

      function fetch_user()
      {
        $.ajax({
          url:"../../chatapplication/fetchspecific_user.php?user_id=<?php echo $user_id ?>",
          method:"POST",
          success:function(data){
            $('#user_details').html(data);
          }
        })
      }

      function update_last_activity()
      {
        $.ajax({
          url:"../../chatapplication/update_last_activity.php",
          success:function()
          {

          }
        })
      }

      function make_chat_dialog_box(to_user_id, to_user_name)
      {
        var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
        modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
        modal_content += fetch_user_chat_history(to_user_id);
        modal_content += '</div>';
        modal_content += '<div class="form-group">';
        modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
        modal_content += '</div><div class="form-group" align="right">';
        modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
        $('#user_model_details').html(modal_content);
      }

      $(document).on('click', '.start_chat', function(){
        var to_user_id = $(this).data('touserid');
		    var to_user_name = $(this).data('tousername');
        make_chat_dialog_box(to_user_id, to_user_name);
        $("#user_dialog_"+to_user_id).dialog({
          autoOpen:false,
          width:400
        });
        $('#user_dialog_'+to_user_id).dialog('open');
        $('#chat_message_'+to_user_id).emojioneArea({
          pickerPosition:"top",
          toneStyle: "bullet"
        });
      });

      $(document).on('click', '.send_chat', function(){
        var to_user_id = $(this).attr('id');
        var chat_message = $.trim($('#chat_message_'+to_user_id).val());
        if(chat_message != '')
        {
          $.ajax({
            url:"../../chatapplication/insert_chat.php",
            method:"POST",
            data:{to_user_id:to_user_id, chat_message:chat_message},
            success:function(data)
            {
              //$('#chat_message_'+to_user_id).val('');
              var element = $('#chat_message_'+to_user_id).emojioneArea();
              element[0].emojioneArea.setText('');
              $('#chat_history_'+to_user_id).html(data);
            }
          })
        }
        else
        {
          alert('Type something');
        }
      });

      function fetch_user_chat_history(to_user_id)
      {
        $.ajax({
          url:"../../chatapplication/fetch_user_chat_history.php",
          method:"POST",
          data:{to_user_id:to_user_id},
          success:function(data){
            $('#chat_history_'+to_user_id).html(data);
          }
        })
      }

      function update_chat_history_data()
      {
        $('.chat_history').each(function(){
          var to_user_id = $(this).data('touserid');
          fetch_user_chat_history(to_user_id);
        });
      }

      $(document).on('click', '.ui-button-icon', function(){
        $('.user_dialog').dialog('destroy').remove();
        $('#is_active_group_chat_window').val('no');
      });

      $(document).on('focus', '.chat_message', function(){
        var is_type = 'yes';
        $.ajax({
          url:"../../chatapplication/update_is_type_status.php",
          method:"POST",
          data:{is_type:is_type},
          success:function()
          {

          }
        })
      });

      $(document).on('blur', '.chat_message', function(){
        var is_type = 'no';
        $.ajax({
          url:"../../chatapplication/update_is_type_status.php",
          method:"POST",
          data:{is_type:is_type},
          success:function()
          {
            
          }
        })
      });


      $(document).on('click', '.remove_chat', function(){
        var chat_message_id = $(this).attr('id');
        if(confirm("Are you sure you want to remove this chat?"))
        {
          $.ajax({
            url:"../../chatapplication/remove_chat.php",
            method:"POST",
            data:{chat_message_id:chat_message_id},
            success:function(data)
            {
              update_chat_history_data();
            }
          })
        }
      });
      
    });  
  </script>

</body>

</html>