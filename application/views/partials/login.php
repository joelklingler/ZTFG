<div id="Login"><br>
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
</div>