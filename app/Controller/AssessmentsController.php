<?php
class AssessmentsController extends AppController {
	var $uses = array('Client','Assessment','Indicator','Sector','BusinessUnit','BusinessUnitIndicator');

	public function edit( $assessment_id=NULL ){
		if( is_null($assessment_id) ){
			$assessment = $this->Assessment->read();
		} else {
			$assessment = $this->Assessment->find('first', array('conditions'=>array('Assessment.id'=>$assessment_id), 'recursive'=>2));
			$client = $this->Client->findById($assessment['Client']['id']);
			$this->set('client', $client);
		}

		$this->set('assessment', $assessment);
		$this->set('bunits', $this->BusinessUnit->get_all($assessment_id));
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

	public function delete_unit( $bunit_id ){
		$business_unit = $this->BusinessUnit->findById($bunit_id);
		$this->BusinessUnit->delete($bunit_id);
		$this->Session->setFlash(__('Deleted Successfully'));
		return $this->redirect('/assessments/edit/'.$business_unit['BusinessUnit']['assessment_id']);
	}

	public function add_unit( $bunit_id=NULL ){
		$this->BusinessUnit->save($this->request->data);
		$this->BusinessUnitIndicator->deleteAll(array('business_unit_id'=>$this->BusinessUnit->id));
		foreach( array_keys($this->data['indicator']) as $indicator_id ){
			$this->BusinessUnitIndicator->save(array(
				'id' => NULL,
				'business_unit_id' => $this->BusinessUnit->id,
				'indicator_id' => $indicator_id
			));
		}

		$this->Session->setFlash(__('Saved Successfully'));
		return $this->redirect('/assessments/edit/'.$this->data['BusinessUnit']['assessment_id']);
	}

	public function bunit( $bunit_id = NULL ){
		if( is_null($bunit_id) ){
			$business_unit = $this->BusinessUnit->read();
		} else {
			$business_unit = $this->BusinessUnit->findById($bunit_id);
		}
		$bunit_indicators = $this->BusinessUnitIndicator->find('list', array('conditions'=>array('business_unit_id'=>$bunit_id), 'fields'=>array('indicator_id','indicator_id')));

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

		$this->set('business_unit', $business_unit);
		$this->set('indicators', $bunit_indicators);
		$this->set('env_indicators', $env_indicators);
		$this->set('soc_indicators', $soc_indicators);
		$this->set('gov_indicators', $gov_indicators);
		$this->layout = 'ajax';
		$this->render('businessunit');
	}

}
?>