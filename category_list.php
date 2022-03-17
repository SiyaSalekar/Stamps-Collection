<?php
    require_once('database.php');

    // Get all categories
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
?>
<!-- the head section -->
<div class="container">
<?php
include('includes/header.php');
?>
    <h1 class="add-title">Manage Stamp Categories</h1>
    <table>
        <tr>
            
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
        <tr>
        
            <td>
            <div class="form-vertical"><?php echo $category['categoryName']; ?><br><br></td>
            <td>
                <form action="delete_category.php" method="post"
                      id="delete_product_form">
                    <input class="form-control" type="hidden" name="category_id"
                           value="<?php echo $category['categoryID']; ?>">
                    <input class="btn btn-warning rounded-pill" type="submit" value="Delete">
                </form>
                </div>
            </td>
        
        </tr>
        <?php endforeach; ?>
    </table>
    <br>

    <h2>Add Category</h2>
    <form  class="form-vertical" action="add_category.php" method="post"
          id="add_category_form">

        <label>Name:</label>
        <input class="form-control" type="input" name="name">
        <input class="btn btn-warning rounded-pill" id="add_category_button" type="submit" value="Add">
    </form>
    <br>
    <p class="home-btn"><a href="index.php">Homepage</a></p>

    <?php
include('includes/footer.php');
?>