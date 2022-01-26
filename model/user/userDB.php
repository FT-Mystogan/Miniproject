<?php
require_once "./model/Model.php";
class UserDB extends Model
{

    public function check($username, $password)
    {
        $sql  = "select * from users where tk = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $username);
        $statement->execute();
        $row = $statement->fetch();
        if ($row != null && password_verify($password, $row['mk']) ) {
            $user = new User($row['id'], $row['fullname'], $row['tk'], $row['mk'], $row['img']);
            return $user;
        } else
            return null;
    }
    public function creat($username, $password)
    {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users(tk,mk) VALUES (?,?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $username);
        $statement->bindParam(2, $password);
        return $statement->execute();
    }
}
