<?php
require_once "produit.Class.php";

class ProduitsManager extends Model
{
    private $produits;

    public function __construct()
    {
        $this->produits = array();
    }

    public function addProduit($produit)
    {
        $this->produits[] = $produit;
    }

    public function getAllProduits()
    {
        return $this->produits;
    }

    public function loadAllProduits()
    {
        $req = $this->getDatabase()->prepare("SELECT * FROM produits");
        $req->execute();
        $produitsData = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($produitsData as $produitData) {
            $newProduit = new Produit(
                $produitData['id_produit'],
                $produitData['date_creation'],
                $produitData['nom_produit'],
                $produitData['description'],
                $produitData['prix_vente'],
                $produitData['image_path']
            );

            $this->addProduit($newProduit);
        }
    }

    public function getProduitById($id)
    {
        $sql = "SELECT * FROM produits WHERE id_produit = :id_produit";
        $stmt = $this->getDatabase()->prepare($sql);
        $stmt->bindValue(':id_produit', $id, PDO::PARAM_INT);
        $stmt->execute();
        $produitData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($produitData) {
            return new Produit(
                $produitData['id_produit'],
                $produitData['date_creation'],
                $produitData['nom_produit'],
                $produitData['description'],
                $produitData['prix_vente'],
                $produitData['image_path']
            );
        } else {
            return null;
        }
    }

    public function createNewProduit($nomProduit, $description, $prixVente, $imagePath = null)
    {
        $dateCreation = date('Y-m-d H:i:s');

        $sql = "INSERT INTO produits (date_creation, nom_produit, description, prix_vente, image_path) 
                VALUES (:date_creation, :nom_produit, :description, :prix_vente, :image_path)";
        $stmt = $this->getDatabase()->prepare($sql);
        $stmt->bindValue(':date_creation', $dateCreation, PDO::PARAM_STR);
        $stmt->bindValue(':nom_produit', $nomProduit, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':prix_vente', $prixVente, PDO::PARAM_STR);
        $stmt->bindValue(':image_path', $imagePath, PDO::PARAM_STR);
        $stmt->execute();

        $id = $this->getDatabase()->lastInsertId();

        $newProduit = new Produit($id, $dateCreation, $nomProduit, $description, $prixVente, $imagePath);
        $this->addProduit($newProduit);

        return $id;
    }
}
