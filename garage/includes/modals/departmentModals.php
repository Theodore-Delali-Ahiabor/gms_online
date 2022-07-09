<!-- Add New Department Modal -->
<div class="modalWrapper " style="display:none;" id="addNewDepartment">
    <div class="modalOuter"></div>
    <div class="modalContainer" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
          <span class="modalTitle">Add New Department</span>
        </div>
        <div class="modalBody ">
          <form action="" class="modal-form center" id="addNewDepartmentForm">
                <div class="form-input">
                    <div class="left">Name <span class="required">*</span></div>
                    <input type="text" name="name" placeholder="" required>
                </div>
                    <input type="hidden" name="add">
                <br><br>
                <div>
                    <button type="submit" class="btn btn-green"><i class="fa fa-save"></i> Save </button>
                    <button type="reset" class="btn btn-red modalCancel"> <i class="fa fa-times"></i> Cancel </button>
                </div>
          </form>
          
        </div>
    </div>
</div>
<!-- Edit Department Modal -->
<div class="modalWrapper " style="display:none;" id="editDepartment">
    <div class="modalOuter"></div>
    <div class="modalContainer" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Edit Department</span>
        </div>
        <div class="modalBody ">
            <form action="" class="modal-form center" id="editDepartmentForm">
                <div class="form-input">
                    <div class="left">Name <span class="required">*</span></div>
                    <input type="text" name="name" id="name" class="name" placeholder="" required>
                    <input type="hidden" name="id" id="id" class="id hidden">
                </div>
                <br><br>
                <input type="hidden" name="edit">
                <br>
                <div>
                    <button type="submit" class="btn btn-green" ><i class="fa fa-pen"></i> Update </button>
                    <button class="btn btn-red modalCancel"> <i class="fa fa-times"></i> Cancel </button>
                </div>
          </form>
        </div>
    </div>
</div>

<!-- Delete Department Modal -->
<div class="modalWrapper " style="display:none;" id="deleteDepartment">
    <div class="modalOuter"></div>
    <div class="modalContainer" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Deleting Department</span>
        </div>
        <div class="modalBody ">
          <form action="" class="modal-form center" id="deleteDepartmentForm">
                <div class="">
                    <h3 class="required">Warning!!!</h3>
                    <p>
                        When you delete this Department all data relating to it will be lost.<br> Are you sure to continue?
                    </p>
                    <input type="hidden" name="id" id="id" class="id hidden">
                </div>
                <input type="hidden" name="delete">
                <div>
                    <button type="submit" class="btn btn-green" id="deleteDepartment" ><i class="fa fa-check"></i> Yes </button>
                    <button class="btn btn-red modalCancel"> <i class="fa fa-times"></i> No </button>
                </div>
          </form>
          
        </div>
    </div>
</div>
<script>
    $(function(){
    /*  add new Department modal show */
    $(".newDepartment").click(function(){
        $("#addNewDepartment").fadeIn();
    })
    /* edit Department modal show */
    $(document).on("click", ".editDepartment", function(){
        $("#editDepartment").fadeIn();
        var id = $(this).data("id");
        $.ajax({
            type: "POST",
            url: "departmentsFetch.php",
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
                    $("#editDepartmentForm .id").val(response.id)
                    $('#editDepartmentForm .name').val(response.name);
                }
            }
        })
    })

    /*  Delete Department modal show */
    $(".deleteDepartment").click(function(){
        $("#deleteDepartment").fadeIn();
        $("#deleteDepartment .id").val($(this).data("id"));
    })

    /* add new Department */
    $("#addNewDepartmentForm").on('submit', function(e){
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "departmentsManage.php",
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
                    location.reload(true)
                    
                }
            }
        })
    })

    /* edit Department */
    $(document).on('submit',"#editDepartmentForm", function(e){
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "departmentsManage.php",
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

    /* delete Department */
    $(document).on('submit',"#deleteDepartmentForm", function(e){
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "departmentsManage.php",
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
}) 

/* Fetch all departments function */
function fetchDepartments(){
    $.ajax({
        type: "POST",
        url: "departmentsFetch.php",
        dataType: 'json',
        success: function(response){
            if (response.type == "error"){
                notify(response.message,'','error');
            }else if(response.type == "warning"){
                notify(response.message,'','warning');
            }else if(response.type == "info"){
                notify(response.message,'','info');
            }else if(response.type == "success"){
                $("#departmentsBody").html(response.departments);
            }
        }
    })
}

</script>