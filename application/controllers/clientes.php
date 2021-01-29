<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Clientes extends CI_Controller{

    public function __construct(){
        
        parent:: __construct();
        
        if (!$this->ion_auth->logged_in()){
          $this->session->set_flashdata('info', 'Sua sessão expirou!');  
          redirect('login');
        }  
    }
    
    public function index(){
        
        $data = array(
            'titulo' => 'Clientes cadastrados',
            
            'styles' => array (
                'vendor/datatables/dataTables.bootstrap4.min.css',    
            ),
            'scripts' => array (
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            
            'clientes' => $this->core_model->get_all('clientes'),

        );

//        echo '<pre>';
//        print_r($data['clientes']);
//        exit(); 

        $this->load->view('layout/header', $data);
        $this->load->view('clientes/index');
        $this->load->view('layout/footer');
    }
    
    public function edit($cliente_id = NULL){
        
        if (!$cliente_id || !$this->core_model->get_by_id('clientes', array('cliente_id' => $cliente_id))){
            
            $this->session->set_flasdata('error', 'Cliente não encontrado');
            redirect('clientes');
        } else {
            
            /*
            [cliente_tipo] => 1
            [cliente_nome] => Ricardo
            [cliente_sobrenome] => Silva
            [cliente_data_nascimento] => 0000-00-00
            [cliente_cpf_cnpj] => 110.150.998-82
            [cliente_rg_ie] => 22.615.018-5
            [cliente_email] => ricardoaps@yahoo.com.br
            [cliente_telefone] => (19)99412-1434
            [cliente_celular] => (19)99412-1434
            [cliente_cep] => 13483-081
            [cliente_endereco] => 
            [cliente_numero_endereco] => 
            [cliente_bairro] => 
            [cliente_complemento] => 
            [cliente_cidade] => 
            [cliente_estado] => 
            [cliente_nome_pai] => 
            [cliente_nome_mae] => 
            [cliente_ativo] => 0
            [cliente_obs] => 
             * 
             */
            
            $this->form_validation->set_rules('cliente_nome', '', 'trim|required|min_lenght[4]|max_lenght[45]');
            $this->form_validation->set_rules('cliente_sobrenome', '', 'trim|required|min_lenght[4]|max_lenght[45]');
            $this->form_validation->set_rules('cliente_data_nascimento', '', 'trim|required');
            $this->form_validation->set_rules('cliente_cpf_cnpj', '', 'trim|required|exact_length[18]');
            $this->form_validation->set_rules('cliente_rg_ie', '','required|max_length[20]');
            $this->form_validation->set_rules('cliente_email','','required|valid_email|max_length[100]');
            $this->form_validation->set_rules('cliente_telefone','','required|max_length[14]');
            $this->form_validation->set_rules('cliente_celular','','required|max_length[15]');            
            $this->form_validation->set_rules('cliente_cep','','required|max_length[9]');
            $this->form_validation->set_rules('cliente_endereco','','required|max_length[155]');
            $this->form_validation->set_rules('cliente_numero_endereco','','required|max_length[20]');
            $this->form_validation->set_rules('cliente_bairro','','required|max_length[45]');
            $this->form_validation->set_rules('cliente_complemento','','max_length[145]');
            $this->form_validation->set_rules('cliente_cidade','','max_length[50]');
            $this->form_validation->set_rules('cliente_estado','','trim|required|exact_length[2]');
            $this->form_validation->set_rules('cliente_obs','','trim|required|exact_length[500]');      
            
            if($this->form_validation->run()){
                
                echo '<pre>';
                print_r($this->input->post());
                exit();
                
            } else {
                
                //erro de validação
                
            $data = array(
            'titulo' => 'Atualizar Cliente',
           
            'scripts' => array(
                'vendor/mask/jquery.mask.min.js',
                'vendor/mask/app.js',
            ),
            'cliente' => $this->core_model->get_by_id('clientes', array('cliente_id' => $cliente_id)),            

        );

        echo '<pre>';
        print_r($data['cliente']);
        exit(); 

        $this->load->view('layout/header', $data);
        $this->load->view('clientes/index');
        $this->load->view('layout/footer');

                
            }
            
        }
        
        
    }

}
