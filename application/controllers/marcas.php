<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Marcas extends CI_Controller{

    public function __construct(){
        
        parent:: __construct();
        
        if (!$this->ion_auth->logged_in()){
          $this->session->set_flashdata('info', 'Sua sessão expirou!');  
          redirect('login');
        }  
    }
    
    public function index(){
        
        $data = array(
            'titulo' => 'Marcas cadastradas',
            
            'styles' => array (
                'vendor/datatables/dataTables.bootstrap4.min.css',    
            ),
            'scripts' => array (
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            
            'Marcas' => $this->core_model->get_all('Marcas'),

        );

        $this->load->view('layout/header', $data);
        $this->load->view('Marcas/index');
        $this->load->view('layout/footer');
    }
    
    public function add() {
            
            $this->form_validation->set_rules('marca_nome', '', 'trim|required|min_length[4]|max_length[45]|is_unique[Marcas.marca_nome]');
            
            if($this->form_validation->run()){
       
                $data = elements(
                    array(
                    'marca_nome',
                    'marca_ativa',
                    ), 
                    $this->input->post()
                    );
                            
                $data = html_escape($data);
                
               $this->core_model->insert('Marcas', $data);
                
                redirect('Marcas');
                
                
            } else {
                
                $data = array(
                'titulo' => 'Cadastrar marca',

                'scripts' => array(
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js',
                ),   
                                
                    
                );  


                $this->load->view('layout/header', $data);
                $this->load->view('Marcas/add');
                $this->load->view('layout/footer');
            }            
   
        
    }   
    
    public function del($marca_id = NULL){
        
        if (!$marca_id || !$this->core_model->get_by_id('Marcas', array('marca_id' => $marca_id))) {
            
            $this->session->set_flashdata('error', 'marca não encontrado');
            redirect('Marcas');
            
        } else {
            
            $this->core_model->delete('Marcas', array('marca_id' => $marca_id));
            redirect('Marcas');
            
        }        
        
    }    
          
    public function edit($marca_id = NULL) {
        
        if (!$marca_id || !$this->core_model->get_by_id('Marcas', array('marca_id' => $marca_id))){
            
          $this->session->set_flashdata('error', 'marca não encontrado');
          redirect('Marcas');

        } else {

                         
            $this->form_validation->set_rules('marca_nome', '', 'trim|required|min_length[4]|max_length[45]|callback_check_nome_marca');
            
            if($this->form_validation->run()){
        

                $data = elements(
                    array(
                    'marca_nome',
                    'marca_ativa',
                    ), 
                    $this->input->post()
                    );
                            
                $data = html_escape($data);
                
                $this->core_model->update('Marcas', $data, array('marca_id' => $marca_id));
                
                redirect('Marcas');
                
                
            } else {
                
                $data = array(
                'titulo' => 'Atualizar marca',

                'scripts' => array(
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js',
                ),
                'marca' => $this->core_model->get_by_id('Marcas', array('marca_id' => $marca_id)),            

                );  


                $this->load->view('layout/header', $data);
                $this->load->view('Marcas/edit');
                $this->load->view('layout/footer');
            }            
        }
        
    }
   
    public function check_nome_marca($marca_nome){

        $marca_id = $this->input->post('marca_id');
        
        if($this->core_model->get_by_id('Marcas', array('marca_nome' => $marca_nome, 'marca_id !=' =>$marca_id))){
            $this->form_validation->set_message('check_nome_marca', 'Esta marca já existe');
            return false;
        } else {
            return true;
        }

    }
       
    
}
