<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
  <!-- end leftbar-tab-menu-->
      <div class="page-title-box">
            <div class="row gap-0">
               <div class="col-sm-12">
                  <div class="page-title-content d-sm-flex justify-content-sm-between align-items-center">
                     <h4 class="page-title mt-3 mt-md-0">Liste de tous les prêts</h4>
                    
                     <div class="">
                        <ol class="breadcrumb mb-0">
                        </ol>
                     </div>
                     <button class=" endbar-btn btn btn-success " href="javascript:void(0);" id="toggleendbar">Ajouter nouveau</button>                         
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
                                        <th>ID</th>
                <th>DATE DE PRET</th>
                <th>EMPREINTEUR</th>
                <th>MONTANT</th>
                <th>PAYS</th>
                <th>STATUS</th>
                <th>ACTION</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php foreach ($loan_data as $data): ?>
                <tr>
                  <td><?= $data['loan_id'] ?></td>
                  <td><?= $data['created_at'] ?></td>
                  <td><?= $data['surname'] ?></td>
                  <td><?= $data['amount'] ?></td>
                  <td><?= $data['code_country'] ?></td>
                  <td><?= $data['status'] ?></td>
                  <td>
                    <!-- <a href="/operations/show/<?= $data['loan_id'] ?>" class="btn btn-primary btn-sm">View</a> -->
                    <?php if ($data['status'] !== 'remboursée') { ?>

                      <a href="/loan/edit/<?= $data['loan_id'] ?>" onclick="return confirm('Souhaitez-vous faire une avance à ce prêt?')" class="btn btn-warning btn-sm">Faire une avance</a>
                      <a href="/loan/buy_loan/<?= $data['loan_id'] ?>" onclick="return confirm('Souhaitez-vous payer cette dette?')" class="btn btn-success btn-sm" type="submit">Tout payer</a>
                      <!-- <a href="/loan/delete/<?= $data['loan_id'] ?>" onclick="return confirm('Etes vous sure?')" class="btn btn-danger btn-sm">Delete</a> -->
                    <?php } ?>
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
                           Nouveau prêt
                           <a href="#" class="text-body-tertiary d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Invite">
                              <!--  <i class="iconoir-calendar fs-13 me-1"></i><span class="fs-12">Invite</span> -->
                           </a>
                        </h5>
                        <div class="">
                           <div class="col-md-6 col-lg-12">
                              <div class="card">
                                 <div class="card-body pt-0">
                                    <form action="/loan/save" method="POST"><br>
                                     <div class="mb-3 row">
                                        <div class="col-sm-10">
                                          <label class="mb-2">Pays</label>
                                            <select name="code_country" required class="form-select form-control form-control-default">
              <option value="">Choisir un pays</option>
              <option value="Gabon">Gabon</option>
              <option value="Senegal">Sénégal</option>

            </select> 
                                            
                                          </div>
                                       </div>
                                       <div class="mb-3 row">
                                          <!--  <label for="horizontalInput1" class="col-sm-2 col-form-label">Nom client</label> -->
                                          <div class="col-sm-10">
                                             <input type="text" name="amount"" class="form-control" id="horizontalInput1" placeholder="Amount">
                                          </div>
                                       </div>
                                       <div class="mb-3 row">
                                         
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
                     </div>
                     <hr class="hr-dashed my-3">
                  </div>
               </div>
            </div>
            <!--end Endbar-->
<?= $this->endSection() ?>