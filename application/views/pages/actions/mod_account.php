<center>
    <h1>Account bearbeiten</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras cursus tortor id sapien bibendum congue. Sed dapibus dolor sit amet elit fermentum pretium.</p>
</center>
<div class="paddedContent">
    <h4 style="text-decoration: underline;">Deine Daten</h4>
    <table>
        <tr>
            <td><b>Username:</b></td>
            <td><?php echo $this->session->userdata('userdata')['username']; ?></td>
        </tr>
        <tr>
            <td><b>E-Mail:</b></td>
            <td><?php echo $this->session->userdata('userdata')['usermail']; ?></td>
        </tr>
        <tr>
            <td><b>Rang:</b></td>
            <td><?php echo $this->session->userdata('userdata')['roleName']; ?></td>
        </tr>
    </table>
    <h4 style="text-decoration: underline;">Passwort ändern</h4>
    <form action="<?php echo base_url(); ?>account/changepw" method="post">
        <table>
            <tr>
                <td>Altes Passwort:</td>
                <td><input type="password" name="pw_old" required></td>
            </tr>
            <tr>
                <td>Neues Passwort:</td>
                <td><input type="password" name="pw_new1" required></td>
            </tr>
            <tr>
                <td>Neues Passwort wiederholen:</td>
                <td><input type="password" name="pw_new2" required></td>
            </tr>
            <tr></tr>
        </table>
        <p><input type="submit" value="Absenden"></p>
    </form>
</div>