<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;


/**
 * Organisme
 *
 * @ORM\Table(name="organisme")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrganismeRepository")
 * @Vich\Uploadable
 */


class Organisme
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
     * @ORM\Column(name="sigle", type="string", length=255)
     * @Assert\NotBlank
     */
    private $sigle;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     * @Assert\NotBlank
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="date_creation", type="string", length=255)
     * @Assert\Date()
     */
    private $dateCreation;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_creation", type="string", length=255)
     * @Assert\NotBlank
     */
    private $lieuCreation;

    /**
     * @var int
     *
     * @ORM\Column(name="form_juridique", type="integer")
     */
    private $formJuridique;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_enr", type="string", length=255)
     * @Assert\NotBlank
     */
    private $numeroEnr;

    /**
     * @var string
     *
     * @ORM\Column(name="mission_org", type="text")
     * @Assert\NotBlank
     */
    private $missionOrg;

    /**
     * @var string
     *
     * @ORM\Column(name="objectif_org", type="text")
     */
    private $objectifOrg;

    /**
     * @var string
     *
     * @ORM\Column(name="date_enr", type="string", length=255)
     */
    private $dateEnr;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_enr", type="string", length=255)
     * @Assert\NotBlank
     */
    private $villeEnr;

    /**
     * @var string
     *
     * @ORM\Column(name="pays_enr", type="string", length=255)Country
     * @Assert\Country
     * @Assert\NotBlank
     */
    private $paysEnr;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_org", type="string", length=255)
     * @Assert\NotBlank
     */
    private $adresseOrg;

    /**
     * @var string
     *
     * @ORM\Column(name="type_org", type="string", length=255)
     * @Assert\NotBlank
     */
    private $typeOrg;

    /**
     * @var string
     *
     * @ORM\Column(name="annee_adh", type="string", length=255)
     */
    private $anneeAdh;

    /**
     * @var string
     *
     * @ORM\Column(name="num_adh", type="string", length=255)
     * @Assert\NotBlank
     */
    private $numAdh;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\President",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     * @Assert\Valid()
     */
    private $president;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Directeur",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     * @Assert\Valid()
     */
    private $directeur;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Domaine",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     * @Assert\Valid()
     */
    private $domaine;


    /**
     * @Vich\UploadableField(mapping="logo", fileNameProperty="logoName")
     *
     * @var File
     */
    private $logo;

    /**
     * @ORM\Column(type="string",nullable=true, length=255)
     *
     * @var string
     */
    private $logoName;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
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
     * Set sigle.
     *
     * @param string $sigle
     *
     * @return Organisme
     */
    public function setSigle($sigle)
    {
        $this->sigle = $sigle;

        return $this;
    }

    /**
     * Get sigle.
     *
     * @return string
     */
    public function getSigle()
    {
        return $this->sigle;
    }

    /**
     * Set nom.
     *
     * @param string $nom
     *
     * @return Organisme
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set dateCreation.
     *
     * @param string $dateCreation
     *
     * @return Organisme
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation.
     *
     * @return string
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set lieuCreation.
     *
     * @param string $lieuCreation
     *
     * @return Organisme
     */
    public function setLieuCreation($lieuCreation)
    {
        $this->lieuCreation = $lieuCreation;

        return $this;
    }

    /**
     * Get lieuCreation.
     *
     * @return string
     */
    public function getLieuCreation()
    {
        return $this->lieuCreation;
    }

    /**
     * Set formJuridique.
     *
     * @param int $formJuridique
     *
     * @return Organisme
     */
    public function setFormJuridique($formJuridique)
    {
        $this->formJuridique = $formJuridique;

        return $this;
    }

    /**
     * Get formJuridique.
     *
     * @return int
     */
    public function getFormJuridique()
    {
        return $this->formJuridique;
    }

    /**
     * Set numeroEnr.
     *
     * @param string $numeroEnr
     *
     * @return Organisme
     */
    public function setNumeroEnr($numeroEnr)
    {
        $this->numeroEnr = $numeroEnr;

        return $this;
    }

    /**
     * Get numeroEnr.
     *
     * @return string
     */
    public function getNumeroEnr()
    {
        return $this->numeroEnr;
    }

    /**
     * Set missionOrg.
     *
     * @param string $missionOrg
     *
     * @return Organisme
     */
    public function setMissionOrg($missionOrg)
    {
        $this->missionOrg = $missionOrg;

        return $this;
    }

    /**
     * Get missionOrg.
     *
     * @return string
     */
    public function getMissionOrg()
    {
        return $this->missionOrg;
    }

    /**
     * Set objectifOrg.
     *
     * @param string $objectifOrg
     *
     * @return Organisme
     */
    public function setObjectifOrg($objectifOrg)
    {
        $this->objectifOrg = $objectifOrg;

        return $this;
    }

    /**
     * Get objectifOrg.
     *
     * @return string
     */
    public function getObjectifOrg()
    {
        return $this->objectifOrg;
    }

    /**
     * Set dateEnr.
     *
     * @param string $dateEnr
     *
     * @return Organisme
     */
    public function setDateEnr($dateEnr)
    {
        $this->dateEnr = $dateEnr;

        return $this;
    }

    /**
     * Get dateEnr.
     *
     * @return string
     */
    public function getDateEnr()
    {
        return $this->dateEnr;
    }

    /**
     * Set villeEnr.
     *
     * @param string $villeEnr
     *
     * @return Organisme
     */
    public function setVilleEnr($villeEnr)
    {
        $this->villeEnr = $villeEnr;

        return $this;
    }

    /**
     * Get villeEnr.
     *
     * @return string
     */
    public function getVilleEnr()
    {
        return $this->villeEnr;
    }

    /**
     * Set paysEnr.
     *
     * @param string $paysEnr
     *
     * @return Organisme
     */
    public function setPaysEnr($paysEnr)
    {
        $this->paysEnr = $paysEnr;

        return $this;
    }

    /**
     * Get paysEnr.
     *
     * @return string
     */
    public function getPaysEnr()
    {
        return $this->paysEnr;
    }

    /**
     * Set adresseOrg.
     *
     * @param string $adresseOrg
     *
     * @return Organisme
     */
    public function setAdresseOrg($adresseOrg)
    {
        $this->adresseOrg = $adresseOrg;

        return $this;
    }

    /**
     * Get adresseOrg.
     *
     * @return string
     */
    public function getAdresseOrg()
    {
        return $this->adresseOrg;
    }

    /**
     * Set typeOrg.
     *
     * @param string $typeOrg
     *
     * @return Organisme
     */
    public function setTypeOrg($typeOrg)
    {
        $this->typeOrg = $typeOrg;

        return $this;
    }

    /**
     * Get typeOrg.
     *
     * @return string
     */
    public function getTypeOrg()
    {
        return $this->typeOrg;
    }

    /**
     * Set anneeAdh.
     *
     * @param string $anneeAdh
     *
     * @return Organisme
     */
    public function setAnneeAdh($anneeAdh)
    {
        $this->anneeAdh = $anneeAdh;

        return $this;
    }

    /**
     * Get anneeAdh.
     *
     * @return string
     */
    public function getAnneeAdh()
    {
        return $this->anneeAdh;
    }

    /**
     * Set numAdh.
     *
     * @param string $numAdh
     *
     * @return Organisme
     */
    public function setNumAdh($numAdh)
    {
        $this->numAdh = $numAdh;

        return $this;
    }

    /**
     * Get numAdh.
     *
     * @return string
     */
    public function getNumAdh()
    {
        return $this->numAdh;
    }

    /**
     * Set president.
     *
     * @param President $president
     *
     * @return Organisme
     */
    public function setPresident(President $president)
    {
        $this->president = $president;

        return $this;
    }

    /**
     * Get president.
     *
     * @return President
     */
    public function getPresident()
    {
        return $this->president;
    }

    /**
     * Set directeur.
     *
     * @param Directeur $directeur
     *
     * @return Organisme
     */
    public function setDirecteur(Directeur $directeur)
    {
        $this->directeur = $directeur;

        return $this;
    }

    /**
     * Get directeur.
     *
     * @return Directeur
     */
    public function getDirecteur()
    {
        return $this->directeur;
    }

    /**
     * Set domaine.
     *
     * @param Domaine $domaine
     *
     * @return Organisme
     */
    public function setDomaine(Domaine $domaine)
    {
        $this->domaine = $domaine;

        return $this;
    }

    /**
     * Get domaine.
     *
     * @return Domaine
     */
    public function getDomaine()
    {
        return $this->domaine;
    }


    public function setLogo(File $image = null)
    {
        $this->logo = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\File\File|null
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set logoName.
     *
     * @param string $logoName
     *
     * @return Organisme
     */
    public function setLogoName($logoName)
    {
        $this->logoName = $logoName;

        return $this;
    }

    /**
     * Get logoName.
     *
     * @return string
     */
    public function getLogoName()
    {
        return $this->logoName;
    }

    /**
     * Set updatedAt.
     *
     * @param \DateTime $updatedAt
     *
     * @return Organisme
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
