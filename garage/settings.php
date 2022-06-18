<!-- session -->
<?php include 'includes/session.php'; ?>
<!-- head -->
<?php include 'includes/head.php' ?>

<!-- page name -->
<?php $thisPage = 'Settings' ?>

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
                <div class="box-body">
                    <form action="" class="modal-form center" id="settingsForm"  enctype="multipart/form-data">
                        
                        <div class="relative">
                            <div class="center bold">System Logo <span class="required">*</span></div>
                            <img src="../images/system/no-image.jpg" alt="" class="systemLogoPhoto box" width="200" style="border-radius:50%;padding:0;">
                            <div class="center">
                                <input type="file" name="photo" class="systemLogoPhotoFile center" style="border: none;">
                            </div>
                        </div>
                        <div class="form-row flex">
                            
                            <div class="form-column">
                                <div class="left">Short Brand Name <span class="required">*</span></div>
                                <input type="text" name="sbname" class="sbname">
                            </div>
                            <div class="form-columnx2">
                                <div class="left">Full Brand Name <span class="required">*</span></div>
                                <input type="text" name="fbname" class="fbname">
                            </div>
                        </div>
                        <div class="form-row flex">
                            <div class="form-column">
                                <div class="left">Phone<span class="required">*</span></div>
                                <input type="text" name="phone" class="phone">
                            </div>
                            <div class="form-column">
                                <div class="left">Email <span class="required">*</span></div>
                                <input type="email" name="email" class="email">
                            </div>
                            <div class="form-column">
                                <div class="left">P.O.Box</div>
                                <input type="text" name="pobox"  class="pobox" >
                            </div>
                        </div>
                        <div class="form-row flex">
                        <div class="form-column">
                                <div class="left">Country <span class="required">*</span></div>
                                <select name="country"  class="countries"></select>
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
                        <div class="form-row"><br>
                        <div class="center">About Us <span class="required">*</span></div>
                            <textarea name="about" id="aboutUsTextArea" cols="90" rows="10" class="aboutUsTextArea" ></textarea>
                        </div>
                        <?php 
                            try {
                                $conn = $pdo->open();
                        
                                $stmt = $conn->prepare("SELECT *, COUNT(*) AS `numrows` FROM `garage` ");
                                $stmt->execute();
                                $row = $stmt->fetch();  
                    
                        ?>
                            <input type="hidden" name="<?php echo ($row['numrows']>0)?'edit':'add' ?>">
                        
                        <?php
                            $pdo->close();
                            } catch (PDOException $th) {
                                echo $th->getMessage();
                            }
                        ?>
                        <br>
                        <div>
                            <button type="submit" class="btn btn-green"><i class="fa fa-save"></i> Update </button>
                            <button type="reset" class="btn btn-red modalCancel"> <i class="fa fa-times"></i> Cancel </button>
                        </div>
                    </form>
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
    /* CKEditors */
    CKEDITOR.replace('aboutUsTextArea');
})
$('#settingsForm').on('submit', function(e){
    e.preventDefault();
    var aboutUs = CKEDITOR.instances.aboutUsTextArea.getData();
    $('.aboutUsTextArea').val(aboutUs);
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