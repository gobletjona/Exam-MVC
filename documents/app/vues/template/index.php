<!DOCTYPE html>
<html lang="en">
  <head>
      <?php include '../app/vues/template/partials/_head.php' ?>
  </head>
 <body>
	 <!-- Preloader Start -->
     <?php include '../app/vues/template/partials/_preloader.php'; ?>
      <!-- Preloader End -->
    <div id="main">
        <div class="container">
            <div class="row">
                 <!-- About Me (Left Sidebar) Start -->
                 <div class="col-md-3">
                   <div class="about-fixed">
                      <?php include '../app/vues/template/partials/_aside.php'; ?>
                  </div>
                </div>
                <!-- About Me (Left Sidebar) End -->

                 <!-- Blog Post (Right Sidebar) Start -->
                 <div class="col-md-9">
                    <div class="col-md-12 page-body">
                    	<?php echo $content; ?>
                    </div>
                       <!-- Footer Start -->
                       <div class="col-md-12 page-body margin-top-50 footer">
                          <?php include '../app/vues/template/partials/_footer.php'; ?>
                       </div>
                       <!-- Footer End -->
                  </div>
                  <!-- Blog Post (Right Sidebar) End -->
            </div>
         </div>
      </div>
    <!-- Back to Top Start -->
    <a href="#" class="scroll-to-top"><i class="fa fa-long-arrow-up"></i></a>
    <!-- Back to Top End -->
    <?php include '../app/vues/template/partials/_scripts.php' ?>
   </body>
 </html>
