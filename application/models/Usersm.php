<?php
class Usersm extends CI_model{
    //Display data..............................................
    public function userdata(){
        $q=$this->db->get("register");
        return $q->result_array(); 
    }
    //Insert data..................................
    public function insert($data)
    {
       //print_r($data);
            return $this->db->insert('register',$data);
            
    }
    //Login.........................................
    public function login($email,$pwd)
    {
        $q=$this->db->where(['Email'=>$email,'Password'=>$pwd])
                    ->get('register');
                 if($q->num_rows())
                    {
                        $id=$q->row();
                        return $id->Reg_id;
                    }
                    else{
                        return false;
                    }
    }
    //Delete data..............................
    public function deletedata($id){
            $this->db->where('Reg_id',$id);   
            if($this->db->delete('register')){
                redirect('Userc/displayuser');
                }
    }
    //Edit Data................................
       public function edit($Reg_id){
          $q=$this->db->where('Reg_id',$Reg_id)
                    ->get('register');
                    return $q->row();
       }

        public function editrecordm($Reg_id,array $post){
         return $this->db->where('Reg_id',$Reg_id)
                        ->update('register',$post);
        }

        //Dynamic Country State City......................
        public function fetch_country(){
            $q=$this->db->get('countries');
            return $q->result();
        }
        public function fetch_stateM($countryid){
            $q=$this->db->where('c_id',$countryid)
                        ->get('states');
                        $d= $q->result();
            foreach($d as $row){
                 echo "<option value='".$row->s_id."'>".$row->s_name."</option>";
             } 
        }
        public function fetch_cityM($stateid)
        {
            $q=$this->db->where('s_id',$stateid)
                        ->get('cities');
                        $d=$q->result();
                        foreach($d as $row){
                        echo "<option value='".$row->city_id."'>".$row->city_name."</option>";
                        }
        }

        //Reset Password............................
        public function checkemailpwd($email,$pwd){
            $q=$this->db->where(['Email'=>$email,'Password'=>$pwd])
                        ->get('register');
                     $r=$q->row();
                    if($pwd == $r->Password){
                        return true;
                    }else{
                        return false;
                        }
        }
        public function savenewpass($email,$npwd){
            $array=array('Password'=>$npwd,'Cpassword'=>$npwd);
            print_r($array);
            $q=$this->db->where('Email',$email)
                        ->update('register',$array);
                     if($q){
                        return true;
                          }else{
                            return false;
                          }
        }

        //Forgot password..........................
        public function forgotpwdm_email($email){
            $q=$this->db->where('Email',$email)
                    ->get('register');
                return $q->result_array();
        }
        public function temp_reset_pass($temp_pass){
            $email=$this->input->post('email');
            $data=array('Token'=>$temp_pass);
            $q=$this->db->where('Email',$email)
                        ->update('register',$data);
            if($q){
            return true;
            }
            else{
                return FALSE;
            }                
        }
        public function valid_temp_pass($temp_pass){
            $query=$this->db->where('Token', $temp_pass)
                            ->get('register');
                            $p=$query->result_array();
                        if($query->num_rows() == 1){
                        return TRUE;
                        }
                        else return FALSE;
        }
        public function updatepwd($post,$token){
           $q=$this->db->where('Token',$token)
                        ->update('register',$post);
                        if($q){
                            return true;
                        }else{
                            return false;
                        }
       }
}
?>