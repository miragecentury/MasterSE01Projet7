<?php

namespace Home\Controller;

use BPC\Authentication\Adapter\BPCAdapter;
use Home\Form\LoginForm;
use Home\Form\InscriptionForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AuthentificationController extends AbstractActionController {

    public function loginAction() {

        $loginForm = new LoginForm();
        if ($this->getRequest()->isPOST()) {
            $loginForm->setData($this->getRequest()->getPOST());
            if ($loginForm->isValid()) {
                $authentificationAdapter = new BPCAdapter();
                //$authentificationAdapter->setServiceLocator($this->getServiceLocator());
                $authentificationAdapter->setData($loginForm->getData());
                $auth = $this->getServiceLocator()->get("Zend\Authentication\AuthenticationService");
                $auth->setAdapter($authentificationAdapter);
                $auth->authenticate();
                if ($this->identity() != null) {
                    return $this->redirect()->toRoute("home_connected", array("controller" => "Home\Controller\Index", "action" => "index"));
                } else {
                    return $this->redirectToLogin($loginForm, new InscriptionForm());
                }
            } else {
                return $this->redirectToLogin($loginForm, new InscriptionForm());
            }
        } else {
            return $this->redirectToLogin($loginForm, new InscriptionForm());
        }
    }

    private function redirectToLogin($loginForm, $inscriptionForm) {
        $viewModel = new ViewModel(array("form_login" => $loginForm, "form_inscription" => $inscriptionForm));
        $this->layout("layout/layout_login");
        return $viewModel;
    }

    public function logoutAction() {
        $auth = $this->getServiceLocator()->get("Zend\Authentication\AuthenticationService");
        $auth->clearIdentity();
        return $this->redirect()->toRoute("home");
    }

    public function inscriptionAction() {
        $inscriptionForm = new InscriptionForm();
        if ($this->getRequest()->isPOST()) {
            return $this->redirectToInscription(new LoginForm(), $inscriptionForm);
        } else {
            return $this->redirectToInscription(new LoginForm(), $inscriptionForm);
        }
    }

    private function redirectToInscription($loginForm, $inscriptionForm) {
        $this->layout("layout/layout_login");
        $view = new ViewModel(array("form_inscription" => $inscriptionForm, "form_login" => new LoginForm()));
        $view->setTemplate("home/authentification/login");
        $renderer = $this->serviceLocator->get('Zend\View\Renderer\RendererInterface');
        $renderer->inlineScript()->appendScript("
            jQuery(document).ready(function() {  
                jQuery('.login-form').hide();
                jQuery('.register-form').show();
            });
        ");
        return $view;
    }

}
