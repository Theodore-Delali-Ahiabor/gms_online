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
                            JOIN `categories` `c` ON `a`.`CategoryID` = `c`.`ID`
                            WHERE `a`.`CustomerID` = :id");
                            $stmt->execute(['id'=>$rowSession['CustomerID']]);
                            foreach($stmt as $row){
                                $auto = $row['Color'].', '.$row['Year'].', '.$row['Category'].', '.$row['Make'].', '.$row['Model'];
                                
                                echo '
                                    <tr>
                                        <td class="center">'.$row["AutoID"].'</td>
                                        <td class="center"><img src="images/autos/'.((!empty($row["Photo"])?$row["Photo"]:'no-image.jpg')).'" width="60"></td>
                                        <td>'.$row['Color'].', '.$row['Year'].', '.$row['Category'].'<br>'.$row['Make'].', '.$row['Model'].'</td>
                                        <td>'.$row['Fuel'].'</td>
                                        <td>'.$row['VIN'].'</td>
                                        <td>'.$row['RegNumber'].'</td>
                                        <td class="center">
                                            <button class="autoSelect btn btn-green" data-id="'.$row["AutoID"].'" data-auto="'.$auto.'" > Select</button>
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

<!-- Delete Service request Modal -->
<div class="modalWrapper " style="display:none;" id="deleteRequest">
        <div class="modalOuter"></div>
            <div class="modalContainer relative" style="background:white;">
            <span class="modalClose required">
            <i class="fa fa-times"></i>
            </span>
            <div class="modalHead center">
                <span class="modalTitle">Delete Service Request</h1>
            </div>
            <div class="modalBody">
            <form action="" class="modal-form center" id="deleteRequestForm">
                <div class="">
                    <h3 class="required">Warning!!!</h3>
                    <p>
                        When you delete this Request all data relating to it will be lost.<br> Are you sure to continue?
                    </p>
                </div>
                <input type="hidden" name="delete">
                <input type="hidden" name="id" class="id">
                <br>
                <div>
                    <button type="submit" class="btn btn-green"><i class="fa fa-check"></i> Yes </button>
                    <button type="reset" class="btn btn-red modalCancel"> <i class="fa fa-times"></i> No </button>
                </div>
          </form>
          
        </div>
    </div>
</div>
<script>
    $(function(){
        getCombo();
        /* Add new request */
        $('#addNewappointmentForm').on('submit', function(e){
            e.preventDefault();
            var data = $(this).serialize();
            //notify(data,"","info");
            $.ajax({
                type: "POST",
                url: "appointmentsManage.php",
                data: data,
                dataType: 'json',
                success: function(response){
                    if (response.type == "error"){
                        notify(response.message,'','error');
                    }else if(response.type == "warning"){
                        notify(response.message,'','warning');
                    }else if(response.type == "info"){
                        notify(response.message,'','info');
                    }else if(response.type == "success"){
                        location.reload(true);
                    }
                }
            })
        })
    })
    
</script>
<script>
    $(function(){
        /* add automobile to Request show */
        $(".addAutomobile").click(function(e){
            e.preventDefault();
            $("#selectAutomobile").fadeIn();
            $("#addCustomer .autoId").val($(this).data("id"));
        })
        /* delete request show */
        $(".deleteRequest").click(function(e){
            e.preventDefault();
            $("#deleteRequest").fadeIn();
            $("#deleteRequest .id").val($(this).data("id"));
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
    })
    
    $("#deleteRequestForm").on('submit', function(e){
        e.preventDefault();
        data = $(this).serialize();
        $.ajax({
            type: "POST",
			url: "requestsManage.php",
			data: data,
            dataType: 'json',
            success: function(response){
                if (response.type == "error"){
                    notify(response.message,'','error');
                }else if(response.type == "warning"){
                    notify(response.message,'','warning');
                }else if(response.type == "info"){
                    notify(response.message,'','info');
                }else if(response.type == "success"){
                    location.reload(true);
                }
            }
        })
    })
</script>