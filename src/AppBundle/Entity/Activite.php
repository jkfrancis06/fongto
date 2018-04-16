<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activite
 *
 * @ORM\Table(name="activite")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ActiviteRepository")
 */
class Activite
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle_act", type="string", length=255)
     */
    private $libelleAct;

    /**
     * @var string
     *
     * @ORM\Column(name="date_deb", type="string", length=255)
     */
    private $dateDeb;

    /**
     * @var string
     *
     * @ORM\Column(name="date_fin", type="string", length=255)
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="type_act", type="text")
     */
    private $typeAct;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_act", type="text")
     */
    private $lieuAct;

    /**
     * @var int
     *
     * @ORM\Column(name="mont_act", type="integer")
     */
    private $montAct;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Projet", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $projet;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelleAct.
     *
     * @param string $libelleAct
     *
     * @return Activite
     */
    public function setLibelleAct($libelleAct)
    {
        $this->libelleAct = $libelleAct;

        return $this;
    }

    /**
     * Get libelleAct.
     *
     * @return string
     */
    public function getLibelleAct()
    {
        return $this->libelleAct;
    }

    /**
     * Set dateDeb.
     *
     * @param string $dateDeb
     *
     * @return Activite
     */
    public function setDateDeb($dateDeb)
    {
        $this->dateDeb = $dateDeb;

        return $this;
    }

    /**
     * Get dateDeb.
     *
     * @return string
     */
    public function getDateDeb()
    {
        return $this->dateDeb;
    }

    /**
     * Set dateFin.
     *
     * @param string $dateFin
     *
     * @return Activite
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin.
     *
     * @return string
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set typeAct.
     *
     * @param string $typeAct
     *
     * @return Activite
     */
    public function setTypeAct($typeAct)
    {
        $this->typeAct = $typeAct;

        return $this;
    }

    /**
     * Get typeAct.
     *
     * @return string
     */
    public function getTypeAct()
    {
        return $this->typeAct;
    }

    /**
     * Set lieuAct.
     *
     * @param string $lieuAct
     *
     * @return Activite
     */
    public function setLieuAct($lieuAct)
    {
        $this->lieuAct = $lieuAct;

        return $this;
    }

    /**
     * Get lieuAct.
     *
     * @return string
     */
    public function getLieuAct()
    {
        return $this->lieuAct;
    }

    /**
     * Set montAct.
     *
     * @param int $montAct
     *
     * @return Activite
     */
    public function setMontAct($montAct)
    {
        $this->montAct = $montAct;

        return $this;
    }

    /**
     * Get montAct.
     *
     * @return int
     */
    public function getMontAct()
    {
        return $this->montAct;
    }

    /**
     * Set projet.
     *
     * @param Projet $projet
     *
     * @return Activite
     */
    public function setProjet(Projet $projet)
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * Get projet.
     *
     * @return Projet
     */
    public function getProjet()
    {
        return $this->projet;
    }
}
