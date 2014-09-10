<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController {

    public function indexAction() {
        $auth = $this->getServiceLocator()->get("Zend\Authentication\AuthenticationService");
        if ($auth->getIdentity() != null) {
            return $this->redirect()->toRoute("home", array("controller" => "AppPlayer\Controller\Index", "action" => "index"));
        }
        return new ViewModel();
    }

}
