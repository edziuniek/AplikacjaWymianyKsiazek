<?php
namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Edition")
     * @ORM\JoinTable(name="edition_accesses",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="edition_id", referencedColumnName="id")}
     * )
     */
    private $editionAccesses;

    /**
     * @ORM\Column(type="integer")
     */
    private $points = 0;

    public function __construct()
    {
        $this->editionAccesses = new ArrayCollection();
        parent::__construct();
    }

    public function addAccess(Edition $edition)
    {
        $this->editionAccesses->add($edition);
    }
}
