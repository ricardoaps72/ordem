
<?php $this->load->view('layout/sidebar'); ?> 

<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('/'); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
                      </ol>
                    </nav>
              
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            
                        <form method="post" name="form_edit">
                          <div class="form-group row">
                              <div class="col-md-3">
                                  <label>Razão Social</label>
                                  <input type="text" class="form-control" name="sistema_razao_social" placeholder="Razão Social" value="<?php echo $sistema->sistema_razao_social ?>">
                                  <?php echo form_error('sistema_razao_social', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-3">
                                  <label>Nome Fantasia</label>
                                  <input type="text" class="form-control" name="sistema_nome_fantasia" placeholder="Nome fantasia" value="<?php echo $sistema->sistema_nome_fantasia ?>">
                                    <?php echo form_error('sistema_nome_fantasia', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-3">
                                  <label>CNPJ</label>
                                  <input type="text" class="form-control" name="sistema_cnpj" placeholder="CNPJ" value="<?php echo $sistema->sistema_cnpj ?>">
                                    <?php echo form_error('sistema_cnpj', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>              
                              <div class="col-md-3">
                                  <label>Inscrição Estadual</label>
                                  <input type="text" class="form-control" name="sistema_ie" placeholder="Inscrição Estadual" value="<?php echo $sistema->sistema_ie ?>">
                                  <?php echo form_error('sistema_ie', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                                                                              
                          </div>
                          <div class="form-group row">
                              <div class="col-md-3">
                                  <label>Telefone fixo</label>
                                  <input type="text" class="form-control" name="sistema_telefone_fixo" placeholder="Telefone Fixo" value="<?php echo $sistema->sistema_telefone_fixo ?>">
                                    <?php echo form_error('sistema_telefone_fixo', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-3">
                                  <label>Telefone móvel</label>
                                  <input type="text" class="form-control" name="sistema_telefone_movel" placeholder="Celular" value="<?php echo $sistema->sistema_telefone_movel ?>">
                                    <?php echo form_error('sistema_telefone_movel', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-3">
                                  <label>E-mail</label>
                                  <input type="text" class="form-control" name="sistema_email" placeholder="E-mal" value="<?php echo $sistema->sistema_email ?>">
                                    <?php echo form_error('sistema_email', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                                                                
                              <div class="col-md-3">
                                  <label>URL do site</label>
                                  <input type="text" class="form-control" name="sistema_site_url" placeholder="Url do site" value="<?php echo $sistema->sistema_site_url ?>">
                                    <?php echo form_error('sistema_site_url', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              
                          </div>                          
                          <div class="form-group row">
                              <div class="col-md-4">
                                  <label>Endereço</label>
                                  <input type="text" class="form-control" name="sistema_endereco" placeholder="Endereço" value="<?php echo $sistema->sistema_endereco ?>">
                                    <?php echo form_error('sistema_endereco', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-2">
                                  <label>Cep</label>
                                  <input type="text" class="form-control" name="sistema_cep" placeholder="Cep" value="<?php echo $sistema->sistema_cep ?>">
                                    <?php echo form_error('sistema_cep', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-2">
                                  <label>Número</label>
                                  <input type="text" class="form-control" name="sistema_numero" placeholder="Número" value="<?php echo $sistema->sistema_numero ?>">
                                    <?php echo form_error('sistema_numero', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-2">
                                  <label>Cidade</label>
                                  <input type="text" class="form-control" name="sistema_cidade" placeholder="Cidade" value="<?php echo $sistema->sistema_cidade ?>">
                                    <?php echo form_error('sistema_cidade', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-2">
                                  <label>Estado</label>
                                  <input type="text" class="form-control" name="sistema_estado" placeholder="Estado" value="<?php echo $sistema->sistema_estado ?>">
                                    <?php echo form_error('sistema_estado', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                                                                                              
                          </div>
                          <div class="form-group row">
                              <div class="col-md-12">
                                  <label>Texto da ordem de serviço</label>
                                  <textarea class="form-control" name="sistema_txt_ordem_servico" placeholder="Texto da ordem de serviço"><?php echo $sistema->sistema_txt_ordem_servico ?></textarea>
                                    <?php echo form_error('sistema_txt_ordem_servico', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                          </div>  
                          <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                        </form>
                            
                            
                        </div>
                    </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
