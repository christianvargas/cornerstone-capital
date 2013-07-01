<?php
class IndicatorsController extends AppController {
	public function index(){
		$indicators = $this->Indicator->find('all', array('order'=>'indicator ASC'));
		$env_indicators = array();
		$soc_indicators = array();
		$gov_indicators = array();
		$custom_indicators = array();
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
				default:
					$custom_indicators[] = $indicator;
			}
		}
		$indicators = array(
			'environmental' => $env_indicators,
			'social' => $soc_indicators,
			'governance' => $gov_indicators,
			'custom' => $custom_indicators,
		);

		$this->set('indicators', $indicators);
        $this->render('list');
	}

	public function add( $indicator_id = NULL ){
		if( is_null($indicator_id) ){
			$indicator = $this->Indicator->read();
		} else {
			$indicator = $this->Indicator->findById($indicator_id);
		}

		$this->layout = 'ajax';
		$this->set('indicator', $indicator);
		$this->render('edit');
	}

	public function save(){
		$this->Indicator->save($this->request->data);
		$this->Session->setFlash(__('Saved Successfully'));
		return $this->redirect('/indicators');
	}

	public function delete( $indicator_id ){
		$this->Indicator->delete($indicator_id);
		$this->Session->setFlash(__('Deleted Successfully'));
		return $this->redirect('/indicators');
	}
}
?>