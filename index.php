<?php
require_once('database.php');

// Get category ID
if (!isset($category_id)) {
$category_id = filter_input(INPUT_GET, 'category_id', 
FILTER_VALIDATE_INT);
if ($category_id == NULL || $category_id == FALSE) {
$category_id = 1;
}
}

// Get name for current category
$queryCategory = "SELECT * FROM categories
WHERE categoryID = :category_id";
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$statement1->closeCursor();
$category_name = $category['categoryName'];

// Get all categories
$queryAllCategories = 'SELECT * FROM categories
ORDER BY categoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get records for selected category
$queryRecords = "SELECT * FROM records
WHERE categoryID = :category_id
ORDER BY recordID";
$statement3 = $db->prepare($queryRecords);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$records = $statement3->fetchAll();
$statement3->closeCursor();


?>

<?php
include('includes/header.php');
?>

<body>


<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Stamp It <img class="logos" src="image_uploads/log.png"></h3>
            </div>
 
            <ul class="list-unstyled components">
               
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Categories</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                    <?php foreach ($categories as $category) : ?>
<li><a href=".?category_id=<?php echo $category['categoryID']; ?>">
<?php echo $category['categoryName']; ?>
</a>
</li>
<?php endforeach; ?>
                    </ul>
                </li>
                <div class="line"></div>
            <ul class="list-unstyled CTAs">
                <li>
                <a href="category_list.php">Manage Categories</a>
                </li>
                <li>
                    <a href="index.php" class="article">Homepage</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
    
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="icon-align-justify"></i>
                    </button>
                    <div>

                    <form action="search.php" method="post">
<input class="search" type="text" name="search" placeholder="Search Stamps"><br>
</form>

             </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                            </li>
                            <li class="nav-item active">
                            <a href="add_record_form.php"> 
                            <span class="glyphicon glyphicon-plus"></span> 
                            </a>
                           
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        <h2 class="btbtn"><?php echo $category_name; ?></h2>

<?php foreach ($records as $record) : ?>
<div class="card">
<div class="img-div">
    <img class="card-img" src="image_uploads/<?php echo $record['image']; ?>"/>
</div>
<div class="card-body">
<p class="card-text h3">
<?php echo $record['name']; ?><br><br>

Since <?php echo $record['year']; ?><br>
<?php echo $record['country']; ?><br><br>
<?php echo $record['size']; ?>cm<br><br>
<span class="glyphicon glyphicon-euro"></span><?php echo $record['price']; ?><br>
</p>
<hr>
<form action="delete_record.php" method="post"
id="delete_record_form">
<input type="hidden" name="record_id"
value="<?php echo $record['recordID']; ?>">
<input type="hidden" name="category_id"
value="<?php echo $record['categoryID']; ?>">
<button type="submit" class="btn btn-light">
<span class="glyphicon glyphicon-trash"></span>
</button>
</form>
<form action="edit_record_form.php" method="post"
id="delete_record_form">
<input type="hidden" name="record_id"
value="<?php echo $record['recordID']; ?>">
<input type="hidden" name="category_id"
value="<?php echo $record['categoryID']; ?>">
<button type="submit" class="btn btn-light">
<span class="glyphicon glyphicon-pencil"></span>
</button>
</form>
</div>
</div>
<?php endforeach; ?>

</div>
</div>

      <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

<?php
include('includes/footer.php');
?>
</body>