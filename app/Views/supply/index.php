<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
  <!-- end leftbar-tab-menu-->
      <div class="page-title-box">
         <div class="container-fluid">
            <div class="row gap-0">
               <div class="col-sm-12">
                  <div class="page-title-content d-sm-flex justify-content-sm-between align-items-center">
                     <h4 class="page-title mt-3 mt-md-0">Liste de toutes les opérations -> Gabon</h4>
                     <div class="text-center">
                        
                     </div>
                     <div class="">
                        <ol class="breadcrumb mb-0">
                        </ol>
                     </div>
                     <button class=" endbar-btn btn btn-success " href="javascript:void(0);" id="toggleendbar">Ajouter</button>                         
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
                           <div class="table-responsive">
                              <table class="table datatable" id="datatable_2">
                                 <thead class="">
                                    <tr>
                                       <th>N°</th>
                <th>CREATEUR & DATE</th>
                <th>MONTANT</th>
                <th>PROFIT</th>
                <th>Customer_name</th>
                <th>TELEPHONE</th>
                <th>ACTION</th>
                                    </tr>
                                 </thead>
                                 <tbody><?php foreach ($supply_data as $data): ?>
                <tr>
                  <td><?= $data['supply_id'] ?></td>
                  <td><?= $data['surname'] ?> at <?= $data['created_at'] ?></td>
                  <td><?= $data['amount'] ?></td>
                  <td><?= $data['profit'] ?></td>
                  <td><?= $data['cust_name'] ?></td>
                  <td><?= $data['customer_code'] ?></td>
                  <td>
                    <!-- <a href="/supply/show/<?= $data['supply_id'] ?>" class="btn btn-primary btn-sm">View</a> -->
                    <!-- <a href="/supply/edit/<?= $data['supply_id'] ?>" onclick="return confirm('Vous souhaitz modifier?')" class="btn btn-warning btn-sm">Edit</a> -->
                    <!-- <a href="/supply/delete/<?= $data['supply_id'] ?>" onclick="return confirm('Etes vous sure?')" class="btn btn-danger btn-sm">Delete</a> -->
                  </td>
                </tr>
              <?php endforeach; ?>
                                 </tbody>
                              </table>
                              <button type="button" class="btn btn-sm btn-primary csv">Export CSV</button>
                              <button type="button" class="btn btn-sm btn-primary sql">Export SQL</button>
                              <button type="button" class="btn btn-sm btn-primary txt">Export TXT</button>
                              <button type="button" class="btn btn-sm btn-primary json">Export JSON</button>
                           </div>
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
            <!--Start Rightbar-->
            <!--Start Endbar-->
            <div class="endbar d-print-none" >
               <div class="vh-100" data-simplebar>
                  <div class="">
                     <div class="">
                        <div id="apexBar1"></div>
                     </div>
                     <br> <br> <br>
                     <div class="px-3">
                        <h5 class="fs-14 m-0 pb-3 d-flex justify-content-between align-items-center">
                           Envoi sénégal enreigistrement
                           <a href="#" class="text-body-tertiary d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Invite">
                              <!--  <i class="iconoir-calendar fs-13 me-1"></i><span class="fs-12">Invite</span> -->
                           </a>
                        </h5>
                        <div class="">
                           <div class="col-md-6 col-lg-12">
                              <div class="card">
                                 <div class="card-body pt-0">
                                    <form action="/supply/save" method="POST"><br>
                                       <div class="mb-3 row">
                                        <div class="col-sm-10">
                                          <label class="mb-2">Bénéficiaire</label>
                                            <select id="default" name="customer_code">
                                                <option value="value-1">Choisir</option>
                                                <?php foreach ($customer_data as $data): ?>
              <option value="<?= $data['tel_customer'] ?>"><?= $data['name'] ?> - <?= $data['tel_customer']?></option>
           
              <?php endforeach; ?>
                                            </select> 
                                            
                                          </div>
                                       </div>
                                       <div class="mb-3 row">
                                          <!--  <label for="horizontalInput2" class="col-sm-2 col-form-label">Phone</label> -->
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="horizontalInput2" name="amount" placeholder="Montant">
                                          </div>
                                          <input type="hidden" name="user_id" value="<?= session()->id ?>" class="form-control">
                                       </div>
                                       <div class="row">
                                          <div class="col-sm-10 ms-auto">
                                             <button type="submit" class="btn btn-success">Submit</button>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                                 <!--end card-body--> 
                              </div>
                              <!--end card--> 
                           </div>
                           <!--end col--> 
                       
                     </div>
                     <hr class="hr-dashed my-3">
                  </div>
               </div>
            </div>
            <!--end Endbar-->
<?= $this->endSection() ?>