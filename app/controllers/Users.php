<?php

class Users extends Controller
{
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        //check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form



            //sanitize POST data




            //init data
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
            ];


            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Pleae enter email';
            }else{
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'email is already exist';
                }
            }

            //Validate name
            if (empty($data['name'])) {
                $data['name_err'] = 'please enter name';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            // Validate Confirm Password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            //make sure errors are empty
            if (
                empty($data['email_err']) && empty($data['name_err'])
                && empty($data['password_error']) && empty($data['password_confirm_err'])
            ) {
             //Validated
                

            //hash password
                $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);

            //Register user
                if($this->userModel->register($data)){
                    flash('register_seccess','you are registered and can log in');
                    redirect('users/login');
                }else{
                    die ('somthing went wrong');
                    
                }

            } else {
                //load view with errors
                $this->view('users/register', $data);
            }
        } else {
            //init data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
            ];
            //load view
            $this->view('users/register', $data);
        }
    }



    public function login()
    {
        //check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form

            //init
            $data = [
                
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
                
            ];
            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Pleae enter email';
            }
            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }


            //check for user/email
            if($this->userModel->findUserByEmail($data['email'])){
                //user founded
            }else{
                //user not found
                $data['email_err']='no user found';
            }

            // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){
          // Validated
          //check and set logged in user
          $loggedInUser=$this->userModel->login($data['email'],$data['password']);
          if($loggedInUser){
            //create session
          }else{
            $data['password_err']='password incorrect';
            $this->view('users/login',$data);
          }
        } else {
          // Load view with errors
          $this->view('users/login', $data);
        }


        } else {
            //init data
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];
            //load v iew
            $this->view('users/login', $data);
        }
    }
}
