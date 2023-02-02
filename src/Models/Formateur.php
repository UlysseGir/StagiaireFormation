<?php
namespace gestion\Models;

class Formateur {
    
    private $nom_formateur;
    private $prenom_formateur;
    private $id_salle;
    private $id_formateur;

    public function getNom_formateur()
    {
        return $this->nom_formateur;
    }

    public function setNom_formateur($nom_formateur)
    {
        $this->nom_formateur = $nom_formateur;

        return $this;
    }

    public function getPrenom_formateur()
    {
        return $this->prenom_formateur;
    }

    public function setPrenom_formateur($prenom_formateur)
    {
        $this->prenom_formateur = $prenom_formateur;

        return $this;
    }

    public function getId_salle()
    {
        return $this->id_salle;
    }

    public function setId_salle($id_salle)
    {
        $this->id_salle = $id_salle;

        return $this;
    }

    public function getId_formateur()
    {
        return $this->id_formateur;
    }

    public function setId_formateur($id_formateur)
    {
        $this->id_formateur = $id_formateur;

        return $this;
    }
}