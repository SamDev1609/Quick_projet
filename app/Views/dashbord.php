<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
  <!-- end leftbar-tab-menu-->
    <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">                                    
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="text-primary  position-relative ">
                                                <i class="iconoir-dollar-circle fs-28"></i>
                                                <span class="s-box bg-primary-subtle"></span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-2 text-truncate">
                                            <h6 class="text-dark mb-0 fw-semibold fs-20"><?= number_format($profit_total_now, 0, ',', ' ')?></h6>
                                            <p class="text-muted mb-0 fw-medium fs-13">Gain GA actuel</p>
                                        </div><!--end media-body-->
                                    </div><!--end media-->
                                    <div class="align-self-center">
                                        <span class="badge bg-success-subtle text-success border border-success px-2">Préc :<?= number_format($profit_total_1, 0, ',', ' ') ?></span>
                                    </div>
                                </div>                                
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">                                    
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="text-success  position-relative ">
                                               <i class="iconoir-dollar-circle fs-28"></i>
                                                <span class="s-box bg-success-subtle"></span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-2 text-truncate">
                                            <h6 class="text-dark mb-0 fw-semibold fs-20"><?= number_format($ts_profit_data, 0, ',', ' ')?></h6>
                                            <p class="text-muted mb-0 fw-medium fs-13">Total profit SN obtenu</p>
                                        </div><!--end media-body-->
                                    </div><!--end media-->
                                    <!-- <div class="align-self-center">
                                        <span class="badge bg-success-subtle text-success border border-success px-2">8.1%</span>
                                    </div> -->
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">                                    
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="text-warning  position-relative ">
                                               <i class="iconoir-dollar-circle fs-28"></i>
                                                <span class="s-box bg-warning-subtle"></span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-2 text-truncate">
                                            <h6 class="text-dark mb-0 fw-semibold fs-20"><?= number_format($profittop, 0, ',', ' ')?></h6>
                                            <p class="text-muted mb-0 fw-medium fs-13">Total  profit GA obtenu</p>
                                        </div><!--end media-body-->
                                    </div><!--end media-->
                                   <!--  <div class="align-self-center">
                                        <span class="badge bg-danger-subtle text-danger border border-danger px-2">0.7%</span>
                                    </div> -->
                                </div> 
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">                                    
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="text-pink  position-relative ">
                                               <i class="iconoir-dollar-circle fs-28"></i>
                                                <span class="s-box bg-pink-subtle"></span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-2 text-truncate">
                                            <h6 class="text-dark mb-0 fw-semibold fs-20"><?= number_format($profit_current, 0, ',', ' ')?></h6>
                                            <p class="text-muted mb-0 fw-medium fs-13">Gain SN actuel</p>
                                        </div><!--end media-body-->
                                    </div><!--end media-->
                                    <div class="align-self-center">
                                        <span class="badge bg-success-subtle text-success border border-success px-2"> Préc : <?= number_format($profit_senegal_1, 0, ',', ' ')?></span>
                                    </div>
                                </div> 
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->                    
                </div>
                <!--end row-->
                 <div class="row"> 
                    <div class="col-md-12 col-lg-8">
                        <div class="card" style="height:92%;">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">                      
                                        <h4 class="card-title">Evolution transfert</h4>                      
                                    </div><!--end col-->
                                    
                                </div>  <!--end row-->                                  
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                
                                <canvas id="chartjs_bar" width="200" height="50" ></canvas>                                   
                            </div>
                            <br><br><br><br><br><br><br><!--end card-body--> 
                        </div><!--end card-->                             
                    </div> <!--end col-->
                    <div class="col-md-12 col-lg-4">
                       <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">                      
                                        <h4 class="card-title">Budget Actuel | Précédant</h4>                      
                                    </div><!--end col-->
                                </div>  <!--end row-->                                  
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-12 col-md-6 align-self-center">
                                        <div id="ana_device" class="mt-n2"></div>                                                                               
                                    </div><!--end col-->
                                    <div class="col-12 col-md-6 align-self-center">
                                        <div class="text-center">
                                            <h6 class="text-dark mb-2 fw-semibold fs-24"><?= number_format($liq_total, 0, ',', ' ')?></h6>
                                            <ul class="list-unstyled d-flex text-center justify-content-center url-list mb-0">
                                                <li class="list-item ms-1 mb-1">
                                                    <i class="fas fa-circle fs-10"  style="color: #2a76f4;"></i>
                                                    <span class="fs-13">Ancien budget <?= number_format($last_bp, 0, ',', ' ')?></span>                                                                                                      
                                                </li>
                                                    
                                            </ul>                                             
                                        </div>
                                    </div><!--end col-->                                   
                                </div><!--end row--> 
                            </div><!--end card-body--> 
                        </div><!--end card-->
                       <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">                      
                                        <h4 class="card-title">Budget par pays</h4>                      
                                    </div><!--end col-->
                                </div>  <!--end row-->                                  
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-12 col-md-6 align-self-center">
                                        <div id="payment" class="mt-n2"></div>                                                                               
                                    </div><!--end col-->
                                    <div class="col align-self-center">
                                                <h6 class="fs-16 mb-0">Gabon</h6>
                                                <p class="fs-13 fw-normal mb-0 text-muted">
                                                    <i class="fas fa-circle fs-10 me-1" style="color: #f4a14d;"></i>
                                                    <?= number_format($liq_ga, 0, ',', ' ')?>
                                                </p>
                                                <hr class="hr-dashed">
                                                <h6 class="fs-16 mb-0">Sénégal</h6>
                                                <p class="fs-13 fw-normal mb-0 text-muted ">
                                                    <i class="fas fa-circle fs-10 me-1"  style="color: #2a76f4;"></i>
                                                    <?= number_format($liq_sn, 0, ',', ' ')?>
                                                </p>
                                            </div><!--end col-->                                 
                                </div><!--end row--> 
                            </div><!--end card-body--> 
                        </div><!--end card-->                            
                    </div> <!--end col--> 
                </div><!--end row--> 

                 <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-4">
                        <div class="card" style="height:95%;">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">                      
                                        <h4 class="card-title">Profit Sénégal par mois</h4>                      
                                    </div><!--end col-->
                                </div>  <!--end row-->                                  
                            </div><!--end card-header-->
                          
                            <div class="card-body pt-0">
                                <canvas id="radar"></canvas>                            
                            </div><!--end card-body--> 
                           
                        </div><!--end card--> 
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    </div> <!--end col-->   
                    <div class="col-md-12 col-lg-8">
                        <div class="card" style="height:95%;">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">                      
                                        <h4 class="card-title">Profit Gabon par mois</h4>                      
                                    </div><!--end col-->
                                </div>  <!--end row-->                                  
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <canvas id="pie1Chart" class="w-100" style="height:290px"></canvas>                                                   
                            </div><!--end card-body--> 
                             
                        </div><!--end card-->
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    </div> <!--end col--> 
                </div><!--end row-->

                <!--Start Endbar-->
            <div class="endbar d-print-none" >
                <div class="vh-100" data-simplebar>
                    <div class="">
                       
                        <br><br>
                        <div class="ms-0 px-3" style="max-height:230px;" data-simplebar>
                            <hr class="hr-dashed my-3">
                        <h5 class="fs-14 m-0 px-3 pb-3 d-flex justify-content-between align-items-center">
                            Envois vers le SN <a href="#" class="text-body-tertiary d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Online">
                                <i class="iconoir-group text-success fs-13 me-1"></i><span class="fs-12">14 Online</span>
                            </a>
                        </h5>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="All2" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
                                    <!-- item-->
                                     <?php foreach ($operation_data as $data) :?>
                                     <a href="#" class="dropdown-item py-3">
                                <span class=" text-white bg-primary  float-end fs-10 size-25 d-flex justify-content-center"><?= $data['created_at']?></span>
                                <div class="d-flex align-items-center">
                                   
                                    <div class="flex-grow-1 ms-2 text-truncate">
                                        <h6 class="my-0 fw-normal text-dark fs-13">Montant <?= $data['amount']?> cfa</h6>
                                        <small class="text-success mb-0">Profit --> <?= $data['profit']?>, Lost-><?= $data['lost']?>cfa</small>
                                    </div><!--end media-body-->
                                </div><!--end media-->
                             </a><!--end-item-->
                             <?php endforeach; ?> 
                                     
                                </div>
                               
                            </div>        
                        </div><br><br>
                       
                       
                        <hr class="hr-dashed my-3"><br><br>
                        <h5 class="fs-14 m-0 px-3 pb-3 d-flex justify-content-between align-items-center">
                            Envois vers le Gabon <a href="#" class="text-body-tertiary d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Online">
                                <i class="iconoir-group text-success fs-13 me-1"></i><span class="fs-12">14 Online</span>
                            </a>
                        </h5>
                        <div class="ms-0 px-3" style="max-height:300px;" data-simplebar>
                            <!-- item-->
                              <?php foreach ($supply_data as $data): ?>
                            <a href="#" class="dropdown-item py-3">
                                <span class=" text-white bg-danger  float-end fs-10 size-25 d-flex justify-content-center"><?= $data['created_at'] ?></span>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 ">
                                        <img src="<?= $data['pic_link'] ?>" alt="" class="thumb-md rounded-circle">
                                    </div>
                                    <div class="flex-grow-1 ms-2 text-truncate">
                                        <h6 class="my-0 fw-normal text-dark fs-13">Montant <?= $data['amount']?> cfa</h6>
                                        <small class="text-success mb-0">Profit --> <?= $data['profit'] ?> cfa</small>
                                    </div><!--end media-body-->
                                </div><!--end media-->
                            </a><!--end-item--> 
                            <?php endforeach; ?>   
                        </div>
                    </div>
                </div>  
            </div>
            <!--end Endbar-->
 
<?= $this->endSection() ?>