
<?php
require_once "./model/Model.php";
class CategoryDB extends Model
{
    public function create($category)
    {
        $sql = "INSERT INTO category(name) VALUES (?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $category->name);
        return $statement->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * from category ";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $categorys = [];
        foreach ($result as $row) {
            $category = new category($row['name']);
            $category->categoryid = $row['categoryid'];
            $categorys[] = $category;
        }
        return $categorys;
    }

    public function get($categoryid){
        $sql = "SELECT * from category where categoryid=?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $categoryid);
        $statement->execute();
        $row = $statement->fetch();
        $category = new category($row['name']);
        $category->categoryid = $row['categoryid'];
        return $category;
    }


    public function delete($categoryid){
        $sql = "call deleteCat(?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $categoryid);
        return $statement->execute();
    }

    public function update($categoryid, $category)
    {
        $sql = "UPDATE category SET name = ? WHERE categoryid = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $category->name);
        $statement->bindParam(2, $categoryid);
        return $statement->execute();
    }
}
