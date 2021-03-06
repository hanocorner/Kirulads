<?php
$config = array(
        'user_auth' => array(
            array(
                'field'=> 'mail',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ),
            array(
                'field'=> 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
                //'errors' => array('password_sequence' => 'Password did not match'),
            )
        ),
        'user_register'=> array(
            array(
                'field'=> 'fullname',
                'label' => 'Full Name',
                'rules' => 'trim|required|callback_special_chars',
                'errors' => array('special_chars' => 'Invalid chars'),
            ),
            array(
                'field'=> 'usermail',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ),
            array(
                'field'=> 'number',
                'label' => 'Number',
                'rules' => 'trim|required|numeric'
            ),
            array(
                'field'=> 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
                //'errors' => array('password_sequence' => 'Password did not match'),
            )
        ),
        'submit_ad'=>array(
            array(
                'field'=> 'title',
                'label' => 'Title',
                'rules' => 'trim|required'
            ),
            array(
                'field'=> 'editor1',
                'label' => 'Description',
                'rules' => 'trim|required'
            ),
            array(
                'field'=> 'price',
                'label' => 'Price',
                'rules' => 'trim|required'
            )
        ),
        'admin_auth'=>array(
            array(
                'field'=> 'username',
                'label' => 'Username',
                'rules' => 'trim|required'
            ),
            array(
                'field'=> 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
            )
        )
);
?>