<!-- Add New Profile Modal -->
<div class="modalWrapper " style="display:none;" id="addNewProfile">
    <div class="modalOuter"></div>
    <div class="modalContainer largeContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Add New Profile</h1>
        </div>
        <div class="modalBody">
            <form action="" class="modal-form center" id="addNewProfileForm"  enctype="multipart/form-data">
                <div class="form-row flex">
                    <div class="form-column ">
                        <div class="left">Photo</div>
                        <img src="../images/profiles/no-profile.jpg" alt="" class="profilePhoto">
                        <input type="file" name="photo" class="profilePhotoFile" style="border: none;">
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
<!-- Edit Profile Modal -->
<div class="modalWrapper " style="display:none;" id="editProfile">
<div class="modalOuter"></div>
    <div class="modalContainer largeContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Edit Profile</h1>
        </div>
        <div class="modalBody">
            <form action="" class="modal-form center" id="editProfileForm"  enctype="multipart/form-data">
                <div class="form-row flex">
                    <div class="form-column ">
                        <div class="left">Photo</div>
                        <img src="../images/profiles/no-profile.jpg" alt="" class="profilePhoto">
                        <input type="file" name="photo" class="profilePhotoFile" style="border: none;">
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
<!-- View Profile Modal -->
<div class="modalWrapper " style="display:none;" id="viewProfile">
<div class="modalOuter"></div>
        <div class="modalContainer mediumContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Profile Profile</h1>
        </div>
        <div class="modalBody"><br>
            <table style="width: 100%;" id="profileReport">
					<tbody>
						<tr>
                            <td rowspan="8" colspan="2">
                                <img src="../images/profiles/no-profile.jpg" alt="" width="250" class="profilePhoto">
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
                    <button class="btn btn-green printProfile"><i class="fa fa-print"></i> Print</button>
                </div>
          </div>
        </div>
    </div>
</div>
<!-- Delete Profile Modal -->
<div class="modalWrapper " style="display:none;" id="deleteProfile">
        <div class="modalOuter"></div>
            <div class="modalContainer relative" style="background:white;">
            <span class="modalClose required">
            <i class="fa fa-times"></i>
            </span>
            <div class="modalHead center">
                <span class="modalTitle">Delete Profile</h1>
            </div>
            <div class="modalBody">
            <form action="" class="modal-form center" id="deleteProfileForm">
                <div class="">
                    <h3 class="required">Warning!!!</h3>
                    <p>
                        When you delete this Profile all data relating to him/her will be lost.<br> Are you sure to continue?
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
<!-- Toggle Profile Active Status Modal -->
<div class="modalWrapper " style="display:none;" id="toggleProfileStatus">
    <div class="modalOuter"></div>
        <div class="modalContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle"><span class="newStatus"></span> Profile</h1>
        </div>
        <div class="modalBody">
          <form action="" class="modal-form center" id="toggleProfileStatusForm">
                <div class="">
                    <p>
                        You are about to <span class="newStatusColor"><span class="newStatus"></span></span> this profile.<br> Are you sure to continue?
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
        $(".profilePhotoFile").on("change", function(){
            imagePreview(this);
        })
        /* view profile show */
        $(".viewProfile").on("click", function(){
            $("#viewProfile").fadeIn();
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "profilesFetch.php",
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
                        $("#viewProfile .profilePhoto").attr("src","../images/Profiles/"+response.photo);                      
                        $("#viewProfile .username").html(response.username);
                        $("#viewProfile .fname").html(response.fname);
                        $("#viewProfile .oname").html(response.oname);
                        $("#viewProfile .lname").html(response.lname);
                        $("#viewProfile .phone").html(response.phone);
                        $("#viewProfile .email").html(response.email);
                        $("#viewProfile .age").html(response.age);
                        $("#viewProfile .gender").html(response.gender);
                        $('#viewProfile .department').html(response.department);
                        $('#viewProfile .country').html(response.country);
                        $('#viewProfile .region').html(response.region);
                        $('#viewProfile .city').html(response.city);
                        $("#viewProfile .street").html(response.street);
                        $("#viewProfile .house").html(response.house);
                        $("#viewProfile .landmark").html(response.landmark);
                        $("#viewProfile .position").html(response.position);
                        $('#viewProfile .relationship').html(response.relationship);
                        $("#viewProfile .salary").html(response.salary);
                    }
                }
            })
        })
        /* edit Profile modal show */
        $(".editProfile").click(function(){
            getCombo();
            $("#editProfile").fadeIn();
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "profilesFetch.php",
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
                        $("#editProfileForm .id").val(response.id);
                        $("#editProfileForm .profilePhoto").attr("src","../images/Profiles/"+response.photo);                       
                        $("#editProfileForm .fname").val(response.fname);
                        $("#editProfileForm .oname").val(response.oname);
                        $("#editProfileForm .lname").val(response.lname);
                        $("#editProfileForm .phone").val(response.phone);
                        $("#editProfileForm .email").val(response.email);
                        $("#editProfileForm .birthdate").val(response.birthdate);
                        $('#editProfileForm .genders option[value="'+response.genderId+'"]').attr("selected", "selected");
                        $('#editProfileForm .departments option[value="'+response.departmentId+'"]').attr("selected", "selected");
                        $('#editProfileForm .countries option[value="'+response.countryId+'"]').attr("selected", "selected");
                        $('#editProfileForm .regions option[value="'+response.regionId+'"]').attr("selected", "selected");
                        $('#editProfileForm .cities option[value="'+response.cityId+'"]').attr("selected", "selected");
                        $("#editProfileForm .street").val(response.street);
                        $("#editProfileForm .house").val(response.house);
                        $("#editProfileForm .landmark").val(response.landmark);
                        $("#editProfileForm .position").val(response.position);
                        $('#editProfileForm .relationships option[value="'+response.relationshipId+'"]').attr("selected", "selected");
                        $("#editProfileForm .salary").val(response.salary);
                    }
                }
            })
        })
    })
    function imagePreview(fileInput) {
        if (fileInput.files && fileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function (event) {
                $('.profilePhoto').attr('src', event.target.result);
            };
            fileReader.readAsDataURL(fileInput.files[0]);
        }
    }
    

    /* edit Profile */
    $("#editProfileForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
			url: "profilesManage.php",
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
    $('.printProfile').on('click', function(){
        printContent("#profileReport");
    })
</script>