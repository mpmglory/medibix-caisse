<?php

namespace PMM\LaboBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PMM\LaboBundle\Entity\FormuleLeucocytaire;
use PMM\LaboBundle\Entity\Hematologie;
use PMM\LaboBundle\Entity\PcvPu;
use PMM\LaboBundle\Entity\Serologie;

/**
 * Bulletin
 *
 * @ORM\Table(name="bulletin")
 * @ORM\Entity(repositoryClass="PMM\LaboBundle\Repository\BulletinRepository")
 */
class Bulletin
{
    
    /**
     * @ORM\ManyToOne(targetEntity="PMM\CoreBundle\Entity\Patient")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\LaboBundle\Entity\FormuleLeucocytaire", inversedBy="bulletin", cascade={"persist", "remove"})
     */
    private $formuleLeucocytaire;
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\LaboBundle\Entity\Hematologie", inversedBy="bulletin", cascade={"persist", "remove"})
     */
    private $hematologie;
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\LaboBundle\Entity\PcvPu", inversedBy="bulletin", cascade={"persist", "remove"})
     */
    private $pcvPu;
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\LaboBundle\Entity\Serologie", inversedBy="bulletin", cascade={"persist", "remove"})
     */
    private $serologie;
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float")
     */
    private $amount;
    
    
    public function __construct(){
        
        $this->date = new \Datetime();
        $this->amount = 0;
    }

    
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Bulletin
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set amount
     *
     * @param float $amount
     *
     * @return Bulletin
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set patient
     *
     * @param \PMM\CoreBundle\Entity\Patient $patient
     *
     * @return Bulletin
     */
    public function setPatient(\PMM\CoreBundle\Entity\Patient $patient)
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * Get patient
     *
     * @return \PMM\CoreBundle\Entity\Patient
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * Set formuleLeucocytaire
     *
     * @param \PMM\LaboBundle\Entity\FormuleLeucocytaire $formuleLeucocytaire
     *
     * @return Bulletin
     */
    public function setFormuleLeucocytaire(\PMM\LaboBundle\Entity\FormuleLeucocytaire $formuleLeucocytaire = null)
    {
        $this->formuleLeucocytaire = $formuleLeucocytaire;
        
        $formuleLeucocytaire->setBulletin($this);

        return $this;
    }

    /**
     * Get formuleLeucocytaire
     *
     * @return \PMM\LaboBundle\Entity\FormuleLeucocytaire
     */
    public function getFormuleLeucocytaire()
    {
        return $this->formuleLeucocytaire;
    }

    /**
     * Set hematologie
     *
     * @param \PMM\LaboBundle\Entity\Hematologie $hematologie
     *
     * @return Bulletin
     */
    public function setHematologie(\PMM\LaboBundle\Entity\Hematologie $hematologie = null)
    {
        $this->hematologie = $hematologie;
        
        $hematologie->setBulletin($this);

        return $this;
    }

    /**
     * Get hematologie
     *
     * @return \PMM\LaboBundle\Entity\Hematologie
     */
    public function getHematologie()
    {
        return $this->hematologie;
    }

    /**
     * Set pcvPu
     *
     * @param \PMM\LaboBundle\Entity\PcvPu $pcvPu
     *
     * @return Bulletin
     */
    public function setPcvPu(\PMM\LaboBundle\Entity\PcvPu $pcvPu = null)
    {
        $this->pcvPu = $pcvPu;
        
        $pcvPu->setBulletin($this);

        return $this;
    }

    /**
     * Get pcvPu
     *
     * @return \PMM\LaboBundle\Entity\PcvPu
     */
    public function getPcvPu()
    {
        return $this->pcvPu;
    }

    /**
     * Set serologie
     *
     * @param \PMM\LaboBundle\Entity\Serologie $serologie
     *
     * @return Bulletin
     */
    public function setSerologie(\PMM\LaboBundle\Entity\Serologie $serologie = null)
    {
        $this->serologie = $serologie;
            
        $serologie->setBulletin($this);

        return $this;
    }

    /**
     * Get serologie
     *
     * @return \PMM\LaboBundle\Entity\Serologie
     */
    public function getSerologie()
    {
        return $this->serologie;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Bulletin
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}