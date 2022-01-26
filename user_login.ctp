<?php

    echo $this->Form->create('login');

    echo $this->Form->inputs(array(
        
        'username'=>array('label'=>'username', 'placeholder'=>__('please type username or email'), 'class'=>'input-lg form-control', 'maxlength' => '100' ,'tabindex' => '1'),
        'password'=>array('label'=>'password', 'placeholder'=>__('please type password'), 'class'=>'input-lg form-control', 'maxlength' => '40','tabindex' => '2'),
      ));

    echo $this->Form->submit('Login');



    ?>