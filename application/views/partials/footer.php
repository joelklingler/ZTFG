            </main>
            </section>
            <footer class="main-footer">
                <div class="social-media">
                    <a href="https://www.facebook.com/groups/500376413311534/"><img src="<?php echo asset_url().'img/fb.png'?>" height="30"></a>
                    <a href="https://www.youtube.com/channel/UCPTFECkQhXS1tYshaKphamw"><img src="<?php echo asset_url().'/img/yt.png'?>" height="30"></a>
                    <a href="https://www.twitch.tv/zombietaskforcegermany"><img src="<?php echo asset_url().'img/tw.png'?>" height="30"></a>
                    <a href="ts3server://5.175.26.146?"><img src="<?php echo asset_url().'img/ts.png'?>" height="30"></a>
                    <a href="https://discord.gg/sdEhAmV"><img src="<?php echo asset_url().'img/dc.png'?>" height="30"></a>
                    <a href="spenden.html"><img src="<?php echo asset_url().'img/spenden_button.jpg'?>" height="30"></a>
                </div>
                <div class="footer-content">
                    <b> www.ZTFG.de &copy; 2018 - Alle Rechte vorbehalten.</b>
                    <a href="./Impressum">Impressum</a>
                </div>
            </footer>
        </div>
    </div>
    <div class="side-bar">
        <div class="header-break">
            <img src="<?php echo asset_url().'img/header3.png';?>"/>
        </div>
        <div class="side-bar-content">
            <!-- Account-Panel -->
            <?php $this->view('partials/account', $account) ?>
            <!-- Server-State -->
            <?php $this->view('partials/server-state') ?>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo asset_url().'js/navigation.js';?>"></script> 
<script type="text/javascript" src="<?php echo asset_url().'js/admin.js';?>"></script> 

</body>
</html>