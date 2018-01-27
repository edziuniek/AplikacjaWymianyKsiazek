<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="FrontendBundle\Repository\EditionRepository")
 * @ORM\Table(name="editions")
 */
class Edition
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $points;

    /**
     * @ORM\Column(type="string")
     */
    private $fileUrl;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $author;

    /**
     * Edition constructor.
     * @param string $title
     * @param string $description
     * @param int $points
     * @param string $fileUrl
     * @param User $author
     */


    /**
     * @param string $title
     * @param string $description
     * @param int $points
     * @param string $fileUrl
     * @param User $author
     * @return Edition
     */
    public static function create(string $title, string $description, int $points, string $fileUrl, User $author)
    {
        return new self($title, $description, $points, $fileUrl, $author);
    }
}
