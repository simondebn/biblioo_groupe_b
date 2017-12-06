<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 30/11/2017
 * Time: 15:00
 */

class empruntModelDb
{

    /**
     * MessageModelDb constructor.
     * @param $db
     */
    public function __construct($db){
        $this->db = $db;}

    /**
     * @param $id
     * @return mixed
     * retourne un objet : le message
     */
    public function getOne($id){
        $stmt = $this->db->prepare("SELECT titre,nom,prenom,promo,date_debut,retour FROM groupe_B.emprunt LEFT JOIN groupe_B.ressource ON emprunt.id_ressource = ressource.id WHERE emprunt.id = :id");
        $stmt->execute([
            'id' => $id
        ]);
        return $stmt->fetch();
    }

    /**
     * Récupère tous les emprunts
     * @return Tableau d'emprunt
     */
    public function getAll(){
        $stmt = $this->db->prepare("SELECT emprunt.id AS id,titre,nom,prenom,promo,date_debut,retour FROM groupe_B.emprunt LEFT JOIN groupe_B.ressource ON emprunt.id_ressource = ressource.id WHERE emprunt.retour = 0");
        $stmt->execute();

        $emprunt = [];
        foreach ($stmt as $m) {
            $emprunt[$m['id']] = $m;
        }

        return $emprunt;
    }

    /**
     * @param $params
     * @return mixed
     * Ajoute un objet
     */
    public function add($params){

        $stmt = $this->db->prepare("INSERT INTO emprunt (id_ressource, nom, prenom, promo) VALUES (:id_ressource, :nom, :prenom, :promo)");
        return $stmt->execute($params);
    }

    /**
     * @param $id
     * @return mixed
     * Modifie un objet
     */
    public function modify($id){
        $stmt = $this->db->prepare("UPDATE emprunt SET retour = 1 WHERE id = :id");
        return $stmt->execute([
            'id' => $id
        ]);
    }


    public function getLoan(){
        $stmt = $this->db->prepare("SELECT emprunt.id,emprunt.nom,emprunt.prenom,emprunt.promo,emprunt.date_debut,ressource.titre,type_ressource.delai FROM emprunt, ressource, type_ressource WHERE emprunt.retour = 0 AND emprunt.id_ressource = ressource.id AND type_ressource.id = ressource.id_type");
        $stmt->execute();

        $retour = [];
        foreach ($stmt as $m) {

            $retour[] = $m;
        }
        return $retour;
    }

}