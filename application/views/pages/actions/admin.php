<center>
    <h1>Admin-Panel</h1>
</center>
<h3>Users</h3>
<form action="<?php echo base_url();?>user/changeRoles" method="post">
<p class="admin-users-save"><input type="submit" value="Änderungen übernehmen"></p>
<table class="admin-users">
    <tr>
        <th>Username</th>
        <th>E-Mail</th>
        <th>Role</th>
        <th>Last Login</th>
        <th></th>
    </tr>
    <?php
        foreach($users as $user) {
            // Load role
            echo "<tr user-id='".$user->id."'>";
                echo "<td><a href='".root_url()."user/profile/".$user->id."'>".$user->username."</a></td>";
                echo "<td>".$user->email."</td>";
                echo "<td>";
                    echo "<select class='role-select' user-id='".$user->id."'>";
                    foreach($roles as $roleElement) {
                        $selected = $roleElement->id == $user->roleId ? "selected" : "";
                        echo "<option value='".$roleElement->id."' ".$selected.">$roleElement->name</option>";
                    }
                    echo "</select>";
                echo "</td>";
                echo "<td>".$user->timeStampLastLogin."</td>";
                echo "<td><a class='delete-user' user-name='".$user->username."' action='".base_url()."user/delete/".$user->id."' href='#'><i class='fas fa-trash'></i></a></td>";
            echo "</tr>";
        }
    ?>
</table>
<div class="hidden-fields">
    <input type="hidden" name="userRolePairs" id="userRolePairs">
</div>
</form>