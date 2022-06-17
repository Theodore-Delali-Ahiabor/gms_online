<!-- Add New Supplier Modal -->
<div class="modalWrapper " style="display:none;" id="addNewSupplier">
    <div class="modalOuter"></div>
    <div class="modalContainer largeContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Add New Supplier</h1>
        </div>
        <div class="modalBody">
            <form action="" class="modal-form center" id="addNewSupplierForm" >
                <div class="form-row flex">
                    <div class="form-column ">
                        <div class="left">Brand Name <span class="required">*</span></div>
                        <input type="text" name="name" class="name" >
                    </div>
                    <div class="form-column">
                        <div class="left">Business Sector <span class="required">*</span></div>
                        <select name="sector"  class="sectors" ></select>
                    </div>
                    <div class="form-column">
                        <div class="left">Phone <span class="required">*</span></div>
                        <input type="text" name="phone" class="phone">
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="form-column">
                        <div class="left">Email</div>
                        <input type="eamil" name="email" class="email">
                    </div>
                    <div class="form-column">
                        <div class="left">P.O.Box</div>
                        <input type="tel" name="box" class="box">
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
<!-- Edit Supplier Modal -->
<div class="modalWrapper " style="display:none;" id="editSupplier">
<div class="modalOuter"></div>
    <div class="modalContainer largeContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Edit Supplier</h1>
        </div>
        <div class="modalBody">
            <form action="" class="modal-form center" id="editSupplierForm" >
            <div class="form-row flex">
                    <div class="form-column ">
                        <div class="left">Brand Name <span class="required">*</span></div>
                        <input type="text" name="name" class="name" >
                    </div>
                    <div class="form-column">
                        <div class="left">Business Sector <span class="required">*</span></div>
                        <select name="sector"  class="sectors" ></select>
                    </div>
                    <div class="form-column">
                        <div class="left">Phone <span class="required">*</span></div>
                        <input type="text" name="phone" class="phone">
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="form-column">
                        <div class="left">Email</div>
                        <input type="eamil" name="email" class="email">
                    </div>
                    <div class="form-column">
                        <div class="left">P.O.Box</div>
                        <input type="tel" name="box" class="box">
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
<!-- View Supplier Modal -->
<div class="modalWrapper " style="display:none;" id="viewSupplier">
<div class="modalOuter"></div>
        <div class="modalContainer mediumContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Supplier Profile</h1>
        </div>
        <div class="modalBody"><br>
            <table style="width: 100%;" id="supplierReport">
					<tbody>
						<tr>
                            <td rowspan="8" colspan="2">
                                <img src="../images/profiles/no-profile.jpg" alt="" width="250" class="supplierPhoto">
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
                    <button class="btn btn-green printSupplier"><i class="fa fa-print"></i> Print</button>
                </div>
          </div>
        </div>
    </div>
</div>
<!-- Delete Supplier Modal -->
<div class="modalWrapper " style="display:none;" id="deleteSupplier">
        <div class="modalOuter"></div>
            <div class="modalContainer relative" style="background:white;">
            <span class="modalClose required">
            <i class="fa fa-times"></i>
            </span>
            <div class="modalHead center">
                <span class="modalTitle">Delete Supplier</h1>
            </div>
            <div class="modalBody">
            <form action="" class="modal-form center" id="deleteSupplierForm">
                <div class="">
                    <h3 class="required">Warning!!!</h3>
                    <p>
                        When you delete this Supplier all data relating to him/her will be lost.<br> Are you sure to continue?
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
<!-- Toggle Supplier Active Status Modal -->
<div class="modalWrapper " style="display:none;" id="toggleSupplierStatus">
    <div class="modalOuter"></div>
        <div class="modalContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle"><span class="newStatus"></span> Supplier</h1>
        </div>
        <div class="modalBody">
          <form action="" class="modal-form center" id="toggleSupplierStatusForm">
                <div class="">
                    <p>
                        You are about to <span class="newStatusColor"><span class="newStatus"></span></span> this supplier.<br> Are you sure to continue?
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
        $(".supplierPhotoFile").on("change", function(){
            imagePreview(this);
        })
        /* view supplier show */
        $(".viewSupplier").on("click", function(){
            $("#viewSupplier").fadeIn();
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "suppliersFetch.php",
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
                        $("#viewSupplier .username").html(response.username);
                        $("#viewSupplier .fname").html(response.fname);
                        $("#viewSupplier .oname").html(response.oname);
                        $("#viewSupplier .lname").html(response.lname);
                        $("#viewSupplier .phone").html(response.phone);
                        $("#viewSupplier .email").html(response.email);
                        $("#viewSupplier .age").html(response.age);
                        $("#viewSupplier .gender").html(response.gender);
                        $('#viewSupplier .department').html(response.department);
                        $('#viewSupplier .country').html(response.country);
                        $('#viewSupplier .region').html(response.region);
                        $('#viewSupplier .city').html(response.city);
                        $("#viewSupplier .street").html(response.street);
                        $("#viewSupplier .house").html(response.house);
                        $("#viewSupplier .landmark").html(response.landmark);
                    }
                }
            })
        })
        /* add new Supplier modal show */
        $(".newSupplier").on("click", function(){
            getCombo();
            $("#addNewSupplier").fadeIn();
        })
        /* edit Supplier modal show */
        $(".editSupplier").click(function(){
            getCombo();
            $("#editSupplier").fadeIn();
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "suppliersFetch.php",
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
                        $("#editSupplierForm .id").val(response.id);                      
                        $("#editSupplierForm .name").val(response.name);
                        $('#editSupplierForm .sectors option[value="'+response.sectorId+'"]').attr("selected", "selected");
                        $("#editSupplierForm .phone").val(response.phone);
                        $("#editSupplierForm .email").val(response.email);
                        $("#editSupplierForm .box").val(response.box);
                        $('#editSupplierForm .countries option[value="'+response.countryId+'"]').attr("selected", "selected");
                        $('#editSupplierForm .regions option[value="'+response.regionId+'"]').attr("selected", "selected");
                        $('#editSupplierForm .cities option[value="'+response.cityId+'"]').attr("selected", "selected");
                        $("#editSupplierForm .street").val(response.street);
                        $("#editSupplierForm .house").val(response.house);
                        $("#editSupplierForm .landmark").val(response.landmark);
                    }
                }
            })
        })
        /* delete Supplier modal show */
        $(".deleteSupplier").click(function(){
            $("#deleteSupplier").fadeIn();
            $("#deleteSupplier .id").val($(this).data("id"));
        })
    })
    function imagePreview(fileInput) {
        if (fileInput.files && fileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function (event) {
                $('.supplierPhoto').attr('src', event.target.result);
            };
            fileReader.readAsDataURL(fileInput.files[0]);
        }
    }
    
    /* add new Supplier */
    $(document).on('submit',"#addNewSupplierForm", function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
			url: "suppliersManage.php",
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

    /* edit Supplier */
    $("#editSupplierForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
			url: "suppliersManage.php",
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
     /* delete Supplier */
     $("#deleteSupplierForm").on('submit', function(e){
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type: "POST",
			url: "SuppliersManage.php",
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
    $('.printSupplier').on('click', function(){
        printContent("#supplierReport");
    })
</script>