<!-- notify js -->
<script src="assets/js/notify.js"></script>
<!-- DataTables -->
<script src="assets/DataTables/datatables.min.js"></script>
<!-- CKEditor -->
<script src="assets/ckeditor/ckeditor.js"></script>
<!-- Scripts js -->
<script src="assets/js/scripts.js"></script>
<script>
    $(document).ready( function(){
    /* Carosel slider */
    let slideIndex = 0;
    let slide1Index = 0;

    if($(".slide").length > 0){
        showSlides();
        showSlides1()
    }
    $(".carosel-forward").click( function(){
        navSlide1(slide1Index += 1);
    })
    $(".carosel-back").click( function(){
        navSlide1(slide1Index -= 1);
    })

    /* automatic slide show */
    function showSlides() {
        let slides = $(".slide");
        slides.css("display","none");
        let dots = $(".dot");
        dots.removeClass("active");
        slideIndex++;
    
        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 6000); // Change image every 6 seconds
    }

    /* carosel indicator click event */
    $(".dot").click( function(){
        let id = $(this).data("id");
        let slides = $(".slide");
        slides.css("display","none");
        let dots = $(".dot");
        dots.removeClass("active");
        slides[id].style.display = "block";
        dots[id].className += " active";
    })
    /* carosel navigation buttons */
    function showSlide(n) {
        let slides = $(".slide");
        slides.css("display","none");
        let dots = $(".dot");
        dots.removeClass("active");

        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
    
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 6000); // Change image every 6 seconds
    }

    /* automatic slide show */
    function showSlides1() {
        let slides = $(".slide1");
        slides.css("display","none");
        slide1Index++;
    
        if (slide1Index > slides.length) {slide1Index = 1}
        slides[slide1Index-1].style.display = "block";
        setTimeout(showSlides1, 6000); // Change image every 6 seconds
    }

    /* carosel navigation buttons */
    function navSlide1(n) {
        let slides = $(".slide1");
        slides.css("display","none");

        if (n > slides.length) {slide1Index = 1}
        if (n < 1) {slide1Index = slides.length}
    
        slides[slide1Index-1].style.display = "block";
        clearTimeout(showSlides1); // reset timer
    }
    $(".eye").on('click', function(){
        $('.eye').toggleClass("fa-eye");
        $('.eye').toggleClass("fa-eye-slash");
        if($('.password').attr("type") == "text"){
            $('.password').attr("type", "password");
        }else{
            $('.password').attr("type", "text");
        }
    });
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
                location.href = 'index.php';
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