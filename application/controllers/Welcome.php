<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
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
        $this -> load -> view('front/i.html');
    }

    public function question() {
        $this -> load -> view('front/question.html');
    }

    public function tag() {
        $this -> load -> view('front/tag.html');
    }

    public function admin() {
        $this -> load -> view('admin/login');
    }
}
