<center><h1>Profil von <span class="highlight"><?php echo $user->username;?></span></h1></center>
<p>Beigetreten am: <?php echo $user->timeStampRegistered; ?></p>
<p>Zuletzt online: <?php echo $user->timeStampLastLogin == "" ? "nie" : $user->timeStampLastLogin; ?></p>