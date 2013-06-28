<?php
class ClientsController extends AppController {
	var $uses = array('Client','Country','Sector');

	public function index(){
        $clients = $this->Client->find('all', array('order'=>'name ASC'));
        $this->set('clients', $clients);		
        $this->set('countries', $this->Country->find('list', array('fields' => array('iso2', 'short_name'))));
        $this->render('list');
	}

	public function view( $client_id=NULL ){
		$client = $this->Client->find('first', array('conditions'=>array('id'=>$client_id), 'recursive'=>2));
		$this->set('client', $client);
        $this->set('countries', $this->Country->find('list', array('fields' => array('iso2', 'short_name'))));
		$this->set('sectors', $this->Sector->find('threaded')); 		
	}

	public function add(){
		$this->Client->save($this->request->data);
		$this->Session->setFlash(__('Saved Successfully'));
		return $this->redirect('/clients/view/'.$this->Client->id);
	}

	public function delete( $client_id ){
		$this->Client->delete($client_id);
		$this->Session->setFlash(__('Deleted Successfully'));
		return $this->redirect('/clients');
	}
}
?>