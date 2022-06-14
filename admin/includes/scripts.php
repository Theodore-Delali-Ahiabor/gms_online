<!-- notify js -->
<script src="../assets/js/notify.js"></script>

<!-- DataTables -->
<script src="../assets/DataTables/datatables.min.js"></script>

<script>
    $(document).ready( function(){
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
    $('body').click(function(){
        if($('.user-dropdown').show()){
            $('.user-dropdown').hide();
        }
    })
    
    /* Tables */
    $("#testTable").DataTable();
    $("#employeesTable").DataTable();

    /* signin form */
    $('#signinForm').submit(function(e){
        e.preventDefault();
        var auth = $(this).serialize();
        
        //notify(auth,"","info");
        $.ajax({
            type: "POST",
            url: 'verify.php',
            data: auth,
            success: function(response){
            var jsonData = JSON.parse(response);
            if(jsonData['type'] == 'error'){
                notify(jsonData['message'],"","error");
            }
            else if(jsonData['type'] == 'success'){
                //location.href = 'index.php';
                notify(jsonData['message'],"","success");
                setTimeout(3000,location.href = 'index.php')
            }
            else if(jsonData['type'] == 'warning'){
                notify(jsonData['message'],"","warning");
            }
        }
        });
    });

    /* signup form */
    $('#signupForm').submit(function(e){
        e.preventDefault();
        var auth = $(this).serialize();
        $.ajax({
            type: "POST",
            url: 'register.php',
            data: auth,
            success: function(response){
            var jsonData = JSON.parse(response);
            if(jsonData['type'] == 'error'){
                notify(jsonData['message'],"","error");
            }
            else if(jsonData['type'] == 'success'){
                location.href = 'signin.php';
            }
            else if(jsonData['type'] == 'warning'){
                notify(jsonData['message'],"","warning");
            }
        }
        });
    });

    //forgot Password
    $('#forgotPassForm').submit(function(e){
    e.preventDefault();
    var auth = $(this).serialize();
    
    $.ajax({
        type: "POST",
        url: 'reset.php',
        data: auth,
        success: function(response){
            var jsonData = JSON.parse(response);
            if(jsonData['type'] == 'error'){
                notify(jsonData['message'],"","error");
            }
            else if(jsonData['type'] == 'success'){
                location.href = 'password_sent.php';
            }
            else if(jsonData['type'] == 'warning'){
                notify(jsonData['message'],"","warning");
            }
        }
        });
    });
})
    
</script>