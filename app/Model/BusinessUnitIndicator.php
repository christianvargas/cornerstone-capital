<?php

App::uses('AppModel', 'Model');

class BusinessUnitIndicator extends AppModel {
    public $belongsTo = array(
        'BusinessUnit'
    );    
}
?>