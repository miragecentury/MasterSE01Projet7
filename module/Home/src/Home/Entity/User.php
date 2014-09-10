<?php

namespace Home\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class User {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $email;

    /** @ORM\Column(type="string") */
    protected $nom;

    /** @ORM\Column(type="string") */
    protected $prenom;

    /** @ORM\Column(type="string") */
    protected $username;

    /** @ORM\Column(type="datetime") */
    protected $datenai;

    /** @ORM\Column(type="datetime") */
    protected $datecrea;

    /**     * */

    /** @ORM\Column(type="string") */
    protected $salt;

    /** @ORM\Column(type="string") */
    protected $hash;

    /**     * */

    /** @ORM\Column(type="boolean") */
    protected $isAdmin = false;
    /**     * */

    /*     * **************************************************************** */
    
    public function getSalt() {
        return $this->salt;
    }

    public function getHash() {
        return $this->hash;
    }

    public function setSalt($salt) {
        $this->salt = $salt;
        return $this;
    }

    public function setHash($hash) {
        $this->hash = $hash;
        return $this;
    }


}
