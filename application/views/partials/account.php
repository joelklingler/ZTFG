<div id="Login"><br>

<?php
if($this->session->has_userdata('userdata')) {
?>
<center><h2 style="text-decoration: underline;">Account-Panel</h2></center>
<form action="account/logout" method="post">
    <h4>Willkommen <?php echo $this->session->userdata('userdata')['username']; ?></h4>
    <p>Deine Aktionen:</p>
    <!-- User options -->
    
    <input type="submit" value="Log-out">
</form>

<?php 
} else {
?>

<center><img src="<?php echo asset_url().'img/login_head.png';?>" width="170"><br><br><b></center>
<form action="account/login" method="post">
    <table>
        <tr>
            <td>E-Mail</td>
            <td><input type="email" name="email" required></td>
        </tr>
        <tr>
            <td>Passwort</td>
            <td><input type="password" name="password" required></td>
        </tr>
    </table>
    <br/>
    <input type="submit" value="Login">
</form>
oder <a href="./Register">registrieren</a>

<?php 
}
?>

</div>