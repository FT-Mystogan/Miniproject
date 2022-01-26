<?php
class UserDB
{
    public $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function check($username, $password)
    {
        $sql  = "select * from users where tk = ? and mk = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $username);
        $statement->bindParam(2, $password);
        $statement->execute();
        $row = $statement->fetch();
        if ($row != null) {
            $user = new User($row['id'], $row['fullname'], $row['tk'], $row['mk'], $row['img']);
            return $user;
        } else
            return null;
    }
}
