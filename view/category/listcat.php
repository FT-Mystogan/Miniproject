<div class="grid_10">
    <div class="box round first grid">
        <h2>Category List</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categorys as $key => $category) : ?>
                        <tr>
                            <td><?php echo ++$key ?></td>
                            <td><?php echo $category->name ?></td>
                            <td><a href="index.php?page=editcat&id=<?php echo $category->categoryid?>">Edit</a> || <a href="index.php?page=deletecat&id=<?php echo $category->categoryid?>">Delete</a></td>
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