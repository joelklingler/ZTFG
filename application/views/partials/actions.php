<h5>Deine Aktionen:</h5>
<ul>
<?php
    foreach ($data as $action)
    {
        echo "<li><a href=".base_url().$action["controller"]."/".$action["id"].">".$action["name"]."</a></li>";
    }
?>
</ul>