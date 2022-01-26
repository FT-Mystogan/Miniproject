<div class="grid_10">
    <div class="box round first grid">
        <h2>Book List</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Number</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $key => $book) : ?>
                        <tr>
                            <td><?php echo ++$key ?></td>
                            <td><?php echo $book->name ?></td>
                            <td><?php echo $book->author ?></td>
                            <td><?php echo $book->categoryid ?></td>
                            <td><?php echo $book->description ?></td>
                            <td><?php echo $book->price ?></td>
                            <td><?php echo $book->number ?></td>
                            <td style="text-align: center;"> <a href="index.php?page=deletebook&id=<?php echo $book->bookid; ?>" class="btn btn-warning btn-sm"> Delete</a></td>
                            <td style="text-align: center;"> <a href="index.php?page=editbook&id=<?php echo $book->bookid; ?>" class="btn btn-sm">Update</a></td>
                        <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        setupLeftMenu();
        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>