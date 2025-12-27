<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
  <!-- end leftbar-tab-menu-->
      <div class="page-title-box">
         <div class="container-fluid">
            <div class="row gap-0">
               <div class="col-sm-12">
                  <div class="page-title-content d-sm-flex justify-content-sm-between align-items-center">
                     <h4 class="page-title mt-3 mt-md-0">Payment d'une avance au niveau du <?= $loan_data['code_country'] ?></h4>
                    
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
                                    <form action="/loan/update/<?= $loan_data['loan_id'] ?>" method="POST">
                                        <div class="mb-3 row">
                                            <label for="horizontalInput1" class="col-sm-2 col-form-label">Montant d'avance</label>
                                            <div class="col-sm-10">
                                                <input type="text"  name="amount" class="form-control" id="horizontalInput1" placeholder="Enter Email">
                                            </div>
                                        </div>
                                            
                                        <div class="mb-3 row">
                                            <label for="horizontalInput2" class="col-sm-2 col-form-label">Pays</label>
                                            <div class="col-sm-10">
                                                <input type="text" disabled value="<?= $loan_data['code_country'] ?>"  name="code_country"  required="required" class="form-control" id="horizontalInput2" placeholder="Password">
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