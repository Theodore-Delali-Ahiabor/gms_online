<!-- Add New Job Modal -->
<div class="modalWrapper " style="display:none;" id="startJob">
    <div class="modalOuter"></div>
    <div class="modalContainer" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
          <span class="modalTitle">Start Work</span>
        </div>
        <div class="modalBody ">
        <form action="" class="modal-form center" id="startJobForm">
                <div class="">
                    <h3 class="fg-forestgreen">Information!!!</h3>
                        Start working on this Service request.<br>Are you sure to continue?
                    </p>
                    <input type="hidden" name="id" id="id" class="id hidden">
                </div>
                <input type="hidden" name="start"><br>
                <div>
                    <button type="submit" class="btn btn-green"><i class="fa fa-check"></i> Yes </button>
                    <button class="btn btn-red modalCancel"> <i class="fa fa-times"></i> No </button>
                </div>
          </form>
        </div>
    </div>
</div>
<!-- Complete Job Modal -->
<div class="modalWrapper " style="display:none;" id="doneJob">
    <div class="modalOuter"></div>
    <div class="modalContainer" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Complete Job</span>
        </div>
        <div class="modalBody ">
            <form action="" class="modal-form center" id="doneJobForm">
            <div class="">
                    <h3 class="fg-forestgreen">Information!!!</h3>
                        Finished working on this Service request.<br>Are you sure to continue?
                    </p>
                    <input type="hidden" name="id" id="id" class="id hidden">
                </div>
                <input type="hidden" name="done"><br>
                <div>
                    <button type="submit" class="btn btn-green" id="deleteJob" ><i class="fa fa-check"></i> Yes </button>
                    <button class="btn btn-red modalCancel"> <i class="fa fa-times"></i> No </button>
                </div>
          </form>
        </div>
    </div>
</div>

<!-- Select Services Modal -->
<div class="modalWrapper " style="display:none;" id="addServices">
    <div class="modalOuter"></div>
    <div class="modalContainer mediumContainer" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Selecting Services</span>
        </div>
        <div class="modalBody ">
            <table><br>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Cost / GHC</th>
                            <th>Select</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        try {
                            $conn = $pdo->open();
                    
                                $stmt = $conn->prepare("SELECT * FROM `services`");
                                $stmt->execute();
                                $i = 0;
                                foreach($stmt as $row){    
                                    $i ++;
                                    echo '
                                        <tr class="'.(($i%2)?'odd':"").'">
                                            <td>'.$i.'</td>
                                            <td class="left">'.$row["Name"].'</td>
                                            <td class="center">'.$row["Cost"].'</td>
                                            <td class="center service'.$row["ID"].'">
                                               <i class="fa fa-square serviceSelect btn btn-green-outline " data-id="'.$row["ID"].'"></i>
                                               <input type="hidden" value="1">
                                            </td>
                                        </tr>
                                    ';
                                }
                                $output['type'] = 'success';           
                    
                            $pdo->close();
                        } catch (PDOException $th) {
                            echo $th->getMessage();
                        }
                        ?>
                    </tbody>
                </table><br>
                <input type="hidden" class="id">
                <div class="center">
                    <button class="btn btn-green saveServices"><i class="fa fa-save"></i> Save</button>
                </div>
        </div>
    </div>
</div>
<!-- Select parts Modal -->
<div class="modalWrapper " style="display:none;" id="addParts">
    <div class="modalOuter"></div>
    <div class="modalContainer mediumContainer" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
            <span class="modalTitle">Requesting Parts</span>
        </div>
        <div class="modalBody ">
            <table><br>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Unit Cost</th>
                            <th>Available</th>
                            <th>Request Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        try {
                            $conn = $pdo->open();
                    
                                $stmt = $conn->prepare("SELECT * FROM `inventory` WHERE `Stock` > 0");
                                $stmt->execute();
                                $i = 0;
                                foreach($stmt as $row){    
                                    $i ++;
                                    echo '
                                        <tr class="'.(($i%2)?'odd':"").'">
                                            <td>'.$i.'</td>
                                            <td class="left">'.$row["Name"].'</td>
                                            <td>'.$row["UnitCost"].'</td>
                                            <td>'.$row["Stock"].'</td>
                                            <td class="center part'.$row["ID"].'">
                                                <input type="number" class="center small-input partsSelect" data-id="'.$row["ID"].'" min="0" max="'.$row["Stock"].'" value="0">
                                            </td>
                                        </tr>
                                    ';
                                }
                                $output['type'] = 'success';           
                    
                            $pdo->close();
                        } catch (PDOException $th) {
                            echo $th->getMessage();
                        }
                        ?>
                    </tbody>
                </table><br>
                <input type="hidden" class="id">
                <div class="center">
                    <button class="btn btn-green saveParts"><i class="fa fa-save"></i> Save</button>
                </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        /*  add new Job modal show */
        $(".startJob").click(function(){
            $("#startJob").fadeIn();
            var id = $(this).data("id");
            $("#startJob .id").val(id);
        })
        /* done Job modal show */
        $(".doneJob").on("click", function(){
            $("#doneJob").fadeIn();
            var id = $(this).data("id");
            $("#doneJob .id").val(id);
        })
        /*  Request Parts modal show */
        $(".addParts").click(function(){
            $("#addParts").fadeIn();
            $("#addParts .id").val($(this).data("id"));
        })
        /*  Add Services modal show */
        $(".addServices").click(function(){
            $("#addServices").fadeIn();
            $("#addServices .id").val($(this).data("id"));
        })

        /*  Delete Job modal show */
        $(".deleteJob").click(function(){
            $("#deleteJob").fadeIn();
            $("#deleteJob .id").val($(this).data("id"));
        })

        /* start Job */
        $("#startJobForm").on('submit', function(e){
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "jobsManage.php",
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
                        notify(response.message,'','success');
                        location.reload(true)
                        
                    }
                }
            })
        })
        const services =[];
        const parts =[];
        const partsQty =[];
        /* select services */
        $(".serviceSelect").on("click",function(){
            var id = $(this).data("id");
            var statVal = $(".service"+id+" input").val();
            if(statVal == 1){
                $(".service"+id+" input").val(2);
                if(!services.includes(id)){
                    services.push(id)
                    notify("Service selected succesfully","","success");
                }
            }else{
                $(".service"+id+" input").val(1);
                let position = services.indexOf(id);
                for( var i = 0; i < services.length; i++){ 
                    if ( services[i] === id) { 
                        services.splice(i, 1); 
                    }
                }
                notify("Service has been removed from list","","info");
            }
        })
        /* select parts */
        $(".partsSelect").on("change",function(){
            var id = $(this).data("id");
            var statVal =  $(this).val();
            if(statVal > 0){
                if(!parts.includes(id)){
                    parts.push(id);
                    partsQty.push(statVal);
                    notify("Part selected succesfully","","success");
                }else{
                    let position = parts.indexOf(id);
                    partsQty[position] = statVal;
                }
            }else{
                let position = parts.indexOf(id);
                for( var i = 0; i < parts.length; i++){ 
                    if ( parts[i] === id) { 
                        parts.splice(i, 1); 
                        partsQty.splice(i, 1);
                    }
                }
                notify("Part has been removed from list","","info");
            }
            
        })
        /* Save selected services */
        $(".saveServices").on("click", function(){
            var data = services;
            var id =  $("#addServices .id").val();
            if(data.length >0){
                $.ajax({
                    type: "POST",
                    url: "jobsManage.php",
                    data: {data:data,services:"",id:id},
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
            }else{
                notify("No services selected",'','info');
            }
        })
        /* Save selected parts */
        $(".saveParts").on("click", function(){
            var idData = parts;
            var qtyData = partsQty;
            var id =  $("#addParts .id").val();
            if(idData.length >0){
                $.ajax({
                    type: "POST",
                    url: "jobsManage.php",
                    data: {idData:idData,qtyData:qtyData,parts:"",id:id},
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
            }else{
                notify("No parts selected",'','info');
            }
        })
    /* Done Job */
        $("#doneJobForm").on('submit', function(e){
            e.preventDefault();
            var data = $(this).serialize();
            notify(data,"","info")
            $.ajax({
                type: "POST",
                url: "jobsManage.php",
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
                        notify(response.message,'','success');
                        location.reload(true)
                        
                    }
                }
            })
        })
    /* delete Job */
    $(document).on('submit',"#deleteJobForm", function(e){
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "jobsManage.php",
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

/* Fetch all jobs function */
function fetchJobs(){
    $.ajax({
        type: "POST",
        url: "jobsFetch.php",
        dataType: 'json',
        success: function(response){
            if (response.type == "error"){
                notify(response.message,'','error');
            }else if(response.type == "warning"){
                notify(response.message,'','warning');
            }else if(response.type == "info"){
                notify(response.message,'','info');
            }else if(response.type == "success"){
                $("#jobsBody").html(response.jobs);
            }
        }
    })
}

</script>