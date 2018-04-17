<?php

namespace AppBundle\Entity;

use AppBundle\AppBundle;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Participer
 *
 * @ORM\Table(name="participer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ParticiperRepository")
 * @Vich\Uploadable
 */
class Participer
{

    /**

     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Organisme", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $organisme;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Activite", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $activite;


    /**
     * @var string
     *
     * @ORM\Column(name="date_rapport", type="string", length=255)
     */
    private $dateRapport;


    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $filename;

    /**
     * @Vich\UploadableField(mapping="rapport", fileNameProperty="filename")
     * @var File
     */
    private $file;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;


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
     * @return Participer
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
     * @return Participer
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
