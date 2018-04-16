<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet
 *
 * @ORM\Table(name="projet")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjetRepository")
 */
class Projet
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
     * @ORM\Column(name="libelle_pro", type="text")
     */
    private $libellePro;


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
     * Set libellePro.
     *
     * @param string $libellePro
     *
     * @return Projet
     */
    public function setLibellePro($libellePro)
    {
        $this->libellePro = $libellePro;

        return $this;
    }

    /**
     * Get libellePro.
     *
     * @return string
     */
    public function getLibellePro()
    {
        return $this->libellePro;
    }
}
