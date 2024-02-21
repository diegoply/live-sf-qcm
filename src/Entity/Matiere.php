<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Matiere {

        
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type : 'integer')]
    private ?int $id = null;

    #[ORM\Column(type : 'string', length : 32)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'matiere', targetEntity: Questionnaire::class)]
    private Collection $questionnaires;

    public function __construct(){
        $this->questionnaires = new ArrayCollection();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

   
    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle($libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }


    public function getQuestionnaires()
    {
        return $this->questionnaires;
    }

    public function addQuestionnaire(Questionnaire $questionnaire): self {
        if (!$this->questionnaires->contains($questionnaire)) {
            $this->questionnaires[] = $questionnaire;
            $questionnaire->setMatiere($this);
        }
        return $this;
    }
     public function  removeQuestionnaire(Questionnaire $questionnaire): self {
        if ($this->questionnaires->removeElement($questionnaire)) {
            if ($questionnaire->getMatiere() === $this){
                $questionnaire->setMatiere(null);
            }
    }
}