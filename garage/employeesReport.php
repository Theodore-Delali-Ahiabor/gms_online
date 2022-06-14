<!-- session -->
<?php include 'includes/session.php'; ?>
<!-- head -->
<?php include 'includes/head.php' ?>
<!-- page name -->
<?php $thisPage = 'Employees' ?>

<!-- Employees Modals -->
<?php include 'includes/modals/employeeModals.php' ?>

<div class="layout-wrapper">
    <!-- aside -->
    <?php include 'includes/aside.php' ?>
    <!-- main content -->
    <main>
        <div class="main-wrapper">
            <!-- navigation -->
            <?php include 'includes/nav.php' ?>

            <div class="box main">
                <div class="table-custom-top flex align-center space-between">
                    <span class="box-header no-margin">
                        <span class="box-header-dot"></span> Employees Report
                    </span>
                    <span>
                        <button class="btn btn-green printEmployees"><i class="fa fa-print"></i> Print</button>
                    </span>
                </div>
                <div class="tableResponsive" id="employeesReport">
                    <div class="center">
                        <div class="bold">HTU-JMTC</h2>
                        <div >List of Employees</div>
                    </div><br>
                    <table >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Dep. & Role</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Status</th>
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
                                                <td class="center">'.(($row["Status"] == 1)?"Active":"Inactive").'</td>
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

            <!-- footer -->
            <?php include 'includes/footer.php' ?>
        </div>
    </main>
</div>
<noscript>
    <style>
        .center{
            text-align:center;
        }
        table{
            border-collapse:collapse;
            width: 100%
        }
        table tr,table td,table th{
            border:1px solid gray;
        }
    </style>
</noscript>
<!-- scripts -->
<?php include 'includes/scripts.php' ?>
<script>
    $('.printEmployees').on('click', function(){
        var rep = $('#employeesReport').clone();
            var ns = $('noscript').clone().html();
            start_loader()
            rep.prepend(ns)
            var nw = window.document.open('','_blank','width=900,height=600')
                nw.document.write(rep.html())
                nw.document.close()
                nw.print()
                setTimeout(function(){
                    nw.close()
                    end_loader()
                },500)
    })
</script>
<!-- foot -->
<?php include 'includes/foot.php' ?>