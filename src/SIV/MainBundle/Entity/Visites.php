<?php

namespace SIV\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visites
 *
 * @ORM\Table(name="visites")
 * @ORM\Entity(repositoryClass="SIV\MainBundle\Repository\VisitesRepository")
 */
class Visites
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="societe", type="string", length=255)
     */
    private $societe;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="piece", nullable=true, type="string", length=255)
     */
    private $piece;

    /**
     * @var string
     *
     * @ORM\Column(name="no_piece", nullable=true, type="string", length=255)
     */
    private $noPiece;

    /**
     * @var string
     *
     * @ORM\Column(name="nobadge", nullable=true, type="string", length=255)
     */
    private $nobadge;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="date_entree", type="text", length=255)
     */
    private $dateEntree;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_sortie", nullable=true, type="text", length=255)
     */
    private $dateSortie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_entree", type="text", length=255)
     */
    private $heureEntree;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_sortie", nullable=true, type="text", length=255)
     */
    private $heureSortie;

    /**
     * @ORM\ManyToOne(targetEntity="SIV\UsersBundle\Entity\Users", cascade={"persist", "remove"})
     */
    private $hote;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", nullable=true, type="text")
     */
    private $commentaire;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Visites
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set societe
     *
     * @param string $societe
     * @return Visites
     */
    public function setSociete($societe)
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * Get societe
     *
     * @return string
     */
    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Visites
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Visites
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nobadge
     *
     * @param string $nobadge
     * @return Visites
     */
    public function setNobadge($nobadge)
    {
        $this->nobadge = $nobadge;

        return $this;
    }

    /**
     * Get nobadge
     *
     * @return string
     */
    public function getNobadge()
    {
        return $this->nobadge;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Visites
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set dateEntree
     *
     * @param string $dateEntree
     * @return Visites
     */
    public function setDateEntree($dateEntree)
    {
        $this->dateEntree = $dateEntree;

        return $this;
    }

    /**
     * Get dateEntree
     *
     * @return string
     */
    public function getDateEntree()
    {
        return $this->dateEntree;
    }

    /**
     * Set dateSortie
     *
     * @param \DateTime $dateSortie
     * @return Visites
     */
    public function setDateSortie($dateSortie)
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    /**
     * Get dateSortie
     *
     * @return \DateTime
     */
    public function getDateSortie()
    {
        return $this->dateSortie;
    }

    /**
     * Set heureEntree
     *
     * @param \DateTime $heureEntree
     * @return Visites
     */
    public function setHeureEntree($heureEntree)
    {
        $this->heureEntree = $heureEntree;

        return $this;
    }

    /**
     * Get heureEntree
     *
     * @return \DateTime
     */
    public function getHeureEntree()
    {
        return $this->heureEntree;
    }

    /**
     * Set heurreSortie
     *
     * @param \DateTime $heureSortie
     * @return Visites
     */
    public function setHeureSortie($heureSortie)
    {
        $this->heureSortie = $heureSortie;

        return $this;
    }

    /**
     * Get heurreSortie
     *
     * @return \DateTime
     */
    public function getHeureSortie()
    {
        return $this->heureSortie;
    }

    /**
     * Set hote
     *
     * @param string $hote
     * @return Visites
     */
    public function setHote($hote)
    {
        $this->hote = $hote;

        return $this;
    }

    /**
     * Get hote
     *
     * @return string
     */
    public function getHote()
    {
        return $this->hote;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     * @return Visites
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * @return string
     */
    public function getPiece()
    {
        return $this->piece;
    }

    /**
     * @param string $piece
     */
    public function setPiece($piece)
    {
        $this->piece = $piece;
    }

    /**
     * @return string
     */
    public function getNoPiece()
    {
        return $this->noPiece;
    }

    /**
     * @param string $noPiece
     */
    public function setNoPiece($noPiece)
    {
        $this->noPiece = $noPiece;
    }


}
