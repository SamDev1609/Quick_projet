<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
  <!-- end leftbar-tab-menu-->
      <div class="page-title-box">
         
            <div class="row gap-0">
               <div class="col-sm-12">
                  <div class="page-title-content d-sm-flex justify-content-sm-between align-items-center">
                     <h4 class="page-title mt-3 mt-md-0">Liste de tous les budgets </h4>
                     <div class="text-center">
                       
                     </div>
                     <div class="">
                        <ol class="breadcrumb mb-0">
                        </ol>
                     </div>
                                          
                  </div>
                  <!--end page-title-box-->
               </div>
               <!--end col-->
           
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
                                       <th>CODE BUDGET</th>
                <th>CCREATEUR & DATE</th>
                <th>GABON</th>
                <th>SENEGAL</th>
                <th>ACTION</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php foreach ($budget_data as $data): ?>
                <tr>
                  <td><?= $data['budget_id'] ?></td>
                  <td><?= $data['surname'] ?> at <?= $data['created_at'] ?></td>
                  <td><?= $data['budget_ga'] ?></td>
                  <td><?= $data['budget_sn'] ?></td>
                  <td>
                    <!-- <a href="/budget/show/<?= $data['budget_id'] ?>" class="btn btn-primary btn-sm">View</a> -->
                    <a href="/budget/edit/<?= $data['budget_id'] ?>" onclick="return confirm('Souhaitez-vous mettre à jour le budget?')" class="btn btn-warning btn-sm">Mettre à jour</a>
                    <!-- <a href="/budget/delete/<?= $data['budget_id'] ?>" onclick="return confirm('Etes vous sure?')" class="btn btn-danger btn-sm">Delete</a> -->
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
            
            <!--end Endbar-->
<?= $this->endSection() ?>