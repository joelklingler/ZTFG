<div class="account">
    <?php
    if($this->session->has_userdata('userdata')) {
    ?>
    <h3>Account-Panel</h3>
    <h4>Willkommen <?php echo $this->session->userdata('userdata')['username']; ?> (<?php echo $this->session->userdata('userdata')['roleName']; ?>)</h4>
    <!-- User options -->
    <?php $this->view('partials/actions', $actions); ?>
    <form action="<?php echo base_url(); ?>account/logout" method="post">
        <p><input type="submit" value="Log-out"></p>
    </form>

    <?php 
    } else {
    ?>
    <h3>Login</h3>
    <form action="<?php echo base_url(); ?>account/login" method="post" class="login-form">
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
    </form><br/>
    oder <a href="./Register">registrieren</a>

    <?php 
    }
    ?>
</div>