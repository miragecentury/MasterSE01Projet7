<?php

namespace BPC\Mvc\Controller;

use Zend\Mvc\Controller as ZController;
use Zend\View\Model\ViewModel;

class AbstractActionController extends ZController\AbstractActionController {

    const needAuth = false;
    const needAuthModo = false;
    const needAuthAdmin = false;

    public function onDispatch(\Zend\Mvc\MvcEvent $e) {
        if (static::needAuth) {
            $auth = $this->getServiceLocator()->get("Zend\Authentication\AuthenticationService");
            if (!$auth->hasIdentity()) {
                return $this->redirect()->toRoute("home_login");
            }
        }
        $return = parent::onDispatch($e);
        //$this->setupLayout();
        return $return;
    }

}
