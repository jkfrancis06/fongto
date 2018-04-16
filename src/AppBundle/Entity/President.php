<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * President
 *
 * @ORM\Table(name="president")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PresidentRepository")
 */
class President
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
     * @ORM\Column(name="nom_pre", type="string", length=255)
     * @Assert\NotBlank
     */
    private $nomPre;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_pre", type="string", length=255)
     * @Assert\NotBlank
     */
    private $prenomPre;

    /**
     * @var string
     *
     * @ORM\Column(name="adr_pre", type="string", length=255)
     * @Assert\NotBlank
     */
    private $adrPre;


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
     * Set nomPre.
     *
     * @param string $nomPre
     *
     * @return President
     */
    public function setNomPre($nomPre)
    {
        $this->nomPre = $nomPre;

        return $this;
    }

    /**
     * Get nomPre.
     *
     * @return string
     */
    public function getNomPre()
    {
        return $this->nomPre;
    }

    /**
     * Set prenomPre.
     *
     * @param string $prenomPre
     *
     * @return President
     */
    public function setPrenomPre($prenomPre)
    {
        $this->prenomPre = $prenomPre;

        return $this;
    }

    /**
     * Get prenomPre.
     *
     * @return string
     */
    public function getPrenomPre()
    {
        return $this->prenomPre;
    }

    /**
     * Set adrPre.
     *
     * @param string $adrPre
     *
     * @return President
     */
    public function setAdrPre($adrPre)
    {
        $this->adrPre = $adrPre;

        return $this;
    }

    /**
     * Get adrPre.
     *
     * @return string
     */
    public function getAdrPre()
    {
        return $this->adrPre;
    }
}
