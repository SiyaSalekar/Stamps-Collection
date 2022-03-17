<?php
require('database.php');

$country_list = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua &amp; Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia &amp; Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Canada","Cambodia","Cameroon","Cape Verde","Cayman Islands","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cruise Ship","Cuba","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kuwait","Kyrgyz Republic","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Mauritania","Mauritius","Mexico","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Namibia","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","Norway","Oman","Pakistan","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre &amp; Miquelon","Samoa","San Marino","Satellite","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","South Africa","South Korea","Spain","Sri Lanka","St Kitts &amp; Nevis","St Lucia","St Vincent","St. Lucia","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad &amp; Tobago","Tunisia","Turkey","Turkmenistan","Turks &amp; Caicos","Uganda","Ukraine","United Arab Emirates","United Kingdom","Uruguay","Uzbekistan","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];
$query = 'SELECT *
          FROM categories
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
        <h1 class="add-title">Add Stamp</h1>
        <form class="form-vertical" action="add_record.php" method="post" enctype="multipart/form-data"
              id="add_record_form">
            <input class="form-control" type="hidden" name="original_image" value="" />
            
            <input class="form-control" type="hidden" name="record_id" required
                    ?>
             <br>
            <label class="control-label">Category ID:</label>
            <input class="form-control" id="category_id" type="category_id" name="category_id" onBlur="validate();" required>
                   <div id="uid_err"></div>
            <br>

            <label class="control-label">Price:</label>
            <input class="form-control" id="price" type="input" name="price" required onBlur="validate();" >
            <div id="pr_err"></div>
            <br>

            <label class="control-label">Year:</label>
            <input class="form-control" id="year" type="input" name="year" required onBlur="validate();" placeholder = "YYYY"/>
                   <div id="yr_err"></div>
            <br>

            <label class="control-label">Name:</label>
            <input class="form-control" type="input" name="name" required >
            <br>
            

            <label class="control-label">Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br> 
            
            
            <label class="control-label">Country:</label><br>
            <select class="form-control" name="country" id="country" required>
          
            <?php foreach ($country_list as $country) : ?>
       <option value="<?php echo $country;?>"><?php echo $country;?></option>
       <?php endforeach; ?>
       </select>
       <br>
       
            <label class="control-label">Size:</label>
            <input class="form-control" id="size" type="input" onBlur="validate();" name="size" placeholder = "00 x 00"
                   >
                   <div id="sr_err"></div>
            <br>

            
            <label class="control-label">&nbsp;</label>
            <div class="subm">
            <button class="btn btn-warning rounded-pill" type="submit" name="btn-submit" id="btn-submit" disabled="disabled">Submit</button>
            </div>
            <br>
        </form>
        <p class="home-btn"><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>

</body>
<script src="validation.js"></script>