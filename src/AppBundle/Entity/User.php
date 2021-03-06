<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user_basic")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="biography", type="text", nullable=true)
     */
    private $biography;
    
    /**
     * @ORM\OneToOne(targetEntity="UserOptions", cascade={"persist", "merge", "remove"})
     */
    private $userOptions;
    
    public function __construct() {
        parent::__construct();
        // your own logic
    }

    /**
     * Set biography
     *
     * @param string $biography
     *
     * @return User
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * Get biography
     *
     * @return string
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * Set userOptions
     *
     * @param \AppBundle\Entity\UserOptions $userOptions
     *
     * @return User
     */
    public function setUserOptions(\AppBundle\Entity\UserOptions $userOptions = null)
    {
        $this->userOptions = $userOptions;

        return $this;
    }

    /**
     * Get userOptions
     *
     * @return \AppBundle\Entity\UserOptions
     */
    public function getUserOptions()
    {
        return $this->userOptions;
    }
}
