<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partenaire
 *
 * @ORM\Table(name="partenaire")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PartenaireRepository")
 */
class Partenaire
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
     * @ORM\Column(name="sigle_par", type="string", length=255)
     */
    private $siglePar;


    /**
     * @var string
     *
     * @ORM\Column(name="type_par", type="string", length=255)
     */
    private $typePar;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_par", type="string", length=255)
     */
    private $nomPar;


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
     * Set siglePar.
     *
     * @param string $siglePar
     *
     * @return Partenaire
     */
    public function setSiglePar($siglePar)
    {
        $this->siglePar = $siglePar;

        return $this;
    }

    /**
     * Get siglePar.
     *
     * @return string
     */
    public function getSiglePar()
    {
        return $this->siglePar;
    }

    /**
     * Set nomPar.
     *
     * @param string $nomPar
     *
     * @return Partenaire
     */
    public function setNomPar($nomPar)
    {
        $this->nomPar = $nomPar;

        return $this;
    }

    /**
     * Get nomPar.
     *
     * @return string
     */
    public function getNomPar()
    {
        return $this->nomPar;
    }

    /**
     * Set typePar.
     *
     * @param string $typePar
     *
     * @return Partenaire
     */
    public function setTypePar($typePar)
    {
        $this->typePar = $typePar;

        return $this;
    }

    /**
     * Get typePar.
     *
     * @return string
     */
    public function getTypePar()
    {
        return $this->typePar;
    }
}
