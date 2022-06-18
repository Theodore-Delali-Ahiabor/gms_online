<!-- Add New Customer Modal -->
<div class="modalWrapper " style="display:none;" id="addNewCustomer">
    <div class="modalOuter"></div>
    <div class="modalContainer largeContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Add New Customer</h1>
        </div>
        <div class="modalBody">
            <form action="" class="modal-form center" id="addNewCustomerForm"  enctype="multipart/form-data">
                <div class="form-row flex">
                    <div class="form-column ">
                        <div class="left">Photo</div>
                        <img src="../images/profiles/no-profile.jpg" alt="" class="customerPhoto">
                        <input type="file" name="photo" class="customerPhotoFile" style="border: none;">
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
                        <div class="left">Birth Date <span class="required">*</span></div>
                        <input type="date" name="birthdate" class="birthdate">
                    </div>
                    <div class="form-column">
                        <div class="left">Gender</div>
                        <select name="gender" class="genders" ></select>
                    </div>
                    <div class="form-column">
                        <div class="left">Country <span class="required">*</span></div>
                        <select name="country"  class="countries" ></select>
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="form-column">
                        <div class="left">Region/State <span class="required">*</span></div>
                        <select name="region" class="regions" ></select>
                    </div>
                    <div class="form-column">
                        <div class="left">City/Town <span class="required">*</span></div>
                        <select name="city" class="cities"></select>
                    </div>
                    <div class="form-column">
                        <div class="left">Street</div>
                        <input type="text" name="street" class="street">
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="form-column">
                        <div class="left">House/Room Number</div>
                        <input type="text" name="house" class="house">
                    </div>
                    <div class="form-column">
                        <div class="left">Popular Landmark</div>
                        <input type="text" name="landmark" class="landmark">
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
<!-- Edit Customer Modal -->
<div class="modalWrapper " style="display:none;" id="editCustomer">
<div class="modalOuter"></div>
    <div class="modalContainer largeContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Edit Customer</h1>
        </div>
        <div class="modalBody">
            <form action="" class="modal-form center" id="editCustomerForm"  enctype="multipart/form-data">
                <div class="form-row flex">
                    <div class="form-column ">
                        <div class="left">Photo</div>
                        <img src="../images/profiles/no-profile.jpg" alt="" class="customerPhoto">
                        <input type="file" name="photo" class="customerPhotoFile" style="border: none;">
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
                        <div class="left">Birth Date <span class="required">*</span></div>
                        <input type="date" name="birthdate" class="birthdate">
                    </div>
                    <div class="form-column">
                        <div class="left">Gender <span class="required">*</span></div>
                        <select name="gender" class="genders" ></select>
                    </div>
                    <div class="form-column">
                        <div class="left">Country <span class="required">*</span></div>
                        <select name="country"  class="countries" ></select>
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="form-column">
                        <div class="left">Region/State <span class="required">*</span></div>
                        <select name="region" class="regions" ></select>
                    </div>
                    <div class="form-column">
                        <div class="left">City/Town <span class="required">*</span></div>
                        <select name="city" class="cities"></select>
                    </div>
                    <div class="form-column">
                        <div class="left">Street</div>
                        <input type="text" name="street" class="street">
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="form-column">
                        <div class="left">House/Room Number</div>
                        <input type="text" name="house" class="house">
                    </div>
                    <div class="form-column">
                        <div class="left">Popular Landmark</div>
                        <input type="text" name="landmark" class="landmark">
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
<!-- View Customer Modal -->
<div class="modalWrapper " style="display:none;" id="viewCustomer">
<div class="modalOuter"></div>
        <div class="modalContainer mediumContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Customer Profile</h1>
        </div>
        <div class="modalBody"><br>
            <table style="width: 100%;" id="customerReport">
					<tbody>
						<tr>
                            <td rowspan="8" colspan="2">
                                <img src="../images/profiles/no-profile.jpg" alt="" width="250" class="customerPhoto">
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
                            <td>Created: </td><td class="fg-black created"></td>
                            <td>Last Modified: </td><td class="fg-black modified"></td>
                        </tr>
					</tbody>
				</table><br>
                <div class="center">
                    <button class="btn btn-green printCustomer"><i class="fa fa-print"></i> Print</button>
                </div>
          </div>
        </div>
    </div>
</div>
<!-- Delete Customer Modal -->
<div class="modalWrapper " style="display:none;" id="deleteCustomer">
        <div class="modalOuter"></div>
            <div class="modalContainer relative" style="background:white;">
            <span class="modalClose required">
            <i class="fa fa-times"></i>
            </span>
            <div class="modalHead center">
                <span class="modalTitle">Delete Customer</h1>
            </div>
            <div class="modalBody">
            <form action="" class="modal-form center" id="deleteCustomerForm">
                <div class="">
                    <h3 class="required">Warning!!!</h3>
                    <p>
                        When you delete this Customer all data relating to him/her will be lost.<br> Are you sure to continue?
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
<!-- Toggle Customer Active Status Modal -->
<div class="modalWrapper " style="display:none;" id="toggleCustomerStatus">
    <div class="modalOuter"></div>
        <div class="modalContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle"><span class="newStatus"></span> Customer</h1>
        </div>
        <div class="modalBody">
          <form action="" class="modal-form center" id="toggleCustomerStatusForm">
                <div class="">
                    <p>
                        You are about to <span class="newStatusColor"><span class="newStatus"></span></span> this customer.<br> Are you sure to continue?
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
        $(".customerPhotoFile").on("change", function(){
            imagePreview(this);
        })
        /* view customer show */
        $(".viewCustomer").on("click", function(){
            $("#viewCustomer").fadeIn();
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "customersFetch.php",
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
                        $("#viewCustomer .customerPhoto").attr("src","../images/Profiles/"+response.photo);                      
                        $("#viewCustomer .username").html(response.username);
                        $("#viewCustomer .fname").html(response.fname);
                        $("#viewCustomer .oname").html(response.oname);
                        $("#viewCustomer .lname").html(response.lname);
                        $("#viewCustomer .phone").html(response.phone);
                        $("#viewCustomer .email").html(response.email);
                        $("#viewCustomer .age").html(response.age);
                        $("#viewCustomer .gender").html(response.gender);
                        $('#viewCustomer .department').html(response.department);
                        $('#viewCustomer .country').html(response.country);
                        $('#viewCustomer .region').html(response.region);
                        $('#viewCustomer .city').html(response.city);
                        $("#viewCustomer .street").html(response.street);
                        $("#viewCustomer .house").html(response.house);
                        $("#viewCustomer .landmark").html(response.landmark);
                        $("#viewCustomer .position").html(response.position);
                        $('#viewCustomer .relationship').html(response.relationship);
                        $("#viewCustomer .salary").html(response.salary);
                    }
                }
            })
        })
        /* add new Customer modal show */
        $(".newCustomer").on("click", function(){
            getCombo();
            $("#addNewCustomer").fadeIn();
        })
        /* toggle Customer Status show */
        $(".toggleCustomerStatus").click(function(){
            $("#toggleCustomerStatus").fadeIn();
            var id = $(this).data("id");
            var status = $(this).data("status");
            if(status == 1){
                $(".newStatus").html("Deactivate");
                $(".newStatusColor").removeClass("fg-forestgreen");
                $(".newStatusColor").addClass("fg-crimson");
                $("#toggleCustomerStatusForm .id").val(id);
                $("#toggleCustomerStatusForm .status").val(0);
            }else{
                $(".newStatus").html("Activate");
                $(".newStatusColor").addClass("fg-forestgreen");
                $(".newStatusColor").removeClass("fg-crimson");
                $("#toggleCustomerStatusForm .id").val(id);
                $("#toggleCustomerStatusForm .status").val(1);
            }
        })
        /* edit Customer modal show */
        $(".editCustomer").click(function(){
            getCombo();
            $("#editCustomer").fadeIn();
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "customersFetch.php",
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
                        $("#editCustomerForm .id").val(response.id);
                        $("#editCustomerForm .customerPhoto").attr("src","../images/Profiles/"+response.photo);                       
                        $("#editCustomerForm .fname").val(response.fname);
                        $("#editCustomerForm .oname").val(response.oname);
                        $("#editCustomerForm .lname").val(response.lname);
                        $("#editCustomerForm .phone").val(response.phone);
                        $("#editCustomerForm .email").val(response.email);
                        $("#editCustomerForm .birthdate").val(response.birthdate);
                        $('#editCustomerForm .genders option[value="'+response.genderId+'"]').attr("selected", "selected");
                        $('#editCustomerForm .departments option[value="'+response.departmentId+'"]').attr("selected", "selected");
                        $('#editCustomerForm .countries option[value="'+response.countryId+'"]').attr("selected", "selected");
                        $('#editCustomerForm .regions option[value="'+response.regionId+'"]').attr("selected", "selected");
                        $('#editCustomerForm .cities option[value="'+response.cityId+'"]').attr("selected", "selected");
                        $("#editCustomerForm .street").val(response.street);
                        $("#editCustomerForm .house").val(response.house);
                        $("#editCustomerForm .landmark").val(response.landmark);
                        $("#editCustomerForm .position").val(response.position);
                        $('#editCustomerForm .relationships option[value="'+response.relationshipId+'"]').attr("selected", "selected");
                        $("#editCustomerForm .salary").val(response.salary);
                    }
                }
            })
        })
        /* delete Customer modal show */
        $(".deleteCustomer").click(function(){
            $("#deleteCustomer").fadeIn();
            $("#deleteCustomer .id").val($(this).data("id"));
        })
    })
    function imagePreview(fileInput) {
        if (fileInput.files && fileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function (event) {
                $('.customerPhoto').attr('src', event.target.result);
            };
            fileReader.readAsDataURL(fileInput.files[0]);
        }
    }
    
    /* add new Customer */
    $(document).on('submit',"#addNewCustomerForm", function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
			url: "customersManage.php",
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

    /* edit Customer */
    $("#editCustomerForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
			url: "customersManage.php",
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
     /* delete Customer */
     $("#deleteCustomerForm").on('submit', function(e){
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type: "POST",
			url: "CustomersManage.php",
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
    /* Toggle Customer Status */
    $("#toggleCustomerStatusForm").on('submit', function(e){
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type: "POST",
			url: "CustomersManage.php",
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
    $('.printCustomer').on('click', function(){
        printContent("#customerReport");
    })
</script>