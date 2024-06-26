$(function(){
    /* Aside toggle */
    $(".aside-show").click( function(){
        $("aside").css("left", "0");
        $("aside").css("transition", " all .4s ease-in");
        $(".aside-hide").css("display", "block")
    })
    $(".aside-hide").click( function(){
        $("aside").css("left", "-24rem");
        $("aside").css("transition", " all .4s ease-out");
        $(".aside-hide").css("display", "none")
    })
    /* Nav Dropdown */
    $('.user').click(function(){
        $('.user-dropdown').toggle();
    })
    $('.user').mouseover(function(){
        $('.user-dropdown').show();
    })
    $('.user-dropdown').mouseleave(function(){
        $('.user-dropdown').hide();
    })
    $('body').click(function(){
        if($('.user-dropdown').show()){
            $('.user-dropdown').hide();
        }
    })
    
    /*  close any visible modals */
    $(".modalClose").click(function(){
        $(".modalWrapper").fadeOut();
    })
     /*  close any visible modals */
     $(".modalCancel").click(function(){
        $(".modalWrapper").fadeOut();
    })
    /*  close any visible modals */
    $(".modalOuter").click(function(){
        $(".modalWrapper").fadeOut();
    })

    /* Tables */
    $("#testTable").DataTable();
    $("#employeesTable").DataTable();
    $("#departmentsTable").DataTable();
    $("#customersTable").DataTable();
    $("#automobilesTable").DataTable();
    $("#inventoryTable").DataTable();
    $("#suppliersTable").DataTable();
    $("#jobsTable").DataTable();
    $("#requestsTable").DataTable();
    /* toggle pickup address visibility */
    $(".types").change(function(){
        var type = $(this).val();
        if(type == 1){
            $(".pickup").removeClass('hidden');
        }else{
            $(".pickup").addClass('hidden');
        }
    })
    /* fetch Regions */
    $(".countries").change(function(){
        var countryId = $(this).val();
        getRegions(countryId)
        
    })
    /* fetch Cities */
    $(".regions").change(function(){
        var regionId = $(this).val();
        getCities(regionId);
    })
})
/* fetch Regions and fill respective combo box */
function getRegions(countryId){
        $.ajax({
        type: 'POST',
        data: {countryId:countryId},
        url: 'fetch_combo.php',
        dataType: 'json',
        success: function(response){
            if(response.type == "error"){
                notify(response.message,"","error")
            }else if(response.type == "warning"){
                notify(response.message,"","warning")
            }else if(response.type == "success"){
                $(".regions").html(response.regions);
            }
        }
    });
}
/* fetch Cities and fill respective combo box  */
function getCities(regionId){
    $.ajax({
        type: 'POST',
        data: {regionId:regionId},
        url: 'fetch_combo.php',
        dataType: 'json',
        success: function(response){
            if(response.type == "error"){
                notify(response.message,"","error")
            }else if(response.type == "warning"){
                notify(response.message,"","warning")
            }else if(response.type == "success"){
                $(".cities").html(response.cities);
            }
        }
    });
}
/* Fetch and fill combo boxes with their respective options */
function getCombo(){
    $.ajax({
        type: 'POST',
        url: 'fetch_combo.php',
        dataType: 'json',
        success: function(response){
            if(response.type == "error"){
                notify(response.message,"","error")
            }else if(response.type == "warning"){
                notify(response.message,"","warning")
            }else if(response.type == "success"){
                $(".countries").html(response.countries);
                $(".regions").html(response.regions);
                $(".cities").html(response.cities);
                $(".genders").html(response.genders);
                $(".departments").html(response.departments);
                $(".relationships").html(response.relationships);
                $(".categories").html(response.categories);
                $(".makes").html(response.makes);
                $(".fuels").html(response.fuels);
                $(".locations").html(response.locations);
                $(".sectors").html(response.sectors);
                $(".statuses").html(response.statuses);
                $(".types").html(response.types);
            }
        }
    });
}
/* fetch request related parts */
function getParts(){

}
/* fetch request related services */
function getServices(array,id){
    console.log("services="+array);
    console.log("id="+id);
}

/* print anyting */
function printContent(page){
    var fullPage = $("body").html();
    var printContent = $(page).html();
    $("body").html(printContent);
    window.print(); 
    $("body").html(fullPage);
}