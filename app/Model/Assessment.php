<?php

App::uses('AppModel', 'Model');

class Assessment extends AppModel {
    public $belongsTo = array(
        'Client', 'Sector'
    );    

    public $hasMany = array(
    	'BusinessUnit' => array('dependent'=>true)
    );
}
?>