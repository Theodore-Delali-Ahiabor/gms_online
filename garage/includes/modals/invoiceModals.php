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
<!--Detail Invoice Modal -->
<div class="modalWrapper " style="display:none;" id="detailInvoice">
    <div class="modalOuter"></div>
    <div class="modalContainer largeContainer" style="background:white;">
        <span class="modalClose required">
          <i class="fa fa-times"></i>
        </span>
        <div class="modalHead center">
          <span class="modalTitle">Invoice Details</span>
        </div>
        <div class="modalBody ">
            <div id="invoiceReport">
                <table class="fg-black">
                    <?php 
                        try {
                            $conn = $pdo->open();
                            $sysAddress = $rowSytem["Country"].', '.$rowSytem["Region"].', '.$rowSytem["City"].', '.
                            $rowSytem["Street"].', '.$rowSytem["House"].', '.$rowSytem["Landmark"];
                        ?>
                    <tr>
                        <td class="flex space-between">
                            <span class="flex center">
                                <div class="flex center">
                                    <span><img src="../images/system/<?php echo (empty($rowSytem['Logo'])?'':$rowSytem['Logo'] ) ?>" alt="" width="50"></span> 
                                    <h3 class="padding-left"><?php echo (empty($rowSytem['LongName'])?'':$rowSytem['LongName'] )?></h3>
                                </div>
                            </span>
                            <span>
                                <h1>INVOICE</h1>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="flex space-between">
                            <span class="half">
                                <div>
                                    <span class="bold">Address: </span><span><?php echo (empty($rowSytem['AddressID'])?'':$sysAddress )?></span>
                                </div>
                                <div>
                                    <span class="bold">P.O.Box: </span><span><?php echo (empty($rowSytem['Box'])?'':$rowSytem['Box'] )?></span>
                                </div>
                                <div>
                                    <span class="bold">Phone: </span><span><?php echo (empty($rowSytem['Phone'])?'':$rowSytem['Phone'] )?></span>
                                </div>
                                <div>
                                    <span class="bold">Email: </span><span><?php echo (empty($rowSytem['Email'])?'':$rowSytem['Email'] )?></span>
                                </div>
                            </span>
                            <span class="half">
                                <div>
                                    <span class="bold">Invoice #: </span><span id="id"></span>
                                </div>
                                <div>
                                    <span class="bold">Technician: </span><span id="technician"></span>
                                </div>
                                <div>
                                    <span class="bold">Issued By: </span><span><?php echo (empty($_SESSION['employee'])?'':$rowSession['FirstName']. ' '.$rowSession['OtherName'].' '.$rowSession['LastName'] )?></span>
                                </div>
                                <div>
                                    <span class="bold">Date: </span><span><?php echo date('d').' '.date('M').', '.date('Y') ?></span>
                                </div>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td><hr class="border-bottom"></td>
                    </tr>
                    <tr>
                        <td class="flex space-between">
                            <span class="half flex">
                                <span class="padding-right">
                                    <span class="right"> Customer <br> Info.</span></span>
                                <span class="padding-left solid-border-left">
                                    <div>
                                        <span class="bold">Name: </span><span id="cusName"></span>
                                    </div>
                                    <div>
                                        <span class="bold">Address: </span><span id="cusAddress"></span>
                                    </div>
                                    <div>
                                        <span class="bold">Phone: </span><span id="cusPhone"></span>
                                    </div>
                                    <div>
                                        <span class="bold">Email: </span><span id="cusEmail"></span>
                                    </div>
                                </span>
                            </span>
                            <span class="half flex">
                            <span class="padding-right">
                                    <span class="right"> Automobile <br> Info.</span></span>
                                <span class="padding-left solid-border-left">
                                    <div>
                                        <span class="bold">Make: </span><span id="autoMake"></span>
                                    </div>
                                    <div>
                                        <span class="bold">Model: </span><span id="autoModel"></span>
                                    </div>
                                    <div>
                                        <span class="bold">Color: </span><span id="autoColor"></span>
                                    </div>
                                    <div>
                                        <span class="bold">Year: </span><span id="autoYear"></span>
                                    </div>
                                    <div>
                                        <span class="bold">Category: </span><span id="autoCategory"></span>
                                    </div>
                                    <div>
                                        <span class="bold">Mileage: </span><span id="autoMileage"></span>
                                    </div>
                                    <div>
                                        <span class="bold">VIN/Chasis No.: </span><span id="autoVin"></span>
                                    </div>
                                    <div>
                                        <span class="bold">Reg. No.: </span><span id="autoRegNo"></span>
                                    </div>
                                </span>
                            </span>
                        </td>
                    </tr><br>
                    <tr>
                        <td>
                            <div class="bold">Services Rendered</div>
                            <table border="1" style="border-collapse: collapse;">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Name/Description</th>
                                        <th>Cost/GH&#8373;</th>
                                    </tr>
                                </thead>
                                <tbody id="services"></tbody>
                            </table>
                        </td>
                    </tr><br>
                    <tr>
                        <td>
                            <div class="bold">Parts Used</div>
                            <table border="1" style="border-collapse: collapse;">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Name/Description</th>
                                        <th class="center">Quantity</th>
                                        <th class="center">Unit Cost/GH&#8373;</th>
                                        <th class="center">Cost/GH&#8373;</th>
                                    </tr>
                                </thead>
                                <tbody id="parts"></tbody>
                            </table>
                        </td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                        <td>
                            <div class="flex space-between">
                                <span class="half">
                                    
                                </span>
                                <span class="half">
                                    <div class="left">
                                        <table>
                                            <tr>
                                                <td>Services Total</td>
                                                <td>GH&#8373;</td>
                                                <td id="serviceCost"></td>
                                            </tr>
                                            <tr>
                                                <td>Parts Total</td>
                                                <td>GH&#8373;</td>
                                                <td id="partCost"></td>
                                            </tr>
                                            <tr>
                                                <td>Total Tax</td>
                                                <td>GH&#8373;</td>
                                                <td ></td>
                                            </tr>
                                            <tr class="bold bg-dodgerblue">
                                                <td>Grand Total</td>
                                                <td>GH&#8373;</td>
                                                <td id="total"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <?php 
                            $pdo->close();
                        } catch (PDOException $th) {
                            echo $th->getMessage();
                        }
                    ?>
                </table><br>
            </div>
            <div class="center">
                <button class="btn btn-green printInvoice"><i class="fa fa-print"></i> Print </button>
                <button class="btn btn-red modalCancel"> <i class="fa fa-times"></i> Close </button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('.printInvoice').on('click', function(){
            printContent("#invoiceReport");
        })
        /* view invoice details */
        $(".invoiceView").on("click", function(){
            var id = $(this).data("id");
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
                        $("#invoiceReport #id").html(response.id);
                        $("#invoiceReport #technician").html(response.technician);
                        $("#invoiceReport #services").html(response.services);
                        $("#invoiceReport #parts").html(response.parts);
                        $("#invoiceReport #serviceCost").html(response.serviceCost);
                        $("#invoiceReport #partCost").html(response.partCost);
                        $("#invoiceReport #total").html(response.total);

                        /* auto */
                        $("#invoiceReport #autoColor").html(response.autoColor);
                        $("#invoiceReport #autoYear").html(response.autoYear);
                        $("#invoiceReport #autoMake").html(response.autoMake);
                        $("#invoiceReport #autoModel").html(response.autoModel);
                        $("#invoiceReport #autoMileage").html(response.autoMileage);
                        $("#invoiceReport #autoCategory").html(response.autoCategory);
                        $("#invoiceReport #autoVin").html(response.autoVin);
                        $("#invoiceReport #autoRegNo").html(response.autoRegNo);
                        
                        /* customer */
                        $("#invoiceReport #cusName").html(response.cusName);
                        $("#invoiceReport #cusPhone").html(response.cusPhone);
                        $("#invoiceReport #cusEmail").html(response.cusEmail);
                    }
                }
            })
            $("#detailInvoice").fadeIn();
        })
        /* Issue payment */
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