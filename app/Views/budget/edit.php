<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
  <!-- end leftbar-tab-menu-->
      <div class="page-title-box">
         <div class="container-fluid">
            <div class="row gap-0">
               <div class="col-sm-12">
                  <div class="page-title-content d-sm-flex justify-content-sm-between align-items-center">
                     <h4 class="page-title mt-3 mt-md-0">Modification budget</h4>
                    
                     <div class="">
                        <ol class="breadcrumb mb-0">
                        </ol>
                     </div>
                                          
                  </div>
                  <!--end page-title-box-->
               </div>
               <!--end col-->
            </div>
            <!--end row-->
         </div>
         <!--end container-->
      </div>
      <!--end page title--> 
      <br> <br>
      <div class="page-wrapper">
         <!-- Page Content-->
         <div class="page-content">
            <div class="container-fluid">
               <div class="row justify-content-center">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header">
                           <div class="row align-items-center">
                              <div class="col">
                                 <h4 class="card-title">Export Table</h4>
                              </div>
                              <!--end col-->
                           </div>
                           <!--end row-->                                  
                        </div>
                        <!--end card-header-->
                        <div class="card-body pt-0">
                           <div class="col-md-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Horizontal Form</h4>                      
                                        </div><!--end col-->
                                    </div>  <!--end row-->                                  
                                </div><!--end card-header-->
                                <div class="card-body pt-0">
                                    <form action="/budget/update/<?= $budget_data['budget_id']?>" method="post">
                                        <div class="mb-3 row">
                                            <label for="horizontalInput1" class="col-sm-2 col-form-label">Budge Gabont </label>
                                            <div class="col-sm-10">
                                                <input  type="text" id="first-name" value="<?= $budget_data['budget_ga'] ?>" name="budget_ga" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                            
                                        <div class="mb-3 row">
                                            <label for="horizontalInput2" class="col-sm-2 col-form-label">Budget Sénégal</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="budget_sn" value="<?= $budget_data['budget_sn']?>" class="form-control" id="horizontalInput2" placeholder="Password">
                                            </div>
                                            <input type="hidden" name="user_id" value="<?= session()->id ?>" />
                                        </div> 
                                        <div class="row">
                                            <div class="col-sm-10 ms-auto">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                                <button data-dismiss="modal" type="button" class="btn btn-danger">Anuler</button>
                                            </div>
                                        </div> 
                                    </form>               
                                </div><!--end card-body--> 
                            </div><!--end card--> 
                        </div> <!--end col-->    
                        </div>
                        <!--end card-body--> 
                     </div>
                     <!--end card--> 
                  </div>
                  <!--end col-->                                                       
               </div>
               <!--end row-->                                        
            </div>
            <!-- container -->
           
            <!--end Endbar-->
<?= $this->endSection() ?>