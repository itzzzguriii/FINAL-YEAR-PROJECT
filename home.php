<?php 
    require_once($_SERVER['DOCUMENT_ROOT'].'/AutoElectrik/api/dbContext.php'); 
    $db_handle = new DBContext(); 
    require_once('admin/api/brand.php');
    require_once('admin/dbCon.php');
    $brands = (new Brand($conn))->get();
    session_start();
    if(!isset($_SESSION['UserId']) || empty($_SESSION['UserId'])){
        echo '<script>location.href = \'login.php\';</script>';
    }

    $searchqry = "";
    if(!empty($_GET["BrandId"]) && $_GET["BrandId"] != 0) {
        $searchqry .= " AND vehicle.BrandId = '".$_GET["BrandId"]."' ";
    }
    if(!empty($_GET["priceRangeMin"])) {
        $searchqry .= " AND CAST(REGEXP_REPLACE(vehicle.Price, '[^0-9]', '') AS SIGNED) >= '".$_GET["priceRangeMin"]."' ";
    }
    if(!empty($_GET["priceRangeMax"])) {
        $searchqry .= " AND CAST(REGEXP_REPLACE(vehicle.Price, '[^0-9]', '') AS SIGNED) <= '".$_GET["priceRangeMax"]."' ";
    }
    if(!empty($_GET["batteryCapacity"])) {
        $searchqry .= " AND vehicle.BatteryCapacity >= '".$_GET["batteryCapacity"]."' ";
    }
    if(!empty($_GET["topSpeed"])) {
        $searchqry .= " AND vehicle.TopSpeed >= '".$_GET["topSpeed"]."' ";
    }
    if(!empty($_GET["range"])) {
        $searchqry .= " AND vehicle.RealRange >= '".$_GET["range"]."' ";
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include('include/head.php'); ?>
<style>
    .form-group{
        width: 30%;
        display: inline-block;
        margin-left: 2.5%;
    }
</style>
<body class="normalBody" onload="setActive('nav_home')">
    <?php include('include/navbar.php'); ?>
    <div class="mainBody" style="align-items: center; height: 100vh; <?php if($searchqry == "" && !isset($_GET["BrandId"])) echo " display: flex; " ?>">
        <div class="content jplist">
            <div class="jplist-panel panel-header sub-header">
                <div class="subheader-title">
                    <h1>Find Your Car</h1>
                </div>
            </div>
            <form id="carFilterForm" method="GET">
                <div class="form-group">
                    <label for="BrandId">Brand</label>
                    <select class="form-control" name="BrandId">
                        <?php $selected = isset($_GET["BrandId"]) && $_GET["BrandId"] == 0 ? 'selected' : ''; ?>
                        <option value='0' $selected>0 - All</option>
                        <?php
                        // Loop through the categories obtained from the brand manager
                        foreach ($brands as $brand) {
                            $brandId = $brand['Id'];
                            $brandName = $brand['Name']; // Use 'brandName' instead of 'name'
                            // Check if this brand is selected (for updating book)
                            $selected = isset($_GET["BrandId"]) && $_GET["BrandId"] == $brandId ? 'selected' : '';
                            echo "<option value='$brandId' $selected>$brandId - $brandName</option>";
                        }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="priceRange">Price Range (£):</label>
                    <div style="display: block;">
                        <input class="form-control" type="number" name="priceRangeMin" placeholder="Min" style="width: 49%; display:inline-flex;" value="<?= $_GET["priceRangeMin"] ?? '' ?>">
                        <input class="form-control" type="number" name="priceRangeMax" placeholder="Max" style="width: 49%; display:inline-flex;" value="<?= $_GET["priceRangeMax"] ?? '' ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="batteryCapacity">Battery Capacity (kWh):</label>
                    <input class="form-control" type="number" name="batteryCapacity" placeholder="Capacity" value="<?= $_GET["batteryCapacity"] ?? '' ?>">
                </div>
                <div class="form-group">
                    <label for="topSpeed">Top Speed (km/h):</label>
                    <input class="form-control" type="number" name="topSpeed" placeholder="Top Speed" value="<?= $_GET["topSpeed"] ?? '' ?>">
                </div> 
                <div class="form-group">
                    <label for="range">Range (km):</label>
                    <input class="form-control" type="number" name="range" placeholder="Range" value="<?= $_GET["range"] ?? '' ?>">
                </div> 
                <div class="form-group">
                    <button class="form-control btn btn-outline-success" type="submit">Find Me Car</button>
                </div> 
            </form>
            
            <?php if($searchqry != "" || isset($_GET["BrandId"])) { ?>
                <div class="list">
                    <?php
                    $ev_array = $db_handle->ExecuteForDataTable("SELECT vehicle.*, brand.Name as Brand FROM vehicle join brand on vehicle.BrandId = brand.Id WHERE 1=1 $searchqry ORDER BY Id ASC");
                    if (!empty($ev_array)) { 
                        foreach($ev_array as $key=>$value){?>
                            <div class="list-item">					
                                <!-- img -->
                                <div class="img">
                                    <a href="evShow.php?Id=<?php echo $ev_array[$key]["Id"]; ?>">
                                        <img src="/AutoElectrik/images/cars/<?php echo $ev_array[$key]["ImageLoc"]; ?>"
                                            alt="<?php echo $ev_array[$key]["Brand"]." ".$ev_array[$key]["Model"]; ?>">
                                    </a>
                                </div>
                                                
                                <!-- item-data -->
                                <div class="item-data">
                                    <div class="title-wrap">
                                        <h2><a href="evShow.php?Id=<?php echo $ev_array[$key]["Id"]; ?>" class="title"><span class="byd"><?php echo $ev_array[$key]["Brand"]; ?></span> <span class="model"><?php echo $ev_array[$key]["Model"]; ?></span></a></h2>
                                        <span class="id hidden"><?php echo $ev_array[$key]["Id"]; ?></span>
                                        <div class="subtitle">
                                            <span class="current" title="Date vehicle was available to order / is expected to become available to order.">Available since <?php echo $ev_array[$key]["AvailableSince"]; ?></span>
                                            <span class="battery"><?php echo $ev_array[$key]["BatteryCapacity"]; ?></span> kWh useable battery
                                        </div>
                                    </div>
                                    <div class="icons">
                                        <div class="icons-row-1">
                                            <span title="<?php if($ev_array[$key]["FrontWheelDrive"] == true && $ev_array[$key]["RearWheelDrive"] == true) echo "All"; else if($ev_array[$key]["FrontWheelDrive"] == true) echo "Front"; else echo "Rear"; ?> Wheel Drive">
                                            <span class="<?php if($ev_array[$key]["FrontWheelDrive"] == true) echo "fas"; else echo "far"; ?> fa-circle" style="margin-right: -3px;"></span>
                                            <span class="<?php if($ev_array[$key]["RearWheelDrive"] == true) echo "fas"; else echo "far"; ?> fa-circle"></span>
                                        </span>
                                        <span title="Number of seats" class="seats-5 fas fa-user" style="padding-left: 10px;"></span>
                                        <span title="Number of seats"><?php echo $ev_array[$key]["Seats"]; ?></span>
                                        <span class="heatpump hidden">Heatpump</span>
                                        <span title="Heat pump available" class="<?php if($ev_array[$key]["HeatPump"] == true) echo "fas"; else echo "far"; ?> fa-fan" style="padding-left: 10px;"></span>
                                        </div>
                                        <div class="icons-row-1">
                                            <span class="price_buy">
                                                <?php 
                                                if($ev_array[$key]["V2L"] == true) 
                                                    echo "<span title='Vehicle-2-Load Bi-directional charging possible'>V2L</span>"; 
                                                else 
                                                    echo "<span title='Vehicle-2-Load Bi-directional charging not possible' style='color: lightgrey;'>V2L</span>"; 
                                                
                                                if($ev_array[$key]["V2H"] == true) 
                                                    echo "<span title='Vehicle-2-Home Bi-directional charging possible'>V2H</span>"; 
                                                else 
                                                    echo "<span title='Vehicle-2-Home Bi-directional charging not possible' style='color: lightgrey;'>V2H</span>"; 
                                                
                                                if($ev_array[$key]["V2G"] == true) 
                                                    echo "<span title='Vehicle-2-Grid Bi-directional charging possible'>V2G</span>"; 
                                                else 
                                                    echo "<span title='Vehicle-2-Grid Bi-directional charging not possible' style='color: lightgrey;'>V2G</span>"; 
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="specs">
                                        <div>
                                            <span class="tag">0 - 100</span>
                                            <span class="acceleration"><?php echo $ev_array[$key]["ZeroToHundred"]; ?> sec</span>
                                        </div>
                                        <div>
                                            <span class="tag">Top Speed</span>
                                            <span class="topspeed"><?php echo $ev_array[$key]["TopSpeed"]; ?> km/h</span>
                                        </div>
                                        <div>
                                            <span class="tag">Range</span>
                                            <span class="erange_real"><?php echo $ev_array[$key]["RealRange"]; ?> km</span>
                                        </div>
                                        <div>
                                            <span class="tag">Efficiency</span>
                                            <span class="efficiency"><?php echo $ev_array[$key]["Efficiency"]; ?> Wh/km</span>
                                        </div>
                                        <div>
                                            <span class="tag">Fastcharge</span>
                                            <span class="fastcharge_speed_print"><?php echo $ev_array[$key]["Charging_Fast_Speed"]; ?> km/h</span>
                                            <span class="fastcharge_speed hidden"><?php echo $ev_array[$key]["Charging_Fast_Speed"]; ?></span>
                                        </div>
                                    </div>          
                                    <div class="pricing org">
                                        <span class="price_buy">
                                            <span class="country_uk" title="Price in the United Kingdom after incentives">£<?php echo $ev_array[$key]["Price"]; ?></span>
                                            <span class="flag-icon flag-icon-gb"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    }?>
                </div>
            <?php } ?>
            
        </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
    $(function(){
        $("select").select2({
            
        });
    });
    window.addEventListener('resize', function(event) {
        $("select").select2({
            
        });
    }, true);
    </script>
</body>
</html>