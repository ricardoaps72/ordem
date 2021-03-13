
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

                    <?php if ($message = $this->session->flashdata('sucesso')) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong><i class="far fa-smile-wink"></i>&nbsp;&nbsp;<?php echo $message; ?></strong>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        </div>    
                    </div>       
                    <?php endif; ?>
       
        
                    <?php if ($message = $this->session->flashdata('error')) : ?>      
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?php echo $message; ?></strong>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        </div>    
                    </div>       
                    <?php endif; ?>
        
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a title = "Cadastrar nova categoria" href="<?php echo base_url('categorias/add'); ?>" class="btn btn-success btn-sm float-right">
                            <i class="fas fa-plus"></i>&nbsp;
                                Novo</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome da categoria</th>
                                            <th class="text-center">Ativa</th>
                                            <th class="text-right no-sort pr-2">Ações</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($categorias as $categoria): ?>
                                        <tr>
                                            <td><?php echo $categoria->categoria_id ?></td>
                                            <td><?php echo $categoria->categoria_nome ?></td>
                                            
                                            <td class="text-center pr-4"><?php echo ($categoria->categoria_ativa == 1 ? '<span class="badge bg-info btn-sm">Sim</span>' : '<span class="badge bg-warning text-dark btn-sm">Não</span>') ?></td>
                                            <td class="text-right">
                                                <a title ="Editar" href="<?php echo base_url('categorias/edit/'.$categoria->categoria_id); ?>" class = "btn btn-sm btn-primary">
                                                    <i class="fas fa-user-edit"></i>
                                                </a>
                                                <a title ="Excluir" href="javascript(void)" data-toggle="modal" 
                                                   data-target="#categoria-<?php echo $categoria->categoria_id; ?>" class = "btn btn-sm btn-danger">
                                                    <i class="fas fa-user-times"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <!-- Modal Exclusão -->
                                        <div class="modal fade" id="categoria-<?php echo $categoria->categoria_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirma exclusão</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Deseja realmente excluir a categoria? </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Não</button>
                                                        <a class="btn btn-danger btn-sm" href="<?php echo base_url('categorias/del/'.$categoria->categoria_id); ?>">Sim</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                        
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->