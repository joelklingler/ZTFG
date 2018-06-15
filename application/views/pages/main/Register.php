<center>
    <h1>Registrieren</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras cursus tortor id sapien bibendum congue. Sed dapibus dolor sit amet elit fermentum pretium.</p>
</center>
<div class="registerBox">
    <form action="./account/register" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>E-Mail</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Passwort</td>
                <td><input type="password" name="password1" required></td>
            </tr>
            <tr>
                <td>Passwort wiederholen</td>
                <td><input type="password" name="password2" required></td>
            </tr>
            <tr></tr>
        </table>
        <input type="checkbox" name="agbRead" required> AGBs gelesen und akzeptiert
        <p><input type="submit" value="Absenden"></p>
    </form>
</div>