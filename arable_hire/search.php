<!-- created a seperate search class so that it can be pulled in to view and view link without interfering with results -->

<div class search-bar-view>

<h4>What are you looking for?</h4>
<form action="view.php" method="get">
  <input type="text" id="search" name="search" placeholder="Search Keywords">
  <br>
  <br>

  <h5>Search by location</h5>
  <select name="county" id="county">
    <option value="">All</option>
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
</select>

<br>
<br>

<form action="view.php" method="get">
<h5>Search by availability</h5>
Start Date:<br>
<input type="date" name="start_date"><br>
End Date:<br>
<input type="date" name="end_date"><br>

<button type="submit">Go</button>
</form>


</div>

<br>

<h4>Browse by category:</h4>

<div class="category-list">
    <li><a href="view.php?category=Combine%20Harvesters">Combine Harvesters</a></li>
    <li><a href="view.php?category=Cultivation%20Equipment">Cultivation Equipment</a></li>
    <li><a href="view.php?category=Disc%20Harrows">Disc Harrows</a></li>
    <li><a href="view.php?category=Drills">Drills</a></li>
    <li><a href="view.php?category=Forage%20Harvesters">Forage Harvesters</a></li>
    <li><a href="view.php?category=Handling%20Attachments">Handling Attachments</a></li>
    <li><a href="view.php?category=Hay%20and%20Straw%20Equipment">Hay and Straw Equipment</a></li>
    <li><a href="view.php?category=Misc%20Machinery">Misc Machinery</a></li>
    <li><a href="view.php?category=Ploughs">Ploughs</a></li>
    <li><a href="view.php?category=Sprayers%20and%20Spreaders">Sprayers and Spreaders</a></li>
    <li><a href="view.php?category=Tractors">Tractors</a></li>
    <li><a href="view.php?category=Trailers">Trailers</a></li>
</div>