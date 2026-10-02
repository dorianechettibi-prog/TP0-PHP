<?php

require_once 'connexion.php';

class DialogueBD
{
    public function getTousLesLivres()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM Livres ORDER BY id";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabLivres = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabLivres;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getUnEmprunteurs($idEmprunteurs)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM Emprunteurs WHERE id=?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($idEmprunteurs));
            $Emprunteurs = $sth->fetchObject();
            return $Emprunteurs;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getProduitsFournisseur($idFournisseur)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM produits WHERE fournisseur_id=?";
            $sql = $sql . " ORDER BY nom_produit";
            $sth = $conn->prepare($sql);
            $sth->execute(array($idFournisseur));
            $tabProduits = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabProduits;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
}