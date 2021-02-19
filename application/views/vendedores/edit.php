
<?php $this->load->view('layout/sidebar'); ?> 

<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('vendedores'); ?>">Vendedores</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
                      </ol>
                    </nav>
              
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            
                        <form class="user" method="post" name="form_edit">
                            
                            <p><strong><i class="fas fa-clock"></i>&nbsp;&nbsp; Última alteração: </strong>&nbsp;<?php echo formata_data_banco_com_hora($vendedor->vendedor_data_alteracao); ?> </p>
                        
                            <fieldset class="mt-4 border p-2" >
                                <legend class="font-small"><i class="fas fa-user-secret">&nbsp;Dados pessoais </i> </legend>
                                
                            <div class="form-group row">
                              <div class="col-md-6">
                                  <label>Nome</label>
                                  <input type="text" class="form-control form-control-user" name="vendedor_nome_completo" placeholder="Nome do vendedor" value="<?php echo $vendedor->vendedor_nome_completo ?>">
                                    <?php echo form_error('vendedor_nome_completo', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                
                                                            
                              <div class="col-md-3">
                                  <label>CPF</label>
                                  <input type="text" class="form-control form-control-user cpf" name="vendedor_cpf" placeholder="CPF" value="<?php echo $vendedor->vendedor_cpf ?>">
                                  <?php echo form_error('vendedor_cpf', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-3">
                                  <label>RG</label>
                                  <input type="text" class="form-control form-control-user rg" name="vendedor_rg" placeholder="RG" value="<?php echo $vendedor->vendedor_rg ?>">
                                    <?php echo form_error('vendedor_rg', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>
                            </div>    
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input type="text" class="form-control form-control-user" name="vendedor_email" placeholder="E-mail" value="<?php echo $vendedor->vendedor_email ?>">
                                      <?php echo form_error('vendedor_email', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                                </div>                                                               
                                <div class="col-md-3">
                                    <label>Telefone</label>
                                    <input type="text" class="form-control form-control-user" name="vendedor_telefone" placeholder="Telefone fixo" value="<?php echo $vendedor->vendedor_telefone ?>">
                                      <?php echo form_error('vendedor_telefone', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                                </div>                                                                
                                <div class="col-md-3">
                                  <label>Celular</label>
                                  <input type="text" class="form-control form-control-user" name="vendedor_celular" placeholder="Telefone Celular" value="<?php echo $vendedor->vendedor_celular ?>">
                                  <?php echo form_error('vendedor_celular', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                            </div>
                                
                          </fieldset>                            
                          
                          <fieldset class="mt-4 border p-2" >
                            <legend class="font-small"><i class="fas fa-map-marker-alt">&nbsp;Dados de endereço </i> </legend>
                            
                          <div class="form-group row">

                              <div class="col-md-6">
                                  <label>Endereço</label>
                                  <input type="text" class="form-control form-control-user" name="vendedor_endereco" placeholder="Seu endereço" value="<?php echo $vendedor->vendedor_endereco ?>">
                                  <?php echo form_error('vendedor_endereco', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-2">
                                  <label>Número</label>
                                  <input type="text" class="form-control form-control-user" name="vendedor_numero_endereco" placeholder="Número" value="<?php echo $vendedor->vendedor_numero_endereco ?>">
                                    <?php echo form_error('vendedor_numero_endereco', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              <div class="col-md-4">
                                  <label>Complemento</label>
                                  <input type="text" class="form-control form-control-user" name="vendedor_complemento" placeholder="Complemento de endereço" value="<?php echo $vendedor->vendedor_complemento ?>">
                                  <?php echo form_error('vendedor_complemento', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                  
                              
                          </div>
                                
                          <div class="form-group row">
                              <div class="col-md-5">
                                  <label>Bairro</label>
                                  <input type="text" class="form-control form-control-user " name="vendedor_bairro" placeholder="Seu Bairro" value="<?php echo $vendedor->vendedor_bairro ?>">
                                    <?php echo form_error('vendedor_bairro', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>    

                            <div class="col-md-2">
                                <label>Cep</label>
                                <input type="text" class="form-control form-control-user cep" name="vendedor_cep" placeholder="Seu Cep" value="<?php echo $vendedor->vendedor_cep ?>">
                                  <?php echo form_error('vendedor_cep', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                            </div>                                                                                              

                            <div class="col-md-4">
                                <label>Cidade</label>
                                <input type="text" class="form-control form-control-user" name="vendedor_cidade" placeholder="Cidade" value="<?php echo $vendedor->vendedor_cidade ?>">
                                  <?php echo form_error('vendedor_cidade', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                            </div>                                                                
                            <div class="col-md-1">
                                <label>UF</label>
                                <input type="text" class="form-control form-control-user" name="vendedor_estado" placeholder="Estado" value="<?php echo $vendedor->vendedor_estado ?>">
                                  <?php echo form_error('vendedor_estado', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                            </div>
                              
                          </div>                                                                                                                                                  
                          
                          </fieldset>
                            
                            <fieldset class="mt-4 border p-2" >
                                <legend class="font-small"><i class="fas fa-tools">&nbsp;Configurações </i> </legend>
                            <div class="form-group row">
                                <div class="col-md-3">
                                  <label>Vendedor ativo</label>
                                  <select class="custom-select" name="vendedor_ativo">
                                      <option value="0" <?php echo $vendedor->vendedor_ativo == 0 ? 'selected' : '' ; ?> >Não</option>
                                      <option value="1" <?php echo $vendedor->vendedor_ativo == 1 ? 'selected' : '' ; ?> >Sim</option>
                                  </select>                                          
                                </div>                                                                                              
                                <div class="col-md-3">
                                    <label>Matrícula</label>
                                    <input type="text" class="form-control form-control-user" name="vendedor_codigo" placeholder="Matrícula" value="<?php echo $vendedor->vendedor_codigo; ?>" readonly="" ">
                                      <?php echo form_error('vendedor_codigo', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                                </div>
                                <div class="col-md-6">
                                    <label>Observações</label>
                                    <textarea class="form-control form-control-user" name="vendedor_obs"><?php echo $vendedor->vendedor_obs ?></textarea>
                                    <?php echo form_error('vendedor_obs', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                                </div>                                  
                            </div>    

                            </fieldset>
                            
                          <input type="hidden" name="vendedor_id" value="<?php echo $vendedor->vendedor_id; ?>" /> 
                                                                              
                          <br>      
                          <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                          <a title = "Voltar" href="<?php echo base_url($this->router->fetch_class()); ?>" class="btn btn-success btn-sm ml-2">                                
                             voltar</a>

                        </form>
                            
                            
                        </div>
                    </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
