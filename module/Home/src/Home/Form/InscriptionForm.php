<?php

namespace Home\Form;

use Zend\Form\Element\Csrf;
use Zend\Form\Element\Date;
use Zend\Form\Element\Email;
use Zend\Form\Element\Password;
use Zend\Form\Element\Text;
use Zend\Form\Form;
use Zend\Validator\NotEmpty;

class InscriptionForm extends Form {

    public function __construct() {
        parent::__construct("InscriptionForm");
        /**/
        $email = new Email("email");
        $nom = new Text("nom");
        $prenom = new Text("prenom");
        $username = new Text("username");
        $datenai = new Date("datenai");
        $passwd0 = new Password("passwd0");
        $passwd1 = new Password("passwd1");
        $csrf = new Csrf("token_csrf");
        /**/
        $this->add($email);
        $this->add($nom);
        $this->add($prenom);
        $this->add($username);
        $this->add($datenai);
        $this->add($passwd0);
        $this->add($passwd1);
        $this->add($csrf);
        /**/
        $inputFilter = $this->getInputFilter();
        $inputFilter->add($email->getInputSpecification());
        $inputFilter->add($datenai->getInputSpecification());
        $inputFilter->add(array(
            'name' => 'passwd0',
            'require' => true,
            'filters' => array(),
            'validators' => array(
                //new Alnum(array('allowWhiteSpace' => true)),
                //new Between(array('min' => 6, 'max' => 10)),
                new NotEmpty()
            )
        ));
        $inputFilter->add(array(
            'name' => 'passwd1',
            'require' => true,
            'filters' => array(),
            'validators' => array(
                //new Alnum(array('allowWhiteSpace' => true)),
                //new Between(array('min' => 6, 'max' => 10)),
                new NotEmpty()
            )
        ));
        $inputFilter->add($csrf->getInputSpecification());
    }

}
