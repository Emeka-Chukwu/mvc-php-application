<?php

    class Home extends Controller
    {
        // protected $user;
        // public function __construct()
        // {
        //     $this->user = $this->model('User');
        // }
        public function index($name='', $name2='')
        {
            // echo "home/index";
            // echo " parameters passed in the url ". $name.' '.$name2;
            $user = $this->model('User');
            $user->name = 'Emeka '.$name;
            // echo ($user->name);

            $this->view('home/index',['name'=> $user->name, 'name2' => $name]);


        }

        public function test($name= '', $name2='')
        {
            echo $name.' tes '.$name2;


        }

        public function create($username = '', $email='')
        {
            // $this->user->create([
            //     'username' => $username,
            //     'email' => $email,
            // ]);

            User::create([
                'username' => $username,
                'email' => $email,
            ]);
        }
    }
?>  