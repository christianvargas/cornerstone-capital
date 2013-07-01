<?php
class ProjectsController extends AppController {
	public $helpers = array('FileUpload.UploadForm');

	public function index(){
        $projects = $this->Project->find('all', array('order'=>'status DESC'));
        $this->set('projects', $projects);		
        $this->render('list');
	}

	public function view( $project_id=NULL ){
		$project = $this->Project->findById($project_id);
		$team_members = $this->Project->Team->find('all', array('conditions' => array('project_id' => $project_id)));
		$this->set('project', $project);
		$this->set('team_members', $team_members);
	}

	public function add( $project_id=NULL ){
		$this->Project->Team->save($_POST);
		$this->Session->setFlash(__('Saved Successfully'));
		return $this->redirect('/projects/view/'.$project_id);
	}

	public function delete( $project_id ){
		$this->Project->delete($project_id);
		$this->Session->setFlash(__('Saved Successfully'));
		return $this->redirect('/projects');
	}
}
?>