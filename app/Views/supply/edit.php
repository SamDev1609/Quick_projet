<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="row justify-content-center ">
  <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"> Modification des budgets</h4>
                 
                  <form class="forms-sample material-form" action="/budget/update/<?= $budget_data['budget_id']?>" method="POST">
                    <div class="form-group">
                      <input type="text" value="<?= $budget_data['budget_ga'] ?>"  required="required" />
                      <label for="input" class="control-label">Buget Gabon</label><i class="bar"></i>
                    </div>
                    
                    <div class="form-group">
                      <input type="text" value="<?= $budget_data['budget_sn']?>" name="budget_sn" />
					   <label for="sn" class="control-label">Buget Sénégal</label><i class="bar"></i>
                      
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="budeget_ga" value="<?= $budget_data['budget_sn']?>" />
                    </div>
					<div class="form-group">
                      <input type="hidden" name="user_id" value="<?= session()->id?>" />
                     
                    </div>
                   
                    <div class="button-container">
                      <button type="submit" class="button btn-primary"><span>Mettre à jour</span></button>
					  <button type="button" class="button btn-warning"><span>Retour</span></button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
  </div>
                                                             
<?= $this->endSection() ?>