<?php
if(isset($_SESSION["msg"])) {?>
    <div class="status" style="background-color: <?php echo ($_SESSION["lastOp"] == TRUE ? "green" : "red"); ?>">
        <p><?php echo $_SESSION["msg"]; ?></p>
    </div>
<?php } 
$_SESSION["msg"] = "";
?>