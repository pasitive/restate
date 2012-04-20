<?php

class AdminModule extends CWebModule
{
    /**
     * @var string the password that can be used to access GiiModule.
     * If this property is set false, then GiiModule can be accessed without password
     * (DO NOT DO THIS UNLESS YOU KNOW THE CONSEQUENCE!!!)
     */
    public $password;
    /**
     * @var array the IP filters that specify which IP addresses are allowed to access GiiModule.
     * Each array element represents a single filter. A filter can be either an IP address
     * or an address with wildcard (e.g. 192.168.0.*) to represent a network segment.
     * If you want to allow all IPs to access gii, you may set this property to be false
     * (DO NOT DO THIS UNLESS YOU KNOW THE CONSEQUENCE!!!)
     * The default value is array('127.0.0.1', '::1'), which means GiiModule can only be accessed
     * on the localhost.
     */
    public $ipFilters = array('127.0.0.1', '::1');

    private $_assetsUrl;

    public function init()
    {
        parent::init();

        Yii::app()->setComponents(array(
            'errorHandler' => array(
                'errorAction' => '/admin/error/error',
            ),
            'user' => array(
                'class' => 'CWebUser',
                'stateKeyPrefix' => 'admin',
                'loginUrl' => Yii::app()->createUrl($this->getId() . '/default/login'),
            ),
        ));
        // this method is called when the module is being created
        // you may place code here to customize the module or the application

        // import the module-level models and components
        $this->setImport(array(
            'admin.models.*',
            'admin.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action)
    {
        if (parent::beforeControllerAction($controller, $action)) {
            $route = $controller->id . '/' . $action->id;
            if (!$this->allowIp(Yii::app()->request->userHostAddress) && $route !== 'default/error')
                throw new CHttpException(403, "You are not allowed to access this page.");

            $publicPages = array(
                'default/login',
                'default/error',
            );

            if ($this->password !== false && Yii::app()->user->isGuest && !in_array($route, $publicPages))
                Yii::app()->user->loginRequired();
            else
                return true;
        }
        return false;
    }

    /**
     * Checks to see if the user IP is allowed by {@link ipFilters}.
     * @param string $ip the user IP
     * @return boolean whether the user IP is allowed by {@link ipFilters}.
     */
    protected function allowIp($ip)
    {
        if (empty($this->ipFilters))
            return true;
        foreach ($this->ipFilters as $filter)
        {
            if ($filter === '*' || $filter === $ip || (($pos = strpos($filter, '*')) !== false && !strncmp($ip, $filter, $pos)))
                return true;
        }
        return false;
    }

    /**
     * @return string the base URL that contains all published asset files of gii.
     */
    public function getAssetsUrl()
    {
        if ($this->_assetsUrl === null)
            $this->_assetsUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.admin.assets'), false, -1, YII_DEBUG);
        return $this->_assetsUrl;
    }

    /**
     * @param string $value the base URL that contains all published asset files of gii.
     */
    public function setAssetsUrl($value)
    {
        $this->_assetsUrl = $value;
    }
}
