<?php if (session()->id) { ?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="dark" data-bs-theme="light">
   <!-- Mirrored from mannatthemes.com/materialy/default/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Dec 2025 00:32:31 GMT -->
   <head>
      <meta charset="utf-8" />
      <title><?php echo $page_title;?></title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
      <meta content="" name="author"/>
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     

	  <link href="<?= base_url() ?>/assets/libs/mobius1-selectr/selectr.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>/assets/libs/huebee/huebee.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>/assets/libs/vanillajs-datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css"/>

      <!-- App favicon -->
      <link rel="shortcut icon" href="assets/images/favicon.ico">
      <link href="<?= base_url() ?>/assets/libs/simple-datatables/style.css" rel="stylesheet" type="text/css" />
      <!-- App css -->
      <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="<?= base_url() ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
      <link href="<?= base_url() ?>/assets/css/app.min.css" rel="stylesheet" type="text/css" />

        <!-- Chart Js -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" 
    integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous">
   </head>
   <!-- Top Bar Start -->
   <body>
 
    <!-- Top Bar Start -->
      <div class="topbar d-print-none">
         <div class="container-fluid">
            <nav class="topbar-custom d-flex justify-content-between" id="topbar-custom">
               <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                  <li>
                     <button class="nav-link mobile-menu-btn nav-icon" id="togglemenu">
                        <iconify-icon icon="solar:hamburger-menu-line-duotone" class="fs-20"></iconify-icon>
                     </button>
                  </li>
                  <li class="mx-2 welcome-text">
                     <h5 class="mb-0 fw-semibold text-truncate">Bienvenue, <?= session()->surname ?> <?= session()->name ?></h5>
                      
                     <!-- <h6 class="mb-0 fw-normal text-muted text-truncate fs-14">Here's your overview this week.</h6> -->
                  </li>
               </ul>
               <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                 
                 
                  <!--end topbar-language-->
                  <li class="topbar-item">
                     <a class="nav-link nav-icon" href="javascript:void(0);" id="light-dark-mode">
                        <iconify-icon icon="solar:moon-bold-duotone" class="dark-mode fs-20"></iconify-icon>
                        <iconify-icon icon="solar:sun-2-bold-duotone" class="light-mode fs-20"></iconify-icon>
                     </a>
                  </li>
                 
                   <li class="dropdown topbar-item">
                        <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false" data-bs-offset="0,19">
                            <iconify-icon icon="solar:bell-bing-bold-duotone" class="fs-20"></iconify-icon>
                            <span class="alert-badge"></span>
                        </a>
                        <div class="dropdown-menu stop dropdown-menu-end dropdown-lg py-0">
                        
                            <h5 class="dropdown-item-text m-0 py-3 d-flex justify-content-between align-items-center">
                                Notifications <a href="#" class="badge text-body-tertiary badge-pill">
                                    <i class="iconoir-plus-circle fs-4"></i>
                                </a>
                            </h5>
                            <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-1" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link mx-0 active" data-bs-toggle="tab" href="#All" role="tab" aria-selected="true">
                                        All <span class="badge bg-primary-subtle text-primary badge-pill ms-1">24</span>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link mx-0" data-bs-toggle="tab" href="#Projects" role="tab" aria-selected="false" tabindex="-1">
                                        Projects
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link mx-0" data-bs-toggle="tab" href="#Teams" role="tab" aria-selected="false" tabindex="-1">
                                        Team
                                    </a>
                                </li>
                            </ul>
                            <div class="ms-0" style="max-height:230px;" data-simplebar>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="All" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">2 min ago</small>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-wolf fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Your order is placed</h6>
                                                    <small class="text-muted mb-0">Dummy text of the printing and industry.</small>
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </a><!--end-item-->
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">10 min ago</small>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-apple-swift fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Meeting with designers</h6>
                                                    <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </a><!--end-item-->
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">40 min ago</small>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">                                                    
                                                    <i class="iconoir-birthday-cake fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">UX 3 Task complete.</h6>
                                                    <small class="text-muted mb-0">Dummy text of the printing.</small>
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </a><!--end-item-->
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">1 hr ago</small>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-drone fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Your order is placed</h6>
                                                    <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </a><!--end-item-->
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">2 hrs ago</small>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-user fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Payment Successfull</h6>
                                                    <small class="text-muted mb-0">Dummy text of the printing.</small>
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </a><!--end-item-->
                                    </div>
                                    <div class="tab-pane fade" id="Projects" role="tabpanel" aria-labelledby="projects-tab" tabindex="0">
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">40 min ago</small>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">                                                    
                                                    <i class="iconoir-birthday-cake fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">UX 3 Task complete.</h6>
                                                    <small class="text-muted mb-0">Dummy text of the printing.</small>
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </a><!--end-item-->
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">1 hr ago</small>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-drone fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Your order is placed</h6>
                                                    <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </a><!--end-item-->
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">2 hrs ago</small>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-user fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Payment Successfull</h6>
                                                    <small class="text-muted mb-0">Dummy text of the printing.</small>
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </a><!--end-item-->
                                    </div>
                                    <div class="tab-pane fade" id="Teams" role="tabpanel" aria-labelledby="teams-tab" tabindex="0">
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">1 hr ago</small>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-drone fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Your order is placed</h6>
                                                    <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </a><!--end-item-->
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">2 hrs ago</small>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-user fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Payment Successfull</h6>
                                                    <small class="text-muted mb-0">Dummy text of the printing.</small>
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </a><!--end-item-->
                                    </div>
                                </div>
                            
                            </div>
                            <!-- All-->
                            <a href="pages-notifications.html" class="dropdown-item text-center text-dark fs-13 py-2">
                                View All <i class="fi-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                  <li class="dropdown topbar-item">
                     <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false" data-bs-offset="0,19">
                     <img src="<?php if (session()->id == 3) {
                                                            echo 'images/sam.jpg';
                                                          } else {
                                                            echo 'images/kokou.jpg';
                                                          } ?>" alt="" class="thumb-md rounded">
                     </a>
                     <div class="dropdown-menu dropdown-menu-end py-0">
                        <div class="d-flex align-items-center dropdown-item py-2 bg-secondary-subtle">
                           <div class="flex-shrink-0">
                              <img src="<?php if (session()->id == 3) {
                                                            echo 'images/sam.jpg';
                                                          } else {
                                                            echo 'images/kokou.jpg';
                                                          } ?>" alt="" class="thumb-md rounded-circle">
                           </div>
                           <div class="flex-grow-1 ms-2 text-truncate align-self-center">
                              <h6 class="my-0 fw-medium text-dark fs-13"<?= session()->surname ?> <?= session()->name ?></h6>
                              <small class="text-muted mb-0">Front End Developer</small>
                           </div>
                           <!--end media-body-->
                        </div>
                        <div class="dropdown-divider mt-0"></div>
                        <small class="text-muted px-2 pb-1 d-block">Compte</small>
                        <a class="dropdown-item" href="#"><i class="las la-user fs-18 me-1 align-text-bottom"></i> Profile</a>
                        <a class="dropdown-item" href="pages-faq.html"><i class="las la-question-circle fs-18 me-1 align-text-bottom"></i> Editer MDP</a> 
                                             
                        <div class="dropdown-divider mb-0"></div>
                        <a class="dropdown-item text-danger" href="/logout"><i class="las la-power-off fs-18 me-1 align-text-bottom"></i> Logout</a>
                     </div>
                  </li>
               </ul>
               <!--end topbar-nav-->
            </nav>
            <!-- end navbar-->
         </div>
      </div>
      <!-- Top Bar End -->


    <!-- leftbar-tab-menu -->
    <div class="startbar d-print-none">
        <!--start brand-->
        <div class="brand">
            <a href="index.html" class="logo">
                <span>
                    <img src="assets/images/logo-sm.png" alt="logo-small" class="logo-sm">
                </span>
                <span class="">
                    <img src="assets/images/logo-light.png" alt="logo-large" class="logo-lg logo-light">
                    <img src="assets/images/logo-dark.png" alt="logo-large" class="logo-lg logo-dark">
                </span>
            </a>
        </div>
        <!--end brand-->
        <!--start startbar-menu-->
         <div class="startbar-menu" >
            <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
               <div class="d-flex align-items-start flex-column w-100">
                  <!-- Navigation -->
                  <ul class="navbar-nav mb-auto w-100">
                     <li class="menu-label mt-2">
                        <span>Statistique</span>
                     </li>
                     <li class="nav-item">
                        
                           <ul class="nav flex-column">
                              <li class="nav-item">
                                 <a href="/dashbord" class="nav-link ">Tableau de bord</a>
                              </li>
                              <!--end nav-item-->
                              <li class="nav-item">
                                 <a href="/reports" class="nav-link ">Rapports</a>
                              </li>
                              <!--end nav-item-->
                              <li class="nav-item">
                                 <a href="/stats_client" class="nav-link ">Stats Clients</a>
                              </li>
                              <!--end nav-item-->
                              <li class="nav-item">
                                 <a href="#" class="nav-link ">Academy</a>
                              </li>
                              <!--end nav-item-->
                              <li class="nav-item">
                                 <a href="#" class="nav-link ">CRM</a>
                              </li>
                              <!--end nav-item-->
                              <li class="nav-item">
                                 <a href="#" class="nav-link ">E commece</a>
                              </li>
                              <!--end nav-item-->
                           </ul>
                           <!--end nav-->
                       
                     </li>
                     <!--end nav-item--> 
                     <li class="nav-item">
                        <a class="nav-link" href="#sidebarAnalytics" data-bs-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="sidebarAnalytics">
                           <iconify-icon icon="solar:chart-2-bold-duotone" class="menu-icon"></iconify-icon>
                           <span>Analytics</span>
                        </a>
                        <div class="collapse " id="sidebarAnalytics">
                           <ul class="nav flex-column">
                              <li class="nav-item">
                                 <a href="#" class="nav-link ">Customers</a>
                              </li>
                              <!--end nav-item-->
                              <li class="nav-item">
                                 <a href="analytics-reports.html" class="nav-link ">Reports</a>
                              </li>
                              <!--end nav-item-->
                           </ul>
                           <!--end nav-->
                        </div>
                     </li>
                   
                  </ul>
                  <!--end navbar-nav--->
                  <!-- Navigation -->
                  <ul class="navbar-nav mb-auto w-100">
                     <li class="menu-label mt-2">
                        <span>Donnée structure</span>
                     </li>
                    
                     

                     <li class="nav-item">
                        
                        
                           <ul class="nav flex-column">
                              <li class="nav-item">
                                 <a class="nav-link" href="/customers">
                           <!-- <iconify-icon icon="solar:chat-round-line-bold-duotone" class="menu-icon"></iconify-icon> -->
                           <span>Clients</span>
                        </a>
                              </li>
                              <!--end nav-item-->
                              <li class="nav-item">
                                 <a class="nav-link" href="/operations">
                           <!-- <iconify-icon icon="solar:calendar-date-bold-duotone" class="menu-icon"></iconify-icon> -->
                           <span>Envoi -> Sénégal | CI</span>
                        </a>
                              </li>
                              <!--end nav-item-->
                              <li class="nav-item">
                                 <a class="nav-link" href="/supply">
                          <!--  <iconify-icon icon="solar:bill-list-bold-duotone" class="menu-icon"></iconify-icon> -->
                           <span>Envoi -> Gabon</span>
                        </a>
                              </li>
                             <!--  <li class="nav-item">
                                 <a class="nav-link" href="#">Orders</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#">Order Details</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#">Refunds</a>
                              </li> -->
                           </ul>
                           <!--end nav-->
                      
                     </li>
                     

					 <li class="menu-label mt-2">
                                <small class="label-border">
                                    <div class="border_left hidden-xs"></div>
                                    <div class="border_right"></div>
                                </small>
                                <span>autres</span>
                            </li>
                            <li class="nav-item">
                               
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="/loans">Géstion prêts</a>
                                        </li><!--end nav-item--> 
                                        <li class="nav-item">
                                            <a class="nav-link" href="/investments">Gestion depôts</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="/budgets">Gestion budget</a>
                                        </li><!--end nav-item-->
                                        
                                    </ul><!--end nav-->
                               
                            </li><!--end nav-item-->
                            <li class="nav-item">
                        <a class="nav-link" href="apps-contact-list.html">
                           <iconify-icon icon="solar:users-group-rounded-bold-duotone" class="menu-icon"></iconify-icon>
                           <span>Users</span>
                        </a>
                     </li>
                  </ul>
                  
                  <!--end navbar-nav--->

				  
               </div>
            </div>
            <!--end startbar-collapse-->
         </div>
         <!--end startbar-menu--> 

    </div><!--end startbar-->
    <div class="startbar-overlay d-print-none"></div>
    <!-- end leftbar-tab-menu-->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row gap-0">
                <div class="col-sm-12">
                    <div class="page-title-content d-sm-flex justify-content-sm-between align-items-center">
                         <h4 class="page-title mt-3 mt-md-0"><?php if ($page_title === 'Dashboard') { ?>Indices de performance<?php } ?> </h4>   
                        <div class="">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#"><?php
$date = date("d-m-Y");
$heure = date("H:i");
Print("$date et il est $heure");
?></a>
                                </li><!--end nav-item-->
                                <!-- <li class="breadcrumb-item active">Dashboard</li> -->
                            </ol>
                        </div>                            
                    </div><!--end page-title-box-->
                </div><!--end col-->

                <div class="text-center">
                        <p>
                           <?php if (session()->getFlashdata('success')) { ?>
                              <div class="alert alert-success" style="font-size:14px;">
                              	<?php echo session()->getFlashdata('success'); ?>
                              </div>
                              <?php } ?></p>
                              <p><?php if (session()->getFlashdata('mistake')) { ?>
                              <div class="alert alert-danger" style="font-size:14px;">
                              	<?php echo session()->getFlashdata('mistake'); ?>
                              </div>
                              <?php } ?> 
                        </p>
                     </div>
            </div><!--end row-->
        </div><!--end container-->
    </div><!--end page title-->
    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">
               <?= $this->renderSection('content') ?>
                <!--end row-->
               
           


             
            </div><!-- container -->

            <!--Start Rightbar-->
            <!--Start Endbar-->
           


            <div class="endbar-overlay d-print-none"></div>

            <!--end Rightbar-->
            <!--Start Footer-->
            
            <footer class="footer text-center text-sm-start d-print-none" style="margin-bottom: -20px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 px-0">
                            <div class="card mb-0 rounded-bottom-0 border-0">
                                <div class="card-body">
                                    <p class="text-muted mb-0">
                                        ©
                                        <script> document.write(new Date().getFullYear()) </script>
                                        Quick transfer
                                        <span
                                            class="text-muted d-none d-sm-inline-block float-end">
                                            Développé avec
                                            <i class="iconoir-heart-solid text-danger align-middle"></i>
                                            par Ismaël DIBOTI</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    <!-- Javascript  -->
    <!-- vendor js -->
      <!-- end page-wrapper -->
      <!-- Javascript  -->  
      <!-- vendor js -->
      <script src="<?= base_url() ?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="<?= base_url() ?>/assets/libs/simplebar/simplebar.min.js"></script>
      <script src="<?= base_url() ?>/assets/libs/iconify-icon/iconify-icon.min.js"></script>
      <script src="<?= base_url() ?>/assets/libs/simple-datatables/umd/simple-datatables.js"></script>
      <script src="<?= base_url() ?>/assets/js/pages/datatable.init.js"></script>  
      <script src="<?= base_url() ?>/assets/js/app.js"></script>

        <script src="<?= base_url() ?>/assets/libs/mobius1-selectr/selectr.min.js"></script>
        <script src="<?= base_url() ?>/assets/libs/huebee/huebee.pkgd.min.js"></script>
        <script src="<?= base_url() ?>/assets/libs/vanillajs-datepicker/js/datepicker-full.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/moment.js"></script>
        <script src="<?= base_url() ?>/assets/libs/imask/imask.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/pages/forms-advanced.js"></script>
        
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
    
    <script src="<?= base_url() ?>/assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/jsvectormap/maps/world.js"></script>
    <script src="<?= base_url() ?>/assets/js/pages/ecommerce-index.init.js"></script> 

    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/iconify-icon/iconify-icon.min.js"></script>
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/academy.init.js"></script>  

    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" 
    integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"95ab29765c7bf047","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.6.2","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>


    <!-- Chart.js -->
    <script src="<?= base_url() ?>/vendors/Chart.js/dist/Chart.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>


    <!-- Script ChartJS -->
	    <?php if ($page_title === 'Dashboard') { ?>
	      <!-- Start chartjs-->
	      <script>
	        document.addEventListener("DOMContentLoaded", function() {
	          // Pie chart
	          new Chart(document.getElementById("chartjs-dashboard-pie"), {
	            type: 'pie',
	            data: {
	              labels: ["Chrome", "Firefox", "IE", "Other"],
	              datasets: [{
	                data: [4401, 4003, 1589],
	                backgroundColor: [
	                  window.theme.primary,
	                  window.theme.warning,
	                  window.theme.danger,
	                  "#E8EAED"
	                ],
	                borderColor: "transparent"
	              }]
	            },
	            options: {
	              responsive: !window.MSInputMethodContext,
	              maintainAspectRatio: false,
	              legend: {
	                display: false
	              },
	              cutoutPercentage: 75
	            }
	          });
	        });
	      </script>
	      <script>

			// Chart radar start
	        const radar_chart = <?= json_encode($radar_chart)?>;
	        const month_num = radar_chart.map(item => item.month_num);
	        const month_profit = radar_chart.map(item => item.month_profit);
           
	        new Chart("radar", {
	          type: "radar",
	          data: {
	            labels: month_num,
	            datasets: [{
	              data: month_profit,
	              borderColor: "green",
	              fill: false
	            }, ]
	          },
	          options: {
	            legend: {
	              display: false
	            }
	          }
	        });

			// Chart radar end
	      </script> 

		  <script>

			// Chart line started
	        const line_chart = <?= json_encode($line_chart)?>;
	        const labels2 = line_chart.map(item => item.day);
	        const current_data2 = line_chart.map(item => item.profit);
	        const last_data2 = line_chart.map(item => item.lost);

	        new Chart("chartjs_bar", {
	          type: "line",
	          data: {
	            labels: labels2,
	            datasets: [{
	              data: last_data2,
	              borderColor: "red",
	              fill: false
	            }, {
	              data: current_data2,
	              borderColor: "green",
	              fill: false
	            }]
	          },
	          options: {
	            legend: {
	              display: false
	            }
	          }
	        });

			// Chart line end
	      </script>




	      <script>

			// Chart bar
	        const bar_chart = <?= json_encode($bar_chart) ?>;
	        const labels_camember = bar_chart.map(item => item.month);
	        const week_camember = bar_chart.map(item => item.profit);
	        const lost = bar_chart.map(item => item.lost);

	        var barColors = [
	          "#b91d47",
	          "#00aba9",
	          "#2b5797",
	          "#e8c3b9",
	          "#1e7145"
	        ];

	        new Chart("pie1Chart", {
	          type: "bar",
	          data: {
	            labels: labels_camember,
	            datasets: [{
	              backgroundColor: barColors,
	              data: week_camember
	            }]
	          },
	          options: {
	            title: {
	              display: true,
	             
	            }
	          }
	        });

			// Chart bar End

	      </script>
	      <script>
	        $(function() {
	          $('#datatables-dashboard-projects').DataTable({
	            pageLength: 6,
	            lengthChange: false,
	            bFilter: false,
	            autoWidth: false
	          });
	        });
	      </script>
	      <script>
	        $(function() {
	          $('#datetimepicker-dashboard').datetimepicker({
	            inline: true,
	            sideBySide: false,
	            format: 'L'
	          });
	        });
	      </script>
	      <script>
	        document.addEventListener("DOMContentLoaded", function() {
	          // Bar chart
	          new Chart(document.getElementById("chartjs-bar"), {
	            type: "line",
	            data: {
	              labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
	              datasets: [{
	                label: "Last year",
	                backgroundColor: window.theme.primary,
	                borderColor: window.theme.primary,
	                hoverBackgroundColor: window.theme.primary,
	                hoverBorderColor: window.theme.primary,
	                data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
	                barPercentage: .75,
	                categoryPercentage: .5
	              }, {
	                label: "This year",
	                backgroundColor: "#dee2e6",
	                borderColor: "#dee2e6",
	                hoverBackgroundColor: "#dee2e6",
	                hoverBorderColor: "#dee2e6",
	                data: [69, 66, 24, 48, 52, 51, 44, 53, 62, 79, 51, 68],
	                barPercentage: .75,
	                categoryPercentage: .5
	              }]
	            },
	            options: {
	              maintainAspectRatio: false,
	              legend: {
	                display: false
	              },
	              scales: {
	                yAxes: [{
	                  gridLines: {
	                    display: false
	                  },
	                  stacked: false,
	                  ticks: {
	                    stepSize: 20
	                  }
	                }],
	                xAxes: [{
	                  stacked: false,
	                  gridLines: {
	                    color: "transparent"
	                  }
	                }]
	              }
	            }
	          });
	        });
	      </script>
	      <script>
	        document.addEventListener("DOMContentLoaded", function() {
	          // Doughnut chart
	          new Chart(document.getElementById("chartjs-doughnut"), {
	            type: "doughnut",
	            data: {
	              labels: ["Social", "Search Engines", "Direct", "Other"],
	              datasets: [{
	                data: [260, 125, 54, 146],
	                backgroundColor: [
	                  window.theme.primary,
	                  window.theme.success,
	                  window.theme.warning,
	                  "#dee2e6"
	                ],
	                borderColor: "transparent"
	              }]
	            },
	            options: {
	              maintainAspectRatio: false,
	              cutoutPercentage: 65,
	              legend: {
	                display: false
	              }
	            }
	          });
	        });
	      </script>
	    <?php } ?>   
   </body>
   <!--end body-->
   <!-- Mirrored from mannatthemes.com/materialy/default/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Dec 2025 00:32:31 GMT -->
</html>

<?php } else {?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material Design Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="material-logo">
                    <div class="icon d-flex align-items-center justify-content-center">
							<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-7W58qI4ZkTRENCFu9FTyHItdyZ8HCMf2eQ&s" style="height: 130px;" alt="">
						</div>
                </div>
                
               
            </div>
            
            <form class="login-form" id="loginForm" novalidate action="/login" method="POST">
                <div class="form-group">
                    <div class="input-wrapper">
                        <input type="email" id="email" name="user_email" required autocomplete="email">
                        <label for="email">Email</label>
                        <div class="input-line"></div>
                        <div class="ripple-container"></div>
                    </div>
                    <span class="error-message" id="emailError"></span>
                </div>

                <div class="form-group">
                    <div class="input-wrapper password-wrapper">
                        <input type="password" id="password" name="user_password" required autocomplete="current-password">
                        <label for="password">Password</label>
                        <div class="input-line"></div>
                        <button type="submit" class="password-toggle" id="passwordToggle" aria-label="Toggle password visibility">
                            <div class="toggle-ripple"></div>
                            <span class="toggle-icon"></span>
                        </button>
                        <div class="ripple-container"></div>
                    </div>
                    <span class="error-message" id="passwordError"></span>
                </div>

                

                <button type="submit" class="login-btn material-btn">
                    <div class="btn-ripple"></div>
                    <span class="btn-text">Connexion</span>
                    <div class="btn-loader">
                        <svg class="loader-circle" viewBox="0 0 50 50">
                            <circle class="loader-path" cx="25" cy="25" r="12" fill="none" stroke="currentColor" stroke-width="3"/>
                        </svg>
                    </div>
                </button>
            </form>

            <div class="divider">
                <span>or</span>
            </div>

            <div class="social-login">
                <button type="button" class="social-btn google-material">
                    <div class="social-ripple"></div>
                    <div class="social-icon google-icon">
                        <svg viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                    </div>
                    <span>Continue with Google</span>
                </button>
            </div>

           
        </div>
    </div>

    <script src="../../shared/js/form-utils.js"></script>
    <script src="script.js"></script>
</body>
</html>

<?php } ?>
