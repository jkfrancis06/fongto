<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Activite
 *
 * @ORM\Table(name="activite")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ActiviteRepository")
 * @Vich\Uploadable
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
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $filename;

    /**
     * @Vich\UploadableField(mapping="activite", fileNameProperty="filename")
     * @var File
     */
    private $file;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;


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

    public function setFile(File $image = null)
    {
        $this->file = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set filename.
     *
     * @param string $filename
     *
     * @return Activite
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename.
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set updatedAt.
     *
     * @param \DateTime $updatedAt
     *
     * @return Activite
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
