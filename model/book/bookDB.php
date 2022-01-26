<?php
require_once "./model/Model.php";
class BookDB extends Model
{
    
    public function create($book)
    {
        $sql = "call addBook(?,?,?,?,?,?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $book->name);
        $statement->bindParam(2, $book->author);
        $statement->bindParam(3, $book->categoryid);
        $statement->bindParam(4, $book->description);
        $statement->bindParam(5, $book->price);
        $statement->bindParam(6, $book->number);
        return $statement->execute();
    }

    public function getAll()
    {
        $sql = "call getAllBook()";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $books = [];
        foreach ($result as $row) {
            $book = new Book($row['name'], $row['author'], $row['category'], $row['description'], $row['price'],$row['number']);
            $book->bookid = $row['id'];
            $books[] = $book;
        }
        return $books;
    }

    public function get($id)
    {
        $sql = "call getBook(?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $book = new Book($row['name'], $row['author'], $row['category'], $row['description'], $row['price'],$row['number']);
        $book->bookid = $row['id'];
        return $book;
    }


    public function delete($id)
    {
        $sql = "DELETE FROM book WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function update($id, $book)
    {
        $sql = "UPDATE book SET name = ?, author = ?, categoryid = ?, description=?,price =?,number=? WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $book->name);
        $statement->bindParam(2, $book->author);
        $statement->bindParam(3, $book->categoryid);
        $statement->bindParam(4, $book->description);
        $statement->bindParam(5, $book->price);
        $statement->bindParam(6, $book->number);
        $statement->bindParam(7, $id);
        return $statement->execute();
    }
}
