<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Category</h2>
        <?php
        if ($message!="") {
            echo "<h3>$message</h3>";
        }
        ?>
        <div class="block copyblock">
            <form action="" method="post" id="form-1">
                <table class="form">
                    <tr>
                        <td>
                            <input type="text" placeholder="Enter Category Name..." class="medium" name="name" id="name" />
                            <span class="form-message" style="color:#f33a58"></span>
                        </td>
                    </tr>
                    <tr>
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
            Validator.isRequired('#name')
        ]
    })
</script>