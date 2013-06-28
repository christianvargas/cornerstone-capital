<?php
class AssessmentsController extends AppController {
	var $uses = array('Client','Assessment','Indicator');

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
		$this->render('edit');
	}	

	public function add( ){
		$client = $this->Client->findById($this->data['client_id']);
		$this->set('client', $client);
		return $this->edit();
	}

	public function save(){

	}


}
?>