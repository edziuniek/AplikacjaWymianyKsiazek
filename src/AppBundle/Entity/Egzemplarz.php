<?php
/**
 * Created by PhpStorm.
 * User: edziuniek
 * Date: 15.01.18
 * Time: 15:56
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="egzemplarz")
 */

class Egzemplarz
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Dostep", inversedBy="id_egzemplarza")
     */

    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $id_autora;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $tutul;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $opis;
    /**
     * @ORM\Column(type="integer")
     */
    protected $liczba_punktow;
    /**
     * @ORM\Column(type="string")
     */
    protected $link_do_pliku;
}