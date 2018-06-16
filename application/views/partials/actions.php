<h5>Deine Aktionen:</h5>
<ul>
<?php
    foreach ($data as $action)
    {
        echo "<li><a href='./".$action["action"]."'>".$action["name"]."</a></li>";
    }
?>
</ul>