<div class="grid_10">
    <div class="box round first grid">
        <h2>Detail Book</h2>
        <?php
        if ($message!="") {
            echo "<h3>$message</h3>";
        }
        ?>
        <div class="block">
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr hidden>
                        <td>
                            <label>ID</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Enter Book Name..." class="medium" name="id" value="<?php echo $book->bookid ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Enter Book Name..." class="medium" name="name" value="<?php echo $book->name ?>" />
                            <span class="form-message" style="color:#f33a58"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Author</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Enter Author..." class="medium" name="author" value="<?php echo $book->author ?>" />
                            <span class="form-message" style="color:#f33a58"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select name="category">
                                <option value="1">Select Category</option>
                                <?php foreach ($categorys as $key => $category) : ?>
                                    <option value="<?php echo $category->categoryid ?>"><?php echo $category->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Description</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Enter Description..." class="medium" name="description" value="<?php echo $book->description ?>" />
                            <span class="form-message" style="color:#f33a58"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Price</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Enter Price..." class="medium" name="price" value="<?php echo $book->price ?>" />
                            <span class="form-message" style="color:#f33a58"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Number</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Enter Price..." class="medium" name="number" value="<?php echo $book->number ?>" />
                            <span class="form-message" style="color:#f33a58"></span>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<script src="public/js/validator.js"></script>
<script>
    Validator({
        form: '#form-1',
        errorSelector: '.form-message',
        rules: [
            Validator.isRequired('#name'),
            Validator.isRequired('#author'),
            Validator.isRequired('#description'),
            Validator.isRequired('#price'),
            Validator.isRequired('#number'),
        ]
    })
</script>