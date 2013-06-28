<?php

App::uses('AppModel', 'Model');

class BusinessUnit extends AppModel {
    public $belongsTo = array(
        'Assessment'
    );    

    public $hasMany = array(
    	'BusinessUnitIndicator'
    );
}
?>