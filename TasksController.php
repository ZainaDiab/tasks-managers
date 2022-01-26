<?php

class TasksController extends AppController{

  public function index(){
   
 
        $this->Task->virtualFields['project_name'] = 'Project.project_name';
        $this->Task->virtualFields['full_name'] = 'CONCAT(User.first_name," ",User.last_name)';
       
        $tasks = $this->Task->find('all',array(
            'fields' => ['Task.id','Task.task','Task.added_date','Task.completed','Task.project_name','Task.full_name'],
            'joins' => [
                [
                    'table' => 'users',
					'alias' => 'User',
					'type' => 'left',
					'conditions'=> ['Task.added_by = User.id']

                ],
                [
                    'table' => 'projects',
					'alias' => 'Project',
					'type' => 'left',
					'conditions'=> ['Task.project_id = Project.id']
                ]
            ],


        ));
     
        $this->set('tasks',$tasks);
    } 


}

?>  