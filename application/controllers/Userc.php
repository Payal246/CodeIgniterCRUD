<?php
error_reporting(0);
//require_once 'C:/xampp/htdocs/payal/Corephp/vendor/autoload.php';
use Twilio\Rest\Client;


class Userc extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usersm');
        
    }
    public function index()
    {
       // $data['country']=$this->Usersm->fetch_country();
         $this->load->view('Usersv/index');

    }
    //Register................................
    public function registerform(){
        $data['country']=$this->Usersm->fetch_country();
        
                    $this->form_validation->set_rules('fname','Firstname','required|alpha');
                    $this->form_validation->set_rules('lname','Lastname','required|alpha');
                    $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[register.Email]');
                    $this->form_validation->set_rules('uname','Username','required|min_length[4]');
                    $this->form_validation->set_rules('pwd','Password','required|min_length[4]|max_length[8]');
                    $this->form_validation->set_rules('country','Country','required');
                    //$this->form_validation->set_rules('state','State','required');
                   // $this->form_validation->set_rules('city','City','required');
                    $this->form_validation->set_rules('Contact','Contact','required|integer|min_length[13]|max_length[13]');
                    $this->form_validation->set_rules('gender','Gender','required');
                    $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

        if($this->form_validation->run()){

            $data=array(
                'Firstname'=>$this->input->post('fname'),
                'Lastname'=>$this->input->post('lname'),
                'Email'=>$this->input->post('email'),
                'Username'=>$this->input->post('uname'),
                'Password'=>$this->input->post('pwd'),
                'Cpassword'=>$this->input->post('pwd'),
                'Country'=>$this->input->post('country'),
                'State'=>$this->input->post('state'),
                'City'=>$this->input->post('city'),
                'Contact'=>$this->input->post('Contact'),
                'Gender'=>$this->input->post('gender'));
            
                    $query=$this->Usersm->insert($data);
                    $contact=$this->input->post('Contact');
                    if($query){
                        $sid ="AC00ce60f53e11063cf37797481fc784a5";
                        $token = "1c25b3452d4dc7b4f3e77b36826aca8b";
                        $twilio = new Client($sid, $token);

                        $message = $twilio->messages
                            ->create($contact, // to
                            [
                                "body" => "Congratulations! You are successfully registered.",
                                "from" => "+16572438080"
                            ]
                            );

                        //Send email...................
                        $this->load->library('email');
                        $this->email->from("demotesting0909@gmail.com");
                        $this->email->to(set_value('email'));
                        $this->email->subject("Registration Greeting.....");

                        $this->email->message("Thank you for Regitration");
                        $this->email->set_newline("\r\n");
                        if($this->email->send()){
                            $this->load->view('Usersv/loginform');
                        }
                    }
                    else{
                        //$this->session->set_flashdata('register_failed','Sorry ! Your account is not created...');
                        $this->load->view('Usersv/registerform',$data);
                        }
        }else{$this->load->view('Usersv/registerform',$data);}
                     
    }

    //Login.......................................
    public function loginform()
    {
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('email','Email','required|valid_email');
                    $this->form_validation->set_rules('pwd','Password','required|min_length[4]|max_length[8]');
                    $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
                    if($this->form_validation->run())
                    {
                        $email=$this->input->post('email');
                        $pwd=$this->input->post('pwd');
                        $loginid=$this->Usersm->login($email,$pwd);
                        if($loginid)
                        {
                        $this->session->set_userdata('Reg_id',$loginid);
                        $this->session->set_flashdata('login_success','Login successfully !');
                        redirect('Userc/index');
                        }
                        else{
                            $this->session->set_flashdata('login_failed','Invalid Username and Password !');
                            redirect('Userc/loginform');
                        }
                    }
                    else{
                        //$this->session->set_flashdata('register_success','Account Created Successfully');
                        $this->load->view('Usersv/loginform');
                    }
}
    //Logout.....................................
    public function logout(){
            $this->session->unset_userdata('Reg_id');
            return redirect('Userc/loginform');
    }
    //Select.................
    public function displayuser(){
            $data['row']=$this->Usersm->userdata();
            $this->load->view('Usersv/registeruser',$data);
    }

    public function dashboard(){

        // include_once APPPATH . "C:/xampp/htdocs/payal/CodeIgniterCRUD/setup.php";
        // //include APPPATH . "vendor/google/apiclient/src/Google/Client.php";
        // $code=$this->input->post('code');
        
        // echo $code;
        
        // if(isset($code)){

        //     $token=$google->fetchAccessTokenWithAuthCode($code);
        //     echo $token;
        //     exit;
        //     $_SESSION['token']=$token;
        //     if(!isset($token['error']))
        //     {
        //         $google->setAccessToken($token['access_token']);
        //         $service=new Google_Service_Oauth2($google);
        
        //         $data=$service->userinfo->get();
        //         $_SESSION['email']=$data['email'];
        //         //$email=$_SESSION['emil'];
        //     }
        // }

        $this->load->view('Usersv/dashboard',$data);  
        
    }

    //Delete..................
    public function delete(){
            $id=$this->input->get('id');
            $this->Usersm->deletedata($id);
    }
    //Update..............
    public function edit($id){
            $data=$this->Usersm->edit($id);
            $this->load->view('Usersv/editformdata',['row'=>$data]);
    }  
    
    public function editrecord(){
            $Reg_id=$this->input->post('Reg_id');
            $this->form_validation->set_rules('Firstname','Firstname','required|alpha');
            $this->form_validation->set_rules('Lastname','Lastname','required|alpha');
            $this->form_validation->set_rules('Email','Email','required|valid_email|is_unique[register.Email]');
            $this->form_validation->set_rules('Username','Username','required');
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
       
       if($this->form_validation->run())
        {
           $post=$this->input->post();
           $this->Usersm->editrecordm($Reg_id,$post);
            return redirect('Userc/displayuser');
        }else{
                $this->load->view('Usersv/editformdata');
            }
    }

// Dynamic States City............................

    public function fetch_stateC(){
        $this->Usersm->fetch_stateM($this->input->post('country_id'));
    }

    public function fetch_cityC(){
        $this->Usersm->fetch_cityM($this->input->post('state_id'));
    }

//Reset Password..............................
    public function resetpwd(){

                    $this->form_validation->set_rules('email','Email','required|valid_email');
                    $this->form_validation->set_rules('pwd','Password','required|min_length[4]');
                    $this->form_validation->set_rules('npwd','Password','required|min_length[4]');
                    $this->form_validation->set_rules('cfpwd','Password','required|min_length[4]');
                    $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
                    if($this->form_validation->run())
                    {
                        $email=$this->input->post('email');
                        $pwd=$this->input->post('pwd');
                        $npwd=$this->input->post('npwd');
                        $cfpwd=$this->input->post('cfpwd');
                
                        $query=$this->Usersm->checkemailpwd($email,$pwd); 
                            if($query){
                        $qu=$this->Usersm->savenewpass($email,$npwd);
                        if($qu){
                        // echo "Password change...";
                        $this->session->set_flashdata('pwdsuccess','Password change Successfully');
                        $this->load->view('Usersv/resetpassform'); 
                        }else{
                            $this->session->set_flashdata('pwderror','Sorry! Password not change');
                            $this->load->view('Usersv/resetpassform'); 
                        }
                 }  
                 
          }else{
            $this->load->view('Usersv/resetpassform');
        }  
    }
//Forgot Password........................................
    public function forgotpwd_email(){

            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
            if($this->form_validation->run()){
            $email=$this->input->post('email');
            $q=$this->Usersm->forgotpwdm_email($email);
           
            if($q){
                
                $temp_pass=md5(uniqid());

                $this->load->library('email', array('mailtype'=>'html'));
                $this->email->from("demotesting0909@gmail.com");
                $this->email->to($email);
                $this->email->subject("Reset your Password.....");
                $message = "<p>This email has been sent as a request to reset your password</p>";
                $message .= "<p><a href='".base_url()."Userc/reset_password/$temp_pass'>Click here </a>if you want to reset your password,
                            if not, then ignore</p>";
                $this->email->message($message);
                if($this->email->send()){
                $query=$this->Usersm->temp_reset_pass($temp_pass);
                if($query){
                    $this->session->set_flashdata('successemail','Email has been sent');  
                    $this->load->view('Usersv/forgotform');
                    }else{
                    $this->session->set_flashdata('erroremail','Email has been not sent');  
                    $this->load->view('Usersv/forgotform');
                    }
                }else{
                    $this->session->set_flashdata('error','Email Does not exist');
                    $this->load->view('Usersv/forgotform');
                }
            }else{
                $this->load->view('Usersv/forgotform');
            }
            
            }else{
                $this->load->view('Usersv/forgotform');
            }
    }
    public function reset_password($temp_pass){
                //echo $temp_pass;
           if($this->Usersm->valid_temp_pass($temp_pass)){
            $this->session->set_userdata('token',$temp_pass);
            $this->load->view('Usersv/resetforgotpwd');
            }else{
            echo "the key is not valid";    
            }
    }
    public function updatepwd(){
            $email=$this->input->get();
            $this->form_validation->set_rules('Password','Password','required|min_length[4]|max_length[8]');
            $this->form_validation->set_rules('Cpassword','Cpassword','required|min_length[4]|max_length[8]|matches[Password]');
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
            if($this->form_validation->run()){
            $post=$this->input->post();
            $token=$this->session->userdata('token');
            $query=$this->Usersm->updatepwd($post,$token);
            if($query){
                $this->session->set_flashdata('pwdsuccess','Password Changed....'); 
                $this->load->view('Usersv/resetforgotpwd'); 
            }else{
                $this->session->set_flashdata('pwderror','Sorry ! Password Not Change....'); 
                    $this->load->view('Usersv/resetforgotpwd'); 
            }
        }
        else{
            $this->load->view('Usersv/resetforgotpwd');
        }
    }

    public function logoutgoogle(){

        
        include APPPATH . "C:/xampp/htdocs/payal/CodeIgniterCRUD/setup.php";   
        session_destroy();
        unset($_SESSION['token']);
        return redirect('Userc/index');
    }
}


?>