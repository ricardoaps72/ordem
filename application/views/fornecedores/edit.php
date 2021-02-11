
<?php $this->load->view('layout/sidebar'); ?> 

<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('fornecedores'); ?>">Fornecedores</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
                      </ol>
                    </nav>
              
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            
                        <form class="user" method="post" name="form_edit">
                            
                            <p><strong><i class="fas fa-clock"></i>&nbsp;&nbsp; Última alteração: </strong>&nbsp;<?php echo formata_data_banco_com_hora($fornecedor->fornecedor_data_alteracao); ?> </p>
                        
                            <fieldset class="mt-4 border p-2" >
                                <legend class="font-small"><i class="fas fa-user-tie">&nbsp;Dados pessoais </i> </legend>
                                
                            <div class="form-group row">
                              <div class="col-md-6">
                                  <label>Razão Social</label>
                                  <input type="text" class="form-control form-control-user" name="fornecedor_razao" placeholder="Razão Social" value="<?php echo $fornecedor->fornecedor_razao ?>">
                                  <?php echo form_error('fornecedor_razao', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-6">
                                  <label>Nome Fantasia</label>
                                  <input type="text" class="form-control form-control-user" name="fornecedor_nome_fantasia" placeholder="Nome Fantasia" value="<?php echo $fornecedor->fornecedor_nome_fantasia ?>">
                                    <?php echo form_error('fornecedor_nome_fantasia', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                

                            </div>
                                
                            <div class="form-group row">
                              <div class="col-md-4">
                                  <label>CNPJ</label>
                                  <input type="text" class="form-control form-control-user" name="fornecedor_cnpj" placeholder="CNPJ" value="<?php echo $fornecedor->fornecedor_cnpj ?>">
                                  <?php echo form_error('fornecedor_cnpj', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-4">
                                  <label>Inscrição Estadual</label>
                                  <input type="text" class="form-control form-control-user" name="fornecedor_ie" placeholder="Inscrição estadual" value="<?php echo $fornecedor->fornecedor_ie ?>">
                                    <?php echo form_error('fornecedor_ie', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>
                              <div class="col-md-4">
                                  <label>Telefone Fixo</label>
                                  <input type="text" class="form-control form-control-user" name="fornecedor_telefone" placeholder="Telefone fixo" value="<?php echo $fornecedor->fornecedor_telefone ?>">
                                    <?php echo form_error('fornecedor_telefone', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                                                
                            </div>
                            <div class="form-group row">
                              <div class="col-md-4">
                                  <label>Telefone Celular</label>
                                  <input type="text" class="form-control form-control-user" name="fornecedor_celular" placeholder="Telefone Celular" value="<?php echo $fornecedor->fornecedor_celular ?>">
                                  <?php echo form_error('fornecedor_celular', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-4">
                                  <label>E-mail</label>
                                  <input type="text" class="form-control form-control-user" name="fornecedor_email" placeholder="E-mail" value="<?php echo $fornecedor->fornecedor_email ?>">
                                    <?php echo form_error('fornecedor_email', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>
                              <div class="col-md-4">
                                  <label>Contato</label>
                                  <input type="text" class="form-control form-control-user" name="fornecedor_contato" placeholder="Contato" value="<?php echo $fornecedor->fornecedor_contato ?>">
                                    <?php echo form_error('fornecedor_contato', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                                                
                            </div>
                                
                          </fieldset>                            
                          
                          <fieldset class="mt-4 border p-2" >
                            <legend class="font-small"><i class="fas fa-map-marker-alt">&nbsp;Dados de endereço </i> </legend>
                            
                          <div class="form-group row">

                              <div class="col-md-6">
                                  <label>Endereço</label>
                                  <input type="text" class="form-control form-control-user" name="fornecedor_endereco" placeholder="Seu endereço" value="<?php echo $fornecedor->fornecedor_endereco ?>">
                                  <?php echo form_error('fornecedor_endereco', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-2">
                                  <label>Número</label>
                                  <input type="text" class="form-control form-control-user" name="fornecedor_numero_endereco" placeholder="Número" value="<?php echo $fornecedor->fornecedor_numero_endereco ?>">
                                    <?php echo form_error('fornecedor_numero_endereco', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-4">
                                  <label>Complemento</label>
                                  <input type="text" class="form-control form-control-user" name="fornecedor_complemento" placeholder="Complemento de endereço" value="<?php echo $fornecedor->fornecedor_complemento ?>">
                                  <?php echo form_error('fornecedor_complemento', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              
                          </div>
                                
                          <div class="form-group row">
                              <div class="col-md-5">
                                  <label>Bairro</label>
                                  <input type="text" class="form-control form-control-user " name="fornecedor_bairro" placeholder="Seu Bairro" value="<?php echo $fornecedor->fornecedor_bairro ?>">
                                    <?php echo form_error('fornecedor_bairro', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>    

                            <div class="col-md-2">
                                <label>Cep</label>
                                <input type="text" class="form-control form-control-user cep" name="fornecedor_cep" placeholder="Seu Cep" value="<?php echo $fornecedor->fornecedor_cep ?>">
                                  <?php echo form_error('fornecedor_cep', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                            </div>                                                                                              

                            <div class="col-md-4">
                                <label>Cidade</label>
                                <input type="text" class="form-control form-control-user" name="fornecedor_cidade" placeholder="Cidade" value="<?php echo $fornecedor->fornecedor_cidade ?>">
                                  <?php echo form_error('fornecedor_cidade', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                            </div>                                                                
                            <div class="col-md-1">
                                <label>UF</label>
                                <input type="text" class="form-control form-control-user" name="fornecedor_estado" placeholder="Estado" value="<?php echo $fornecedor->fornecedor_estado ?>">
                                  <?php echo form_error('fornecedor_estado', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                            </div>
                              
                          </div>                                                                                                                                                  

                          
                          </fieldset>
                            
                            <fieldset class="mt-4 border p-2" >
                                <legend class="font-small"><i class="fas fa-tools">&nbsp;Configurações </i> </legend>
                            <div class="form-group row">
                                <div class="col-md-4">
                                  <label>Cliente ativo</label>
                                  <select class="custom-select" name="fornecedor_ativo">
                                      <option value="0" <?php echo $fornecedor->fornecedor_ativo == 0 ? 'selected' : '' ; ?> >Não</option>
                                      <option value="1" <?php echo $fornecedor->fornecedor_ativo == 1 ? 'selected' : '' ; ?> >Sim</option>
                                  </select>                                          
                                </div>                                                                                              

                                <div class="col-md-8">
                                    <label>Observações</label>
                                    <textarea class="form-control form-control-user" name="fornecedor_obs"><?php echo $fornecedor->fornecedor_obs ?></textarea>
                                    <?php echo form_error('fornecedor_obs', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                                </div>                                  
                            </div>    

                            </fieldset>
                            
                          <input type="hidden" name="fornecedor_id" value="<?php echo $fornecedor->fornecedor_id; ?>" /> 
                                                    
                          <br>      
                          <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                          <a title = "Voltar" href="<?php echo base_url('fornecedores'); ?>" class="btn btn-success btn-sm ml-2">                                
                             voltar</a>

                        </form>
                            
                            
                        </div>
                    </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
