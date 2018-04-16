<?php

namespace AppBundle\Entity;

use AppBundle\AppBundle;
use Doctrine\ORM\Mapping as ORM;

/**
 * Participer
 *
 * @ORM\Table(name="participer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ParticiperRepository")
 */
class Participer
{

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Organisme")
     */
    private $organisme;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Activite")
     */
    private $activite;




    /**
     * @var string
     *
     * @ORM\Column(name="fichier_rapport", type="string", length=255)
     */
    private $fichierRapport;

    /**
     * @var string
     *
     * @ORM\Column(name="date_rapport", type="string", length=255)
     */
    private $dateRapport;


    /**
     * Set fichierRapport.
     *
     * @param string $fichierRapport
     *
     * @return Participer
     */
    public function setFichierRapport($fichierRapport)
    {
        $this->fichierRapport = $fichierRapport;

        return $this;
    }

    /**
     * Get fichierRapport.
     *
     * @return string
     */
    public function getFichierRapport()
    {
        return $this->fichierRapport;
    }

    /**
     * Set dateRapport.
     *
     * @param string $dateRapport
     *
     * @return Participer
     */
    public function setDateRapport($dateRapport)
    {
        $this->dateRapport = $dateRapport;

        return $this;
    }

    /**
     * Get dateRapport.
     *
     * @return string
     */
    public function getDateRapport()
    {
        return $this->dateRapport;
    }

    /**
     * Set organisme.
     *
     * @param Organisme $organisme
     *
     * @return Participer
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

    /**
     * Set activite.
     *
     * @param Activite $activite
     *
     * @return Participer
     */
    public function setActivite(Activite $activite)
    {
        $this->activite = $activite;

        return $this;
    }

    /**
     * Get activite.
     *
     * @return Activite
     */
    public function getActivite()
    {
        return $this->activite;
    }
}
