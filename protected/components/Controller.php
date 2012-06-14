<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    private $_assetsUrl;

    public function init()
    {
        parent::init();

        // Init application params
        $this->initAppParams();

        // Init i18n
        $this->initI18n();

        // Register core javascripts
        Yii::app()->clientScript->registerCoreScript('jquery')
            ->registerScriptFile($this->assetsUrl . '/javascript/scripts.js', CClientScript::POS_END);
    }

    protected function initI18n()
    {
        // Set the application language if provided by GET, session or cookie
        if (isset($_GET['language'])) {
            Yii::app()->language = $_GET['language'];
            Yii::app()->user->setState('language', $_GET['language']);
            $cookie = new CHttpCookie('language', $_GET['language']);
            $cookie->expire = time() + (60 * 60 * 24 * 365); // (1 year)
            Yii::app()->request->cookies['language'] = $cookie;
        } else if (Yii::app()->user->hasState('language'))
            Yii::app()->language = Yii::app()->user->getState('language');
        else if (isset(Yii::app()->request->cookies['language']))
            Yii::app()->language = Yii::app()->request->cookies['language']->value;
    }

    protected function initAppParams()
    {
        $dependency = new CDbCacheDependency('SELECT MAX(updated_at) FROM app_param');
        $params = AppParam::model()->cache(86400, $dependency)->findAll();

        foreach ($params as $param) {
            Yii::app()->params[$param->name] = $param->value;
        }
    }

    /**
     * @return string the base URL that contains all published asset files of gii.
     */
    public function getAssetsUrl()
    {
        if ($this->_assetsUrl === null)
            $this->_assetsUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.assets'), false, -1, YII_DEBUG);
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