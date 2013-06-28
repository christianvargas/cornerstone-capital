<?php
App::uses('FormAuthenticate', 'Controller/Component/Auth');

class CustomAuthenticate extends FormAuthenticate {

    /**
    * Checks the fields to ensure they are supplied.
    *
    * @param CakeRequest $request The request that contains login information.
    * @param string $model The model used for login verification.
    * @param array $fields The fields to be checked.
    * @return boolean False if the fields have not been supplied. True if they exist.
    */
    protected function _checkFields(CakeRequest $request, $model, $fields) {
       if (empty($request->data[$model])) {
           return false;
       }
       foreach (array($fields['username'], $fields['password']) as $field) {
           $value = $request->data($model . '.' . $field);
           if (empty($value) || !is_string($value)) {
               return false;
           }
       }
       return true;
    }

    protected function _findUser($username, $password){
        $userModel = $this->settings['userModel'];
        list($plugin, $model) = pluginSplit($userModel);
        $fields = $this->settings['fields'];

        $conditions = array(
            $model . '.' . $fields['username'] => $username,
        );
        if (!empty($this->settings['scope'])) {
            $conditions = array_merge($conditions, $this->settings['scope']);
        }
        $result = ClassRegistry::init($userModel)->find('first', array(
            'conditions' => $conditions,
            'recursive' => 0,
            'fields' => array('id', 'passwd', 'created'),
        ));
        if (empty($result) || empty($result[$model])) {
            return false;
        }
        if($result[$model][$fields['password']] != $this->_password($password, $result[$model]['created'])){
            return false;
        }
        unset($result[$model][$fields['password']]);
        unset($result[$model]['created']);
        return $result[$model];
    }

    protected function _password($password, $salt){
      // use crypt logic created by Nicolas
      $loop = round( ( strlen( $salt ) * 3.1479 ) * 653 );
      $string = trim( $password );
      return str_replace( '$6$rounds=' . $loop . '$' . substr( $salt , 0 , 16 ) . '$' , '' , crypt( $string , '$6$rounds=' . $loop . '$' . substr( $salt , 0 , 16 ) . '$' ) );
    }
}