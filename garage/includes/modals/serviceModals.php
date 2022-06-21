<!-- Add New Service Modal -->
<div class="modalWrapper " style="display:none;" id="addNewService">
    <div class="modalOuter"></div>
    <div class="modalContainer meduimContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Add New Item</h1>
        </div>
        <div class="modalBody">
            <form action="" class="modal-form center" id="addNewServiceForm"  enctype="multipart/form-data">
                <div class="form-row flex">
                    <div class="form-column ">
                        <div class="left">Photo</div>
                        <img src="../images/system/no-image.jpg" alt="" class="servicePhoto">
                        <input type="file" name="photo" class="servicePhotoFile" style="border: none;">
                    </div>
                    <div class="form-column">
                        <div class="left">Name<span class="required">*</span></div>
                        <input type="text" name="name" class="name" >
                    </div>
                    <div class="form-column">
                        <div class="left">Cost GH<span class="required">*</span></div>
                        <input type="number" name="cost" class="cost">
                    </div>
                </div>
                <div class="form-row flex center">
                    <div>
                        <div class="left">Description <span class="required">*</span></div>
                        <textarea type="text" name="description" class="description" rows="3" cols="63"></textarea>
                    </div>
                </div>
                
                <input type="hidden" name="add">
                <div>
                    <button type="submit" class="btn btn-green"><i class="fa fa-save"></i> Save </button>
                    <button type="reset" class="btn btn-red modalCancel"> <i class="fa fa-times"></i> Cancel </button>
                </div>
          </form>
        </div>
    </div>
</div>
<!-- Edit Service Modal -->
<div class="modalWrapper " style="display:none;" id="editService">
<div class="modalOuter"></div>
    <div class="modalContainer largeContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Edit Item</h1>
        </div>
        <div class="modalBody">
            <form action="" class="modal-form center" id="editServiceForm"  enctype="multipart/form-data">
            <div class="form-row flex">
                    <div class="form-column ">
                        <div class="left">Photo</div>
                        <img src="../images/system/no-image.jpg" alt="" class="servicePhoto">
                        <input type="file" name="photo" class="servicePhotoFile" style="border: none;">
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
<!-- View Service Modal -->
<div class="modalWrapper " style="display:none;" id="viewService">
<div class="modalOuter"></div>
        <div class="modalContainer mediumContainer relative" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Item Details</h1>
        </div>
        <div class="modalBody"><br>
            <table style="width: 100%;" id="serviceReport">
					<tbody>
						<tr>
                            <td rowspan="8" colspan="2">
                                <img src="../images/system/no-image.jpg" alt="" width="250" class="servicePhoto">
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
                    <button class="btn btn-green printService"><i class="fa fa-print"></i> Print</button>
                </div>
          </div>
        </div>
    </div>
</div>
<!-- Delete Service Modal -->
<div class="modalWrapper " style="display:none;" id="deleteService">
        <div class="modalOuter"></div>
            <div class="modalContainer relative" style="background:white;">
            <span class="modalClose required">
            <i class="fa fa-times"></i>
            </span>
            <div class="modalHead center">
                <span class="modalTitle">Delete Item</h1>
            </div>
            <div class="modalBody">
            <form action="" class="modal-form center" id="deleteServiceForm">
                <div class="">
                    <h3 class="required">Warning!!!</h3>
                    <p>
                        When you delete this Service all data relating to it will be lost.<br> Are you sure to continue?
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
        $(".servicePhotoFile").on("change", function(){
            imagePreview(this);
        })
        /* view service show */
        $(".viewService").on("click", function(){
            $("#viewService").fadeIn();
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "serviceFetch.php",
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
                        $("#viewService .servicePhoto").attr("src","../images/service/"+response.photo);                      
                        $("#viewService .name").html(response.name);
                        $("#viewService .alternative").html(response.alternative);
                        $("#viewService .serial").html(response.serial);
                        $("#viewService .location").html(response.location);
                        $("#viewService .shelve").html(response.shelve);
                        $("#viewService .model").html(response.model);
                        $("#viewService .stock").html(response.stock);
                        $("#viewService .make").html(response.make);
                        $('#viewService .cost').html(response.cost);
                        $('#viewService .supplier').html(response.supplier);
                    }
                }
            })
        })
        /* add new Service modal show */
        $(".newService").on("click", function(){
            getCombo();
            $("#addNewService").fadeIn();
        })
        /* add supplier to Automobile show */
        $(".addSupplier").click(function(){
            $("#addSupplier").fadeIn();
            $("#addSupplier .itemId").val($(this).data("id"));
        })
        /* edit Service modal show */
        $(".editService").click(function(){
            getCombo();
            $("#editService").fadeIn();
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "serviceFetch.php",
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
                        $("#editServiceForm .id").val(response.id);
                        $("#editServiceForm .servicePhoto").attr("src","../images/service/"+response.photo);                       
                        $("#editServiceForm .name").val(response.name);
                        $("#editServiceForm .alternative").val(response.alternative);
                        $("#editServiceForm .serial").val(response.serial);
                        $('#editServiceForm .locations option[value="'+response.locationId+'"]').attr("selected", "selected");
                        $("#editServiceForm .shelve").val(response.shelve);
                        $("#editServiceForm .model").val(response.model);
                        $("#editServiceForm .stock").val(response.stock);
                        $('#editServiceForm .makes option[value="'+response.makeId+'"]').attr("selected", "selected");
                        $("#editServiceForm .cost").val(response.cost);
                    }
                }
            })
        })
        /* delete Service modal show */
        $(".deleteService").click(function(){
            $("#deleteService").fadeIn();
            $("#deleteService .id").val($(this).data("id"));
        })
    })
    function imagePreview(fileInput) {
        if (fileInput.files && fileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function (event) {
                $('.servicePhoto').attr('src', event.target.result);
            };
            fileReader.readAsDataURL(fileInput.files[0]);
        }
    }
    
    /* add new Service */
    $(document).on('submit',"#addNewServiceForm", function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
			url: "serviceManage.php",
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

    /* edit Service */
    $("#editServiceForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
			url: "serviceManage.php",
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
    /* Add supplier to Service item */
    $(".supplierSelect").on('click', function(e){
        e.preventDefault();
        var supplierId = $(this).data('id');
        var itemId = $("#addSupplier .itemId").val();
        $.ajax({
            type: "POST",
			url: "serviceManage.php",
			data: {supplierId:supplierId,itemId:itemId},
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
     /* delete Service */
     $("#deleteServiceForm").on('submit', function(e){
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type: "POST",
			url: "ServiceManage.php",
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
    $('.printService').on('click', function(){
        printContent("#serviceReport");
    })
</script>