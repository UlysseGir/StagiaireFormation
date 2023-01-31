<?php
namespace gestion\Models;

class Stagiaire {

    private $id_stagiaire;
    private $nom_stagiaire;
    private $prenom_stagiaire;
    private $id_formation;
    private $id_nationnalite;

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


}