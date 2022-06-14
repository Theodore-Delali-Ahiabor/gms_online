<footer>
    <div class="footer-top">

    </div>
    <div class="footer-bottom flex">
        <?php
            if (date("y") > 22){
                echo "<span class='copyright'>&copy; 2022 - ". date("Y") . " <a href='https://'>HTU-JMTC</a>. All rights reserved"."</span>";
            }else{
                echo "<span class='copyright'>&copy; ". date("Y") ." <a href='https://'>HTU-JMTC</a>. All rights reserved"."</span>";
            }
        ?>
        <span class="developed">Final year project by: <a href="">Theodore and Cyril</a></span>
    </div>
</footer>