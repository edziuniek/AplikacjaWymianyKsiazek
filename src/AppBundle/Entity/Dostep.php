<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;



/**
 * @ORM\Entity
 * @ORM\Table(name="dostep")
 */
class Dostep
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Egzemplarz", mappedBy="id")
     */
    protected $id_egzemplarza;
    /**
     * @ORM\ManyToOne (targetEntity="AppBundle\Entity\User" , mappedBy="id")
     */
    protected $id_uzytkownika;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}