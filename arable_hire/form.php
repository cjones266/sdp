<?php
session_start();

?>
<!-- form with validation -->
<main class="container">
  <div class="col-md-9">
    <div class="form-container">
      <h1>Create A Listing</h1>
      <form method="post" action="upload.php" enctype="multipart/form-data">
        <!-- Captures ID of user logged in -->
        <input type="hidden" name="user_id" value="<?php echo $users_id; ?>">

        <label for="name">Machinery Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="category">Category:</label>
        <select id="category" name="category" required>
          <option value="">Select a category</option>
          <option value="Combine Harvesters">Combine Harvesters</option>
          <option value="Cultivation Equipment">Cultivation Equipment</option>
          <option value="Disc Harrows">Disc Harrows</option>
          <option value="Drills">Drills</option>
          <option value="Forage Harvesters">Forage Harvesters</option>
          <option value="Handling Attachments">Handling Attachments</option>
          <option value="Hay and Straw Equipment">Hay and Straw Equipment</option>
          <option value="Misc Machinery">Misc Machinery</option>
          <option value="Ploughs">Ploughs</option>
          <option value="Sprayers and Spreaders">Sprayers and Spreaders</option>
          <option value="Tractors">Tractors</option>
          <option value="Trailers">Trailers</option>
        </select><br><br>
        
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" placeholder="Please enter machine specification" required><br><br>
        
        <label for="county">Location:</label>
        <select id="county" name="county" required>
          <option value="">Select a county</option>
          <option value="Aberdeen">Aberdeen</option>
          <option value="Aberdeenshire">Aberdeenshire</option>
          <option value="Anglesey">Anglesey</option>
          <option value="Angus">Angus</option>
          <option value="Argyll and Bute">Argyll and Bute</option>
          <option value="Bedfordshire">Bedfordshire</option>
          <option value="Berkshire">Berkshire</option>
          <option value="Blaenau Gwent">Blaenau Gwent</option>
          <option value="Bridgend">Bridgend</option>
          <option value="Buckinghamshire">Buckinghamshire</option>
          <option value="Cambridgeshire">Cambridgeshire</option>
          <option value="Cardiff">Cardiff</option>
          <option value="Caerphilly">Caerphilly</option>
          <option value="Carmarthenshire">Carmarthenshire</option>
          <option value="Cerdigion">Cerdigion</option>
          <option value="Cheshire">Cheshire</option>
          <option value="Clackmannanshire">Clackmannanshire</option>
          <option value="Conwy">Conwy</option>
          <option value="Cornwall">Cornwall</option>
          <option value="Cumbria">Cumbria</option>
          <option value="Denbighshire">Denbighshire</option>
          <option value="Derbyshire">Derbyshire</option>
          <option value="Devon">Devon</option>
          <option value="Dorset">Dorset</option>
          <option value="Dumfries and Galloway">Dumfries and Galloway</option>
          <option value="Durham">Durham</option>
          <option value="East Ayrshire">East Ayrshire</option>
          <option value="East Dunbartonshire">East Dunbartonshire</option>
          <option value="East Lothian">East Lothian</option>
          <option value="East Riding">East Riding</option>
          <option value="East Sussex">East Sussex</option>
          <option value="East Yorkshire">East Yorkshire</option>
          <option value="Edinburgh">Edinburgh</option>
          <option value="Eilean Siar">Eilean Siar</option>
          <option value="Essex">Essex</option>
          <option value="Falkirk">Falkirk</option>
          <option value="Fife">Fife</option>
          <option value="Flintshire">Flintshire</option>
          <option value="Glasgow">Glasgow</option>
          <option value="Gloucestershire">Gloucestershire</option>
          <option value="Greater London">Greater London</option>
          <option value="Gwynedd">Gwynedd</option>
          <option value="Hampshire">Hampshire</option>
          <option value="Hertfordshire">Hertfordshire</option>
          <option value="Highland">Highland</option>
          <option value="Huntingdonshire">Huntingdonshire</option>
          <option value="Inverclyde">Inverclyde</option>
          <option value="Kent">Kent</option>
          <option value="Lancashire">Lancashire</option>
          <option value="Leicestershire">Leicestershire</option>
          <option value="Lincolnshire">Lincolnshire</option>
          <option value="Merseyside">Merseyside</option>
          <option value="Merthyr Tydfil">Merthyr Tydfil</option>
          <option value="Middlesex">Middlesex</option>
          <option value="Midlothian">Midlothian</option>
          <option value="Monmouthshire">Monmouthshire</option>
          <option value="Moray">Moray</option>
          <option value="Neath Port Talbot">Neath Port Talbot</option>
          <option value="Newport">Newport</option>
          <option value="Norfolk">Norfolk</option>
          <option value="Northamptonshire">Northamptonshire</option>
          <option value="Northumberland">Northumberland</option>
          <option value="North Ayrshire">North Ayrshire</option>
          <option value="North Lanarkshire">North Lanarkshire</option>
          <option value="Orkney Islands">Orkney Islands</option>
          <option value="Oxfordshire">Oxfordshire</option>
          <option value="Pembrokeshire">Pembrokeshire</option>
          <option value="Perth and Kinross">Perth and Kinross</option>
          <option value="Powys">Powys</option>
          <option value="Renfrewshire">Renfrewshire</option>
          <option value="Rhondda Cynon Taff">Rhondda Cynon Taff</option>
          <option value="Rutland">Rutland</option>
          <option value="Shetland Islands">Shetland Islands</option>
          <option value="Shropshire">Shropshire</option>
          <option value="Somerset">Somerset</option>
          <option value="South Ayrshire">South Ayrshire</option>
          <option value="South Lanarkshire">South Lanarkshire</option>
          <option value="South Yorkshire">South Yorkshire</option>
          <option value="Staffordshire">Staffordshire</option>
          <option value="Stirling">Stirling</option>
          <option value="Suffolk">Suffolk</option>
          <option value="Surrey">Surrey</option>
          <option value="Swansea">Swansea</option>
          <option value="The Scottish Borders">The Scottish Borders</option>
          <option value="The Vale of Glamorgan">The Vale of Glamorgan</option>
          <option value="Torfaen">Torfaen</option>
          <option value="Tyne and Wear">Tyne and Wear</option>
          <option value="Warwickshire">Warwickshire</option>
          <option value="Westmorland">Westmorland</option>
          <option value="Wiltshire">Wiltshire</option>
          <option value="Worcestershire">Worcestershire</option>
          <option value="West Dunbartonshire">West Dunbartonshire</option>
          <option value="West Lothian">West Lothian</option>
          <option value="West Sussex">West Sussex</option>
          <option value="West Yorkshire">West Yorkshire</option>
          <option value="Wrexham">Wrexham</option>
        </select><br><br>
        
        <label for="start_date">Available from:</label>
        <input type="date" name="start_date" placeholder="YYYY-MM-DD" required><br>
        <label for="end_date">Available until:</label>
        <input type="date" name="end_date" placeholder="YYYY-MM-DD" required><br>
        <br>

        <br>
        <label for="cost">Daily Cost: £</label>
        <input type="number" id="cost" name="cost" step="0.01" required><br><br>
  
        <label for="email">Contact Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="image">Upload a photo:</label>
        <input type="file" id="image" name="image"><br><br>
        
        <label for="no-image">Proceed without uploading a image?</label>
        <input type="checkbox" id="no-image" name="no-image"><br><br>
        
        <input type="submit" value="Submit">
        </form>
    </div>
</div>
</main>