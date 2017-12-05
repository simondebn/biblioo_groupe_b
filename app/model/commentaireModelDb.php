<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 05/12/2017
 * Time: 12:10
 */

class commentaireModelDb
{

    public function __construct($db){
        $this->db = $db;}

    public function getOne($id){
        $stmt = $this->db->prepare("SELECT titre,nom,note,avis FROM commentaire LEFT JOIN ressource ON commentaire.id_ressource = ressource.id WHERE commentaire.id = :id");
        $stmt->execute([
            'id' => $id
        ]);
        return $stmt->fetch();
    }

    public function getAll(){
        $stmt = $this->db->prepare("SELECT commentaire.id AS id,titre,nom,note,avis FROM commentaire LEFT JOIN ressource ON commentaire.id_ressource = ressource.id");
        $stmt->execute();

        $commentaires = [];
        foreach ($stmt as $c) {
            $commentaires[$c['id']] = $c;
        }

        return $commentaires;
    }

    public function getRessourceComments($id){
        $stmt = $this->db->prepare("SELECT c.nom,c.note,c.avis FROM commentaire AS c, ressource WHERE c.id_ressource = ressource.id AND ressource.id = :id");
        $stmt->execute([
            'id' => $id
        ]);

        $commentaires = [];
        foreach ($stmt as $c) {
            $commentaires[] = $c;
        }

        return $commentaires;
    }

    public function add($params){
        $stmt = $this->db->prepare("INSERT INTO commentaire (id_ressource, nom, note, avis) VALUES (:id_ressource, :nom, :note, :avis)");
        return $stmt->execute($params);
    }

    public function modify($id){

        $stmt = $this->db->prepare("UPDATE commentaire SET nom = :nom, avis = :avis WHERE id = :id");
        return $stmt->execute([
            'id' => $id
        ]);
    }

}