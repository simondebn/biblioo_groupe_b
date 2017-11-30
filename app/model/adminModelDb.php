<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 30/11/2017
 * Time: 14:52
 */

class adminModelDb
{
    private $db;

    /**
     * MessageModelDb constructor.
     * @param $db
     */
    public function __construct($db){
        $this->db = $db;}



    public function getOne($id){
        $stmt = $this->db->prepare("SELECT * FROM compte WHERE id = :id");
        $stmt->execute([
            'id' => $id
        ]);
        return $stmt->fetch();
    }
}