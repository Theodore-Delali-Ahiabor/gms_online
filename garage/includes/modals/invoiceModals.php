<!--Issue Payment Modal -->
<div class="modalWrapper " style="display:none;" id="payment">
    <div class="modalOuter"></div>
    <div class="modalContainer" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
          <span class="modalTitle">Payment Details</span>
        </div>
        <div class="modalBody "><br>
            <div action="" class="modal-form left" id="payemtForm">
                <table>
                    <tr>
                        <td>Full Name: </td><td id="name"></td>
                    </tr>
                    <tr>
                        <td>Phone: </td><td id="phone"></td>
                    </tr>
                    <tr>
                        <td>Email: </td><td id="email"></td>
                    </tr>
                    <tr>
                        <td>Payment Amount: </td><td id="total"></td>
                    </tr>
                    <input type="hidden" class="id">
                    <input type="hidden" class="total">
                </table><br>
            </div>
            <div class="center">
                <button class="btn btn-green" id="pay"><i class="fa fa-money-bill"></i> Pay Now </button>
                <button class="btn btn-red modalCancel"> <i class="fa fa-times"></i> Cancel </button>
            </div>
        </div>
    </div>
</div>
<!--Issue Payment Modal -->
<div class="modalWrapper " style="display:none;" id="detailInvoice">
    <div class="modalOuter"></div>
    <div class="modalContainer" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
          <span class="modalTitle">Payment Details</span>
        </div>
        <div class="modalBody "><br>
            <div action="" class="modal-form left" id="payemtForm">
                <table>
                    <tr>
                        <td>Full Name: </td><td id="name"></td>
                    </tr>
                    <tr>
                        <td>Phone: </td><td id="phone"></td>
                    </tr>
                    <tr>
                        <td>Email: </td><td id="email"></td>
                    </tr>
                    <tr>
                        <td>Payment Amount: </td><td id="total"></td>
                    </tr>
                    <input type="hidden" class="id">
                    <input type="hidden" class="total">
                </table><br>
            </div>
            <div class="center">
                <button class="btn btn-green" id="pay"><i class="fa fa-money-bill"></i> Pay Now </button>
                <button class="btn btn-red modalCancel"> <i class="fa fa-times"></i> Cancel </button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $(".invoicePay").on("click", function(){
            var id = $(this).data("id");
            $("#payment .id").val(id);
            $.ajax({
                type: "POST",
                url: "invoiceFetch.php",
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
                        $("#payment #name").html(response.name);
                        $("#payment #phone").html(response.phone);
                        $("#payment #email").html(response.email);
                        $("#payment #total").html(response.total);
                        $("#payment .total").val(response.total);
                    }
                }
            })
            $("#payment").fadeIn();
        })
        $("#pay").on("click", function(){
            payWithPaystack();
        })
    })
</script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    function payWithPaystack() {
        var id = $("#payment .id").val();
        let total = $("#payment .total").val();
        let handler = PaystackPop.setup({
            key: 'pk_test_dc95a4e66c9f96614f82f190e275a5110651159c', // Replace with your public key
            email: document.getElementById("email").innerHTML,
            amount: document.getElementById("total").innerHTML * 100,
            phone:  document.getElementById("phone").innerHTML,
            currency: "GHS",
            ref: 'Invoice-Pay-'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // label: "Optional string that replaces customer email"
            onClose: function(){
                notify("Transaction cancelled","","error")
            },
            callback: function(response){
            $.ajax({
                url: 'confirmPayment.php?reference='+response.reference+'&id='+id+'&total='+total,
                method: 'get',
                dataType: 'json',
                success: function (response) {
                // the transaction status is in response.data.status
                    if (response.type == "error"){
                        notify(response.message,'','error');
                    }else if(response.type == "warning"){
                        notify(response.message,'','warning');
                    }else if(response.type == "info"){
                        notify(response.message,'','info');
                    }else if(response.type == "success"){
                        //notify(response.message,'','success');
                        location.reload(true)
                    }
                }
            });
            }
        });
        handler.openIframe();
        }
</script>