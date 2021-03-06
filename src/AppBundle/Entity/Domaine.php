<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Domaine
 *
 * @ORM\Table(name="domaine")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DomaineRepository")
 */
class Domaine
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
     * @ORM\Column(name="domaine_pri", type="string", length=255)
     * @Assert\NotBlank
     */
    private $domainePri;

    /**
     * @var string
     *
     * @ORM\Column(name="domaine_sec",nullable=true, type="text")
     */
    private $domaineSec;

    /**
     * @var string
     *
     * @ORM\Column(name="pref_domaine", type="string", length=255)
     * @Assert\NotBlank
     */
    private $prefDomaine;


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
     * Set domainePri.
     *
     * @param string $domainePri
     *
     * @return Domaine
     */
    public function setDomainePri($domainePri)
    {
        $this->domainePri = $domainePri;

        return $this;
    }

    /**
     * Get domainePri.
     *
     * @return string
     */
    public function getDomainePri()
    {
        return $this->domainePri;
    }

    /**
     * Set domaineSec.
     *
     * @param string $domaineSec
     *
     * @return Domaine
     */
    public function setDomaineSec($domaineSec)
    {
        $this->domaineSec = $domaineSec;

        return $this;
    }

    /**
     * Get domaineSec.
     *
     * @return string
     */
    public function getDomaineSec()
    {
        return $this->domaineSec;
    }

    /**
     * Set prefDomaine.
     *
     * @param string $prefDomaine
     *
     * @return Domaine
     */
    public function setPrefDomaine($prefDomaine)
    {
        $this->prefDomaine = $prefDomaine;

        return $this;
    }

    /**
     * Get prefDomaine.
     *
     * @return string
     */
    public function getPrefDomaine()
    {
        return $this->prefDomaine;
    }
}
