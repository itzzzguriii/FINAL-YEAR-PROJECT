<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/AutoElectrik/api/dbContext.php'); 
    session_start();
    if(!isset($_SESSION['UserId']) || empty($_SESSION['UserId'])){
        echo '<script>location.href = \'login.php\';</script>';
    }
    $db_handle = new DBContext(); 
    $ev_array = $db_handle->ExecuteForDataTable("SELECT vehicle.*, brand.Name as Brand FROM vehicle join brand on vehicle.BrandId = brand.Id ORDER BY Id ASC");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include('include/head.php'); ?>
<body class="normalBody" onload="setActive('nav_evCompare')">
    <?php include('include/navbar.php'); ?>
    <div class="mainBody">
        <div class="content jplist">
            <div class="jplist-panel panel-header sub-header">
                <div class="subheader-title">
                    <h1>Comparison</h1>
                </div>
            </div>
            <datalist id="EVs">
                <?php
                if (!empty($ev_array)) { 
                    foreach($ev_array as $key=>$value){?>
                        <option><?= $ev_array[$key]["Id"]."-".$ev_array[$key]["Brand"]." ".$ev_array[$key]["Model"] ?></option>
                    <?php }
                }?>
            </datalist>
            
            <form method="POST">
                <div style="display:block; margin: 10px; text-align: center;">
                    <div class="divCompare">
                        <span>
                            <label>Enter Vehicle Model</label>
                        </span>
                        <span>
                        <select class="form-control" id="ev1" name="ev1">
                            <?php
                            if (!empty($ev_array)) { 
                                foreach($ev_array as $key=>$value){
                                    $selected = "";
                                    if(isset($_POST['ev1']) && $_POST['ev1'] == $ev_array[$key]["Id"]) {
                                        $selected = "selected";
                                    }?>
                                    <option value="<?= $ev_array[$key]["Id"] ?>" <?= $selected ?>><?= $ev_array[$key]["Brand"]." ".$ev_array[$key]["Model"] ?></option>
                                <?php }
                            }?>
                        </select>
                        </span>
                    </div>
                    <div style="display:inline-block; width: 5%; text-align:center;">
                        <span>
                            <label>Vs</label>
                        </span>
                    </div>
                    <div class="divCompare">
                        <span>
                            <label>Enter Vehicle Model</label>
                        </span>
                        <span>
                        <select class="form-control" id="ev2" name="ev2">
                            <?php
                            if (!empty($ev_array)) { 
                                foreach($ev_array as $key=>$value){
                                    $selected = "";
                                    if(isset($_POST['ev2']) && $_POST['ev2'] == $ev_array[$key]["Id"]) {
                                        $selected = "selected";
                                    }?>
                                    <option value="<?= $ev_array[$key]["Id"] ?>" <?= $selected ?>><?= $ev_array[$key]["Brand"]." ".$ev_array[$key]["Model"] ?></option>
                                <?php }
                            }?>
                        </select>
                        </span>
                    </div>
                    <div style="display:inline-block;">
                        <input class="btn btn-primary" type="submit" value="Compare" name="btnSubmit" id="btnSubmit">
                    </div>
                </div>
            </form>
            <?php 
            if(isset($_POST['ev1']) && isset($_POST['ev2'])){
                $ev1Id = $_POST['ev1'];#explode("-",$_POST['txtev1'])[0];
                $ev2Id = $_POST['ev2'];#explode("-",$_POST['txtev2'])[0];
                $query = "SELECT `vehicle`.*, `brand`.`Name` as `Brand`, CASE WHEN `FrontWheelDrive`=1 AND `RearWheelDrive`=1 THEN 'ALL' WHEN `FrontWheelDrive`=1 AND `RearWheelDrive`=0 THEN 'Front' WHEN `FrontWheelDrive`=0 AND `RearWheelDrive`=1 THEN 'Rear' ELSE 'No Data' END AS `Drive` FROM `vehicle` join `brand` on `vehicle`.`BrandId` = `brand`.Id WHERE `vehicle`.Id= $ev1Id";
                $ev1Data = $db_handle->ExecuteForDataTable($query);
                $query = "SELECT `vehicle`.*, `brand`.`Name` as `Brand`, CASE WHEN `FrontWheelDrive`=1 AND `RearWheelDrive`=1 THEN 'ALL' WHEN `FrontWheelDrive`=1 AND `RearWheelDrive`=0 THEN 'Front' WHEN `FrontWheelDrive`=0 AND `RearWheelDrive`=1 THEN 'Rear' ELSE 'No Data' END AS `Drive` FROM `vehicle` join `brand` on `vehicle`.`BrandId` = `brand`.Id WHERE `vehicle`.Id= $ev2Id";
                $ev2Data = $db_handle->ExecuteForDataTable($query);
                if (!empty($ev1Data) && !empty($ev2Data)) {
                    $ev1Data = $ev1Data[0];
                    $ev2Data = $ev2Data[0];
                    ?>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-bordered"> <!-- table-striped -->

                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" class="tblRowData"><?= $ev1Data['Brand']." ".$ev1Data['Model']; ?></th>
                                    <th scope="col" class="tblRowData"><?= $ev2Data['Brand']." ".$ev2Data['Model']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="tblRowHead"></td>
                                    <td class="tblRowData"><img class="vehicle-image-main" src="images/cars/<?= $ev1Data['ImageLoc'];?>"></td>
                                    <td class="tblRowData"><img class="vehicle-image-main" src="images/cars/<?= $ev2Data['ImageLoc'];?>"></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead"></td>
                                    <td class="tblRowData"><a href="<?= $ev1Data['LinkToBy']?>" class="btn btn-outline-success btn-fill-width" style="border: none;">Buy?</a></td>
                                    <td class="tblRowData"><a href="<?= $ev2Data['LinkToBy']?>" class="btn btn-outline-success btn-fill-width" style="border: none;">Buy?</a></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Price</td>
                                    <td class="tblRowData <?php if(preg_replace('/[^0-9]/', '', $ev1Data['Price']) < preg_replace('/[^0-9]/', '', $ev2Data['Price'])) echo "win"; ?>">£ <?= $ev1Data['Price']?></td>
                                    <td class="tblRowData <?php if(preg_replace('/[^0-9]/', '', $ev2Data['Price']) < preg_replace('/[^0-9]/', '', $ev1Data['Price'])) echo "win"; ?>">£ <?= $ev2Data['Price']?></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Available Since</td>
                                    <td class="tblRowData"><?= $ev1Data['AvailableSince']?></td>
                                    <td class="tblRowData"><?= $ev2Data['AvailableSince']?></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">0 - 100</td>
                                    <td class="tblRowData <?php if($ev1Data['ZeroToHundred'] < $ev2Data['ZeroToHundred']) echo "win"; ?>"><?= $ev1Data['ZeroToHundred']?> sec</td>
                                    <td class="tblRowData <?php if($ev2Data['ZeroToHundred'] < $ev1Data['ZeroToHundred']) echo "win"; ?>"><?= $ev2Data['ZeroToHundred']?> sec</td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Efficiency</td>
                                    <td class="tblRowData <?php if($ev1Data['Efficiency'] < $ev2Data['Efficiency']) echo "win"; ?>"><?= $ev1Data['Efficiency']?> Wh/km</td>
                                    <td class="tblRowData <?php if($ev2Data['Efficiency'] < $ev1Data['Efficiency']) echo "win"; ?>"><?= $ev2Data['Efficiency']?> Wh/km</td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Real Range</td>
                                    <td class="tblRowData <?php if($ev1Data['RealRange'] > $ev2Data['RealRange']) echo "win"; ?>"><?= $ev1Data['RealRange']?> km</td>
                                    <td class="tblRowData <?php if($ev2Data['RealRange'] > $ev1Data['RealRange']) echo "win"; ?>"><?= $ev2Data['RealRange']?> km</td>
                                </tr>
                                
                                <tr>
                                    <td class="tblRowHead">Range City ColdWeather</td>
                                    <td class="tblRowData <?php if($ev1Data['RealRange_City_ColdWeather'] > $ev2Data['RealRange_City_ColdWeather']) echo "win"; ?>"><?= $ev1Data['RealRange_City_ColdWeather']?> km</td>
                                    <td class="tblRowData <?php if($ev2Data['RealRange_City_ColdWeather'] > $ev1Data['RealRange_City_ColdWeather']) echo "win"; ?>"><?= $ev2Data['RealRange_City_ColdWeather']?> km</td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Range City MildWeather</td>
                                    <td class="tblRowData <?php if($ev1Data['RealRange_City_MildWeather'] > $ev2Data['RealRange_City_MildWeather']) echo "win"; ?>"><?= $ev1Data['RealRange_City_MildWeather']?> km</td>
                                    <td class="tblRowData <?php if($ev2Data['RealRange_City_MildWeather'] > $ev1Data['RealRange_City_MildWeather']) echo "win"; ?>"><?= $ev2Data['RealRange_City_MildWeather']?> km</td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Range Highway ColdWeather</td>
                                    <td class="tblRowData <?php if($ev1Data['RealRange_Highway_ColdWeather'] > $ev2Data['RealRange_Highway_ColdWeather']) echo "win"; ?>"><?= $ev1Data['RealRange_Highway_ColdWeather']?> km</td>
                                    <td class="tblRowData <?php if($ev2Data['RealRange_Highway_ColdWeather'] > $ev1Data['RealRange_Highway_ColdWeather']) echo "win"; ?>"><?= $ev2Data['RealRange_Highway_ColdWeather']?> km</td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Range Highway MildWeather</td>
                                    <td class="tblRowData <?php if($ev1Data['RealRange_Highway_MildWeather'] > $ev2Data['RealRange_Highway_MildWeather']) echo "win"; ?>"><?= $ev1Data['RealRange_Highway_MildWeather']?> km</td>
                                    <td class="tblRowData <?php if($ev2Data['RealRange_Highway_MildWeather'] > $ev1Data['RealRange_Highway_MildWeather']) echo "win"; ?>"><?= $ev2Data['RealRange_Highway_MildWeather']?> km</td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Range Combined ColdWeather</td>
                                    <td class="tblRowData <?php if($ev1Data['RealRange_Combined_ColdWeather'] > $ev2Data['RealRange_Combined_ColdWeather']) echo "win"; ?>"><?= $ev1Data['RealRange_Combined_ColdWeather']?> km</td>
                                    <td class="tblRowData <?php if($ev2Data['RealRange_Combined_ColdWeather'] > $ev1Data['RealRange_Combined_ColdWeather']) echo "win"; ?>"><?= $ev2Data['RealRange_Combined_ColdWeather']?> km</td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Range Combined MildWeather</td>
                                    <td class="tblRowData <?php if($ev1Data['RealRange_Combined_MildWeather'] > $ev2Data['RealRange_Combined_MildWeather']) echo "win"; ?>"><?= $ev1Data['RealRange_Combined_MildWeather']?> km</td>
                                    <td class="tblRowData <?php if($ev2Data['RealRange_Combined_MildWeather'] > $ev1Data['RealRange_Combined_MildWeather']) echo "win"; ?>"><?= $ev2Data['RealRange_Combined_MildWeather']?> km</td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Top Speed</td>
                                    <td class="tblRowData <?php if($ev1Data['TopSpeed'] > $ev2Data['TopSpeed']) echo "win"; ?>"><?= $ev1Data['TopSpeed']?> km/h</td>
                                    <td class="tblRowData <?php if($ev2Data['TopSpeed'] > $ev1Data['TopSpeed']) echo "win"; ?>"><?= $ev2Data['TopSpeed']?> km/h</td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Total Power</td>
                                    <td class="tblRowData <?php if($ev1Data['TotalPower'] > $ev2Data['TotalPower']) echo "win"; ?>"><?= $ev1Data['TotalPower']?> kW (<?= $ev1Data['TotalPower']*1.36?> PS)</td>
                                    <td class="tblRowData <?php if($ev2Data['TotalPower'] > $ev1Data['TotalPower']) echo "win"; ?>"><?= $ev2Data['TotalPower']?> kW (<?= $ev2Data['TotalPower']*1.36?> PS)</td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Total Torque</td>
                                    <td class="tblRowData <?php if($ev1Data['TotalTorque'] > $ev2Data['TotalTorque']) echo "win"; ?>"><?= $ev1Data['TotalTorque']?></td>
                                    <td class="tblRowData <?php if($ev2Data['TotalTorque'] > $ev1Data['TotalTorque']) echo "win"; ?>"><?= $ev2Data['TotalTorque']?></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Battery Nominal Capacity</td>
                                    <td class="tblRowData <?php if($ev1Data['Battery_NominalCapacity'] > $ev2Data['Battery_NominalCapacity']) echo "win"; ?>"><?= $ev1Data['Battery_NominalCapacity']?> kWh</td>
                                    <td class="tblRowData <?php if($ev2Data['Battery_NominalCapacity'] > $ev1Data['Battery_NominalCapacity']) echo "win"; ?>"><?= $ev2Data['Battery_NominalCapacity']?> kWh</td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Battery Useable Capacity</td>
                                    <td class="tblRowData <?php if($ev1Data['BatteryCapacity'] > $ev2Data['BatteryCapacity']) echo "win"; ?>"><?= $ev1Data['BatteryCapacity']?> kWh</td>
                                    <td class="tblRowData <?php if($ev2Data['BatteryCapacity'] > $ev1Data['BatteryCapacity']) echo "win"; ?>"><?= $ev2Data['BatteryCapacity']?> kWh</td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Battery Type</td>
                                    <td class="tblRowData"><?= $ev1Data['Battery_Type']?></td>
                                    <td class="tblRowData"><?= $ev2Data['Battery_Type']?></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Battery Cathode Material</td>
                                    <td class="tblRowData"><?= $ev1Data['Battery_CathodeMaterial']?></td>
                                    <td class="tblRowData"><?= $ev2Data['Battery_CathodeMaterial']?></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Battery NumberofCells</td>
                                    <td class="tblRowData"><?= $ev1Data['Battery_NumberofCells']?></td>
                                    <td class="tblRowData"><?= $ev2Data['Battery_NumberofCells']?></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Battery Pack Configuration</td>
                                    <td class="tblRowData"><?= $ev1Data['Battery_PackConfiguration']?></td>
                                    <td class="tblRowData"><?= $ev2Data['Battery_PackConfiguration']?></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Battery Architecture</td>
                                    <td class="tblRowData"><?= $ev1Data['Battery_Architecture']?> V</td>
                                    <td class="tblRowData"><?= $ev2Data['Battery_Architecture']?> V</td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Battery Nominal Voltage</td>
                                    <td class="tblRowData"><?= $ev1Data['Battery_NominalVoltage']?> V</td>
                                    <td class="tblRowData"><?= $ev2Data['Battery_NominalVoltage']?> V</td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Battery Form Factor</td>
                                    <td class="tblRowData"><?= $ev1Data['Battery_FormFactor']?></td>
                                    <td class="tblRowData"><?= $ev2Data['Battery_FormFactor']?></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Battery Warranty Period</td>
                                    <td class="tblRowData"><?= $ev1Data['Battery_WarrantyPeriod']?></td>
                                    <td class="tblRowData"><?= $ev2Data['Battery_WarrantyPeriod']?></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Battery Warranty Mileage</td>
                                    <td class="tblRowData"><?= $ev1Data['Battery_WarrantyMileage']?></td>
                                    <td class="tblRowData"><?= $ev2Data['Battery_WarrantyMileage']?></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Battery Name Reference</td>
                                    <td class="tblRowData"><?= $ev1Data['Battery_NameReference']?></td>
                                    <td class="tblRowData"><?= $ev2Data['Battery_NameReference']?></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Charging Home Port</td>
                                    <td class="tblRowData"><?= $ev1Data['Charging_Home_Port']?></td>
                                    <td class="tblRowData"><?= $ev2Data['Charging_Home_Port']?></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Charging Home Time</td>
                                    <td class="tblRowData"><?= $ev1Data['Charging_Home_Time']?></td>
                                    <td class="tblRowData"><?= $ev2Data['Charging_Home_Time']?></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Charging Home Power</td>
                                    <td class="tblRowData"><?= $ev1Data['Charging_Home_Power']?></td>
                                    <td class="tblRowData"><?= $ev2Data['Charging_Home_Power']?></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Charging Home Speed</td>
                                    <td class="tblRowData <?php if($ev1Data['Charging_Home_Speed'] > $ev2Data['Charging_Home_Speed']) echo "win"; ?>"><?= $ev1Data['Charging_Home_Speed']?> km/h</td>
                                    <td class="tblRowData <?php if($ev2Data['Charging_Home_Speed'] > $ev1Data['Charging_Home_Speed']) echo "win"; ?>"><?= $ev2Data['Charging_Home_Speed']?> km/h</td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Charging Fast Port</td>
                                    <td class="tblRowData"><?= $ev1Data['Charging_Fast_Port']?></td>
                                    <td class="tblRowData"><?= $ev2Data['Charging_Fast_Port']?></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Charging Fast Time</td>
                                    <td class="tblRowData"><?= $ev1Data['Charging_Fast_Time']?></td>
                                    <td class="tblRowData"><?= $ev2Data['Charging_Fast_Time']?></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Charging Fast Power</td>
                                    <td class="tblRowData"><?= $ev1Data['Charging_Fast_Power']?></td>
                                    <td class="tblRowData"><?= $ev2Data['Charging_Fast_Power']?></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Charging Fast Speed</td>
                                    <td class="tblRowData <?php if($ev1Data['Charging_Fast_Speed'] > $ev2Data['Charging_Fast_Speed']) echo "win"; ?>"><?= $ev1Data['Charging_Fast_Speed']?> km/h</td>
                                    <td class="tblRowData <?php if($ev2Data['Charging_Fast_Speed'] > $ev1Data['Charging_Fast_Speed']) echo "win"; ?>"><?= $ev2Data['Charging_Fast_Speed']?> km/h</td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Drive</td>
                                    <td class="tblRowData"><?= $ev1Data['Drive']?></td>
                                    <td class="tblRowData"><?= $ev2Data['Drive']?></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">V2L</td>
                                    <td class="tblRowData <?php if($ev1Data['V2L'] > $ev2Data['V2L']) echo "win"; ?>"><?php if($ev1Data['V2L'] == 1) echo "Supported"; else echo "Not Supported"; ?></td>
                                    <td class="tblRowData <?php if($ev2Data['V2L'] > $ev1Data['V2L']) echo "win"; ?>"><?php if($ev2Data['V2L'] == 1) echo "Supported"; else echo "Not Supported"; ?></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">V2H</td>
                                    <td class="tblRowData <?php if($ev1Data['V2H'] > $ev2Data['V2H']) echo "win"; ?>"><?php if($ev1Data['V2H'] == 1) echo "Supported"; else echo "Not Supported"; ?></td>
                                    <td class="tblRowData <?php if($ev2Data['V2H'] > $ev1Data['V2H']) echo "win"; ?>"><?php if($ev2Data['V2H'] == 1) echo "Supported"; else echo "Not Supported"; ?></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">V2G</td>
                                    <td class="tblRowData <?php if($ev1Data['V2G'] > $ev2Data['V2G']) echo "win"; ?>"><?php if($ev1Data['V2G'] == 1) echo "Supported"; else echo "Not Supported"; ?></td>
                                    <td class="tblRowData <?php if($ev2Data['V2G'] > $ev1Data['V2G']) echo "win"; ?>"><?php if($ev2Data['V2G'] == 1) echo "Supported"; else echo "Not Supported"; ?></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Seats</td>
                                    <td class="tblRowData <?php if($ev1Data['Seats'] > $ev2Data['Seats']) echo "win"; ?>"><?= $ev1Data['Seats']?></td>
                                    <td class="tblRowData <?php if($ev2Data['Seats'] > $ev1Data['Seats']) echo "win"; ?>"><?= $ev2Data['Seats']?></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">Body</td>
                                    <td class="tblRowData"><?= $ev1Data['Body']?></td>
                                    <td class="tblRowData"><?= $ev2Data['Body']?></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">RoofRails</td>
                                    <td class="tblRowData <?php if($ev1Data['RoofRails'] > $ev2Data['RoofRails']) echo "win"; ?>"><?php if($ev1Data['RoofRails'] == 1) echo "Present"; else echo "Not Present"; ?></td>
                                    <td class="tblRowData <?php if($ev2Data['RoofRails'] > $ev1Data['RoofRails']) echo "win"; ?>"><?php if($ev2Data['RoofRails'] == 1) echo "Present"; else echo "Not Present"; ?></td>
                                </tr>
                                <tr>
                                    <td class="tblRowHead">HeatPump</td>
                                    <td class="tblRowData <?php if($ev1Data['HeatPump'] > $ev2Data['HeatPump']) echo "win"; ?>"><?php if($ev1Data['HeatPump'] == 1) echo "Present"; else echo "Not Present"; ?></td>
                                    <td class="tblRowData <?php if($ev2Data['HeatPump'] > $ev1Data['HeatPump']) echo "win"; ?>"><?php if($ev2Data['HeatPump'] == 1) echo "Present"; else echo "Not Present"; ?></td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                <?php
                }
            }
            ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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