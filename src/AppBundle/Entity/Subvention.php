<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subvention
 *
 * @ORM\Table(name="subvention")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SubventionRepository")
 */
class Subvention
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
     * @ORM\Column(name="libelle_sub", type="text")
     */
    private $libelleSub;

    /**
     * @var string
     *
     * @ORM\Column(name="type_sub", type="text")
     */
    private $typeSub;

    /**
     * @var string
     *
     * @ORM\Column(name="date_sub", type="string", length=255)
     */
    private $dateSub;

    /**
     * @var string
     *
     * @ORM\Column(name="estimation", type="string", length=255)
     */
    private $estimation;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Partenaire")
     * @ORM\JoinColumn(nullable=false)
     */
    private $partenaire;


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
     * Set libelleSub.
     *
     * @param string $libelleSub
     *
     * @return Subvention
     */
    public function setLibelleSub($libelleSub)
    {
        $this->libelleSub = $libelleSub;

        return $this;
    }

    /**
     * Get libelleSub.
     *
     * @return string
     */
    public function getLibelleSub()
    {
        return $this->libelleSub;
    }

    /**
     * Set typeSub.
     *
     * @param string $typeSub
     *
     * @return Subvention
     */
    public function setTypeSub($typeSub)
    {
        $this->typeSub = $typeSub;

        return $this;
    }

    /**
     * Get typeSub.
     *
     * @return string
     */
    public function getTypeSub()
    {
        return $this->typeSub;
    }

    /**
     * Set dateSub.
     *
     * @param string $dateSub
     *
     * @return Subvention
     */
    public function setDateSub($dateSub)
    {
        $this->dateSub = $dateSub;

        return $this;
    }

    /**
     * Get dateSub.
     *
     * @return string
     */
    public function getDateSub()
    {
        return $this->dateSub;
    }

    /**
     * Set estimation.
     *
     * @param string $estimation
     *
     * @return Subvention
     */
    public function setEstimation($estimation)
    {
        $this->estimation = $estimation;

        return $this;
    }

    /**
     * Get estimation.
     *
     * @return string
     */
    public function getEstimation()
    {
        return $this->estimation;
    }

    /**
     * Set partenaire.
     *
     * @param Partenaire $partenaire
     *
     * @return Subvention
     */
    public function setPartenaire(Partenaire $partenaire)
    {
        $this->partenaire = $partenaire;

        return $this;
    }

    /**
     * Get partenaire.
     *
     * @return Partenaire
     */
    public function getPartenaire()
    {
        return $this->partenaire;
    }
}