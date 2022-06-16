<!-- Add New Inventory Modal -->
<div class="modalWrapper " style="display:none;" id="addNewInventory">
    <div class="modalOuter"></div>
    <div class="modalContainer largeContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Add New Item</h1>
        </div>
        <div class="modalBody">
            <form action="" class="modal-form center" id="addNewInventoryForm"  enctype="multipart/form-data">
                <div class="form-row flex">
                    <div class="form-column ">
                        <div class="left">Photo</div>
                        <img src="../images/profiles/no-profile.jpg" alt="" class="inventoryPhoto">
                        <input type="file" name="photo" class="inventoryPhotoFile" style="border: none;">
                    </div>
                    <div class="form-column">
                        <div class="left">Name/Description<span class="required">*</span></div>
                        <input type="text" name="name" class="name" >
                    </div>
                    <div class="form-column">
                        <div class="left">Alternative</div>
                        <input type="text" name="alternative" class="alternative">
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="form-column">
                        <div class="left">Serial No.<span class="required">*</span></div>
                        <input type="text" name="serial" class="serial">
                    </div>
                    <div class="form-column">
                        <div class="left">Location <span class="required">*</span></div>
                        <select name="location" class="locations" ></select>
                    </div>
                    <div class="form-column">
                        <div class="left">Shelve <span class="required">*</span></div>
                        <input type="text" name="shelve" class="shelve">
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="form-column">
                        <div class="left">Make <span class="required">*</span></div>
                        <select name="make" class="makes" ></select>
                    </div>
                    <div class="form-column">
                        <div class="left">Model</div>
                        <input type="tel" name="model" class="model">
                    </div>
                    <div class="form-column">
                        <div class="left">Available Stock <span class="required">*</span></div>
                        <input type="number" name="stock" class="stock">
                    </div>
                </div>
                <div>
                    <div class="form-column">
                        <div class="left">Unit Cost <span class="required">*</span></div>
                        <input type="number" name="cost" class="cost">
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
<!-- Edit Inventory Modal -->
<div class="modalWrapper " style="display:none;" id="editInventory">
<div class="modalOuter"></div>
    <div class="modalContainer largeContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Edit Item</h1>
        </div>
        <div class="modalBody">
            <form action="" class="modal-form center" id="editInventoryForm"  enctype="multipart/form-data">
            <div class="form-row flex">
                    <div class="form-column ">
                        <div class="left">Photo</div>
                        <img src="../images/profiles/no-profile.jpg" alt="" class="inventoryPhoto">
                        <input type="file" name="photo" class="inventoryPhotoFile" style="border: none;">
                    </div>
                    <div class="form-column">
                        <div class="left">Name/Description<span class="required">*</span></div>
                        <input type="text" name="name" class="name" >
                    </div>
                    <div class="form-column">
                        <div class="left">Alternative</div>
                        <input type="text" name="alternative" class="alternative">
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="form-column">
                        <div class="left">Serial No.<span class="required">*</span></div>
                        <input type="text" name="serial" class="serial">
                    </div>
                    <div class="form-column">
                        <div class="left">Location <span class="required">*</span></div>
                        <select name="location" class="locations" ></select>
                    </div>
                    <div class="form-column">
                        <div class="left">Shelve <span class="required">*</span></div>
                        <input type="text" name="shelve" class="shelve">
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="form-column">
                        <div class="left">Make <span class="required">*</span></div>
                        <select name="make" class="makes" ></select>
                    </div>
                    <div class="form-column">
                        <div class="left">Model</div>
                        <input type="tel" name="model" class="model">
                    </div>
                    <div class="form-column">
                        <div class="left">Available Stock <span class="required">*</span></div>
                        <input type="number" name="stock" class="stock">
                    </div>
                </div>
                <div>
                    <div class="form-column">
                        <div class="left">Unit Cost <span class="required">*</span></div>
                        <input type="number" name="cost" class="cost">
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
<!-- View Inventory Modal -->
<div class="modalWrapper " style="display:none;" id="viewInventory">
<div class="modalOuter"></div>
        <div class="modalContainer mediumContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Item Details</h1>
        </div>
        <div class="modalBody"><br>
            <table style="width: 100%;" id="inventoryReport">
					<tbody>
						<tr>
                            <td rowspan="8" colspan="2">
                                <img src="../images/inventory/no-image.jpg" alt="" width="250" class="inventoryPhoto">
                            </td>
							<td>Name: </td><td class="fg-black name"></td>
						</tr>
                        <tr>
							<td>Alternative: </td><td class="fg-black alternative"></td>
						</tr>
						<tr>
                            <td>Serial No.: </td><td class="fg-black serial"></td>
						</tr>
						<tr>
                            <td>Location </td><td class="fg-black location"></td>
						</tr>
                        <tr>
                            <td>Shelve: </td><td class="fg-black shelve"></td>
						</tr>
                        <tr>  
                            <td>Make: </td><td class="fg-black make"></td>
                        </tr>
                        <tr>  
                            <td>Available Stock: </td><td class="fg-black stock"></td>
                        </tr>
                        <tr>  
                            <td>Unit Cost: </td><td class="fg-black">GH&#8373;<span class="stock"></span></td>
                        </tr>
                        <tr>  
                            <td>Supplier: </td><td class="fg-black supplier"></td>
                        </tr>
					</tbody>
				</table><br>
                <div class="center">
                    <button class="btn btn-green printInventory"><i class="fa fa-print"></i> Print</button>
                </div>
          </div>
        </div>
    </div>
</div>
<!-- Delete Inventory Modal -->
<div class="modalWrapper " style="display:none;" id="deleteInventory">
        <div class="modalOuter"></div>
            <div class="modalContainer relative" style="background:white;">
            <span class="modalClose required">
            <i class="fa fa-times"></i>
            </span>
            <div class="modalHead center">
                <span class="modalTitle">Delete Item</h1>
            </div>
            <div class="modalBody">
            <form action="" class="modal-form center" id="deleteInventoryForm">
                <div class="">
                    <h3 class="required">Warning!!!</h3>
                    <p>
                        When you delete this Inventory all data relating to it will be lost.<br> Are you sure to continue?
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
        /* select a photo file */
        $(".inventoryPhotoFile").on("change", function(){
            imagePreview(this);
        })
        /* view inventory show */
        $(".viewInventory").on("click", function(){
            $("#viewInventory").fadeIn();
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "inventoryFetch.php",
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
                        $("#viewInventory .inventoryPhoto").attr("src","../images/inventory/"+response.photo);                      
                        $("#viewInventory .name").html(response.name);
                        $("#viewInventory .alternative").html(response.alternative);
                        $("#viewInventory .serial").html(response.serial);
                        $("#viewInventory .location").html(response.location);
                        $("#viewInventory .shelve").html(response.shelve);
                        $("#viewInventory .model").html(response.model);
                        $("#viewInventory .stock").html(response.stock);
                        $("#viewInventory .make").html(response.make);
                        $('#viewInventory .cost').html(response.cost);
                    }
                }
            })
        })
        /* add new Inventory modal show */
        $(".newInventory").on("click", function(){
            getCombo();
            $("#addNewInventory").fadeIn();
        })
        
        /* edit Inventory modal show */
        $(".editInventory").click(function(){
            getCombo();
            $("#editInventory").fadeIn();
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "inventoryFetch.php",
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
                        $("#editInventoryForm .id").val(response.id);
                        $("#editInventoryForm .inventoryPhoto").attr("src","../images/inventory/"+response.photo);                       
                        $("#editInventoryForm .name").val(response.name);
                        $("#editInventoryForm .alternative").val(response.alternative);
                        $("#editInventoryForm .serial").val(response.serial);
                        $('#editInventoryForm .locations option[value="'+response.locationId+'"]').attr("selected", "selected");
                        $("#editInventoryForm .shelve").val(response.shelve);
                        $("#editInventoryForm .model").val(response.model);
                        $("#editInventoryForm .stock").val(response.stock);
                        $('#editInventoryForm .makes option[value="'+response.makeId+'"]').attr("selected", "selected");
                        $("#editInventoryForm .cost").val(response.cost);
                    }
                }
            })
        })
        /* delete Inventory modal show */
        $(".deleteInventory").click(function(){
            $("#deleteInventory").fadeIn();
            $("#deleteInventory .id").val($(this).data("id"));
        })
    })
    function imagePreview(fileInput) {
        if (fileInput.files && fileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function (event) {
                $('.inventoryPhoto').attr('src', event.target.result);
            };
            fileReader.readAsDataURL(fileInput.files[0]);
        }
    }
    
    /* add new Inventory */
    $(document).on('submit',"#addNewInventoryForm", function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
			url: "inventoryManage.php",
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

    /* edit Inventory */
    $("#editInventoryForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
			url: "inventoryManage.php",
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
     /* delete Inventory */
     $("#deleteInventoryForm").on('submit', function(e){
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type: "POST",
			url: "InventoryManage.php",
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
    $('.printInventory').on('click', function(){
        printContent("#inventoryReport");
    })
</script>