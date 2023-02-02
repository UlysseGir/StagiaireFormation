<?php
namespace gestion\Models;

class Stagiaire {

    private $id_stagiaire;
    private $nom_stagiaire;
    private $prenom_stagiaire;
    private $id_formation;
    private $id_nationnalite;
    private $formateurs = [];
    private $libelle_nationnalite;
    private $libelle_formation;

    public function getId_stagiaire()
    {
        return $this->id_stagiaire;
    }

    public function setId_stagiaire($id_stagiaire)
    {
        $this->id_stagiaire = $id_stagiaire;
        return $this;
    }

    public function getNom_stagiaire()
    {
        return $this->nom_stagiaire;
    }

    public function setNom_stagiaire($nom_stagiaire)
    {
        $this->nom_stagiaire = $nom_stagiaire;
        return $this;
    }
 
    public function getPrenom_stagiaire()
    {
        return $this->prenom_stagiaire;
    }

    public function setPrenom_stagiaire($prenom_stagiaire)
    {
        $this->prenom_stagiaire = $prenom_stagiaire;
        return $this;
    }

    public function getId_formation()
    {
        return $this->id_formation;
    }

    public function setId_formation($id_formation)
    {
        $this->id_formation = $id_formation;
        return $this;
    }

    public function getId_nationnalite()
    {
        return $this->id_nationnalite;
    }

    public function setId_nationnalite($id_nationnalite)
    {
        $this->id_nationnalite = $id_nationnalite;
        return $this;
    }

    public function formateurs(){
        $manager = new FormateurManager();

        $this->formateurs = $manager->getFormateurStagiaire($this->getId_stagiaire());

        return $this->formateurs;
    }

    public function getLibelle_nationnalite()
    {
        return $this->libelle_nationnalite;
    }

    public function setLibelle_nationnalite($libelle_nationnalite)
    {
        $this->libelle_nationnalite = $libelle_nationnalite;

        return $this;
    }

    public function getLibelle_formation()
    {
        return $this->libelle_formation;
    }

    public function setLibelle_formation($libelle_formation)
    {
        $this->libelle_formation = $libelle_formation;

        return $this;
    }
}