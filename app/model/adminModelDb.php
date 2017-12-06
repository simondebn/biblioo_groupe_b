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

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM compte WHERE type = 1");
        $stmt->execute();

        $admins = [];
        foreach ($stmt as $a) {
            $admins[$a['id']] = $a;
        }
        return $admins;
    }

    public function add($newAdmin) {
        $request = ("INSERT INTO compte (type, login, email, password)  VALUES (1, :login, :email, :password)");
        $stmt = $this->db->prepare($request);
        return $stmt->execute($newAdmin);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM compte WHERE id = :id");
        $stmt->execute([
            'id' => $id
        ]);
        if ($this->getOne($id))
            return false;
        return true;
    }

    public function modify($modif) {
        $request = ("UPDATE compte SET type= :t, login= :login, email = :email, password = :password WHERE id = :id ");
        $stmt = $this->db->prepare($request);
        $stmt->execute($modif);
    }

    public function checkPassword($login, $password) {
        $stmt = $this->db->prepare("SELECT password FROM compte WHERE login = :login");
        $stmt->execute([
            'login' => $login,
        ]);
        $hash = $stmt->fetch()['password'];
        return $hash == sha1($password);
    }

}