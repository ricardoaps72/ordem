<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Fornecedores extends CI_Controller{

    public function __construct(){
        
        parent:: __construct();
        
        if (!$this->ion_auth->logged_in()){
          $this->session->set_flashdata('info', 'Sua sessão expirou!');  
          redirect('login');
        }  
    }
    
    public function index(){
        
        $data = array(
            'titulo' => 'Fornecedores cadastrados',
            
            'styles' => array (
                'vendor/datatables/dataTables.bootstrap4.min.css',    
            ),
            'scripts' => array (
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            
            'fornecedores' => $this->core_model->get_all('fornecedores'),

        );

//        echo '<pre>';
//        print_r($data['fornecedores']);
//        exit(); 

        $this->load->view('layout/header', $data);
        $this->load->view('fornecedores/index');
        $this->load->view('layout/footer');
    }
    
    public function edit($fornecedor_id = NULL) {
        
        if (!$fornecedor_id || !$this->core_model->get_by_id('fornecedores', array('fornecedor_id' => $fornecedor_id))){
            
          $this->session->set_flashdata('error', 'Fornecedor não encontrado');
          redirect('fornecedores');

        } else {
        
            $data = array(
            'titulo' => 'Atualizar Fornecedor',
           
            'scripts' => array(
                'vendor/mask/jquery.mask.min.js',
                'vendor/mask/app.js',
            ),
            'fornecedor' => $this->core_model->get_by_id('fornecedores', array('fornecedor_id' => $fornecedor_id)),            

            );  

//            echo '<pre>';
//            print_r($data['fornecedor']);
//            exit(); 

            /*
            [fornecedor_id] => 1
            [fornecedor_data_cadastro] => 2021-02-10 20:02:22
            [fornecedor_razao] => RS Sotfware S/A
            [fornecedor_nome_fantasia] => RS Software
            [fornecedor_cnpj] => 69.316.427/0001-08
            [fornecedor_ie] => 
            [fornecedor_telefone] => (11) 3456-8956
            [fornecedor_celular] => 
            [fornecedor_email] => rssoftware@email.com
            [fornecedor_contato] => Ricardo
            [fornecedor_cep] => 
            [fornecedor_endereco] => 
            [fornecedor_numero_endereco] => 
            [fornecedor_bairro] => 
            [fornecedor_complemento] => 
            [fornecedor_cidade] => 
            [fornecedor_estado] => 
            [fornecedor_ativo] => 1
            [fornecedor_obs] => 
            [fornecedor_data_alteracao] => 2021-02-10 20:04:26            
            */
            
            $this->load->view('layout/header', $data);
            $this->load->view('fornecedores/edit');
            $this->load->view('layout/footer');
            
        }
        
    }
    
}
