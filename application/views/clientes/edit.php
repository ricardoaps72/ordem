
<?php $this->load->view('layout/sidebar'); ?> 

<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('clientes'); ?>">Clientes</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
                      </ol>
                    </nav>
              
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a title = "Voltar" href="<?php echo base_url('clientes'); ?>" class="btn btn-success btn-sm float-right">
                                <i class="fas fa-arrow-left"></i>&nbsp;
                                voltar</a>
                        </div>
                        <div class="card-body">
                            
                            <form class="user" method="post" name="form_edit">
                          <div class="form-group row">
                              <div class="col-md-4">
                                  <label>Nome</label>
                                  <input type="text" class="form-control form-control-user" name="cliente_nome" placeholder="Seu nome" value="<?php echo $cliente->cliente_nome ?>">
                                  <?php echo form_error('cliente_nome', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-4">
                                  <label>Sobrenome</label>
                                  <input type="text" class="form-control form-control-user" name="cliente_sobrenome" placeholder="Seu Sobrenome" value="<?php echo $cliente->cliente_sobrenome ?>">
                                    <?php echo form_error('cliente_sobrenome', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-2">
                                  <label>CPF_CNPJ</label>
                                  <input type="text" class="form-control form-control-user cnpj" name="cliente_cpf_cnpj" placeholder="Seu CPF_CNPJ" value="<?php echo $cliente->cliente_cpf_cnpj ?>">
                                    <?php echo form_error('cliente_cpf_cnpj', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-2">
                                  <label>RG_IE</label>
                                  <input type="text" class="form-control form-control-user" name="cliente_rg_ie" placeholder="Seu CPF_CNPJ" value="<?php echo $cliente->cliente_rg_ie ?>">
                                    <?php echo form_error('cliente_rg_ie', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                                                
                          </div>
                                
                          <div class="form-group row">
                              <div class="col-md-4">
                                  <label>E-mail</label>
                                  <input type="email" class="form-control form-control-user" name="cliente_email" placeholder="Seu nome" value="<?php echo $cliente->cliente_email ?>">
                                  <?php echo form_error('cliente_email', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-2">
                                  <label>Telefone</label>
                                  <input type="text" class="form-control form-control-user sp_celphones" name="cliente_telefone" placeholder="Telefone" value="<?php echo $cliente->cliente_telefone ?>">
                                    <?php echo form_error('cliente_telefone', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-2">
                                  <label>Celular</label>
                                  <input type="text" class="form-control form-control-user sp_celphones" name="cliente_celular" placeholder="Celular" value="<?php echo $cliente->cliente_celular ?>">
                                    <?php echo form_error('cliente_celular', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-2">
                                  <label>Data nascimento</label>
                                  <input type="date" class="form-control form-control-user" name="cliente_data_nascimento" placeholder="Data de nascimento" value="<?php echo $cliente->cliente_data_nascimento ?>">
                                    <?php echo form_error('cliente_data_nascimento', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                                                
                              <div class="col-md-2">
                                  <label>Cep</label>
                                  <input type="text" class="form-control form-control-user cep" name="cliente_cep" placeholder="Seu Cep" value="<?php echo $cliente->cliente_cep ?>">
                                    <?php echo form_error('cliente_cep', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                                                                              
                          </div>                            
                          
                          <div class="form-group row">
                              <div class="col-md-4">
                                  <label>Endereço</label>
                                  <input type="text" class="form-control form-control-user" name="cliente_endereco" placeholder="Seu endereço" value="<?php echo $cliente->cliente_endereco ?>">
                                  <?php echo form_error('cliente_endereco', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-1">
                                  <label>Número</label>
                                  <input type="text" class="form-control form-control-user" name="cliente_numero_endereco" placeholder="Número" value="<?php echo $cliente->cliente_numero_endereco ?>">
                                    <?php echo form_error('cliente_numero_endereco', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-3">
                                  <label>Bairro</label>
                                  <input type="text" class="form-control form-control-user " name="cliente_bairro" placeholder="Seu Bairro" value="<?php echo $cliente->cliente_bairro ?>">
                                    <?php echo form_error('cliente_bairro', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-3">
                                  <label>Cidade</label>
                                  <input type="text" class="form-control form-control-user" name="cliente_cidade" placeholder="Cidade" value="<?php echo $cliente->cliente_cidade ?>">
                                    <?php echo form_error('cliente_cidade', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                                                
                              <div class="col-md-1">
                                  <label>UF</label>
                                  <input type="text" class="form-control form-control-user" name="cliente_estado" placeholder="Estado" value="<?php echo $cliente->cliente_estado ?>">
                                    <?php echo form_error('cliente_estado', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                                                                              
                          </div>                            

                          <div class="form-group row">
                              <div class="col-md-12">
                                  <label>Observações</label>
                                  <textarea class="form-control form-control-user" name="cliente_obs"><?php echo $cliente->cliente_obs ?></textarea>
                                  <?php echo form_error('cliente_obs', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                          </div>                                                            
                          
                                <input type="hidden" name="cliente_id" value="<?php echo $cliente->cliente_id; ?>" />     
                                
                          <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                        </form>
                            
                            
                        </div>
                    </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->