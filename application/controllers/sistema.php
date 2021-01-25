<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Sistema extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
                
        if (!$this->ion_auth->logged_in())
        {
          $this->session->set_flashdata('info', 'Sua sessão expirou!');  
          redirect('login');
        }  
        
    }   
    
    public function index() {
        
        $data = array(
            
            'titulo' => 'Editar informações do sistema',
            'sistema' => $this->core_model->get_by_id('sistema', array('sistema_id' => 1)),
        ); 
        
        /*
         *  [sistema_id] => 1
        [sistema_razao_social] => System ordem inc
        [sistema_nome_fantasia] => Sistema ordem Now
        [sistema_cnpj] => 50.389.234/0001-40
        [sistema_ie] => 
        [sistema_telefone_fixo] => 
        [sistema_telefone_movel] => 
        [sistema_email] => ordemnow@contato.com.br
        [sistema_site_url] => http://localhost/ordem
        [sistema_cep] => 80429-000
        [sistema_endereco] => Rua da programação
        [sistema_numero] => 38
        [sistema_cidade] => Curitiba
        [sistema_estado] => PR
        [sistema_txt_ordem_servico] => 
        [sistema_data_alteracao] => 2021-01-20 20:33:30
        */
        
//        echo '<pre>';
//        print_r($data['sistema']);
//        exit();
        
        $this->load->view('layout/header', $data);
        $this->load->view('sistema/index');
        $this->load->view('layout/footer');
        
        
    }
    
}
