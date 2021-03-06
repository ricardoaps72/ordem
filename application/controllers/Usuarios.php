<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Usuarios extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();

        
        if (!$this->ion_auth->logged_in())
        {
          $this->session->set_flashdata('info', 'Sua sessão expirou!');  
          redirect('login');
        }  
    }

    public function index(){

        $data = array(
            'titulo' => 'Usuários cadastrados',            
            'styles' => array (
                'vendor/datatables/dataTables.bootstrap4.min.css',    
            ),
            'scripts' => array (
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            
            'usuarios' => $this->ion_auth->users()->result(),

        );

        /* echo '<pre>';
        print_r($data['usuarios']);
        exit(); */

        $this->load->view('layout/header', $data);
        $this->load->view('usuarios/index');
        $this->load->view('layout/footer');

    }
    
    public function add(){
               
    //validação dos campos
    $this->form_validation->set_rules('first_name', '', 'trim|required');
    $this->form_validation->set_rules('last_name', '', 'trim|required');
    $this->form_validation->set_rules('email', '', 'trim|required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('username', '', 'trim|required|is_unique[users.username]');
    $this->form_validation->set_rules('password', '', 'required|min_length[5]|max_length[255]');
    $this->form_validation->set_rules('confirm_password', '', 'matches[password]');
   
    if($this->form_validation->run()) {
        
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        
        $additional_data = array(
                    'first_name' => $this->security->xss_clean($this->input->post('first_name')),
                    'last_name' => $this->security->xss_clean($this->input->post('last_name')),
                    'username' => $this->security->xss_clean($this->input->post('username')),
                    'active' => $this->security->xss_clean($this->input->post('active')),
                    );
        $group = array($this->input->post('perfil_usuario')); // Sets user to admin.
        
        $additional_data = $this->security->xss_clean($additional_data);
        $group = $this->security->xss_clean($group);
        
        if ($this->ion_auth->register($username, $password, $email, $additional_data, $group)) {
            
            $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso');
            
        } else {
            
            $this->session->set_flashdata('error', 'Erro ao salvar os dados'); 
        }
        
        redirect('usuarios');
        
        //alterar ion_auth_model linha 852 - comentar essa linha
        
        /* echo '<pre>';
        print_r($additional_data);
        exit(); */
        
    } else {

        // Erro de validação
        $data = array(
                'titulo'  => 'Cadastrar usuário',
        );    

        $this->load->view('layout/header', $data);
        $this->load->view('usuarios/add');
        $this->load->view('layout/footer');
        
    }
    
       
        
    }
    
    public function edit($user_id = NULL){
        
        if (!$user_id || !$this->ion_auth->user($user_id)->row()) {
            
            $this->session->set_flashdata('error', 'Usuário não encontrado');
            redirect('usuarios');
            
        } else {

                        /*
             * Array
                (
                    [first_name] => Admin
                    [last_name] => istrator
                    [email] => admin@admin.com
                    [username] => administrator
                    [active] => 1
                    [perfil_usuario] => 1
                    [password] => 
                    [confirme_password] => 
                    [usuario_id] => 1
                )
             * 
             */
            
            /*echo '<pre>';
            print_r($this->input->post());
            exit();*/ 
                                    
            //validação dos campos
            $this->form_validation->set_rules('first_name', '', 'trim|required');
            $this->form_validation->set_rules('last_name', '', 'trim|required');
            $this->form_validation->set_rules('email', '', 'trim|required|valid_email|callback_email_check');
            $this->form_validation->set_rules('username', '', 'trim|required|callback_username_check');
            $this->form_validation->set_rules('password', '', 'min_length[5]|max_length[255]');
            $this->form_validation->set_rules('confirm_password', '', 'matches[password]');
            
            if($this->form_validation->run()){
                
                $data = elements(
                        
                        array(
                            'first_name',
                            'last_name',
                            'email',
                            'username',
                            'active',
                            'password'                            
                        ), $this->input->post()
                        
                        );
                             
                $data = $this->security->xss_clean($data);
                
                //* verifica se foi passado o password
                $password = $this->input->post('password');                
                if (!$password){
                    
                    unset($data['password']);
                    
                }
                
                if ($this->ion_auth->update($user_id, $data)){
                    
                    $perfil_ususario_db = $this->ion_auth->get_users_groups($user_id)->row();
                    $perfil_ususario_post = $this->input->post('perfil_usuario');
                    
                    /* se for diferente atualiza o grupo */
                    if ($perfil_ususario_post != $perfil_ususario_db->id){
                        
                        $this->ion_auth->remove_from_group($perfil_ususario_db->id, $user_id);
                        $this->ion_auth->add_to_group($perfil_ususario_post, $user_id);
                    }
                    
                    $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso');
                    
                } else {
                    
                    $this->session->set_flashdata('error', 'Erro ao salvar os dados');
                    
                }
                
                redirect('usuarios');

            } else {

                $data = array(
            
                'titulo'  => 'Editar usuário',
                'usuario' => $this->ion_auth->user($user_id)->row(),   
                'perfil_usuario'  => $this->ion_auth->get_users_groups($user_id)->row(),    

                );
            
                $this->load->view('layout/header', $data);
                $this->load->view('usuarios/edit');
                $this->load->view('layout/footer');
                
            }
           
            
        }
                
    }
    
    public function del($user_id = NULL){
        
        if (!$user_id || !$this->ion_auth->user($user_id)->row()) {
            
            $this->session->set_flashdata('error', 'Usuário não encontrado');
            redirect('usuarios');
            
        }
        
        if ($this->ion_auth->is_admin($user_id)) {
            
            $this->session->set_flashdata('error', 'O administrador não pode ser excluído');
            redirect('usuarios');
            
        }
        
        if ($this->ion_auth->delete_user($user_id)) {
        
            $this->session->set_flashdata('sucesso', 'O usuário excluído com sucesso');
            redirect('usuarios');
        
        } else {
            $this->session->set_flashdata('error', 'O usuário não pode ser excluído');
            redirect('usuarios');
        }
        
    }
    
    public function email_check($email) {
        
        $usuario_id = $this->input->post('usuario_id');
        
        if ($this->core_model->get_by_id('users', array('email' => $email, 'id !=' => $usuario_id))){
            
            $this->form_validation->set_message('email_check', 'Esse e-mail já existe');
            return FALSE;
        } else {
            
            return TRUE;
            
        }
        
    }

    public function username_check($username) {
        
        $usuario_id = $this->input->post('usuario_id');
        
        if ($this->core_model->get_by_id('users', array('username' => $username, 'id !=' => $usuario_id))){
            
            $this->form_validation->set_message('username_check', 'Esse usuário já existe');
            return FALSE;
        } else {
            
            return TRUE;
            
        }
        
    }
}