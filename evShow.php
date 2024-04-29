<?php require_once('./api/dbContext.php'); $db_handle = new DBContext(); ?>
<?php
session_start();
if(!isset($_SESSION['UserId']) || empty($_SESSION['UserId'])){
    echo '<script>location.href = \'login.php\';</script>';
}
if(isset($_GET['Id'])) {
    $Id = $_GET['Id'];
    $query = "SELECT `vehicle`.*, `brand`.`Name` as `Brand`, CASE WHEN `FrontWheelDrive`=1 AND `RearWheelDrive`=1 THEN 'ALL' WHEN `FrontWheelDrive`=1 AND `RearWheelDrive`=0 THEN 'Front' WHEN `FrontWheelDrive`=0 AND `RearWheelDrive`=1 THEN 'Rear' ELSE 'No Data' END AS `Drive` FROM `vehicle` join `brand` on `vehicle`.`BrandId` = `brand`.Id WHERE `vehicle`.Id= $Id";
    $evData = $db_handle->getFirstRow($query);
    
    $MinRange = $evData['RealRange_City_ColdWeather'];
    $MaxRange = $evData['RealRange_City_ColdWeather'];
    
    if($evData['RealRange_City_MildWeather'] < $MinRange) {
        $MinRange = $evData['RealRange_City_MildWeather'];;
    }
    if($evData['RealRange_City_MildWeather'] > $MaxRange) {
        $MaxRange = $evData['RealRange_City_MildWeather'];
    }

    if($evData['RealRange_Highway_ColdWeather'] < $MinRange) {
        $MinRange = $evData['RealRange_Highway_ColdWeather'];
    }
    if($evData['RealRange_Highway_ColdWeather'] > $MaxRange) {
        $MaxRange = $evData['RealRange_Highway_ColdWeather'];
    }

    if($evData['RealRange_Highway_MildWeather'] < $MinRange) {
        $MinRange = $evData['RealRange_Highway_MildWeather'];
    }
    if($evData['RealRange_Highway_MildWeather'] > $MaxRange) {
        $MaxRange = $evData['RealRange_Highway_MildWeather'];
    }

    if($evData['RealRange_Combined_ColdWeather'] < $MinRange) {
        $MinRange = $evData['RealRange_Combined_ColdWeather'];
    }
    if($evData['RealRange_Combined_ColdWeather'] > $MaxRange) {
        $MaxRange = $evData['RealRange_Combined_ColdWeather'];
    }

    if($evData['RealRange_Combined_MildWeather'] < $MinRange) {
        $MinRange = $evData['RealRange_Combined_MildWeather'];
    }
    if($evData['RealRange_Combined_MildWeather'] > $MaxRange) {
        $MaxRange = $evData['RealRange_Combined_MildWeather'];
    }
} else {
    echo '<script>location.href = \'evSearch.php\';</script>';
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include('include/head.php'); ?>
<body class="normalBody" onload="setActive('nav_evShow')">
    <?php include('include/navbar.php'); ?>
    <div class="mainBody">
        <div class="content" id="detail-page">
            <!-- subheader -->
            <header class="sub-header">
                <h1><?= $evData['Model']?></h1>
                <span>Available since <?= $evData['AvailableSince']?> <a href="<?= $evData['LinkToBy']?>" class="btn btn-outline-success" style="border: none;">Buy?</a></span>
            </header>
            <!-- core content -->
            <div class="core-content">
                <!-- image main -->
                <div class="img-main">
                    <img class="vehicle-image-main" src="/AutoElectrik/images/cars/<?= $evData['ImageLoc']?>">
                </div>
                <!-- icons -->
                <section class="data-table" id="icons">
                    <a href="#battery"><div class="icon"><i class="fas fa-battery-full"></i><p><?= $evData['BatteryCapacity']?> kWh<span>Useable Battery</span></p></div></a>
                    <a href="#range"><div class="icon"><i class="fas fa-road"></i><p><?= $evData['RealRange']?> km<span>Real Range</span></p></div></a>			
                    <a href="#efficiency"><div class="icon"><i class="fas fa-leaf"></i><p><?= $evData['Efficiency']?> Wh/km<span>Efficiency</span></p></div></a>
                </section>
                <section class="data-table-container" id="main-data">
                    <!-- data-table pricing -->
                    <div class="data-table has-legend" id="pricing"><div class="block"><h2>Price</h2><table><tbody><tr><td><span class="flag-icon flag-icon-gb"></span> United Kingdom</td><td>£<?= $evData['Price']?></td></tr></tbody></table></div></div>
                    <div class="data-table-legend">Prices shown are recommended retail prices for the specified countries and do not include any indirect incentives. Pricing and included options can differ by region and do not include any indirect incentives. Dates shown are order dates. Click on a country for more details.</div>
                    <!-- data-table realrange -->
                    <div class="data-table has-legend" id="range">
                        <h2>Real Range<span>between <?= $MinRange?> - <?= $MaxRange?> km</span></h2>
                        <div class="inline-block"><table><tbody><tr><td>City - Cold Weather</td><td><?= $evData['RealRange_City_ColdWeather']?> km</td></tr><tr><td>Highway - Cold Weather</td><td><?= $evData['RealRange_Highway_ColdWeather']?> km</td></tr><tr><td>Combined - Cold Weather</td><td><?= $evData['RealRange_Combined_ColdWeather']?> km</td></tr></tbody></table></div>
                        <div class="inline-block"><table><tbody><tr><td>City - Mild Weather</td><td><?= $evData['RealRange_City_MildWeather']?> km</td></tr><tr><td>Highway - Mild Weather</td><td><?= $evData['RealRange_Highway_MildWeather']?> km</td></tr><tr><td>Combined - Mild Weather</td><td><?= $evData['RealRange_Combined_MildWeather']?> km</td></tr></tbody></table></div>
                    </div>
                    <div class="data-table-legend">Indication of real-world range in several situations. Cold weather: 'worst-case' based on -10°C and use of heating. Mild weather: 'best-case' based on 23°C and no use of A/C. For 'Highway' figures a constant speed of 110 km/h is assumed. The actual range will depend on speed, style of driving, weather and route conditions.</div>
                    <!-- data-table performance -->
                    <div class="data-table" id="performance">
                        <h2>Performance</h2>
                        <div class="inline-block"><table><tbody><tr><td>Acceleration 0 - 100 km/h</td><td><?= $evData['ZeroToHundred']?> sec</td></tr><tr><td>Top Speed</td><td><?= $evData['TopSpeed']?> km/h</td></tr><tr><td>Electric Range</td><td><?= $evData['RealRange']?> km</td></tr></tbody></table></div>
                        <div class="inline-block"><table><tbody><tr><td>Total Power</td><td><?= $evData['TotalPower']?>kW (<?= $evData['TotalPower']*1.36?> PS)</td></tr><tr><td>Total Torque</td><td><?= $evData['TotalTorque']?> Nm</td></tr><tr><td>Drive</td><td><?= $evData['Drive'] ?></td></tr></tbody></table></div></div>
                    <!-- data-table battery  -->
                    <div class="data-table" id="battery">
                        <h2>Battery</h2>
                        <div class="inline-block"><table><tbody><tr><td>Nominal Capacity</td><td><?= $evData['Battery_NominalCapacity'] ?> kWh</td></tr><tr><td>Battery Type</td><td><?= $evData['Battery_Type'] ?></td></tr><tr><td>Number of Cells</td><td><?= $evData['Battery_NumberofCells'] ?></td></tr><tr><td>Architecture</td><td><?= $evData['Battery_Architecture'] ?> V</td></tr><tr><td>Warranty Period</td><td><?= $evData['Battery_WarrantyPeriod'] ?></td></tr><tr><td>Warranty Mileage</td><td><?= $evData['Battery_WarrantyMileage'] ?></td></tr></tbody></table></div>
                        <div class="inline-block"><table><tbody><tr><td>Useable Capacity</td><td><?= $evData['BatteryCapacity'] ?> kWh</td></tr><tr><td>Cathode Material</td><td><?= $evData['Battery_CathodeMaterial'] ?></td></tr><tr><td>Pack Configuration</td><td><?= $evData['Battery_PackConfiguration'] ?></td></tr><tr><td>Nominal Voltage</td><td><?= $evData['Battery_NominalVoltage'] ?> V</td></tr><tr><td>Form Factor</td><td><?= $evData['Battery_FormFactor'] ?></td></tr><tr><td>Name / Reference</td><td><?= $evData['Battery_NameReference'] ?></td></tr></tbody></table></div>
                    </div>
                    <!-- data-table charging -->
                    <div class="data-table has-legend" id="charging">
                        <h2>Charging</h2>
                        <h3>Home / Destination</h3>
                        <div class="inline-block"><table><tbody><tr><td>Charge Port</td><td><?= $evData['Charging_Home_Port']?></td></tr><tr><td>Charge Power</td><td><?= $evData['Charging_Home_Power']?></td></tr></tbody></table></div>
                        <div class="inline-block"><table><tbody><tr><td>Charge Time (0-><?= $evData['RealRange']?> km)</td><td><?= $evData['Charging_Home_Time']?></td></tr><tr><td>Charge Speed</td><td><?= $evData['Charging_Home_Speed']?> km/h</td></tr></tbody></table></div>
                        <h3>Fast Charging</h3>
                        <div class="inline-block"><table><tbody><tr><td>Fastcharge Port</td><td><?= $evData['Charging_Fast_Port']?></td></tr><tr><td>Fastcharge Power</td><td><?= $evData['Charging_Fast_Power']?></td></tr></tbody></table></div>
                        <div class="inline-block"><table><tbody><tr><td>Fastcharge Time (<?= $evData['RealRange']*0.1?>-><?= $evData['RealRange']*0.8?> km)</td><td><?= $evData['Charging_Fast_Time']?></td></tr><tr><td>Fastcharge Speed</td><td><?= $evData['Charging_Fast_Speed']?> km/h</td></tr></tbody></table></div>
                    </div>
                    <!-- data-table v2x -->
                    <div class="data-table" id="v2x">
                        <h2>Bidirectional Charging (V2X / BPT)</h2>
                        <div class="block"><table><tbody><tr><td>V2L Supported</td><td><?php if($evData['V2L']) echo 'Yes'; else echo 'No';?></td></tr><tr><td>V2H Supported</td><td><?php if($evData['V2H']) echo 'Yes'; else echo 'No';?></td></tr><tr><td>V2G Supported</td><td><?php if($evData['V2G']) echo 'Yes'; else echo 'No';?></td></tr></tbody></table></div>
                    </div>
                    <!-- data-table misc -->
                    <div class="data-table">
                        <h2>Miscellaneous</h2>
                        <div class="inline-block"><table><tbody><tr><td>Seats </td><td><?= $evData['Seats']?> people</td></tr><tr><td>Roof Rails</td><td><?php if($evData['RoofRails']) echo 'Yes'; else echo 'No';?></td></tr></tbody></table></div>
                        <div class="inline-block"><table><tbody><tr><td>Car Body</td><td><?= $evData['Body']?></td></tr><tr><td>Heat pump (HP)</td><td><?php if($evData['HeatPump']) echo 'Yes'; else echo 'No';?></td></tr></tbody></table></div></div>
                </section>
                <!-- section similar -->
                <!-- section charging -->
                <section class="data-table-container charge-table" id="charge-table">
                    <h2>Home and Destination Charging (0 -> 100%)</h2>
                    <div class="info-box ">
                        <p>Charging is possible by using a regular wall plug or a charging station. Public charging is always done through a charging station. How fast the EV can charge depends on the charging station (EVSE) used and the maximum charging capacity of the EV. The table below shows all possible options for charging the BYD ATTO 3. Each option shows how fast the battery can be charged from empty to full.</p>
                        <h3>Europe</h3>
                        <p>Charging an EV in Europe differs by country. Some European countries primarily use 1-phase connections to the grid, while other countries are almost exclusively using a 3-phase connection. The table below shows all possible ways the BYD ATTO 3 can be charged, but some modes of charging might not be widely available in certain countries.</p>
                        <div>
                            <table><tbody><tr><th>Type 2 (Mennekes - IEC 62196)</th></tr><tr><td><img src="https://ev-database.org/img/informatie/Type-2-Mennekes-IEC-62196.jpg"></td></tr></tbody></table>
                            <table class="charging-table-standard">
                                <tbody>
                                    <tr><th>Charging Point</th><th>Max. <span class="mobile-break">Power</span></th><th>Power</th><th>Time</th><th>Rate</th></tr><tr><td>Wall Plug <span class="mobile-break">(2.3 kW)</span></td><td>230V /<span class="mobile-break"> 1x10A</span></td><td>2.3 kW</td><td>31 hours</td><td>11 km/h</td></tr>
                                    <tr><td>1-phase 16A <span class="mobile-break">(3.7 kW)</span></td><td>230V /<span class="mobile-break"> 1x16A</span></td><td>3.7 kW</td><td>19h15m</td><td>17 km/h</td></tr><tr><td>1-phase 32A <span class="mobile-break">(7.4 kW)</span></td><td>230V /<span class="mobile-break"> 1x32A</span></td><td>7.4 kW</td><td>9h45m</td><td>34 km/h</td></tr>
                                    <tr><td>3-phase 16A <span class="mobile-break">(11 kW)</span></td><td>400V /<span class="mobile-break"> 3x16A</span></td><td>11 kW</td><td>6h30m</td><td>51 km/h</td></tr>
                                    <tr><td>3-phase 32A <span class="mobile-break">(22 kW)</span></td><td>400V /<span class="mobile-break"> 3x16A</span></td><td>11 kW †</td><td>6h30m</td><td>51 km/h</td></tr>
                                </tbody>
                            </table>
                        </div>
                        <p class="f-12">† = Limited by on-board charger, vehicle cannot charge faster.</p>
                    </div>
                    <h2>Fast Charging (10 -&gt; 80%)</h2>
                    <div class="info-box">
                        <p>Rapid charging enables longer journeys by adding as much range as possible in the shortest amount of time. Charging power will decrease significantly after 80% state-of-charge has been reached. A typical rapid charge therefore rarely exceeds 80% SoC. The rapid charge rate of an EV depends on the charger used and the maximum charging power the EV can handle. The table below shows all details for rapid charging the BYD ATTO 3.</p><ul><li>Max. Power: maximum power provided by charge point</li><li>Avg. Power: average power provided by charge point over a session from 10% to 80%</li><li>Time: time needed to charge from 10% to 80%</li><li>Rate: average charging speed over a session from 10% to 80%</li></ul>
                        <h3>Europe</h3>
                        <div>
                            <table><tbody><tr><th>Combined Charging System (CCS Combo 2)</th></tr><tr><td><img src="https://ev-database.org/img/informatie/Combined-Charging-System-CCS-Combo-2.jpg"></td></tr></tbody></table>
                            <table class="charging-table-fast"><tbody><tr><th>Charging Point</th><th>Max. <span class="mobile-break">Power</span></th><th>Avg. <span class="mobile-break">Power</span></th><th>Time</th><th>Rate</th></tr><tr><td>CCS <span class="mobile-break">(50 kW DC)</span></td><td>50 kW</td><td>50 kW</td><td>53 min</td><td>260 km/h</td></tr><tr><td>CCS <span class="mobile-break">(150 kW DC)</span></td><td>89 kW †</td><td>73 kW †</td><td>37 min</td><td>370 km/h</td></tr></tbody></table>
                            <table class="charging-table-fast autocharge"><tbody><tr><th>This vehicle supports Autocharge</th></tr><tr><th>This vehicle does not support Plug & Charge</th></tr></tbody></table>
                            <p class="f-12">† = Limited by charging capabilities of vehicle</p><p class="f-12">Autocharge: allows for automatic initiation of a charging session at supported CCS charging stations.</p><p class="f-12">Plug &amp; Charge: allows for automatic initiation of a charging session at supported CCS charging stations in accordance with ISO 15118.</p><p class="f-12">Actual charging rates may differ from data shown due to factors like outside temperature, state of the battery and driving style.</p>
                        </div>
                    </div>
                </section>
            </div>
            <!-- subfooter -->
            <footer class="sub-footer"><h1><?= $evData['Model']?></h1><span>Battery Electric Vehicle</span></footer>
        </div>
    </div>
</body>
</html>