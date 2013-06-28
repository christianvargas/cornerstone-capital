<?php
class AssessmentsController extends AppController {
	var $uses = array('Client','Assessment','Indicator','Sector');

	public function edit( $assessment_id=NULL ){
		if( is_null($assessment_id) ){
			$assessment = $this->Assessment->read();
		} else {
			$assessment = $this->Assessment->find('first', array('conditions'=>array('Assessment.id'=>$assessment_id), 'recursive'=>2));
			$client = $this->Client->findById($assessment['Client']['id']);
			$this->set('client', $client);
		}

		$indicators = $this->Indicator->find('all', array('order'=>'indicator ASC'));
		$env_indicators = array();
		$soc_indicators = array();
		$gov_indicators = array();
		foreach( $indicators as $indicator ){
			switch( substr($indicator['Indicator']['indicator'], 0, 1) ){
				case 'E':
					$env_indicators[] = $indicator;
					break;					
				case 'S':
					$soc_indicators[] = $indicator;
					break;
				case 'G':
					$gov_indicators[] = $indicator;
					break;
			}
		}

		$this->set('assessment', $assessment);
		$this->set('env_indicators', $env_indicators);
		$this->set('soc_indicators', $soc_indicators);
		$this->set('gov_indicators', $gov_indicators);
		$this->set('sectors', $this->Sector->find('threaded')); 		
		$this->render('edit');
	}	

	public function add( ){
		$this->Assessment->save($this->request->data);
		$this->Session->setFlash(__('Saved Successfully'));
		return $this->redirect('/assessments/edit/'.$this->Assessment->id);
	}

	public function delete( $assessment_id ){
		$assessment = $this->Assessment->findById($assessment_id);
		$this->Assessment->delete($assessment_id);
		$this->Session->setFlash(__('Deleted Successfully'));
		return $this->redirect('/clients/view/'.$assessment['Client']['id']);
	}


}
?>