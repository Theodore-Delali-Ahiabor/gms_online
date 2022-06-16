<!-- Add New Automobile Modal -->
<div class="modalWrapper " style="display:none;" id="addNewAutomobile">
    <div class="modalOuter"></div>
    <div class="largeContainer modalContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Add New Automobile</h1>
        </div>
        <div class="modalBody">
            <form action="" class="modal-form center" id="addNewAutomobileForm"  enctype="multipart/form-data">
                <div class="form-row flex">
                    <div class="form-column ">
                        <div class="left">Photo</div>
                        <img src="../images/autos/no-image.jpg" alt="" class="automobilePhoto">
                        <input type="file" name="photo" class="automobilePhotoFile" style="border: none;">
                    </div>
                    <div class="form-column">
                        <div class="left">Category <span class="required">*</span></div>
                        <select name="category"  class="categories" ></select>
                    </div>
                    <div class="form-column">
                        <div class="left">Make <span class="required">*</span></div>
                        <select name="make" class="makes"></select>
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="form-column">
                        <div class="left">Model<span class="required">*</span></div>
                        <input type="text" name="model" class="model">
                    </div>
                    <div class="form-column">
                        <div class="left">Fuel <span class="required">*</span></div>
                        <select name="fuel" class="fuels"></select>
                    </div>
                    <div class="form-column">
                        <div class="left">Year <span class="required">*</span></div>
                        <select name="year" class="year">
                            <?php
                                $year = date('Y');
                                for($i=2000; $i<=2065; $i++){
                                $selected = ($i==$year)?'selected':'';
                                echo "
                                    <option value='".$i."' ".$selected.">".$i."</option>
                                ";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="form-column">
                        <div class="left">Color  <span class="required">*</span></div>
                        <input type="text" name="color" class="color">
                    </div>
                    <div class="form-column">
                        <div class="left">VIN/Serial NUmber <span class="required">*</span></div>
                        <input type="text" name="vin" class="vin">
                    </div>
                    <div class="form-column">
                        <div class="left">Registration Number</div>
                        <input type="text" name="registration" class="registration">
                    </div>
                </div>
                
                <input type="hidden" name="add">
                <br>
                <div>
                    <button type="submit" class="btn btn-green"><i class="fa fa-save"></i> Save </button>
                    <button type="reset" class="btn btn-red modalCancel"> <i class="fa fa-times"></i> Cancel </button>
                </div>
          </form>
        </div>
    </div>
</div>
<!-- Edit Automobile Modal -->
<div class="modalWrapper " style="display:none;" id="editAutomobile">
<div class="modalOuter"></div>
    <div class="modalContainer largeContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Edit Automobile</h1>
        </div>
        <div class="modalBody">
            <form action="" class="modal-form center" id="editAutomobileForm"  enctype="multipart/form-data">
            <div class="form-row flex">
                    <div class="form-column ">
                        <div class="left">Photo</div>
                        <img src="../images/autos/no-image.jpg" alt="" class="automobilePhoto">
                        <input type="file" name="photo" class="automobilePhotoFile" style="border: none;">
                    </div>
                    <div class="form-column">
                        <div class="left">Category <span class="required">*</span></div>
                        <select name="category"  class="categories" ></select>
                    </div>
                    <div class="form-column">
                        <div class="left">Make <span class="required">*</span></div>
                        <select name="make" class="makes"></select>
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="form-column">
                        <div class="left">Model<span class="required">*</span></div>
                        <input type="text" name="model" class="model">
                    </div>
                    <div class="form-column">
                        <div class="left">Fuel <span class="required">*</span></div>
                        <select name="fuel" class="fuels"></select>
                    </div>
                    <div class="form-column">
                        <div class="left">Year <span class="required">*</span></div>
                        <select name="year" class="year">
                            <?php
                                $year = date('Y');
                                for($i=2000; $i<=2065; $i++){
                                //$selected = ($i==$year)?'selected':'';
                                echo "
                                    <option value='".$i."' ".$selected.">".$i."</option>
                                ";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="form-column">
                        <div class="left">Color  <span class="required">*</span></div>
                        <input type="text" name="color" class="color">
                    </div>
                    <div class="form-column">
                        <div class="left">VIN/Serial NUmber <span class="required">*</span></div>
                        <input type="text" name="vin" class="vin">
                    </div>
                    <div class="form-column">
                        <div class="left">Registration Number</div>
                        <input type="text" name="registration" class="registration">
                    </div>
                </div>

                <input type="hidden" name="edit">
                <input type="hidden" name="id" class="id">
                <br>
                <div>
                    <button type="submit" class="btn btn-green"><i class="fa fa-save"></i> Update </button>
                    <button type="reset" class="btn btn-red modalCancel"> <i class="fa fa-times"></i> Cancel </button>
                </div>
          </form>
        </div>
    </div>
</div>
<!-- View Automobile Modal -->
<div class="modalWrapper " style="display:none;" id="viewAutomobile">
<div class="modalOuter"></div>
        <div class="modalContainer mediumContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Automobile Profile</h1>
        </div>
        <div class="modalBody"><br>
            <table style="width: 100%;" id="automobileReport">
					<tbody>
						<tr>
                            <td rowspan="8" colspan="2">
                                <img src="../images/autos/no-image.jpg" alt="" width="250" class="automobilePhoto">
                            </td>
							</td><td>Category: </td><td class="fg-black category"></td>
						</tr>
						<tr>
                            <td>Make: </td><td class="fg-black make"></td>
						</tr>
						<tr>
                            <td>Model </td><td class="fg-black model"></td>
						</tr>
                        <tr>
                            <td>Color: </td><td class="fg-black color"></td>
						</tr>
                        <tr>  
                            <td>Fuel: </td><td class="fg-black fuel"></td>
                        </tr>
                        <tr>  
                            <td>Year: </td><td class="fg-black year"></td>
                        </tr>
                        <tr>
                            <td>VIN: </td><td class="fg-black vin"></td>
                        </tr>
                        <tr>
                            <td>Reg. No.: </td><td class="fg-black registration"></td>
                        </tr>
                        <tr>
                            <td>Customer: </td><td class="fg-black customer">
                            <td></td><td></td>
                        </tr>
					</tbody>
				</table><br>
                <div class="center">
                    <button class="btn btn-green printAutomobile"><i class="fa fa-print"></i> Print</button>
                </div>
          </div>
        </div>
    </div>
</div>
<!-- Delete Automobile Modal -->
<div class="modalWrapper " style="display:none;" id="deleteAutomobile">
        <div class="modalOuter"></div>
            <div class="modalContainer relative" style="background:white;">
            <span class="modalClose required">
            <i class="fa fa-times"></i>
            </span>
            <div class="modalHead center">
                <span class="modalTitle">Delete Automobile</h1>
            </div>
            <div class="modalBody">
            <form action="" class="modal-form center" id="deleteAutomobileForm">
                <div class="">
                    <h3 class="required">Warning!!!</h3>
                    <p>
                        When you delete this Automobile all data relating to it will be lost.<br> Are you sure to continue?
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
<!-- Toggle Automobile Active Status Modal -->
<div class="modalWrapper " style="display:none;" id="addCustomer">
    <div class="modalOuter"></div>
        <div class="modalContainer mediumContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Select Customer</h1>
        </div>
        <div class="modalBody"><br>
          <table id="customersTable">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Select</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        try {
                            $conn = $pdo->open();
                    
                                $stmt = $conn->prepare("SELECT *,`c`.`ID` AS `CustomerID`,`u`.`ID` AS `UserID` FROM `customers` `c` 
                                JOIN `users` `u` ON `u`.`ID` = `c`.`CustomerUserID`");
                                $stmt->execute();

                                foreach($stmt as $row){    
                                    echo '
                                        <tr>
                                            <td class="center"><img src="../images/profiles/'.((!empty($row["Photo"])?$row["Photo"]:'no-profile.jpg')).'" width="60"></td>
                                            <td class="left">'.$row["FirstName"].' '.$row["OtherName"].' '.$row["LastName"].'</td>
                                            <td class="left">'.$row["Email"].'<br>'.$row["Phone"].'</td>
                                            <td class="center"><button class="customerSelect btn btn-green" data-id="'.$row["CustomerID"].'"> Select</button></td>
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
                <input type="hidden" name="id" class="autoId">

        </div>
    </div>
</div>
<script>
    $(function(){
        /* select a photo file */
        $(".automobilePhotoFile").on("change", function(){
            imagePreview(this);
        })
        /* view automobile show */
        $(".viewAutomobile").on("click", function(){
            $("#viewAutomobile").fadeIn();
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "automobilesFetch.php",
                data: {id:id},
                dataType: 'json',
                success: function(response){
                    if (response.type == "error"){
                        notify(response.message,'','error');
                    }else if(response.type == "warning"){
                        notify(response.message,'','warning');
                    }else if(response.type == "info"){
                        notify(response.message,'','info');
                    }else if(response.type == "success"){
                        $("#viewAutomobile .automobilePhoto").attr("src","../images/autos/"+response.photo);                       
                        $('#viewAutomobile .customer').html(response.customer);
                        $('#viewAutomobile .category').html(response.category);
                        $('#viewAutomobile .make').html(response.make);
                        $("#viewAutomobile .model").html(response.model);
                        $('#viewAutomobile .fuel').html(response.fuel);
                        $('#viewAutomobile .year').html(response.year);
                        $("#viewAutomobile .color").html(response.color);
                        $("#viewAutomobile .vin").html(response.vin);
                        $("#viewAutomobile .registration").html(response.registration);
                    }
                }
            })
        })
        /* add new Automobile modal show */
        $(".newAutomobile").on("click", function(){
            getCombo();
            $("#addNewAutomobile").fadeIn();
        })
        /* add customer to Automobile show */
        $(".addCustomer").click(function(){
            $("#addCustomer").fadeIn();
            $("#addCustomer .autoId").val($(this).data("id"));
        })
        /* edit Automobile modal show */
        $(".editAutomobile").click(function(){
            var id = $(this).data("id");
            getCombo();
            $("#editAutomobile").fadeIn();
            $.ajax({
                type: "POST",
                url: "automobilesFetch.php",
                data: {id:id},
                dataType: 'json',
                success: function(response){
                    if (response.type == "error"){
                        notify(response.message,'','error');
                    }else if(response.type == "warning"){
                        notify(response.message,'','warning');
                    }else if(response.type == "info"){
                        notify(response.message,'','info');
                    }else if(response.type == "success"){
                        $("#editAutomobileForm .id").val(response.id);
                        $("#editAutomobileForm .automobilePhoto").attr("src","../images/autos/"+response.photo);                       
                        $('#editAutomobileForm .categories option[value="'+response.categoryId+'"]').attr("selected", "selected");
                        $('#editAutomobileForm .makes option[value="'+response.makeId+'"]').attr("selected", "selected");
                        $("#editAutomobileForm .model").val(response.model);
                        $('#editAutomobileForm .fuels option[value="'+response.fuelId+'"]').attr("selected", "selected");
                        $('#editAutomobileForm .year option[value="'+response.year+'"]').attr("selected", "selected");
                        $("#editAutomobileForm .color").val(response.color);
                        $("#editAutomobileForm .vin").val(response.vin);
                        $("#editAutomobileForm .registration").val(response.registration);
                        
                    }
                }
            })
        })
        /* delete Automobile modal show */
        $(".deleteAutomobile").click(function(){
            $("#deleteAutomobile").fadeIn();
            $("#deleteAutomobile .id").val($(this).data("id"));
        })
    })
    function imagePreview(fileInput) {
        if (fileInput.files && fileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function (event) {
                $('.automobilePhoto').attr('src', event.target.result);
            };
            fileReader.readAsDataURL(fileInput.files[0]);
        }
    }
    
    /* add new Automobile */
    $(document).on('submit',"#addNewAutomobileForm", function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
			url: "automobilesManage.php",
			data: new FormData(this),
			mimeType: 'application/json',
			dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
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

    /* edit Automobile */
    $("#editAutomobileForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
			url: "automobilesManage.php",
			data: new FormData(this),
			mimeType: 'application/json',
			dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
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
     /* delete Automobile */
     $("#deleteAutomobileForm").on('submit', function(e){
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type: "POST",
			url: "automobilesManage.php",
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
    /* Add customer to automobile Automobile */
    $(".customerSelect").on('click', function(e){
        e.preventDefault();
        var customerId = $(this).data('id');
        var autoId = $("#addCustomer .autoId").val();
        $.ajax({
            type: "POST",
			url: "automobilesManage.php",
			data: {customerId:customerId,autoId:autoId},
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
    $('.printAutomobile').on('click', function(){
        printContent("#automobileReport");
    })
</script>