<?php

App::uses('AppModel', 'Model');

class BusinessUnit extends AppModel {
    public $belongsTo = array(
        'Assessment',
    );    

    public $hasMany = array(
    	'BusinessUnitIndicator'
    );

    public function get_all($assessment_id=NULL){
		$this->virtualFields['num_e'] = 0;
		$this->virtualFields['num_s'] = 0;
		$this->virtualFields['num_g'] = 0;
		$this->virtualFields['num_custom'] = 0;
		$this->virtualFields['total_kpi'] = 0;

    	$query = sprintf("
			SELECT BusinessUnit.* , 
				SUM( IF( LEFT( i.indicator, 1 ) =  'E', 1, 0 ) ) AS BusinessUnit__num_e, 
				SUM( IF( LEFT( i.indicator, 1 ) =  'S', 1, 0 ) ) AS BusinessUnit__num_s, 
				SUM( IF( LEFT( i.indicator, 1 ) =  'G', 1, 0 ) ) AS BusinessUnit__num_g,
				SUM( IF( LEFT( i.indicator, 1 ) =  'C', 1, 0 ) ) AS BusinessUnit__num_custom,
				COUNT(bui.id) AS BusinessUnit__total_kpi
			FROM business_units AS BusinessUnit
				LEFT OUTER JOIN business_unit_indicators AS bui ON bui.business_unit_id = BusinessUnit.id
				LEFT OUTER JOIN indicators AS i ON bui.indicator_id = i.id
			WHERE BusinessUnit.assessment_id = %s
			GROUP BY BusinessUnit.id
    	", $assessment_id);
    	return $this->query($query);
    }
}
?>