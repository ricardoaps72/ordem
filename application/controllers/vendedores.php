<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Vendedores extends CI_Controller{

    public function __construct(){
        
        parent:: __construct();
        
        if (!$this->ion_auth->logged_in()){
          $this->session->set_flashdata('info', 'Sua sessão expirou!');  
          redirect('login');
        }  
    }
    
    public function index(){
        
        $data = array(
            'titulo' => 'Vendedores cadastrados',
            
            'styles' => array (
                'vendor/datatables/dataTables.bootstrap4.min.css',    
            ),
            'scripts' => array (
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            
            'vendedores' => $this->core_model->get_all('vendedores'),

        );

//        echo '<pre>';
//        print_r($data['vendedores']);
//        exit(); 

        $this->load->view('layout/header', $data);
        $this->load->view('vendedores/index');
        $this->load->view('layout/footer');
    }
    
    public function add() {
        
          
            $this->form_validation->set_rules('vendedor_codigo', '', 'trim|required|min_length[4]|max_length[200]|is_unique[vendedores.vendedor_razao]');            
            $this->form_validation->set_rules('vendedor_nome_completo', '', 'trim|required|min_length[4]|max_length[145]|is_unique[vendedores.vendedor_nome_fantasia]');
            $this->form_validation->set_rules('vendedor_cpf', '', 'trim|required|is_unique[vendedores.vendedor_cnpj]|callback_valida_cnpj');            
            $this->form_validation->set_rules('vendedor_rg', '','required|max_length[20]|is_unique[vendedores.vendedor_ie]');
            $this->form_validation->set_rules('vendedor_email','','required|valid_email|max_length[100]|is_unique[vendedores.vendedor_email]');                        
            $this->form_validation->set_rules('vendedor_telefone','','required|max_length[15]|is_unique[vendedores.vendedor_telefone]');
            $this->form_validation->set_rules('vendedor_celular','','required|max_length[15]|is_unique[vendedores.vendedor_celular]');
            $this->form_validation->set_rules('vendedor_contato','','required|max_length[100]');            
            $this->form_validation->set_rules('vendedor_cep','','required|max_length[9]');
            $this->form_validation->set_rules('vendedor_endereco','','required|max_length[155]');
            $this->form_validation->set_rules('vendedor_numero_endereco','','required|max_length[20]');
            $this->form_validation->set_rules('vendedor_bairro','','required|max_length[45]');
            $this->form_validation->set_rules('vendedor_complemento','','max_length[145]');
            $this->form_validation->set_rules('vendedor_cidade','','required|max_length[50]');
            $this->form_validation->set_rules('vendedor_estado','','trim|required|exact_length[2]');
            $this->form_validation->set_rules('vendedor_obs','','trim|max_length[500]');      
            
            if($this->form_validation->run()){
       
                $data = elements(
                    array(
                    'vendedor_codigo',
                    'vendedor_nome_completo',
                    'vendedor_cpf',
                    'vendedor_rg',    
                    'vendedor_email',
                    'vendedor_telefone',
                    'vendedor_celular',
                    'vendedor_contato',
                    'vendedor_endereco',
                    'vendedor_numero_endereco',
                    'vendedor_complemento',
                    'vendedor_bairro',
                    'vendedor_cep',
                    'vendedor_cidade',
                    'vendedor_estado',
                    'vendedor_ativo',
                    'vendedor_obs',                   
                    ), 
                    $this->input->post()
                    );
                            
                $data = html_escape($data);
                
               $this->core_model->insert('vendedores', $data);
                
                redirect('vendedores');
                
                
            } else {
                
                $data = array(
                'titulo' => 'Cadastrar Vendedor',

                'scripts' => array(
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js',
                ),                
                    
                );  


                $this->load->view('layout/header', $data);
                $this->load->view('vendedores/add');
                $this->load->view('layout/footer');
            }            
   
        
    }   
    
    public function del($vendedor_id = NULL){
        
        if (!$vendedor_id || !$this->core_model->get_by_id('vendedores', array('vendedor_id' => $vendedor_id))) {
            
            $this->session->set_flashdata('error', 'Vendedor não encontrado');
            redirect('vendedores');
            
        } else {
            
            $this->core_model->delete('vendedores', array('vendedor_id' => $vendedor_id));
            redirect('vendedores');
            
        }        
        
    }    
          
    public function edit($vendedor_id = NULL) {
        
        if (!$vendedor_id || !$this->core_model->get_by_id('vendedores', array('vendedor_id' => $vendedor_id))){
            
          $this->session->set_flashdata('error', 'Vendedor não encontrado');
          redirect('vendedores');

        } else {

            
            $this->form_validation->set_rules('vendedor_codigo', '', 'trim|required|min_length[4]|max_length[200]|callback_check_razao_social');            
            $this->form_validation->set_rules('vendedor_nome_completo', '', 'trim|required|min_length[4]|max_length[145]|callback_check_nome_fantasia');
            $this->form_validation->set_rules('vendedor_cpf', '', 'trim|required|callback_valida_cnpj');            
            $this->form_validation->set_rules('vendedor_rg', '','required|max_length[20]|callback_check_ie');
            $this->form_validation->set_rules('vendedor_email','','required|valid_email|max_length[100]|callback_check_email');                        
            $this->form_validation->set_rules('vendedor_telefone','','required|max_length[15]|callback_check_telefone');
            $this->form_validation->set_rules('vendedor_celular','','required|max_length[15]|callback_check_celular');
            $this->form_validation->set_rules('vendedor_contato','','required|max_length[100]');            
            $this->form_validation->set_rules('vendedor_cep','','required|max_length[9]');
            $this->form_validation->set_rules('vendedor_endereco','','required|max_length[155]');
            $this->form_validation->set_rules('vendedor_numero_endereco','','required|max_length[20]');
            $this->form_validation->set_rules('vendedor_bairro','','required|max_length[45]');
            $this->form_validation->set_rules('vendedor_complemento','','max_length[145]');
            $this->form_validation->set_rules('vendedor_cidade','','required|max_length[50]');
            $this->form_validation->set_rules('vendedor_estado','','trim|required|exact_length[2]');
            $this->form_validation->set_rules('vendedor_obs','','trim|max_length[500]');      
            
            if($this->form_validation->run()){
        
//                exit('Validado');
                /*
                [vendedor_id] => 1
                [vendedor_data_cadastro] => 2021-02-10 20:02:22
                [vendedor_razao] => RS Sotfware S/A
                [vendedor_nome_fantasia] => RS Software
                [vendedor_cnpj] => 69.316.427/0001-08
                [vendedor_ie] => 
                [vendedor_telefone] => (11) 3456-8956
                [vendedor_celular] => 
                [vendedor_email] => rssoftware@email.com
                [vendedor_contato] => Ricardo
                [vendedor_cep] => 
                [vendedor_endereco] => 
                [vendedor_numero_endereco] => 
                [vendedor_bairro] => 
                [vendedor_complemento] => 
                [vendedor_cidade] => 
                [vendedor_estado] => 
                [vendedor_ativo] => 1
                [vendedor_obs] => 
                [vendedor_data_alteracao] => 2021-02-10 20:04:26            
                */            

                $data = elements(
                    array(
                    'vendedor_codigo',
                    'vendedor_nome_completo',
                    'vendedor_cpf',
                    'vendedor_rg',    
                    'vendedor_email',
                    'vendedor_telefone',
                    'vendedor_celular',
                    'vendedor_contato',
                    'vendedor_endereco',
                    'vendedor_numero_endereco',
                    'vendedor_complemento',
                    'vendedor_bairro',
                    'vendedor_cep',
                    'vendedor_cidade',
                    'vendedor_estado',
                    'vendedor_ativo',
                    'vendedor_obs',                   
                    ), 
                    $this->input->post()
                    );
                            
                $data = html_escape($data);
                
                $this->core_model->update('vendedores', $data, array('vendedor_id' => $vendedor_id));
                
                redirect('vendedores');
                
                
            } else {
                
                $data = array(
                'titulo' => 'Atualizar Vendedor',

                'scripts' => array(
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js',
                ),
                'fornecedor' => $this->core_model->get_by_id('vendedores', array('vendedor_id' => $vendedor_id)),            

                );  

    //            echo '<pre>';
    //            print_r($data['fornecedor']);
    //            exit(); 


                $this->load->view('layout/header', $data);
                $this->load->view('vendedores/edit');
                $this->load->view('layout/footer');
            }            
        }
        
    }
    
    public function check_razao_social($vendedor_razao){
        
        $vendedor_id = $this->input->post('vendedor_id');
        
        if($this->core_model->get_by_id('vendedores', array('vendedor_razao' => $vendedor_razao, 'vendedor_id != ' => $vendedor_id ))) {
            $this->form_validation->set_message('check_razao_social', 'Esse documento já existe');
            return False;
        } else {
            return True;
        }
    }
    
    public function check_nome_fantasia($vendedor_nome_fantasia){
        
        $vendedor_id = $this->input->post('vendedor_id');
        
        if($this->core_model->get_by_id('vendedores', array('vendedor_nome_fantasia' => $vendedor_nome_fantasia, 'vendedor_id != ' => $vendedor_id ))) {
            $this->form_validation->set_message('check_nome_fantasia', 'Esse documento já existe');
            return False;
        } else {
            return True;
        }
    }
    
    public function check_ie($vendedor_ie){
        
        $vendedor_id = $this->input->post('vendedor_id');
        
        if($this->core_model->get_by_id('vendedores', array('vendedor_ie' => $vendedor_ie, 'vendedor_id != ' => $vendedor_id ))) {
            $this->form_validation->set_message('check_ie', 'Esse documento já existe');
            return False;
        } else {
            return True;
        }
    }

    public function check_email($vendedor_email){
        
        $vendedor_id = $this->input->post('vendedor_id');
        
        if($this->core_model->get_by_id('vendedores', array('vendedor_email' => $vendedor_email, 'vendedor_id != ' => $vendedor_id ))) {
            $this->form_validation->set_message('check_email', 'Esse email já existe');
            return False;
        } else {
            return True;
        }
    }
    
    public function check_telefone($vendedor_telefone){
        
        $vendedor_id = $this->input->post('vendedor_id');
        
        if($this->core_model->get_by_id('vendedores', array('vendedor_telefone' => $vendedor_telefone, 'vendedor_id != ' => $vendedor_id ))) {
            $this->form_validation->set_message('check_telefone', 'Esse telefone já existe');
            return False;
        } else {
            return True;
        }
    }
    
    public function check_celular($vendedor_celular){
        
        $vendedor_id = $this->input->post('vendedor_id');
        
        if($this->core_model->get_by_id('vendedores', array('vendedor_celular' => $vendedor_celular, 'vendedor_id != ' => $vendedor_id ))) {
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

        if ($this->input->post('vendedor_id')) {

            $vendedor_id = $this->input->post('vendedor_id');

            if ($this->core_model->get_by_id('vendedores', array('vendedor_id !=' => $vendedor_id, 'vendedor_cnpj' => $cnpj))) {
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
