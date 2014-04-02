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
	//public $layout='//layouts/column1';
        public $layout='/layouts/main';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
        
        /** 
         * allow switching layouts based on request variable
         * defaults to mobile-app layout, unless otherwise specified
         */
        protected function beforeAction($action) {
            if (isset($_REQUEST['goWeb'])) {
                setcookie('goWeb', true);  
            }            
            if (isset($_REQUEST['goApp'])) {
                unset($_COOKIE['goWeb']);  
            }
            if (isset($_COOKIE['goWeb']) || isset($_REQUEST['goWeb'])) {
                $this->layout='main';
            } else {
                $this->layout='mobile-app';
            }
        return true;
    }
}