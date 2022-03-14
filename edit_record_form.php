<?php
require('database.php');

$country_list = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua &amp; Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia &amp; Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Cape Verde","Cayman Islands","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cruise Ship","Cuba","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kuwait","Kyrgyz Republic","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Mauritania","Mauritius","Mexico","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Namibia","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","Norway","Oman","Pakistan","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre &amp; Miquelon","Samoa","San Marino","Satellite","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","South Africa","South Korea","Spain","Sri Lanka","St Kitts &amp; Nevis","St Lucia","St Vincent","St. Lucia","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad &amp; Tobago","Tunisia","Turkey","Turkmenistan","Turks &amp; Caicos","Uganda","Ukraine","United Arab Emirates","United Kingdom","Uruguay","Uzbekistan","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];


$record_id = filter_input(INPUT_POST, 'record_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM records
          WHERE recordID = :record_id';
$statement = $db->prepare($query);
$statement->bindValue(':record_id', $record_id);
$statement->execute();
$records = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>
<body>
<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1>Edit Stamp Details</h1>
        <form action="edit_record.php" method="post" enctype="multipart/form-data"
              id="add_record_form">
            <input type="hidden" name="original_image" value="<?php echo $records['image']; ?>" />
            
            <input type="hidden" name="record_id" required
                   value="<?php echo $records['recordID']; ?>">
             <br>
            <label>Category ID:</label>
            <input id="category_id" type="category_id" name="category_id" onBlur="validate();" required 
                   value="<?php echo $records['categoryID']; ?>">
                   <div id="uid_err"></div>
            <br>

            <label>Name:</label>
            <input type="input" name="name" required
                   value="<?php echo $records['name']; ?>">
            <br>

            <label>Price:</label>
            <input id="price" type="input" name="price" required 
            onBlur="validate();" value="<?php echo $records['price']; ?>">
            <div id="pr_err"></div>
            <br>

            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br> 
            
            <label>Year:</label>
            <input id="year" type="input" name="year" onBlur="validate();" placeholder = "YYYY"
                   value="<?php echo $records['year']; ?>">
                   <div id="yr_err"></div>
            <br>

            <label>Country:</label><br>
            <select name="country" id="country">
            <option value="<?php echo $records['country']; ?>" selected><?php echo $records['country']; ?></option>
            <?php foreach ($country_list as $country) : ?>
       <option value="<?php echo $country;?>"><?php echo $country;?></option>
       <?php endforeach; ?>
       </select>
       <br>
       
            <label>Size:</label>
            <input id="size" type="input" onBlur="validate();" name="size" placeholder = "00 x 00"
                   value="<?php echo $records['size']; ?>">
                   <div id="sr_err"></div>
            <br>

            <?php if ($records['image'] != "") { ?>
            <p><img src="image_uploads/<?php echo $records['image']; ?>" height="150" /></p>
            <?php } ?>
            <label>&nbsp;</label>
            <button type="submit" name="btn-submit" id="btn-submit" disabled="disabled">Submit</button>
            <br>
        </form>
        <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>

</body>
<script src="validation.js"></script>
