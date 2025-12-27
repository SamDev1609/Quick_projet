<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
  <!-- end leftbar-tab-menu-->
      <div class="page-title-box">
       
            <div class="row gap-0">
               <div class="col-sm-12">
                  <div class="page-title-content d-sm-flex justify-content-sm-between align-items-center">
                     <h4 class="page-title mt-3 mt-md-0">LISTE DES RAPPORTS MENSUELS</h4>
                     <div class="text-center">
                        
                     </div>
                     <div class="">
                        <ol class="breadcrumb mb-0">
                        </ol>
                     </div>
                     <button class=" endbar-btn btn btn-success " href="javascript:void(0);" id="toggleendbar">Agrandir la page</button>                         
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
            <th>Nombre rapport</th>
            <th>Mois_Année</th>
            <th>Qty transferts</th>
            <th>Montant transféré</th>
            <th>Profit obtenu</th>
            <th>Pertes</th>
              <th>Action</th>
          </tr>
                                 </thead>
                                 <tbody><?php foreach ($operations_data as $data): ?>
            <tr>
              <td><?= $data['nbre_ligne'] ?></td>
              <td><?= $data['month_year'] ?></td>
              <td><?= $data['counter'] ?></td>
              <td><?= $data['sent_amount'] ?></td>
              <td><?= $data['total_get'] ?></td>
              <td><?= $data['lost'] ?></td>
              <td>
                <a href="/reports/show/<?= $data['month_year']?>" target="blanc" class="btn btn-success btn-sm">Obtenir</a> 
               
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