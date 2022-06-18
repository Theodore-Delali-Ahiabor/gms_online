<!-- Add New Employee Modal -->
<div class="modalWrapper " style="display:none;" id="addNewEmployee">
    <div class="modalOuter"></div>
    <div class="modalContainer largeContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Add New Employee</h1>
        </div>
        <div class="modalBody">
            <form action="" class="modal-form center" id="addNewEmployeeForm"  enctype="multipart/form-data">
                <div class="form-row flex">
                    <div class="form-column ">
                        <div class="left">Photo</div>
                        <img src="../images/profiles/no-profile.jpg" alt="" class="employeePhoto">
                        <input type="file" name="photo" class="employeePhotoFile" style="border: none;">
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
<!-- Edit Employee Modal -->
<div class="modalWrapper " style="display:none;" id="editEmployee">
<div class="modalOuter"></div>
    <div class="modalContainer largeContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Edit Employee</h1>
        </div>
        <div class="modalBody">
            <form action="" class="modal-form center" id="editEmployeeForm"  enctype="multipart/form-data">
                <div class="form-row flex">
                    <div class="form-column ">
                        <div class="left">Photo</div>
                        <img src="../images/profiles/no-profile.jpg" alt="" class="employeePhoto">
                        <input type="file" name="photo" class="employeePhotoFile" style="border: none;">
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
                    <button type="submit" class="btn btn-green"><i class="fa fa-save"></i> Update </button>
                    <button type="reset" class="btn btn-red modalCancel"> <i class="fa fa-times"></i> Cancel </button>
                </div>
          </form>
        </div>
    </div>
</div>
<!-- View Employee Modal -->
<div class="modalWrapper " style="display:none;" id="viewEmployee">
<div class="modalOuter"></div>
        <div class="modalContainer mediumContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Employee Profile</h1>
        </div>
        <div class="modalBody"><br>
            <table style="width: 100%;" id="employeeReport">
					<tbody>
						<tr>
                            <td rowspan="8" colspan="2">
                                <img src="../images/profiles/no-profile.jpg" alt="" width="250" class="employeePhoto">
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
                    <button class="btn btn-green printEmployee"><i class="fa fa-print"></i> Print</button>
                </div>
          </div>
        </div>
    </div>
</div>
<!-- Delete Employee Modal -->
<div class="modalWrapper " style="display:none;" id="deleteEmployee">
        <div class="modalOuter"></div>
            <div class="modalContainer relative" style="background:white;">
            <span class="modalClose required">
            <i class="fa fa-times"></i>
            </span>
            <div class="modalHead center">
                <span class="modalTitle">Delete Employee</h1>
            </div>
            <div class="modalBody">
            <form action="" class="modal-form center" id="deleteEmployeeForm">
                <div class="">
                    <h3 class="required">Warning!!!</h3>
                    <p>
                        When you delete this Employee all data relating to him/her will be lost.<br> Are you sure to continue?
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
<!-- Toggle Employee Active Status Modal -->
<div class="modalWrapper " style="display:none;" id="toggleEmployeeStatus">
    <div class="modalOuter"></div>
        <div class="modalContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle"><span class="newStatus"></span> Employee</h1>
        </div>
        <div class="modalBody">
          <form action="" class="modal-form center" id="toggleEmployeeStatusForm">
                <div class="">
                    <p>
                        You are about to <span class="newStatusColor"><span class="newStatus"></span></span> this employee.<br> Are you sure to continue?
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
        $(".employeePhotoFile").on("change", function(){
            imagePreview(this);
        })
        /* view employee show */
        $(".viewEmployee").on("click", function(){
            $("#viewEmployee").fadeIn();
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "employeesFetch.php",
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
                        $("#viewEmployee .employeePhoto").attr("src","../images/Profiles/"+response.photo);                      
                        $("#viewEmployee .username").html(response.username);
                        $("#viewEmployee .fname").html(response.fname);
                        $("#viewEmployee .oname").html(response.oname);
                        $("#viewEmployee .lname").html(response.lname);
                        $("#viewEmployee .phone").html(response.phone);
                        $("#viewEmployee .email").html(response.email);
                        $("#viewEmployee .age").html(response.age);
                        $("#viewEmployee .gender").html(response.gender);
                        $('#viewEmployee .department').html(response.department);
                        $('#viewEmployee .country').html(response.country);
                        $('#viewEmployee .region').html(response.region);
                        $('#viewEmployee .city').html(response.city);
                        $("#viewEmployee .street").html(response.street);
                        $("#viewEmployee .house").html(response.house);
                        $("#viewEmployee .landmark").html(response.landmark);
                        $("#viewEmployee .position").html(response.position);
                        $('#viewEmployee .relationship').html(response.relationship);
                        $("#viewEmployee .salary").html(response.salary);
                        $("#viewEmployee .status").html(response.status);
                        $("#viewEmployee .created").html(response.dateCreated);
                        $("#viewEmployee .modified").html(response.lastModified);
                    }
                }
            })
        })
        /* add new Employee modal show */
        $(".newEmployee").on("click", function(){
            getCombo();
            $("#addNewEmployee").fadeIn();
        })
        /* toggle Employee Status show */
        $(".toggleEmployeeStatus").click(function(){
            $("#toggleEmployeeStatus").fadeIn();
            var id = $(this).data("id");
            var status = $(this).data("status");
            if(status == 1){
                $(".newStatus").html("Deactivate");
                $(".newStatusColor").removeClass("fg-forestgreen");
                $(".newStatusColor").addClass("fg-crimson");
                $("#toggleEmployeeStatusForm .id").val(id);
                $("#toggleEmployeeStatusForm .status").val(0);
            }else{
                $(".newStatus").html("Activate");
                $(".newStatusColor").addClass("fg-forestgreen");
                $(".newStatusColor").removeClass("fg-crimson");
                $("#toggleEmployeeStatusForm .id").val(id);
                $("#toggleEmployeeStatusForm .status").val(1);
            }
        })
        /* edit Employee modal show */
        $(".editEmployee").click(function(){
            getCombo();
            $("#editEmployee").fadeIn();
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "employeesFetch.php",
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
                        $("#editEmployeeForm .id").val(response.id);
                        $("#editEmployeeForm .employeePhoto").attr("src","../images/Profiles/"+response.photo);                       
                        $("#editEmployeeForm .fname").val(response.fname);
                        $("#editEmployeeForm .oname").val(response.oname);
                        $("#editEmployeeForm .lname").val(response.lname);
                        $("#editEmployeeForm .phone").val(response.phone);
                        $("#editEmployeeForm .email").val(response.email);
                        $("#editEmployeeForm .birthdate").val(response.birthdate);
                        $('#editEmployeeForm .genders option[value="'+response.genderId+'"]').attr("selected", "selected");
                        $('#editEmployeeForm .departments option[value="'+response.departmentId+'"]').attr("selected", "selected");
                        $('#editEmployeeForm .countries option[value="'+response.countryId+'"]').attr("selected", "selected");
                        $('#editEmployeeForm .regions option[value="'+response.regionId+'"]').attr("selected", "selected");
                        $('#editEmployeeForm .cities option[value="'+response.cityId+'"]').attr("selected", "selected");
                        $("#editEmployeeForm .street").val(response.street);
                        $("#editEmployeeForm .house").val(response.house);
                        $("#editEmployeeForm .landmark").val(response.landmark);
                        $("#editEmployeeForm .position").val(response.position);
                        $('#editEmployeeForm .relationships option[value="'+response.relationshipId+'"]').attr("selected", "selected");
                        $("#editEmployeeForm .salary").val(response.salary);
                    }
                }
            })
        })
        /* delete Employee modal show */
        $(".deleteEmployee").click(function(){
            $("#deleteEmployee").fadeIn();
            $("#deleteEmployee .id").val($(this).data("id"));
        })
    })
    function imagePreview(fileInput) {
        if (fileInput.files && fileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function (event) {
                $('.employeePhoto').attr('src', event.target.result);
            };
            fileReader.readAsDataURL(fileInput.files[0]);
        }
    }
    
    /* add new Employee */
    $(document).on('submit',"#addNewEmployeeForm", function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
			url: "employeesManage.php",
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

    /* edit Employee */
    $("#editEmployeeForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
			url: "EmployeesManage.php",
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
     /* delete Employee */
     $("#deleteEmployeeForm").on('submit', function(e){
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type: "POST",
			url: "EmployeesManage.php",
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
    /* Toggle Employee Status */
    $("#toggleEmployeeStatusForm").on('submit', function(e){
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type: "POST",
			url: "EmployeesManage.php",
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
    $('.printEmployee').on('click', function(){
        printContent("#employeeReport");
    })
    
</script>
</script>