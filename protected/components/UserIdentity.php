<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;

    private $_exclude = array('password');

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        $user = User::model()->find('LOWER(username) = :username', array(':username' => $this->username));

        assert(method_exists(Yii::app()->securityManager, 'hashPassword'));

        if($user !== null) {
            
            $this->password = Yii::app()->securityManager->hashPassword($this->password, $user->salt);

            if($this->password !== $user->password) {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            } else {
                $this->processAuthenticate($user);
            }

        } else {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }

        return $this->errorCode == self::ERROR_NONE;
    }

    public function processAuthenticate(User $user)
    {
        $this->_id = $user->id;
        $this->errorCode = self::ERROR_NONE;

        foreach ($user as $k => $v) {
            if(!in_array($k, $this->_exclude)) {
                $this->setState($k, $v);
            }
        }
    }

    public function getId()
    {
        return $this->_id;
    }
}