<?php

App::uses('AppModel', 'Model');

class Project extends AppModel {
	var $hasMany = array('Team');
	var $belongsTo = array('Client');
}
?>