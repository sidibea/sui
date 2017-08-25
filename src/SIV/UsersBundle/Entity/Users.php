<?php

namespace SIV\UsersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\MessageBundle\Model\ParticipantInterface;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="SIV\UsersBundle\Repository\UsersRepository")
 */
class Users extends BaseUser implements ParticipantInterface
{
    /**
    * @var integer
    *
    * @ORM\Column(name="id", type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", nullable=true, type="string", length=55)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", nullable=true, type="string", length=55)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="date_naissance", nullable=true, type="string", length=255)
     */
    private $date_naissance;

    /**
     * @var string
     *
     * @ORM\Column(name="fonction", nullable=true, type="string", length=255)
     */
    private $fonction;

    /**
     * @var string
     *
     * @ORM\Column(name="departement", nullable=true, type="string", length=255)
     */
    private $departement;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", nullable=true, type="string", length=255)
     */
    private $telephone;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function getFullName(){
        return $this->prenom." ". $this->nom;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getDateNaissance()
    {
        return $this->date_naissance;
    }

    /**
     * @param string $date_naissance
     */
    public function setDateNaissance($date_naissance)
    {
        $this->date_naissance = $date_naissance;
    }

    /**
     * @return string
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    /**
     * @param string $fonction
     */
    public function setFonction($fonction)
    {
        $this->fonction = $fonction;
    }

    /**
     * @return string
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * @param string $departement
     */
    public function setDepartement($departement)
    {
        $this->departement = $departement;
    }

    /**
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }
}
