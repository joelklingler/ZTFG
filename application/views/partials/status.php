<?php
if(isset($_SESSION['opState']))
{
    $op = $_SESSION['opState']; ?>

    <div class="status" style="background-color: <?php echo ($op["state"] == '1' ? "green" : "red"); ?>">
        <center><?php echo $op["msg"]; ?></center>
    </div>

<?php } ?>