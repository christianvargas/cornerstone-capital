<?php

App::uses('AppModel', 'Model');

class Client extends AppModel {
	var $hasMany = array('Project','Assessment');

}
?>