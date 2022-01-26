<?php

class UsersController extends AppController
{
    public $helpers = array('Html','Form');


    public function index(){
        $users = $this->User->find('all');
       
        $this->set('users',$users);
    }
   
    function detect_password(){

        $hash = $this->User->find('list',array(
            'fields' => ['id','password']));
        $users = [];    
        
        $str = ['123456','123456789','12345','111111111','qwerty','woaini','password','asd123','abcd123','12345678','111111','123123','1234567890',
        '1234567','qwerty123','123abc','000000','1q2w3e','aa12345678','abc123','password1','1234','qwertyuiop','123321','password123','abc123456'];

        $algo = ['sha256','ripemd256','snefru','gost'];

        foreach($str as $v){
            foreach($algo as $k){
               if(in_array(hash($k, $v), array_values($hash))){
                
                    $user = $this->User->find('first',array('fields' => ['id'],'conditions' => ['password' => hash($k, $v)]));
                
                    $users[$user['User']['id']] = $v;
                 }
            }
        }
       pr($users);
    
    }

    public function user_login(){

        if($this->request->is('post'))
		{
			if (empty($this->request->data['login']['username']) || empty($this->request->data['login']['password']))
			{
				$this->Session->setFlash('Username and password fields cannot be empty');
				return false;
			}

           
            $user = $this->User->find('first', array(
				'conditions' => array(
					'OR' => array('username' => $this->request->data['login']['username'], 'email' => $this->request->data['login']['username']),
					'password' => hash('sha256',$this->request->data['login']['password'])))); 

            if(!empty($user)){
                return $this->redirect(array('controller' => 'Tasks','action' => 'index'));
            }else{
                $this->Session->setFlash('password or username is incorrect');
            }        
        }
    }
    
}


?>