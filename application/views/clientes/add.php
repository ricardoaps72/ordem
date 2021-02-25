
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
                        <div class="card-body">
                            
                        <form class="user" method="post" name="form_add">      
                            
                            <div class="custom-control custom-radio custom-control-inline mt-2">
                                <input type="radio" id="pessoa_fisica" name="cliente_tipo" class="custom-control-input" value="1" <?php echo set_checkbox('cliente_tipo', '1') ?> checked="">
                                <label class="custom-control-label pt-1" for="pessoa_fisica">Pessoa física</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pessoa_juridica" name="cliente_tipo" class="custom-control-input" value="2" <?php echo set_checkbox('cliente_tipo', '2') ?> >
                                <label class="custom-control-label pt-1" for="pessoa_juridica">Pessoa jurídica</label>
                            </div>
                        
                            <fieldset class="mt-4 border p-2" >
                                <legend class="font-small"><i class="fas fa-user-tie">&nbsp;Dados pessoais </i> </legend>
                                
                            <div class="form-group row">
                              <div class="col-md-4">
                                  <label>Nome</label>
                                  <input type="text" class="form-control form-control-user" name="cliente_nome" placeholder="Seu nome" value="<?php echo set_value('cliente_nome'); ?>">
                                  <?php echo form_error('cliente_nome', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-4">
                                  <label>Sobrenome</label>
                                  <input type="text" class="form-control form-control-user" name="cliente_sobrenome" placeholder="Seu Sobrenome" value="<?php echo set_value('cliente_sobrenome'); ?>">
                                    <?php echo form_error('cliente_sobrenome', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-2">                                  

                                  <div class="pessoa_fisica">
                                    <label>CPF</label>
                                    <input type="text" class="form-control form-control-user cpf" name= "cliente_cpf" placeholder = 'CPF do cliente' value="<?php echo set_value('cliente_cpf'); ?>">
                                    <?php echo form_error('cliente_cpf', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>                                        
                                  </div>
                                  
                                  <div class="pessoa_juridica">
                                      <label>CNPJ</label>
                                      <input type="text" class="form-control form-control-user cnpj" name= "cliente_cnpj" placeholder = 'CNPJ do cliente' value="<?php echo set_value('cliente_cnpj'); ?>">
                                      <?php echo form_error('cliente_cnpj', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>                                        
                                  </div>                                  

                              </div>                                  
                              <div class="col-md-2">
                                                                      
                                  <label class="pessoa_fisica">RG</label>  
                                  <label class="pessoa_juridica">Inscrição Estadual</label>
                                  
                                  <input type="text" class="form-control form-control-user" name= "cliente_rg_ie" placeholder= '' value="<?php echo set_value('cliente_rg_ie'); ?>">
                                    <?php echo form_error('cliente_rg_ie', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                                    
                              </div>                                                                
                            </div>

                            <div class="form-group row">
                              <div class="col-md-4">
                                  <label>E-mail</label>
                                  <input type="email" class="form-control form-control-user" name="cliente_email" placeholder="Seu nome" value="<?php echo set_value('cliente_email'); ?>">
                                  <?php echo form_error('cliente_email', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-2">
                                  <label>Telefone</label>
                                  <input type="text" class="form-control form-control-user sp_celphones" name="cliente_telefone" placeholder="Telefone" value="<?php echo set_value('cliente_telefone'); ?>">
                                    <?php echo form_error('cliente_telefone', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-2">
                                  <label>Celular</label>
                                  <input type="text" class="form-control form-control-user sp_celphones" name="cliente_celular" placeholder="Celular" value="<?php echo set_value('cliente_celular'); ?>">
                                    <?php echo form_error('cliente_celular', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-4">
                                  <label>Data nascimento</label>
                                  <input type="date" class="form-control form-control-user-date" name="cliente_data_nascimento" placeholder="Data de nascimento" value="<?php echo set_value('cliente_data_nascimento'); ?>">
                                    <?php echo form_error('cliente_data_nascimento', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                                                
                          </div>                            
                          </fieldset>
                          
                          <fieldset class="mt-4 border p-2" >
                            <legend class="font-small"><i class="fas fa-map-marker-alt">&nbsp;Dados de endereço </i> </legend>
                            
                          <div class="form-group row">

                              <div class="col-md-6">
                                  <label>Endereço</label>
                                  <input type="text" class="form-control form-control-user" name="cliente_endereco" placeholder="Seu endereço" value="<?php echo set_value('cliente_endereco'); ?>">
                                  <?php echo form_error('cliente_endereco', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-2">
                                  <label>Número</label>
                                  <input type="text" class="form-control form-control-user" name="cliente_numero_endereco" placeholder="Número" value="<?php echo set_value('cliente_numero_endereco'); ?>">
                                    <?php echo form_error('cliente_numero_endereco', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-4">
                                  <label>Complemento</label>
                                  <input type="text" class="form-control form-control-user" name="cliente_complemento" placeholder="Complemento de endereço" value="<?php echo set_value('cliente_numero_endereco'); ?>">
                                  <?php echo form_error('cliente_complemento', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              
                          </div>
                                
                          <div class="form-group row">
                              <div class="col-md-5">
                                  <label>Bairro</label>
                                  <input type="text" class="form-control form-control-user " name="cliente_bairro" placeholder="Seu Bairro" value="<?php echo set_value('cliente_bairro'); ?>">
                                    <?php echo form_error('cliente_bairro', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>    

                            <div class="col-md-2">
                                <label>Cep</label>
                                <input type="text" class="form-control form-control-user cep" name="cliente_cep" placeholder="Seu Cep" value="<?php echo set_value('cliente_cep'); ?>">
                                  <?php echo form_error('cliente_cep', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                            </div>                                                                                              

                            <div class="col-md-4">
                                <label>Cidade</label>
                                <input type="text" class="form-control form-control-user" name="cliente_cidade" placeholder="Cidade" value="<?php echo set_value('cliente_cidade'); ?>">
                                  <?php echo form_error('cliente_cidade', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                            </div>                                                                
                            <div class="col-md-1">
                                <label>UF</label>
                                <input type="text" class="form-control form-control-user" name="cliente_estado" placeholder="Estado" value="<?php echo set_value('cliente_estado'); ?>">
                                  <?php echo form_error('cliente_estado', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                            </div>
                              
                          </div>                                                                                                                                                  
                          
                          </fieldset>
                            
                            <fieldset class="mt-4 border p-2" >
                                <legend class="font-small"><i class="fas fa-tools">&nbsp;Configurações </i> </legend>
                            <div class="form-group row">
                                <div class="col-md-4">
                                  <label>Cliente ativo</label>
                                  <select class="custom-select" name="cliente_ativo">
                                      <option value="0">Não</option>
                                      <option value="1">Sim</option>
                                  </select>                                          
                                </div>                                                                                              

                                <div class="col-md-8">
                                    <label>Observações</label>
                                    <textarea class="form-control form-control-user" name="cliente_obs"><?php echo set_value('cliente_obs') ;?></textarea>
                                    <?php echo form_error('cliente_obs', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                                </div>                                  
                            </div>    
                            </fieldset>
      
                            
                          <br>      
                          <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                          <a title = "Voltar" href="<?php echo base_url('clientes'); ?>" class="btn btn-success btn-sm ml-2">                                
                             voltar</a>

                        </form>
                            
                            
                        </div>
                    </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->