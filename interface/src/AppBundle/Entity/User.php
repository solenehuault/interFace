<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=1,
     *     max=255,
     *     minMessage="The name is too short.",
     *     maxMessage="The name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $prenom;
    
    /**
     * {@inheritdoc}
     */
    public function getprenom()
    {
        return $this->prenom;
    }
    
    public function setprenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }
    
    
    public function __toString()
    {
		return $this->getNom()." ".$this->getPrenom();
    }
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=1,
     *     max=255,
     *     minMessage="The name is too short.",
     *     maxMessage="The name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $nom;
    
    /**
     * {@inheritdoc}
     */
    public function getnom() {
        return $this->nom;
    }
    
    public function setnom($nom)
    {
        $this->nom = $nom;
        return $this;
    }
    
    public function setEmail($email)
    {
		parent::setEmail($email);
		$this->setUsername($email);
	}
}
