<!-- Add New Automobile Modal -->
<div class="modalWrapper " style="display:none;" id="addNewAutomobile">
    <div class="modalOuter"></div>
    <div class="modalContainer relative" style="background:white;">
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
                        <img src="../images/profiles/no-profile.jpg" alt="" class="automobilePhoto">
                        <input type="file" name="photo" class="automobilePhotoFile" style="border: none;">
                    </div>
                    <div class="form-column">
                        <div class="left">Owner <span class="required">*</span></div>
                        <input type="text" name="owner" class="owner" ><button class="btn btn-theme-outline"><i class="fa fa-plus"></i></button>
                    </div>
                    <div class="form-column">
                        <div class="left">Make</div>
                        <input type="text" name="make" class="make">
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="form-column">
                        <div class="left">Model<span class="required">*</span></div>
                        <input type="text" name="model" class="model">
                    </div>
                    <div class="form-column">
                        <div class="left">Fuel <span class="required">*</span></div>
                        <input type="text" name="phone" class="phone">
                    </div>
                    <div class="form-column">
                        <div class="left">Year <span class="required">*</span></div>
                        <input type="year" name="year" class="year">
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="form-column">
                        <div class="left">Color  <span class="required">*</span></div>
                        <input type="text" name="color" class="color">
                    </div>
                    <div class="form-column">
                        <div class="left">VIN <span class="required">*</span></div>
                        <select name="vin" class="vin" ></select>
                    </div>
                    <div class="form-column">
                        <div class="left">Registration Number</div>
                        <select name="regnumber" class="regnumber"></select>
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="form-column">
                        <div class="left">Category <span class="required">*</span></div>
                        <select name="category"  class="category" ></select>
                    </div>
                    <!-- <div class="form-column">
                        <div class="left">Region/State <span class="required">*</span></div>
                        <select name="region" class="regions" ></select>
                    </div>
                    <div class="form-column">
                        <div class="left">City/Town <span class="required">*</span></div>
                        <select name="city" class="cities"></select>
                    </div> -->
                </div>
                
                <input type="hidden" name="add">
                <br>
                <div>
                    <button type="submit" class="btn btn-green" id="saveNewAutomobile" ><i class="fa fa-save"></i> Save </button>
                    <button type="reset" class="btn btn-red modalCancel"> <i class="fa fa-times"></i> Cancel </button>
                </div>
          </form>
        </div>
    </div>
</div>
<!-- Edit Automobile Modal -->
<div class="modalWrapper " style="display:none;" id="editAutomobile">
<div class="modalOuter"></div>
    <div class="modalContainer relative" style="background:white;">
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
                        <img src="../images/profiles/no-profile.jpg" alt="" class="automobilePhoto">
                        <input type="file" name="photo" class="automobilePhotoFile" style="border: none;">
                    </div>
                    <div class="form-column">
                        <div class="left">First Name <span class="required">*</span></div>
                        <input type="text" name="fname" class="fname" >
                    </div>
                    <div class="form-column">
                        <div class="left">Other Name(s)</div>
                        <input type="text" name="oname" class="oname">
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="form-column">
                        <div class="left">Last Name  <span class="required">*</span></div>
                        <input type="text" name="lname" class="lname">
                    </div>
                    <div class="form-column">
                        <div class="left">Phone <span class="required">*</span></div>
                        <input type="tel" name="phone" class="phone">
                    </div>
                    <div class="form-column">
                        <div class="left">Email <span class="required">*</span></div>
                        <input type="email" name="email" class="email">
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="form-column">
                        <div class="left">Birth Date  <span class="required">*</span></div>
                        <input type="date" name="birthdate" class="birthdate">
                    </div>
                    <div class="form-column">
                        <div class="left">Gender <span class="required">*</span></div>
                        <select name="gender" class="genders" ></select>
                    </div>
                    <div class="form-column">
                        <div class="left">Department</div>
                        <select name="department" class="departments"></select>
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="form-column">
                        <div class="left">Country <span class="required">*</span></div>
                        <select name="country"  class="countries" ></select>
                    </div>
                    <div class="form-column">
                        <div class="left">Region/State <span class="required">*</span></div>
                        <select name="region" class="regions" ></select>
                    </div>
                    <div class="form-column">
                        <div class="left">City/Town <span class="required">*</span></div>
                        <select name="city" class="cities"></select>
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="form-column">
                        <div class="left">Street</div>
                        <input type="text" name="street" class="street">
                    </div>
                    <div class="form-column">
                        <div class="left">House/Room Number</div>
                        <input type="text" name="house" class="house">
                    </div>
                    <div class="form-column">
                        <div class="left">Popular Landmark</div>
                        <input type="text" name="landmark" class="landmark">
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="form-column">
                        <div class="left">Position/Role</div>
                        <input type="text" name="position" class="position">
                    </div>
                    <div class="form-column">
                        <div class="left">Relationship Status <span class="required">*</span></div>
                        <select name="relationship" class="relationships" ></select>
                    </div>
                    <div class="form-column">
                        <div class="left">Salary/GH&#8373;</div>
                        <input type="number" name="salary" class="salary">
                    </div>
                </div>
                <input type="hidden" name="edit">
                <input type="hidden" name="id" class="id">
                <br>
                <div>
                    <button type="submit" class="btn btn-green" id="saveNewAutomobile" ><i class="fa fa-save"></i> Update </button>
                    <button type="reset" class="btn btn-red modalCancel"> <i class="fa fa-times"></i> Cancel </button>
                </div>
          </form>
        </div>
    </div>
</div>
<!-- View Automobile Modal -->
<div class="modalWrapper " style="display:none;" id="viewAutomobile">
<div class="modalOuter"></div>
        <div class="modalContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Automobile Profile</h1>
        </div>
        <div class="modalBody"><br>
            <table style="width: 100%;">
					<tbody>
						<tr>
                            <td rowspan="8" colspan="2">
                                <img src="../images/profiles/no-profile.jpg" alt="" width="250" class="automobilePhoto">
                            </td>
							<td>Username: </td><td class="fg-black username"></td>
						</tr>
                        <tr>
							<td>First Name: </td><td class="fg-black fname"></td>
						</tr>
						<tr>
                            <td>Other Name: </td><td class="fg-black oname"></td>
						</tr>
						<tr>
                            <td>Last Name </td><td class="fg-black lname"></td>
						</tr>
                        <tr>
                            <td>Age: </td><td class="fg-black age"></td>
						</tr>
                        <tr>  
                            <td>Phone: </td><td class="fg-black phone"></td>
                        </tr>
                        <tr>  
                            <td>Gender: </td><td class="fg-black gender"></td>
                        </tr>
                        <tr>
                            <td>Email: </td><td class="fg-black email"></td>
                        </tr>
                        <tr>
                            <td>Country: </td><td class="fg-black country"></td>
                            <td>Region: </td><td class="fg-black region"></td>
                        </tr>
                        <tr>
                            <td>City: </td><td class="fg-black city"></td>
                            <td>Street: </td><td class="fg-black street"></td>
                        </tr>
                        <tr>
                            <td>House: </td><td class="fg-black house"></td>
							<td>Landmark: </td><td class="fg-black landmark"></td>
						</tr>
                        <tr>
                            <td>Department: </td><td class="fg-black department"></td>
                            <td>Salary: </td><td class="fg-black">GH&#8373; <span class="salary"></span></td>
                        </tr>
                        <tr>
                            <td>Position: </td><td class="fg-black position"></td>
							<td>Status: </td><td class="fg-black status"></td>
						</tr>
                        <tr>
                            <td>Created: </td><td class="fg-black created"></td>
                            <td>Last Modified: </td><td class="fg-black modified"></td>
                        </tr>
					</tbody>
				</table><br>
                <div class="center">
                    <button class="btn btn-green printAutomobiles"><i class="fa fa-print"></i> Print</button>
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
                        When you delete this Automobile all data relating to him/her will be lost.<br> Are you sure to continue?
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
<div class="modalWrapper " style="display:none;" id="toggleAutomobileStatus">
    <div class="modalOuter"></div>
        <div class="modalContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle"><span class="newStatus"></span> Automobile</h1>
        </div>
        <div class="modalBody">
          <form action="" class="modal-form center" id="toggleAutomobileStatusForm">
                <div class="">
                    <p>
                        You are about to <span class="newStatusColor"><span class="newStatus"></span></span> this automobile.<br> Are you sure to continue?
                    </p>
                </div>
                <input type="hidden" name="id" class="id">
                <input type="hidden" name="status" class="status">
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
                        $("#viewAutomobile .automobilePhoto").attr("src","../images/Profiles/"+response.photo);                      
                        $("#viewAutomobile .username").html(response.username);
                        $("#viewAutomobile .fname").html(response.fname);
                        $("#viewAutomobile .oname").html(response.oname);
                        $("#viewAutomobile .lname").html(response.lname);
                        $("#viewAutomobile .phone").html(response.phone);
                        $("#viewAutomobile .email").html(response.email);
                        $("#viewAutomobile .age").html(response.age);
                        $("#viewAutomobile .gender").html(response.gender);
                        $('#viewAutomobile .department').html(response.department);
                        $('#viewAutomobile .country').html(response.country);
                        $('#viewAutomobile .region').html(response.region);
                        $('#viewAutomobile .city').html(response.city);
                        $("#viewAutomobile .street").html(response.street);
                        $("#viewAutomobile .house").html(response.house);
                        $("#viewAutomobile .landmark").html(response.landmark);
                        $("#viewAutomobile .position").html(response.position);
                        $('#viewAutomobile .relationship').html(response.relationship);
                        $("#viewAutomobile .salary").html(response.salary);
                    }
                }
            })
        })
        /* add new Automobile modal show */
        $(".newAutomobile").on("click", function(){
            getCombo();
            $("#addNewAutomobile").fadeIn();
        })
        /* toggle Automobile Status show */
        $(".toggleAutomobileStatus").click(function(){
            $("#toggleAutomobileStatus").fadeIn();
            var id = $(this).data("id");
            var status = $(this).data("status");
            if(status == 1){
                $(".newStatus").html("Deactivate");
                $(".newStatusColor").removeClass("fg-forestgreen");
                $(".newStatusColor").addClass("fg-crimson");
                $("#toggleAutomobileStatusForm .id").val(id);
                $("#toggleAutomobileStatusForm .status").val(0);
            }else{
                $(".newStatus").html("Activate");
                $(".newStatusColor").addClass("fg-forestgreen");
                $(".newStatusColor").removeClass("fg-crimson");
                $("#toggleAutomobileStatusForm .id").val(id);
                $("#toggleAutomobileStatusForm .status").val(1);
            }
        })
        /* edit Automobile modal show */
        $(".editAutomobile").click(function(){
            getCombo();
            $("#editAutomobile").fadeIn();
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
                        getRegions(response.countryId);
                        getCities(response.cityId);
                        $("#editAutomobileForm .id").val(response.id);
                        $("#editAutomobileForm .automobilePhoto").attr("src","../images/Profiles/"+response.photo);                       
                        $("#editAutomobileForm .fname").val(response.fname);
                        $("#editAutomobileForm .oname").val(response.oname);
                        $("#editAutomobileForm .lname").val(response.lname);
                        $("#editAutomobileForm .phone").val(response.phone);
                        $("#editAutomobileForm .email").val(response.email);
                        $("#editAutomobileForm .birthdate").val(response.birthdate);
                        $('#editAutomobileForm .genders option[value="'+response.genderId+'"]').attr("selected", "selected");
                        $('#editAutomobileForm .departments option[value="'+response.departmentId+'"]').attr("selected", "selected");
                        $('#editAutomobileForm .countries option[value="'+response.countryId+'"]').attr("selected", "selected");
                        $('#editAutomobileForm .regions option[value="'+response.regionId+'"]').attr("selected", "selected");
                        $('#editAutomobileForm .cities option[value="'+response.cityId+'"]').attr("selected", "selected");
                        $("#editAutomobileForm .street").val(response.street);
                        $("#editAutomobileForm .house").val(response.house);
                        $("#editAutomobileForm .landmark").val(response.landmark);
                        $("#editAutomobileForm .position").val(response.position);
                        $('#editAutomobileForm .relationships option[value="'+response.relationshipId+'"]').attr("selected", "selected");
                        $("#editAutomobileForm .salary").val(response.salary);
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
			url: "AutomobilesManage.php",
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
                    notify(response.message,'','success');
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
			url: "AutomobilesManage.php",
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
    /* Toggle Automobile Status */
    $("#toggleAutomobileStatusForm").on('submit', function(e){
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type: "POST",
			url: "AutomobilesManage.php",
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