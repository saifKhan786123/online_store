<?php 


class Admin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper('common_helper');
    }

    public function login(){

        if($this->input->post()){

            $email = $this->db->escape_str($this->input->post('email'));
            $password = $this->db->escape_str($this->input->post('password'));

            $data = [
                'email' => $email,
                'password' => md5($password)
            ];

            $user = $this->admin_model->login($data);
            if($user){
                $this->session->set_userdata('user', $user);
                $this->session->set_userdata('is_admin_logged_in', true);
                redirect(base_url('admin/dashboard'));
            }else{
                $this->session->set_flashdata("error", 'Invalid Credentials');
                redirect(base_url('admin/login'));
            }

        }

        $this->load->view('admin/login');
    }

    public function dashboard(){
        
        check_admin_login();
        $data  = [];
        $userCount = $this->admin_model->get_active_user_count(['status'=> ACTIVE_USERS]);
        $productCount = $this->admin_model->get_active_products_count(['status'=> ACTIVE_PRODUCT]);
        
        $CountActiveUserProducts =$this->admin_model->get_count_active_users_products(['users.status' => ACTIVE_USERS, 'products.status' => ACTIVE_PRODUCT]);
        $CountProductsWitoutUser =$this->admin_model->get_count_products_without_user(['user_id' => NULL ]);

        $AmountActiveProducts=$this->admin_model->get_amount_active_products();

        $PriceActiveProducts=$this->admin_model->get_price_active_products();

        $PriceActiveProductsPerUser = $this->admin_model->get_price_active_products_per_user();
       
        $data['userCount'] = $userCount ? $userCount : 0;
        $data['productCount'] = $productCount ? $productCount : 0;
        $data['CountActiveUserProducts'] = $CountActiveUserProducts ? $CountActiveUserProducts : 0;
        $data['CountProductsWitoutUser'] = $CountProductsWitoutUser ? $CountProductsWitoutUser : 0;
        $data['AmountActiveProducts'] = $AmountActiveProducts ? $AmountActiveProducts : 0;
        $data['PriceActiveProducts'] = $PriceActiveProducts ? $PriceActiveProducts : 0;
        $data['PriceActiveProductsPerUser'] = $PriceActiveProductsPerUser ? $PriceActiveProductsPerUser : 0;
        $this->load->view('admin/dashboard', $data);
    }


    public function product_listing(){
        $this->load->view('admin/products/product_listing');
    }

    public function details(){
        
        $this->load->view('admin/details/details_view.php');
    }

    public function logout(){
        check_admin_login();
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('is_admin_logged_in');
        redirect(base_url('admin/login'));
    }


    public function insert_user(){
        $data = [
            'email' => 'saifvizzweb@gmail.com',
            'password' => md5('abc123bys'),
            'first_name' => 'John',
            'last_name' => 'Doe',
            'status' => 1,
            'role' => 1,
            'created_at' => date('Y-m-d',strtotime(date('Y-m-d')))

        ];
        $UserInserted = $this->admin_model->insert_user($data);
        if($UserInserted) {
            echo "INSERTED";
        }else{
            echo "NOT-INSERTED";
        }

    }
}