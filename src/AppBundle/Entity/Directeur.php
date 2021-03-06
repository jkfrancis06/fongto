<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Directeur
 *
 * @ORM\Table(name="directeur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DirecteurRepository")
 */
class Directeur
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
     * @ORM\Column(name="nom_dir", type="string", length=255)
     * @Assert\NotBlank
     */
    private $nomDir;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_dir", type="string", length=255)
     * @Assert\NotBlank
     */
    private $prenomDir;

    /**
     * @var string
     *
     * @ORM\Column(name="adr_dir", type="string", length=255)
     * @Assert\NotBlank
     */
    private $adrDir;


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
     * Set nomDir.
     *
     * @param string $nomDir
     *
     * @return Directeur
     */
    public function setNomDir($nomDir)
    {
        $this->nomDir = $nomDir;

        return $this;
    }

    /**
     * Get nomDir.
     *
     * @return string
     */
    public function getNomDir()
    {
        return $this->nomDir;
    }

    /**
     * Set prenomDir.
     *
     * @param string $prenomDir
     *
     * @return Directeur
     */
    public function setPrenomDir($prenomDir)
    {
        $this->prenomDir = $prenomDir;

        return $this;
    }

    /**
     * Get prenomDir.
     *
     * @return string
     */
    public function getPrenomDir()
    {
        return $this->prenomDir;
    }

    /**
     * Set adrDir.
     *
     * @param string $adrDir
     *
     * @return Directeur
     */
    public function setAdrDir($adrDir)
    {
        $this->adrDir = $adrDir;

        return $this;
    }

    /**
     * Get adrDir.
     *
     * @return string
     */
    public function getAdrDir()
    {
        return $this->adrDir;
    }
}
