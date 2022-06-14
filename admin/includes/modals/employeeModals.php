<!-- Add New product Modal -->
<div class="modalWrapper " style="display:none;" id="addNewProduct">
    <div class="modalContainer" style="background:white;">
        <span class="modalClose">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead">
          <h1>Add New Product</h1>
        </div>
        <div class="modalBody ">
          <br>
          <form action="" class="modal-form center" id="addNewProductForm"  enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-column">
                        <div class="left">Photo <span class="reqiured">*</span></div>
                        <input type="file" name="photo" id="" style="border: none;" >
                    </div>
                    <div class="form-column" style="width: 66%;">
                        <div class="left">Name <span class="reqiured">*</span></div>
                        <input type="text" name="name" id="" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-column">
                        <div class="left">Category <span class="reqiured">*</span></div>
                        <select name="category" id="categories" class="categories" >
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-column">
                        <div class="left">Sub Category </div>
                        <select name="subCategory" id="subCategory" class="subCategory" >
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-column">
                        <div class="left">Brand <span class="reqiured">*</span></div>
                        <select name="brand" id="brands" class="brands">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-column">
                        <div class="left">Cost Price GH&#8373; <span class="reqiured">*</span></div>
                        <input type="text" name="cost_price" id="" placeholder="0.00" >
                    </div>
                    <div class="form-column">
                        <div class="left">Market Price/Value GH&#8373; <span class="reqiured">*</span></div>
                        <input type="text" name="market_price" id="" placeholder="0.00" >
                    </div>
                    <div class="form-column">
                        <div class="left">Selling Price GH&#8373; <span class="reqiured">*</span></div>
                        <input type="text" name="selling_price" id="" placeholder="0.00" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-column">
                        <div class="left">Shipping GH&#8373; <span class="reqiured">*</span></div>
                        <input type="text" name="shipping" id="" placeholder="0.00" >
                    </div>
                    <div class="form-column">
                        <div class="left">Stock <span class="reqiured">*</span></div>
                        <input type="text" name="stock" id="" placeholder="0 stocked products will not show" >
                    </div>
                    <div class="form-column">
                        <div class="left">Vendor <span class="reqiured">*</span></div>
                        <select name="vendor" id="vendor" class="vendor">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="new">
                <div class="">
                    <div class="">Description <span class="reqiured">*</span></div>
                    <div class="center">
                        <textarea id="description" name="description" ></textarea>
                    </div>
                </div><br>
                <div>
                    <button type="submit" class="btn btn-green" id="saveNewProduct" ><i class="fa fa-save"></i> Save </button>
                    <button class="btn btn-red modalCancel"> <i class="fa fa-times"></i> Cancel </button>
                </div>
          </form>
          
        </div>
    </div>
</div>
<!-- Edit product Modal -->
<div class="modalWrapper " style="display:none;" id="editProduct">
    <div class="modalContainer" style="background:white;">
        <span class="modalClose">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead">
          <h1>Edit Product</h1>
        </div>
        <div class="modalBody">
          <br>
          <form action="" class="modal-form center" id="editProductForm"  enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-column">
                        <div class="left">Photo </div>
                        <input type="file" name="photo" id="" style="border: none;" >
                    </div>
                    <div class="form-column" style="width: 66%;">
                        <div class="left">Name <span class="reqiured">*</span></div>
                        <input type="text" name="name" id="name" class="name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-column">
                        <div class="left">Category <span class="reqiured">*</span></div>
                        <select name="category" id="categories" class="categories">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-column">
                        <div class="left">Sub Category </div>
                        <select name="subCategory" id="subCategory" class="subCategory">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-column">
                        <div class="left">Brand <span class="reqiured">*</span></div>
                        <select name="brand" id="brands" class="brands">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-column">
                        <div class="left">Cost Price GH&#8373; <span class="reqiured">*</span></div>
                        <input type="text" name="cost_price" id="cost_price" class="cost_price" placeholder="0.00" >
                    </div>
                    <div class="form-column">
                        <div class="left">Market Price/Value GH&#8373; <span class="reqiured">*</span></div>
                        <input type="text" name="market_price" id="market_price" class="market_price" placeholder="0.00" >
                    </div>
                    <div class="form-column">
                        <div class="left">Selling Price GH&#8373; <span class="reqiured">*</span></div>
                        <input type="text" name="selling_price" id="selling_price" class="selling_price" placeholder="0.00" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-column">
                        <div class="left">Shipping GH&#8373; <span class="reqiured">*</span></div>
                        <input type="text" name="shipping" id="shipping" class="shipping" placeholder="0.00" >
                    </div>
                    <div class="form-column">
                        <div class="left">Stock <span class="reqiured">*</span></div>
                        <input type="text" name="stock" id="stock" class="stock" placeholder="0 stocked products will not show" >
                    </div>
                    <div class="form-column">
                        <div class="left">Vendor <span class="reqiured">*</span></div>
                        <select name="vendor" id="vendor" class="vendor">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="edit">
                <input type="hidden" name="id" class="id hidden">
                <div class="">
                    <div class="">Description <span class="reqiured">*</span></div>
                    <div class="center">
                        <textarea id="description1" name="description" class="description"></textarea>
                    </div>
                </div><br>
                <div>
                    <button type="submit" class="btn btn-green" id="saveNewProduct" ><i class="fa fa-save"></i> Save </button>
                    <button class="btn btn-red modalCancel"> <i class="fa fa-times"></i> Cancel </button>
                </div>
          </form>
          
        </div>
    </div>
</div>
<!-- View product Modal -->
<div class="modalWrapper " style="display:none;" id="viewProduct">
    <div class="modalContainer" style="background:white;">
        <span class="modalClose">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead">
          <h1>Product Details </h1>
        </div>
        <div class="modalBody">
          <br>
          <div class="form-row">
            <div class="form-column">
                <img src="" class="photo" alt="" width="100%" id="currentImg">
				<br>
				<div class="product-images"></div>
            </div>
            <div class="form-columnx2">
            <table style="width: 100%;">
					<thead>
						<tr>
							<th colspan="4">
								<h1 style="padding-bottom: .9rem; margin: 4rem 0 2rem; border-bottom: .1rem solid #eee;margin: 1rem 0 2rem 0; font-size: 2.2rem;" class="name"></h1>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th>COST PRICE: </th><td class="">GH&#8373;<span class="cost-price"> </span></td>
							<th>MARKET PRICE: </th><td class="">GH&#8373;<span class="market-price"> </span></td>
						</tr>
                        <tr>
							<th>SELLING PRICE: </th><td class="">GH&#8373;<span class="selling-price"> </span></td>
							<th>STOCK: </th><td class=""><span class="stock"> </span></td>
						</tr>
						<tr>
                            <th>CATEGORY </th><td class=""><span class="category"> </span></td>
							<th>BRAND: </th><td class=""><span class="brand"> </span></td>
						</tr>
						<tr>
							<th>SHIPPING: </th><td class="">GH&#8373;<span class="shipping"> </span></td>
                            <th>RATTING: </th><td class=""><span class="ratting"> </span> <span>(<span class="customers"></span>)customers</span></td>
						</tr>
						<tr>
                            <th>VENDOR: </th><td class=""><span class="vendor"> </span></td>
							<th>DESCRIPTION: </th>
						</tr>
                        <tr >
                            <td colspan="4" class=""><span class="description"> </span></td>
                        </tr>
					</tbody>
				</table>
            </div>
          </div>
        </div>
    </div>
</div>
<!-- Delete Product Modal -->
<div class="modalWrapper " style="display:none;" id="deleteProduct">
    <div class="modalContainer" style="background:white;">
        <span class="modalClose">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead">
          <h1>Deleting Product</h1>
        </div>
        <div class="modalBody ">
          <br>
          <form action="" class="modal-form center" id="deleteProductForm">
                <div class="">
                    <h3 class="reqiured">Warning!!!</h3>
                    <p>
                        When you delete this product all data relating to it will be lost.<br> Are you sure to continue?
                    </p>
                    <input type="hidden" name="id" class="id hidden" id="id">
                </div>
                <input type="hidden" name="delete">
                <br>
                <div>
                    <button type="submit" class="btn btn-green" id="deleteProduct" ><i class="fa fa-check"></i> Yes </button>
                    <button class="btn btn-red modalCancel"> <i class="fa fa-times"></i> No </button>
                </div>
          </form>
          
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace( 'description' );
    CKEDITOR.replace( 'description1' );
    /*  add new product modal show */
    $(".newProduct").click(function(){
        getCombo();
        $("#addNewProduct").fadeIn();
    })
    /* delete product modal show */
    $(".deleteProduct").click(function(){
        $("#deleteProduct").fadeIn();
        $("#deleteProduct .hidden").val($(this).data("id"));
    })
    /*  view product modal show */
    $(".viewProduct").click(function(){
        $("#viewProduct").fadeIn();
        var id = $(this).data("id");
        $.ajax({
            type: "POST",
			url: "products_fetch.php",
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
                    //notify(response.subCatId,'','success');
                    $(".prodId").val(response.id);
                    $(".photo").attr("src","../admin/images/products/"+response.photo);
                    $(".name").html(response.name);
                    $('.category').html(response.category);
                    $('.brand').html(response.brand);
                    $(".cost-price").html(response.cost_price)
                    $(".market-price").html(response.market_price)
                    $(".selling-price").html(response.selling_price)
                    $(".shipping").html(response.shipping)
                    $(".stock").html(response.stock)
                    $(".description").html(response.description)
                    $('#viewProduct .vendor').html(response.vendor);
                    var catId = response.catId;
                    var subCatId = response.subCatId;
                }
            }
        })
        $.ajax({
            type: "POST",
			url: "products_fetch_imgs.php",
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
                    $(".product-images").html(response.images);
                    
                }
            }
        })
        $.ajax({
            type: "POST",
			url: "products_fetch_ratting.php",
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
                    $(".ratting").html(response.ratting);
                    $(".customers").html(response.customers);
                    //notify('response.ratting','','warning');
                    //notify(response.id,'','warning');
                    
                }
            }
        })
    })
    /*  edit product modal show*/
    $(".editProduct").click(function(){
        $("#editProduct").fadeIn();
        var id = $(this).data("id");
        $.ajax({
            type: "POST",
			url: "products_fetch.php",
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
                    //notify(response.subCatId,'','success');
                    $("#editProductForm .id").val(response.id);
                    $("#editProductForm .name").val(response.name);
                    $('#editProductForm .categories option[value="'+response.catId+'"]').attr("selected", "selected");
                    var subCategory = response.catId;
                    var subCatId = response.subCatId;
                    $.ajax({
                        type: 'POST',
                        data: {subCategory:subCategory},
                        url: 'fetch_combo.php',
                        dataType: 'json',
                        success: function(response){
                            if(response.type == "error"){
                                notify(response.message,"","error")
                            } 
                            $("#editProductForm .subCategory").html(response.subCategory);
                            $('#editProductForm .subCategory option[value="'+subCatId+'"]').attr("selected", "selected");
                        }
                    });
                    $('#editProductForm .brands option[value="'+response.banddId+'"]').attr("selected", "selected");
                    $("#editProductForm .cost_price").val(response.cost_price)
                    $("#editProductForm .market_price").val(response.market_price)
                    $("#editProductForm .selling_price").val(response.selling_price)
                    $("#editProductForm .shipping").val(response.shipping)
                    $("#editProductForm .stock").val(response.stock)
                    CKEDITOR.instances.description1.setData( response.description );
                    $('#editProductForm .vendor option[value="'+response.vendorId+'"]').attr("selected", "selected");
                    var catId = response.catId;
                    var subCatId = response.subCatId;
                }
            }
        })
    })
    /* add new product */
    $(document).on('submit',"#addNewProductForm", function(e){
        e.preventDefault();
        var description = CKEDITOR.instances.description.getData();
        $("#description").val(description);
        $.ajax({
            type: "POST",
			url: "products_edit.php",
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
                    //notify(response.message,'','success');
                    location.reload(true);
                }
            }
        })
    })
    /* edit product */
    $("#editProductForm").on('submit', function(e){
        e.preventDefault();
        var description = CKEDITOR.instances.description1.getData();
        $(".description").val(description);
        $.ajax({
            type: "POST",
			url: "products_edit.php",
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
     /* delete Sub category */
     $("#deleteProductForm").on('submit', function(e){
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type: "POST",
			url: "products_edit.php",
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
                    //notify(response.message,'','success');
                    location.reload(true);
                }
            }
        })
    })
</script>