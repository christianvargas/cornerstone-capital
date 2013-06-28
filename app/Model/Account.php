<?php

App::uses('AppModel', 'Model');

class Account extends AppModel {
    public $belongsTo = array(
        'User'
    );    
}
?>