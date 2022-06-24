<?php include 'includes/head.php' ?>

<!-- page name -->
<?php $thisPage = 'Settings' ?>

<?php include 'includes/modals/profileModals.php' ?>

<div class="layout-wrapper">
    <!-- aside -->
    <?php include 'includes/aside.php' ?>
    <!-- main content -->
    <main>
        <div class="main-wrapper">
            <!-- navigation -->
            <?php include 'includes/nav.php' ?>

            <!-- Settings -->
            <div class="box services">
                <div class="box-header">
                   <span class="box-header-dot"></span> System Settings
                </div>
                <div class="box-body relative">
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
                    </table>
                    <button class="editProfile btn btn-green" data-id="<?php echo $_SESSION['customer']?>" style="position:absolute;right:4rem;bottom:3rem;border-radius:50%;"><i class="fa fa-pen"></i></button>
                </div>
            </div>
            
            <!-- footer -->
            <?php include 'includes/footer.php' ?>
        </div>
    </main>
</div>
<!-- scripts -->
<?php include 'includes/scripts.php' ?>
<script>
$(function(){
    getCombo();
    fetchSettings()
    $(".systemLogoPhotoFile").on("change", function(){
        imagePreview(this);
    })
})
$('#settingsForm').on('submit', function(e){
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "settingsManage.php",
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
function imagePreview(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (event) {
            $('.systemLogoPhoto').attr('src', event.target.result);
        };
        fileReader.readAsDataURL(fileInput.files[0]);
    }
}

function fetchSettings(){
    $.ajax({
        type: "POST",
        url: "settingsFetch.php",
        dataType: 'json',
        success: function(response){
            if (response.type == "error"){
                notify(response.message,'','error');
            }else if(response.type == "warning"){
                notify(response.message,'','warning');
            }else if(response.type == "info"){
                notify(response.message,'','info');
            }else if(response.type == "success"){
                $('#settingsForm .systemLogoPhoto').attr("src","../images/system/"+response.logo);
                $('#settingsForm .sbname').val(response.sbname);
                $('#settingsForm .fbname').val(response.fbname);
                $('#settingsForm .phone').val(response.phone);
                $('#settingsForm .email').val(response.email);
                $('#settingsForm .pobox').val(response.pobox);
                $('#settingsForm .street').val(response.street);
                $('#settingsForm .house').val(response.house);
                $('#settingsForm .landmark').val(response.landmark);
                $('#settingsForm .countries option[value="'+response.countryId+'"]').attr("selected", "selected");
                $('#settingsForm .regions option[value="'+response.regionId+'"]').attr("selected", "selected");
                $('#settingsForm .cities option[value="'+response.cityId+'"]').attr("selected", "selected");
                $('#settingsForm .sbname').val(response.sbname);
                CKEDITOR.instances.aboutUsTextArea.setData( response.about );
            }
        }
    })
}
</script>
<!-- foot -->
<?php include 'includes/foot.php' ?>