<!-- Add customer to Request Modal -->
<div class="modalWrapper " style="display:none;" id="selectAutomobile">
    <div class="modalOuter"></div>
        <div class="modalContainer largeContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Select Automobile</h1>
        </div>
        <div class="modalBody"><br>
            <table id="automobilesTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Description</th>
                        <th>Fuel</th>
                        <th>VIN</th>
                        <th>Reg. Number</th>
                        <th>Customer</th>
                        <th>Select</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    try {
                        $conn = $pdo->open();
                
                            $stmt = $conn->prepare("SELECT *,`a`.`ID` AS `AutoID` FROM `automobiles` `a`
                            JOIN `makes` `m` ON `a`.`MakeID` = `m`.`ID`
                            JOIN `fuels` `f` ON `a`.`FuelID` = `f`.`ID`
                            JOIN `categories` `c` ON `a`.`CategoryID` = `c`.`ID`");
                            $stmt->execute();
                            
                            foreach($stmt as $row){
                                $auto = $row['Color'].', '.$row['Year'].', '.$row['Category'].', '.$row['Make'].', '.$row['Model'];
                                if(!empty($row['CustomerID'])){
                                    $stmtC = $conn->prepare("SELECT * FROM `customers` `c`
                                    JOIN `users` `u` ON `c`.`CustomerUserID` = `u`.`ID`
                                    WHERE `c`.`ID`=:id");
                                    $stmtC->execute(['id'=>$row['CustomerID']]);
                                    $rowC = $stmtC->fetch();
                                    $customer = $rowC['FirstName'].' '.$rowC['OtherName'].' '.$rowC['LastName'].'<br>'.$rowC['Phone'];
                                }else{
                                    $customer = '';
                                }
                                echo '
                                    <tr>
                                        <td class="center">'.$row["AutoID"].'</td>
                                        <td class="center"><img src="../images/autos/'.((!empty($row["Photo"])?$row["Photo"]:'no-image.jpg')).'" width="60"></td>
                                        <td>'.$row['Color'].', '.$row['Year'].', '.$row['Category'].'<br>'.$row['Make'].', '.$row['Model'].'</td>
                                        <td>'.$row['Fuel'].'</td>
                                        <td>'.$row['VIN'].'</td>
                                        <td>'.$row['RegNumber'].'</td>
                                        <td class="customer">'.$customer.'</td>
                                        <td class="center">
                                            <button class="autoSelect btn btn-green" data-id="'.$row["AutoID"].'" data-auto="'.$auto.'" data-customer="'.$customer.'"> Select</button>
                                        </td>
                                    </tr>
                                ';
                            }
                            $output['type'] = 'success';           
                
                        $pdo->close();
                    } catch (PDOException $th) {
                        echo $th->getMessage();
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Add Technicals to Request Modal -->
<div class="modalWrapper" style="display:none;" id="selectTechnician">
    <div class="modalOuter"></div>
        <div class="modalContainer largeContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Select Automobile</h1>
        </div>
        <div class="modalBody"><br>
            <table id="employeesTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Dep. & Role</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Select</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    try {
                        $conn = $pdo->open();
                
                            $stmt = $conn->prepare("SELECT *,`e`.`ID` AS `EmployeeID`, `u`.`ID` AS `UserID` FROM `employees` `e` 
                            JOIN `users` `u` ON `u`.`ID` = `e`.`EmployeeUserID` 
                            JOIN `departments` `d` ON `d`.`ID` = `e`.`DepartmentID`
                            JOIN `addresses` `a` ON `a`.`ID` = `u`.`AddressID`
                            JOIN `countries` `c` ON `c`.`ID` = `a`.`CountryID`
                            JOIN `regions` `r` ON `r`.`ID` = `a`.`RegionID`
                            JOIN `cities` `ci` ON `ci`.`ID` = `a`.`CityID`");
                            $stmt->execute();
                            
                            foreach($stmt as $row){
                                $technician = $row["FirstName"].' '.$row["OtherName"].' '.$row["LastName"].' ('.$row["Position"].')';
                                echo '
                                    <tr>
                                        <td class="center">'.$row["EmployeeID"].'</td>
                                        <td class="center"><img src="../images/profiles/'.((!empty($row["Photo"])?$row["Photo"]:'no-profile.jpg')).'" width="60"></td>
                                        <td>'.$row["FirstName"].' '.$row["OtherName"].' '.$row["LastName"].'</td>
                                        <td>'.$row["Department"].'<br>'.$row["Position"].'</td>
                                        <td>'.$row["Email"].'<br>'.$row["Phone"].'</td>
                                        <td>
                                            '.
                                                $row["Country"].', '.$row["Region"].', '.$row["City"].'<br>'.
                                                $row["Street"].', '.$row["House"].', '.$row["Landmark"].'<br>'
                                            .'
                                        </td>
                                        <td>
                                            <div class="center flex">
                                                <span class="toggleEmployeeStatus status bg '.(($row["Status"] == 1)?"bg-forestgreen":"bg-crimson").'" data-id="'.$row["UserID"].'" data-status="'.$row["Status"].'"></span>
                                            </div>
                                        </td>
                                        <td class="center">
                                            <button class="technicianSelect btn btn-green " data-id="'.$row["EmployeeID"].'" data-technician="'.$technician.'"  data-status="'.$row["Status"].'"> Select</button>
                                        </td>
                                    </tr>
                                ';
                            }
                            $output['type'] = 'success';           
                
                        $pdo->close();
                    } catch (PDOException $th) {
                        echo $th->getMessage();
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(function(){
        /* add automobile to Request show */
        $(".addAutomobile").click(function(e){
            e.preventDefault();
            $("#selectAutomobile").fadeIn();
            $("#addCustomer .autoId").val($(this).data("id"));
        })
        /* Select Automobile */
        $(".autoSelect").click(function(e){
            e.preventDefault();
            var id = $(this).data("id");
            var auto = $(this).data("auto");
            var customer = $(this).data("customer");
            if(customer != ""){
                $('.automobileName').val(auto);
                $('.automobileId').val(id);
                $("#selectAutomobile").fadeOut();
            }else{
                notify("Please assign a customer to this automobile to proceed selecttion","","info")
            }
        })
        /* add automobile to Request show */
        $(".selectTechnician").click(function(e){
            e.preventDefault();
            $("#selectTechnician").fadeIn();
            $("#addCustomer .autoId").val($(this).data("id"));
        })
        /* Select Automobile */
        $(".technicianSelect").click(function(e){
            e.preventDefault();
            var id = $(this).data("id");
            var status = $(this).data("status");
            var technician = $(this).data("technician");
            if(status == 1){
                $('.technicianName').val(technician);
                $('.technicianId').val(id);
                $("#selectTechnician").fadeOut();
            }else{
                notify("This Technician is currently Inactive","","info")
            }
        })
    })
</script>