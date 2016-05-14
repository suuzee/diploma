<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __constructor() {
        parent::__constructor();
    }

	public function index() {

		$this -> load -> view('front/home.html');
	}

    public function register() {
        $this -> load -> view('front/register.html');
    }

    public function login() {
        $this -> load -> view('front/login.html');
    }

    public function ask() {
        $this -> load -> view('front/ask.html');
    }

    public function i() {

    }
}
