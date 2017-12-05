<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 30/11/2017
 * Time: 15:15
 */

class ressourceModelDb
{
    private $db;

    /**
     * MessageModelDb constructor.
     * @param $db
     */
    public function __construct($db){
        $this->db = $db;}



    public function getOne($id){
        $stmt = $this->db->prepare("SELECT * FROM ressource WHERE id = :id");
        $stmt->execute([
            'id' => $id
        ]);
        return $stmt->fetch();
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM ressource");
        $stmt->execute();

        $ressource = [];
        foreach ($stmt as $r) {
            $ressource[$r['id']] = $r;
            $ressource[$r['id']]['note'] = $this->getNoteAverage($r['id']);
            $ressource[$r['id']]['disponibility'] = $this->getDisponibility($r['id']);
        }

        return $ressource;
    }

    public function getFiveMostRented() {
        $stmt = $this->db->prepare("SELECT ressource.* FROM ressource JOIN (SELECT id_ressource, COUNT(id) AS nb FROM emprunt GROUP BY id_ressource ORDER BY nb DESC LIMIT 5) AS fiveMostRented ON ressource.id = fiveMostRented.id_ressource");
        $stmt->execute();

        $ressource = [];
        foreach ($stmt as $r) {
            $ressource[$r['id']] = $r;
            $ressource[$r['id']]['note'] = $this->getNoteAverage($r['id']);
            $ressource[$r['id']]['disponibility'] = $this->getDisponibility($r['id']);
        }

        return $ressource;
    }

    public function getFiveBetterNoted() {
        $stmt = $this->db->prepare("SELECT ressource.* FROM ressource JOIN (SELECT id_ressource, avg(note) as 'average'  FROM commentaire GROUP BY id_ressource ORDER BY average DESC limit 5) AS fiveBetterNoted ON ressource.id = fiveBetterNoted.id_ressource");
        $stmt->execute();

        $ressource = [];
        foreach ($stmt as $r) {
            $ressource[$r['id']] = $r;
            $ressource[$r['id']]['note'] = $this->getNoteAverage($r['id']);
            $ressource[$r['id']]['disponibility'] = $this->getDisponibility($r['id']);
        }

        return $ressource;
    }

    public function add($ressource) {
        $stmt = $this->db->prepare("INSERT INTO `ressource` (`id_type`, `titre`, `auteur`, `date`, `couverture`, `domaine`, `link`, `description`) VALUES (:id_type, :titre, :auteur, :date, :couverture, :domaine, :link, :description)");
        return $stmt->execute($ressource);
    }

    public function modify($ressource){
        $stmt = $this->db->prepare("UPDATE ressource SET id_type = :id_type, titre = :titre, auteur = :auteur, date = :date, couverture = :couverture, domaine = :domaine, link = :link, description = :description WHERE id = :id");
        $stmt->execute($ressource);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM ressource where id = :id");
        $stmt->execute([
            'id' => $id
        ]);
        $count = $stmt->rowCount();

        if($count > 0){
            return true;
        }else{
            return false;
        }
    }

    public function getNoteAverage($id) {
        $stmt = $this->db->prepare("SELECT AVG(note) FROM commentaire WHERE id_ressource = :id");
        $stmt->execute([
            'id' => $id
        ]);
        return round($stmt->fetch()['AVG(note)'],0);
    }

    public function getAllNoteAverage() {
        $stmt = $this->db->prepare("SELECT id_ressource as 'id', avg(note) as 'average' FROM commentaire group by id_ressource");
        $stmt->execute();

        $ressource = [];
        foreach ($stmt as $r) {
            $ressource[$r['id']] = $r;
            $ressource[$r['id']]['average'] = round($ressource[$r['id']]['average'],0);
        }

        return $ressource;
    }

    public function addNote($commentaire) {
        $stmt = $this->db->prepare("INSERT INTO `commentaire` (`id_ressource`, `note`, `avis`) VALUES (:id_ressource, :note, :avis)");
        return $stmt->execute($commentaire);
    }

    public function getDisponibility($id) {
        $stmt = $this->db->prepare("SELECT * FROM emprunt WHERE id_ressource = :id AND retour = 0");
        $stmt->execute([
            'id' => $id
        ]);
        if ($stmt->rowCount()) {
            return false;
        } else {
            return true;
        }
    }

}