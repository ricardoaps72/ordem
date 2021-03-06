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
    
    public function add() {
        
          
            $this->form_validation->set_rules('fornecedor_razao', '', 'trim|required|min_length[4]|max_length[200]|is_unique[fornecedores.fornecedor_razao]');            
            $this->form_validation->set_rules('fornecedor_nome_fantasia', '', 'trim|required|min_length[4]|max_length[145]|is_unique[fornecedores.fornecedor_nome_fantasia]');
            $this->form_validation->set_rules('fornecedor_cnpj', '', 'trim|required|is_unique[fornecedores.fornecedor_cnpj]|callback_valida_cnpj');            
            $this->form_validation->set_rules('fornecedor_ie', '','required|max_length[20]|is_unique[fornecedores.fornecedor_ie]');
            $this->form_validation->set_rules('fornecedor_email','','required|valid_email|max_length[100]|is_unique[fornecedores.fornecedor_email]');                        
            $this->form_validation->set_rules('fornecedor_telefone','','required|max_length[15]|is_unique[fornecedores.fornecedor_telefone]');
            $this->form_validation->set_rules('fornecedor_celular','','required|max_length[15]|is_unique[fornecedores.fornecedor_celular]');
            $this->form_validation->set_rules('fornecedor_contato','','required|max_length[100]');            
            $this->form_validation->set_rules('fornecedor_cep','','required|max_length[9]');
            $this->form_validation->set_rules('fornecedor_endereco','','required|max_length[155]');
            $this->form_validation->set_rules('fornecedor_numero_endereco','','required|max_length[20]');
            $this->form_validation->set_rules('fornecedor_bairro','','required|max_length[45]');
            $this->form_validation->set_rules('fornecedor_complemento','','max_length[145]');
            $this->form_validation->set_rules('fornecedor_cidade','','required|max_length[50]');
            $this->form_validation->set_rules('fornecedor_estado','','trim|required|exact_length[2]');
            $this->form_validation->set_rules('fornecedor_obs','','trim|max_length[500]');      
            
            if($this->form_validation->run()){
       
                $data = elements(
                    array(
                    'fornecedor_razao',
                    'fornecedor_nome_fantasia',
                    'fornecedor_cnpj',
                    'fornecedor_ie',    
                    'fornecedor_email',
                    'fornecedor_telefone',
                    'fornecedor_celular',
                    'fornecedor_contato',
                    'fornecedor_endereco',
                    'fornecedor_numero_endereco',
                    'fornecedor_complemento',
                    'fornecedor_bairro',
                    'fornecedor_cep',
                    'fornecedor_cidade',
                    'fornecedor_estado',
                    'fornecedor_ativo',
                    'fornecedor_obs',                   
                    ), 
                    $this->input->post()
                    );
                            
                $data = html_escape($data);
                
               $this->core_model->insert('fornecedores', $data);
                
                redirect('fornecedores');
                
                
            } else {
                
                $data = array(
                'titulo' => 'Cadastrar Fornecedor',

                'scripts' => array(
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js',
                ),                
                    
                );  


                $this->load->view('layout/header', $data);
                $this->load->view('fornecedores/add');
                $this->load->view('layout/footer');
            }            
   
        
    }   
    
    public function del($fornecedor_id = NULL){
        
        if (!$fornecedor_id || !$this->core_model->get_by_id('fornecedores', array('fornecedor_id' => $fornecedor_id))) {
            
            $this->session->set_flashdata('error', 'Fornecedor não encontrado');
            redirect('fornecedores');
            
        } else {
            
            $this->core_model->delete('fornecedores', array('fornecedor_id' => $fornecedor_id));
            redirect('fornecedores');
            
        }        
        
    }    
          
    public function edit($fornecedor_id = NULL) {
        
        if (!$fornecedor_id || !$this->core_model->get_by_id('fornecedores', array('fornecedor_id' => $fornecedor_id))){
            
          $this->session->set_flashdata('error', 'Fornecedor não encontrado');
          redirect('fornecedores');

        } else {

            
            $this->form_validation->set_rules('fornecedor_razao', '', 'trim|required|min_length[4]|max_length[200]|callback_check_razao_social');            
            $this->form_validation->set_rules('fornecedor_nome_fantasia', '', 'trim|required|min_length[4]|max_length[145]|callback_check_nome_fantasia');
            $this->form_validation->set_rules('fornecedor_cnpj', '', 'trim|required|callback_valida_cnpj');            
            $this->form_validation->set_rules('fornecedor_ie', '','required|max_length[20]|callback_check_ie');
            $this->form_validation->set_rules('fornecedor_email','','required|valid_email|max_length[100]|callback_check_email');                        
            $this->form_validation->set_rules('fornecedor_telefone','','required|max_length[15]|callback_check_telefone');
            $this->form_validation->set_rules('fornecedor_celular','','required|max_length[15]|callback_check_celular');
            $this->form_validation->set_rules('fornecedor_contato','','required|max_length[100]');            
            $this->form_validation->set_rules('fornecedor_cep','','required|max_length[9]');
            $this->form_validation->set_rules('fornecedor_endereco','','required|max_length[155]');
            $this->form_validation->set_rules('fornecedor_numero_endereco','','required|max_length[20]');
            $this->form_validation->set_rules('fornecedor_bairro','','required|max_length[45]');
            $this->form_validation->set_rules('fornecedor_complemento','','max_length[145]');
            $this->form_validation->set_rules('fornecedor_cidade','','required|max_length[50]');
            $this->form_validation->set_rules('fornecedor_estado','','trim|required|exact_length[2]');
            $this->form_validation->set_rules('fornecedor_obs','','trim|max_length[500]');      
            
            if($this->form_validation->run()){
        
//                exit('Validado');
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

                $data = elements(
                    array(
                    'fornecedor_razao',
                    'fornecedor_nome_fantasia',
                    'fornecedor_cnpj',
                    'fornecedor_ie',    
                    'fornecedor_email',
                    'fornecedor_telefone',
                    'fornecedor_celular',
                    'fornecedor_contato',
                    'fornecedor_endereco',
                    'fornecedor_numero_endereco',
                    'fornecedor_complemento',
                    'fornecedor_bairro',
                    'fornecedor_cep',
                    'fornecedor_cidade',
                    'fornecedor_estado',
                    'fornecedor_ativo',
                    'fornecedor_obs',                   
                    ), 
                    $this->input->post()
                    );
                            
                $data = html_escape($data);
                
                $this->core_model->update('fornecedores', $data, array('fornecedor_id' => $fornecedor_id));
                
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


                $this->load->view('layout/header', $data);
                $this->load->view('fornecedores/edit');
                $this->load->view('layout/footer');
            }            
        }
        
    }
    
    public function check_razao_social($fornecedor_razao){
        
        $fornecedor_id = $this->input->post('fornecedor_id');
        
        if($this->core_model->get_by_id('fornecedores', array('fornecedor_razao' => $fornecedor_razao, 'fornecedor_id != ' => $fornecedor_id ))) {
            $this->form_validation->set_message('check_razao_social', 'Esse documento já existe');
            return False;
        } else {
            return True;
        }
    }
    
    public function check_nome_fantasia($fornecedor_nome_fantasia){
        
        $fornecedor_id = $this->input->post('fornecedor_id');
        
        if($this->core_model->get_by_id('fornecedores', array('fornecedor_nome_fantasia' => $fornecedor_nome_fantasia, 'fornecedor_id != ' => $fornecedor_id ))) {
            $this->form_validation->set_message('check_nome_fantasia', 'Esse documento já existe');
            return False;
        } else {
            return True;
        }
    }
    
    public function check_ie($fornecedor_ie){
        
        $fornecedor_id = $this->input->post('fornecedor_id');
        
        if($this->core_model->get_by_id('fornecedores', array('fornecedor_ie' => $fornecedor_ie, 'fornecedor_id != ' => $fornecedor_id ))) {
            $this->form_validation->set_message('check_ie', 'Esse documento já existe');
            return False;
        } else {
            return True;
        }
    }

    public function check_email($fornecedor_email){
        
        $fornecedor_id = $this->input->post('fornecedor_id');
        
        if($this->core_model->get_by_id('fornecedores', array('fornecedor_email' => $fornecedor_email, 'fornecedor_id != ' => $fornecedor_id ))) {
            $this->form_validation->set_message('check_email', 'Esse email já existe');
            return False;
        } else {
            return True;
        }
    }
    
    public function check_telefone($fornecedor_telefone){
        
        $fornecedor_id = $this->input->post('fornecedor_id');
        
        if($this->core_model->get_by_id('fornecedores', array('fornecedor_telefone' => $fornecedor_telefone, 'fornecedor_id != ' => $fornecedor_id ))) {
            $this->form_validation->set_message('check_telefone', 'Esse telefone já existe');
            return False;
        } else {
            return True;
        }
    }
    
    public function check_celular($fornecedor_celular){
        
        $fornecedor_id = $this->input->post('fornecedor_id');
        
        if($this->core_model->get_by_id('fornecedores', array('fornecedor_celular' => $fornecedor_celular, 'fornecedor_id != ' => $fornecedor_id ))) {
            $this->form_validation->set_message('check_celular', 'Esse celular já existe');
            return False;
        } else {
            return True;
        }
    }

    public function valida_cnpj($cnpj) {

        // Verifica se um número foi informado
        if (empty($cnpj)) {
            $this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
            return false;
        }

        if ($this->input->post('fornecedor_id')) {

            $fornecedor_id = $this->input->post('fornecedor_id');

            if ($this->core_model->get_by_id('fornecedores', array('fornecedor_id !=' => $fornecedor_id, 'fornecedor_cnpj' => $cnpj))) {
                $this->form_validation->set_message('valida_cnpj', 'Esse CNPJ já existe');
                return FALSE;
            }
        }

        // Elimina possivel mascara
        $cnpj = preg_replace("/[^0-9]/", "", $cnpj);
        $cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);


        // Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cnpj) != 14) {
            $this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
            return false;
        }

        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cnpj == '00000000000000' ||
                $cnpj == '11111111111111' ||
                $cnpj == '22222222222222' ||
                $cnpj == '33333333333333' ||
                $cnpj == '44444444444444' ||
                $cnpj == '55555555555555' ||
                $cnpj == '66666666666666' ||
                $cnpj == '77777777777777' ||
                $cnpj == '88888888888888' ||
                $cnpj == '99999999999999') {
            $this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
            return false;

            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {

            $j = 5;
            $k = 6;
            $soma1 = "";
            $soma2 = "";

            for ($i = 0; $i < 13; $i++) {

                $j = $j == 1 ? 9 : $j;
                $k = $k == 1 ? 9 : $k;

                //$soma2 += ($cnpj{$i} * $k);

                //$soma2 = intval($soma2) + ($cnpj{$i} * $k); //Para PHP com versão < 7.4
                $soma2 = intval($soma2) + ($cnpj[$i] * $k); //Para PHP com versão > 7.4

                if ($i < 12) {
                    //$soma1 = intval($soma1) + ($cnpj{$i} * $j); //Para PHP com versão < 7.4
                    $soma1 = intval($soma1) + ($cnpj[$i] * $j); //Para PHP com versão > 7.4
                }

                $k--;
                $j--;
            }

            $digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
            $digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;

            if (!($cnpj{12} == $digito1) and ( $cnpj{13} == $digito2)) {
                $this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
                return false;
            } else {
                return true;
            }
        }
    }    
    
}
