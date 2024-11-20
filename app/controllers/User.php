<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User extends Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->call->model('User_model');
    }

    public function home() {

        $events = $this->User_model->home();
        $this->call->view('user/home', ['events' => $events]);
    }

    public function about() {
        $this->call->view('/user/about');
    }
    
}
?>
