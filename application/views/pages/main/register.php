<center>
    <h1>Registrieren</h1>
</center>
<form action="./account/register" method="post" class="register-form">
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
    <p><input type="checkbox" name="agbRead" required> <a href="#">AGBs</a> gelesen und akzeptiert</p>
    <p><input type="submit" value="Absenden"></p>
</form>