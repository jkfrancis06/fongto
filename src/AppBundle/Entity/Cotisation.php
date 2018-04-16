<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cotisation
 *
 * @ORM\Table(name="cotisation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CotisationRepository")
 */
class Cotisation
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
     * @ORM\Column(name="montant", type="string", length=255)
     */
    private $montant;

    /**
     * @var string
     *
     * @ORM\Column(name="date_cot", type="string", length=255)
     */
    private $dateCot;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Organisme")
     * @ORM\JoinColumn(nullable=false)
     */
    private $organisme;


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
     * Set montant.
     *
     * @param string $montant
     *
     * @return Cotisation
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant.
     *
     * @return string
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set dateCot.
     *
     * @param string $dateCot
     *
     * @return Cotisation
     */
    public function setDateCot($dateCot)
    {
        $this->dateCot = $dateCot;

        return $this;
    }

    /**
     * Get dateCot.
     *
     * @return string
     */
    public function getDateCot()
    {
        return $this->dateCot;
    }

    /**
     * Set organisme.
     *
     * @param Organisme $organisme
     *
     * @return Cotisation
     */
    public function setOrganisme(Organisme $organisme)
    {
        $this->organisme = $organisme;

        return $this;
    }

    /**
     * Get organisme.
     *
     * @return Organisme
     */
    public function getOrganisme()
    {
        return $this->organisme;
    }
}
