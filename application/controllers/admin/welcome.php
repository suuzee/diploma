<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this -> load -> model('user_model');
        $this -> load -> model('tag_model');
        $this -> load -> model('question_model');
        $this -> load -> model('answer_model');
        $this -> load -> model('admin_model');
    }

    public function index() {
        $userNum = $this -> user_model -> getUserNum();
        $tagNum = $this -> tag_model -> getTagNum();
        $questionNum = $this -> question_model -> getAllQuestionNum();
        $answerNum = $this -> answer_model -> getAllAnswerNum();
        $data = array(
            'userNum' => $userNum,
            'tagNum' => $tagNum,
            'questionNum' => $questionNum,
            'answerNum' => $answerNum
        );
        $this -> load -> view('admin/index', $data);
    }

    public function login() {
        $this -> load -> view('admin/login');
    }

    public function logout() {
        $this -> session -> unset_userdata('login_admin');
        redirect('//q.qunarzz.com/diploma/admin');
    }

    public function checkAdmin() {
        $name = $this -> input -> post('$admin_name');
        $pwd = $this -> input -> post('$admin_pwd');
        $data = array(
            'admin_name' => $name,
            'admin_pwd' => $pwd
        );
        $admin = $this -> admin_model -> checkAdmin($data);
        if (!!$admin) {
            $this -> session -> set_userdata('login_admin', $admin);
            redirect('//q.qunarzz.com/diploma/admin/index');
        } else {
            echo '<script>alert("用户名或密码错误");</script>';
            echo '<script>location.href="/diploma/admin"</script>';
        }
    }

    public function question() {
        $page = $this -> input -> get('per_page');
        if (empty($page)) {
            $page = 0;
        }
        $total = $this -> question_model -> getQuestionNum();
		$config['base_url'] = '//q.qunarzz.com/diploma/admin/question';
		$config['total_rows'] = $total;
		$config['per_page'] = 5;
		$config['first_link'] = '<<首页';
		$config['last_link'] = '尾页>>';
		$config['next_link'] = '下一页>';
		$config['prev_link'] = '<上一页';
        $config['page_query_string'] = TRUE;
		$this -> pagination -> initialize($config);
		$questions = $this -> question_model -> getQuestionPage($page, $config['per_page']);
		$data = array(
			"questions" => $questions,
			"total" => $total,
			"pagesize" => $config['per_page']
		);
        $this -> load -> view('admin/question', $data);
    }

    public function delQuestion() {
        $questionId = $this -> input -> get('questionId');
        $result = $this -> question_model -> shieldQuestion($questionId);
        if (!!$result) {
            redirect('//q.qunarzz.com/diploma/admin/question');
        } else {
            echo '<script>alert("删除失败");</script>';
            echo '<script>location.href="/diploma/admin/question"</script>';
        }
    }

    public function delAnswer() {
        $answerId = $this -> input -> get('answerId');
        $result = $this -> answer_model -> shieldAnswer($answerId);
        if (!!$result) {
            redirect('//q.qunarzz.com/diploma/admin/informa');
        } else {
            echo '<script>alert("删除失败");</script>';
            echo '<script>location.href="/diploma/admin/informa"</script>';
        }
    }

    public function recycleq() {
        $page = $this -> input -> get('per_page');
        if (empty($page)) {
            $page = 0;
        }
        $total = $this -> question_model -> getShieldQuestionNum();
		$config['base_url'] = '//q.qunarzz.com/diploma/admin/recycleq';
		$config['total_rows'] = $total;
		$config['per_page'] = 5;
		$config['first_link'] = '<<首页';
		$config['last_link'] = '尾页>>';
		$config['next_link'] = '下一页>';
		$config['prev_link'] = '<上一页';
        $config['page_query_string'] = TRUE;
		$this -> pagination -> initialize($config);
		$questions = $this -> question_model -> getShieldQuestionPage($page, $config['per_page']);
		$data = array(
			"questions" => $questions,
			"total" => $total,
			"pagesize" => $config['per_page']
		);
        $this -> load -> view('admin/recycleq', $data);
    }

    public function regainQuestion() {
        $questionId = $this -> input -> get('questionId');
        $result = $this -> question_model -> regainQuestion($questionId);
        if (!!$result) {
            redirect('//q.qunarzz.com/diploma/admin/recycleq');
        } else {
            echo '<script>alert("删除失败");</script>';
            echo '<script>location.href="/diploma/admin/recycleq"</script>';
        }
    }

    public function regainAnswer() {
        $answerId = $this -> input -> get('answerId');
        $result = $this -> answer_model -> regainAnswer($answerId);
        if (!!$result) {
            redirect('//q.qunarzz.com/diploma/admin/recyclea');
        } else {
            echo '<script>alert("删除失败");</script>';
            echo '<script>location.href="/diploma/admin/recyclea"</script>';
        }
    }

    public function informq() {
        $page = $this -> input -> get('per_page');
        if (empty($page)) {
            $page = 0;
        }
        $total = $this -> question_model -> getInformQuestionNum();
		$config['base_url'] = '//q.qunarzz.com/diploma/admin/informq';
		$config['total_rows'] = $total;
		$config['per_page'] = 5;
		$config['first_link'] = '<<首页';
		$config['last_link'] = '尾页>>';
		$config['next_link'] = '下一页>';
		$config['prev_link'] = '<上一页';
        $config['page_query_string'] = TRUE;
		$this -> pagination -> initialize($config);
		$questions = $this -> question_model -> getInformQuestionPage($page, $config['per_page']);
		$data = array(
			"questions" => $questions,
			"total" => $total,
			"pagesize" => $config['per_page']
		);
        $this -> load -> view('admin/informq', $data);
    }

    public function informa() {
        $page = $this -> input -> get('per_page');
        if (empty($page)) {
            $page = 0;
        }
        $total = $this -> answer_model -> getInformAnswerNum();
		$config['base_url'] = '//q.qunarzz.com/diploma/admin/informa';
		$config['total_rows'] = $total;
		$config['per_page'] = 5;
		$config['first_link'] = '<<首页';
		$config['last_link'] = '尾页>>';
		$config['next_link'] = '下一页>';
		$config['prev_link'] = '<上一页';
        $config['page_query_string'] = TRUE;
		$this -> pagination -> initialize($config);
		$answers = $this -> answer_model -> getInformAnswerPage($page, $config['per_page']);
		$data = array(
			"answers" => $answers,
			"total" => $total,
			"pagesize" => $config['per_page']
		);
        $this -> load -> view('admin/informa', $data);
    }

    public function recyclea() {
        $page = $this -> input -> get('per_page');
        if (empty($page)) {
            $page = 0;
        }
        $total = $this -> answer_model -> getShieldAnswerNum();
		$config['base_url'] = '//q.qunarzz.com/diploma/admin/recycleq';
		$config['total_rows'] = $total;
		$config['per_page'] = 5;
		$config['first_link'] = '<<首页';
		$config['last_link'] = '尾页>>';
		$config['next_link'] = '下一页>';
		$config['prev_link'] = '<上一页';
        $config['page_query_string'] = TRUE;
		$this -> pagination -> initialize($config);
		$answers = $this -> answer_model -> getShieldAnswerPage($page, $config['per_page']);
		$data = array(
			"answers" => $answers,
			"total" => $total,
			"pagesize" => $config['per_page']
		);
        $this -> load -> view('admin/recyclea', $data);
    }

    public function user() {
        $page = $this -> input -> get('per_page');
        if (empty($page)) {
            $page = 0;
        }
        $total = $this -> user_model -> getUserNum();
		$config['base_url'] = '//q.qunarzz.com/diploma/admin/user';
		$config['total_rows'] = $total;
		$config['per_page'] = 5;
		$config['first_link'] = '<<首页';
		$config['last_link'] = '尾页>>';
		$config['next_link'] = '下一页>';
		$config['prev_link'] = '<上一页';
        $config['page_query_string'] = TRUE;
		$this -> pagination -> initialize($config);
		$users = $this -> user_model -> getUserPage($page, $config['per_page']);
		$data = array(
			"users" => $users,
			"total" => $total,
			"pagesize" => $config['per_page']
		);
        $this -> load -> view('admin/user', $data);
    }

}
