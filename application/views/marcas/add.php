
<?php $this->load->view('layout/sidebar'); ?> 

<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('marcas'); ?>">marcas</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
                      </ol>
                    </nav>
              
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            
                        <form class="user" method="post" name="form_add">
                            
                            
                        
                            <fieldset class="mt-4 border p-2" >
                                <legend class="font-small"><i class="fas fa-tags">&nbsp;Dados da marca </i> </legend>
                                
                            <div class="form-group row">
                              <div class="col-md-6">
                                  <label>Nome da marca</label>
                                  <input type="text" class="form-control form-control-user" name="marca_nome" placeholder="Título do marca" value="<?php echo set_value('marca_nome'); ?>">
                                    <?php echo form_error('marca_nome', '<small id="emailHelp" class="form-text text-muted">', '</small>') ?>  
                              </div>                                
                                                            
                              <div class="col-md-3">
                                  <label>marca ativa</label>
                                  <select class="custom-select" name="marca_ativa">
                                      <option value="0">Não</option>
                                      <option value="1">Sim</option>
                                  </select>                                          
                                </div>                                                                                              
                            </div>    
                                
                          </fieldset>                                                      

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
