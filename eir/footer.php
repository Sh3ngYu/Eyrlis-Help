<?php if (!defined('FLUX_ROOT')) exit; ?>
<?php if ( $params->get('module') == 'main' AND $params->get('action') == 'index'):?>
		</div>
		<?php else: ?>
			<?php if ( $params->get('module') == 'account' AND $params->get('action') == 'create'): ?>
			</div>
			<?php else: ?>
				<?php if ( $params->get('module') == 'account' AND $params->get('action') == 'login'): ?>
				</div>		
				<?php else: ?>
					</div>	

<?php endif; ?>
				<?php endif; ?>
				<?php endif; ?>	



	<footer class="bg-gray text-light footer-long" style="background-image: url('<?php echo $this->themepath('img/ragnarok/rules-render.png')?>');
        background-repeat: no-repeat;
        background-position: 120% 0%;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3">
                    <img alt="Image" src="<?php echo $this->themepath('img/eirlys-logo-white.png');?>"  class="mb-4" />
                    <p class="text-muted">
                        &copy; 2019 Eirlys Ragnarok Online
                        <br />All rights reserved
                        <br />
                    </p>
                </div>
                <!--end of col-->
                <div class="col-12 col-md-9">
                    <span class="h5"></span>
                    <div class="row no-gutters">
                        <div class="col-6 col-lg-3" style="flex: 0 0 20% !important;">
                            <h6><img src="<?php echo $this->themepath('img/ragnarok/616.png');?>"> Server</h6>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="https://eyrlis-ro.fr/website/?module=main&action=features">Informations</a>
                                </li>
                                <li>
                                    <a href="https://eyrlis-ro.fr/website/?module=main&action=staff" >Staff</a>
                                </li>
                                <li>
                                    <a href="https://eyrlis-ro.fr/website/?module=main&action=Download" >Download</a>
                                </li>
                                <li>
                                    <a href="https://eyrlis-ro.fr/website/?module=shop" >Store</a>
                                </li>
                            </ul>
                        </div>
                        <!--end of col-->
                        <div class="col-6 col-lg-3" style="flex: 0 0 20% !important;">
                            <h6><img src="<?php echo $this->themepath('img/ragnarok/7005.png');?>"> Account</h6>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="https://eyrlis-ro.fr/website/?module=account&action=create">Create an account</a>
                                </li>
                                <li>
                                    <a href="https://eyrlis-ro.fr/website/?module=account&action=login">Log in</a>
                                </li>
                                <li>
                                    <a href="https://eyrlis-ro.fr/website/?module=account&action=resetpass">Recover password</a>
                                </li>

                            </ul>
                        </div>
                        <!--end of col-->
                        <div class="col-6 col-lg-3" style="flex: 0 0 20% !important;">
                            <h6><img src="<?php echo $this->themepath('img/ragnarok/femaleicon.gif');?>"> Community</h6>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="https://discordapp.com/invite/JPDgT4t">Discord</a>
                                </li>
                            </ul>
                        </div>
                        <!--end of col-->
                                              <!--end of col-->
                    </div>
                    <!--end of row-->
                </div>
                <!--end of col-->
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </footer>
		
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js" tppabs="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://wingman.mediumra.re/assets/js/jquery.smartWizard.min.js" tppabs="http://wingman.mediumra.re/assets/js/jquery.smartWizard.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.0.10/flickity.pkgd.min.js" tppabs="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.0.10/flickity.pkgd.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->themePath('js/scrollMonitor.js'); ?>"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/12.1.5/js/smooth-scroll.polyfills.min.js" tppabs=""></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.10.0/prism.min.js" tppabs=""></script>
	<script type="text/javascript" src="<?php echo $this->themePath('js/zoom.min.js') ?>"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js" tppabs=""></script>
	<script type="text/javascript" src="<?php echo $this->themePath('js/theme.js'); ?>"></script>
	</body>
</html>
