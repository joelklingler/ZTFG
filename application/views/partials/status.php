<?php
if(isset($_SESSION['opState']))
{
    $op = $_SESSION['opState'];
    $state = $op["state"];
    $msg = $op["msg"]; ?>

    <script>
        var state = <?php echo $state; ?>;
        var typeCalc = state == "1" ? "success" : "error";

        $("body").overhang({
            type: typeCalc,
            message: "<?php echo $op['msg']; ?>"
        });
    </script>

<?php } ?>