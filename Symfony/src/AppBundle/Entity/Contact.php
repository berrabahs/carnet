<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ContactRepository")
 */
class Contact
{
   /** @ORM\Id @ORM\ManyToOne(targetEntity="User")
      */
    private $proprietaire;
    /** @ORM\Id @ORM\ManyToOne(targetEntity="User") */
    private $contact;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAjout", type="datetime")
     */
    private $dateAjout;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateAjout
     *
     * @param \DateTime $dateAjout
     * @return Contact
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }

    /**
     * Get dateAjout
     *
     * @return \DateTime 
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
     * Set proprietaire
     *
     * @param \AppBundle\Entity\User $proprietaire
     * @return Contact
     */
    public function setProprietaire(\AppBundle\Entity\User $proprietaire)
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    /**
     * Get proprietaire
     *
     * @return \AppBundle\Entity\User 
     */
    public function getProprietaire()
    {
        return $this->proprietaire;
    }

    /**
     * Set contact
     *
     * @param \AppBundle\Entity\User $contact
     * @return Contact
     */
    public function setContact(\AppBundle\Entity\User $contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return \AppBundle\Entity\User 
     */
    public function getContact()
    {
        return $this->contact;
    }
}
