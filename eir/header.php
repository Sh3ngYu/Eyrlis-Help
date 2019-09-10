<?php if (!defined('FLUX_ROOT')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<?php if (isset($metaRefresh)): ?>
		<meta http-equiv="refresh" content="<?php echo $metaRefresh['seconds'] ?>; URL=<?php echo $metaRefresh['location'] ?>" />
	<?php endif ?>
	<title><?php echo Flux::config('SiteTitle'); if (isset($title)) echo ": $title" ?></title>
	<link rel="stylesheet" href="<?php echo $this->themePath('css/flux.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
	<link href="<?php echo $this->themePath('css/flux/unitip.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
	<?php if (Flux::config('EnableReCaptcha')): ?>
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<?php endif ?>



	<link href="<?php echo $this->themepath('css/socicon.css');?>"  rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo $this->themepath('css/entypo.css');?>" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo $this->themepath('css/theme.css');?>"  rel="stylesheet" type="text/css" media="all" />


	<script type="text/javascript" src="<?php echo $this->themepath('js/jquery-2.1.4.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo $this->themePath('js/flux.datefields.js') ?>"></script>
	<script type="text/javascript" src="<?php echo $this->themePath('js/flux.unitip.js') ?>"></script>
	
	<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js" tppabs="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
	


	<script type="text/javascript">
		function updatePreferredServer(sel){
			var preferred = sel.options[sel.selectedIndex].value;
			document.preferred_server_form.preferred_server.value = preferred;
			document.preferred_server_form.submit();
		}
		
		function updatePreferredTheme(sel){
			var preferred = sel.options[sel.selectedIndex].value;
			document.preferred_theme_form.preferred_theme.value = preferred;
			document.preferred_theme_form.submit();
		}

		// Preload spinner image.
		var spinner = new Image();
		spinner.src = '<?php echo $this->themePath('img/spinner.gif') ?>';
		
		function refreshSecurityCode(imgSelector){
			$(imgSelector).attr('src', spinner.src);
			
			// Load image, spinner will be active until loading is complete.
			var clean = <?php echo Flux::config('UseCleanUrls') ? 'true' : 'false' ?>;
			var image = new Image();
			image.src = "<?php echo $this->url('captcha') ?>"+(clean ? '?nocache=' : '&nocache=')+Math.random();
			
			$(imgSelector).attr('src', image.src);
		}
		function toggleSearchForm()
		{
			//$('.search-form').toggle();
			$('.search-form').slideToggle('fast');
		}
	</script>
	
	<?php if (Flux::config('EnableReCaptcha') && Flux::config('ReCaptchaTheme')): ?>
		<script type="text/javascript">
			 var RecaptchaOptions = {
				theme : '<?php echo Flux::config('ReCaptchaTheme') ?>'
			 };
		</script>
	<?php endif ?>
	
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
	<script type="text/javascript">
		$(document).ready(function(){
			var inputs = 'input[type=text],input[type=password],input[type=file]';
			$(inputs).focus(function(){
				$(this).css({
					'background-color': '#f9f5e7',
					'border-color': '#dcd7c7',
					'color': '#726c58'
				});
			});
			$(inputs).blur(function(){
				$(this).css({
					'backgroundColor': '#ffffff',
					'borderColor': '#dddddd',
					'color': '#444444'
				}, 500);
			});
			$('.menuitem a').hover(
				function(){
					$(this).fadeTo(200, 0.85);
					$(this).css('cursor', 'pointer');
				},
				function(){
					$(this).fadeTo(150, 1.00);
					$(this).css('cursor', 'normal');
				}
			);
			$('.money-input').keyup(function() {
				var creditValue = parseInt($(this).val() / <?php echo Flux::config('CreditExchangeRate') ?>, 10);
				if (isNaN(creditValue))
					$('.credit-input').val('?');
				else
					$('.credit-input').val(creditValue);
			}).keyup();
			$('.credit-input').keyup(function() {
				var moneyValue = parseFloat($(this).val() * <?php echo Flux::config('CreditExchangeRate') ?>);
				if (isNaN(moneyValue))
					$('.money-input').val('?');
				else
					$('.money-input').val(moneyValue.toFixed(2));
			}).keyup();
			
			// In: js/flux.datefields.js
			processDateFields();
		});
		
		function reload(){
			window.location.href = '<?php echo $this->url ?>';
		}
	</script>

<style>

                @font-face {
                font-family: 'solaire';
                font-style: normal;
                src: url('<?php echo $this->themepath('fonts/SolaireRough.otf');?>');
                src: local('solaire'), url('<?php echo $this->themepath('fonts/solaire/SolaireRough.otf');?>') format('embedded-opentype'), url('<?php echo $this->themepath('fonts/solaire/SolaireRough.otf');?>') format('woff');
            }
           
            .solaire {
                font-family: 'solaire' !important;
            }


                @font-face {
                font-family: 'noatun';
                font-style: normal;
                src: url('<?php echo $this->themepath('fonts/noatun/Noatun v1.otf');?>');
                src: local('noatun'), url('<?php echo $this->themepath('fonts/noatun/Noatun v1.otf');?>') format('embedded-opentype'), url('<?php echo $this->themepath('fonts/noatun/Noatun v1.woff');?>') format('woff');
            }
            
            .noatun {
                font-family: 'noatun' !important;
            }

                @font-face {
                font-family: 'pandora';
                font-style: normal;
                src: url('<?php echo $this->themepath('fonts/pandora/Pandora Ep1.otf');?>');
                src: local('pandora'), url('<?php echo $this->themepath('fonts/pandora/Pandora Ep1.otf');?>') format('embedded-opentype'), url('<?php echo $this->themepath('fonts/pandora/Pandora Ep1.otf');?>') format('woff');
            }
            
            .pandora {
                font-family: 'pandora' !important;
            }

                @font-face {
                font-family: 'salora';
                font-style: normal;
                src: url('<?php echo $this->themepath('fonts/salora/ZaloraRegular.ttf');?>');
                src: local('salora'), url('<?php echo $this->themepath('fonts/salora/ZaloraRegular.otf');?>') format('embedded-opentype'), url('<?php echo $this->themepath('fonts/salora/ZaloraRegular.ttf');?>') format('woff');
            }
            
            .salora {
                font-family: 'salora' !important;
            }
</style>


<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '381154066115241');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=381154066115241&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

</head>







<body style="background: #212529;">
	<?php $master = include 'main/master.php'; ?>
	<div class="nav-container" style="min-height:100px !important;">
		<div class=" bg-dark navbar-dark" data-sticky="top">
			<div class="container">
				<nav class="navbar navbar-expand-lg">
					<a class="navbar-brand" href="<?php echo $this->url('main');?>">
						<img alt="Wingman" src="<?php echo $this->themepath('img/eirlys-logo-white.png');?>" />
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<i class="icon-menu h4"></i>
					</button>
					<div class="collapse navbar-collapse justify-content-between" id="navbarNav">
				<ul class="navbar-nav">
						
		<!-- Main - SG Update  -->
							<li class="nav-item">
								<a href="<?php echo $this->url('main');?>" class="nav-link">Home</a>
							</li>
							
		<!-- START 1 Eyrlis-RO - SG Update -->		
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="javascript:void(0)" id="pagesDropdown" role="button" data-toggle="dropdown">Informations</a>
		<!-- Update -->	<div class="dropdown-menu" aria-labelledby="pagesDropdown">
							<a class="dropdown-item" href="<?php echo $this->url('main','changelog');?>" >
								<span class="h6 mb-0" style="text-align:left;">Changelog / Updates</span>
								<p class="text-small text-muted">Modifications, Updates..</p>
							</a>
		<!-- Staff -->	<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo $this->url('main','staff');?>" >
								<span class="h6 mb-0" style="text-align:left;">Staff</span>
								<p class="text-small text-muted">Members, Missions...</p>
							</a>
		<!-- Ranking -->	<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo $this->url('ranking','guild');?>" >
								<span class="h6 mb-0" style="text-align:left;">Ranking</span>
								<p class="text-small text-muted">Guild, Zeny...</p>
							</a>
		<!-- Feature-->	<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo $this->url('main','features');?>" >
								<span class="h6 mb-0" style="text-align:left;">Features</span>
								<p class="text-small text-muted">Rates, Drops, Features...</p>
							</a>
		<!-- Custom -->	<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo $this->url('main','changes');?>" >
								<span class="h6 mb-0" style="text-align:left;">Custom changes & NPCs</span>
								<p class="text-small text-muted">NPCs Informations, Custom changes..</p>
							</a>
						</div>
							</li>
		<!-- END 1 Eyrlis-RO - SG Update -->
		<!-- START 1 Download - SG Update  -->
							<li class="nav-item">
								<a href="<?php echo $this->url('main','Download');?>" class="nav-link">Download</a>
							</li>
		<!-- END 1 Download - SG Update  -->	
		<!-- START 1 Eyrlis World - SG Update  -->	
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="javascript:void(0)" id="pagesDropdown" role="button" data-toggle="dropdown">Eyrlis World</a>
						<div class="dropdown-menu" aria-labelledby="pagesDropdown">
		<!-- House -->		<a class="dropdown-item" href="<?php echo $this->url('main','ghouse');?>" >
								<span class="h6 mb-0">Guild's House</span>
								<p class="text-small text-muted"></p>
							</a>
		<!-- Job -->	<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo $this->url('main','gmerchant');?>" >
								<span class="h6 mb-0">Custom Job</span>
								<p class="text-small text-muted"></p>
							</a>
		<!-- MVP -->	<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo $this->url('main','mvphat');?>" >
								<span class="h6 mb-0">MVP's Souls</span>
								<p class="text-small text-muted"></p>
							</a>
		<!-- Inst -->	<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo $this->url('main','ninerealm');?>" >
								<span class="h6 mb-0">Instancied Dongeon</span>
								<p class="text-small text-muted"></p>
							</a>
		<!-- WorldB -->	<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo $this->url('main','wboss');?>" >
								<span class="h6 mb-0">World MVP</span>
								<p class="text-small text-muted"></p>
							</a>
		<!-- Oarea -->	<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo $this->url('main','helheim');?>" >
								<span class="h6 mb-0">Open Area</span>
								<p class="text-small text-muted"></p>
							</a>
						</div>
							</li>
		<!-- END 1 Community - SG Update  -->	
		<!-- START 1 Community - SG Update  -->	
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="javascript:void(0)" id="pagesDropdown" role="button" data-toggle="dropdown">Community</a>
						<div class="dropdown-menu" aria-labelledby="pagesDropdown">

		<!-- Stream -->		<a class="dropdown-item" href="<?php echo $this->url('main','Stream');?>" >
								<span class="h6 mb-0">Stream</span>
								<p class="text-small text-muted"></p>
							</a>
		<!-- Stream -->	<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="https://discord.gg/JPDgT4t" >
								<span class="h6 mb-0">Discord</span>
								<p class="text-small text-muted"></p>
							</a>
						</div>
							</li>
		<!-- END 1 Community - SG Update  -->				
		<!-- START 1 Store - SG Update  -->						
							<li class="nav-item">
								<a href="<?php echo $this->url('shop');?>" class="nav-link">Store</a>
							</li>
		<!-- END 1 Store - SG Update  -->						
		<!-- START 1 Ranking - SG Update  -->	
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="javascript:void(0)" id="pagesDropdown" role="button" data-toggle="dropdown">Ranking</a>
								<div class="dropdown-menu" aria-labelledby="pagesDropdown">
									
									<a class="dropdown-item" href="<?php echo $this->url('ranking','death');?>" >
										<span class="h6 mb-0" style="text-align:left;">Deaths</span>
									</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?php echo $this->url('ranking','alchemist');?>" >
										<span class="h6 mb-0" style="text-align:left;">Alchemist</span>
									</a>

									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?php echo $this->url('ranking','blacksmith');?>" >
										<span class="h6 mb-0" style="text-align:left;">Blacksmith</span>
									</a>

									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?php echo $this->url('ranking','homunculus');?>" >
										<span class="h6 mb-0" style="text-align:left;">Homunculus</span>
									</a>

									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?php echo $this->url('ranking','mvp');?>" >
										<span class="h6 mb-0" style="text-align:left;">MVPs</span>
									</a>

									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?php echo $this->url('ranking','guild');?>" >
										<span class="h6 mb-0" style="text-align:left;">Guilds</span>
									</a>

									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?php echo $this->url('ranking','zeny');?>" >
										<span class="h6 mb-0" style="text-align:left;">Zeny</span>
									</a>

									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?php echo $this->url('ranking','instances');?>" >
										<span class="h6 mb-0" style="text-align:left;">Instances</span>
									</a>

								</div>
							</li>
		<!-- END 1 Ranking - SG Update  -->
		<!-- START 1 Vote - SG Update  -->
							<li class="nav-item">
								<a href="<?php echo $this->url('voteforpoints');?>" class="nav-link">Vote</a>
							</li>
		<!-- END 1 Vote - SG Update  -->
				</ul>

						<?php if (!$session->isLoggedIn()): ?>  
							<ul class="navbar-nav">
								<li class="nav-item">
									<a class="btn btn-success" href="<?php echo $this->url('account','create');?>"><img src="<?php echo $this->themepath('img/ragnarok/quicklinks_1.png');?>"> Create an account</a>
									<span>&nbsp;or&nbsp;</span><a class="btn btn-primary" href="<?php echo $this->url('account','login');?>"><img src="<?php echo $this->themepath('img/ragnarok/male.gif');?>"> Log in</a>
								</li>
							</ul>
							<?php else:?>
								<ul class="navbar-nav">
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle dropdown-toggle-no-arrow p-lg-0" href="javascript:void(0);" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<img style="" alt="Image" src="<?php echo $this->themepath('img/ragnarok/ro_avatar.jpg');?>" class="avatar avatar-xs">  
										</a>
 
										<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" aria-labelledby="dropdown01">

											<a class="dropdown-item" href="<?php echo $this->url('main','profil');?>">Profile </a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="<?php echo $this->url('shop');?>">Shop</a>
											<a class="dropdown-item" href="<?php echo $this->url('account','logout')?>" onclick="return confirm('Are you sure you want to logout?')">Log out</a>
										</div>
									</li>
								</ul>
							<?php endif?>
						</div>  
					</nav>
				</div>
				<!--end of container-->
			</div>
		</div>


		<style>
		.breadcrumb-item + .breadcrumb-item:before {
			content: '' !important;
			font-weight: 600;
			font-size: 11px;
			transform: scaleX(0.7);
			bottom: 1px;
			position: relative;
			padding-left:15px;
		}
	</style>
	<!-- ############################################################################################################################################################################### -->
	<?php include 'main/status.php' ?>
	<div class="main-container">
		<nav aria-label="breadcrumb" role="navigation" class="bg-primary text-white" style="background:#32383e !important">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col">
						<ol class="breadcrumb">
	<!-- Start server status - SG Update  -->
							<li class="breadcrumb-item">
								<a href="">Server Statut: <?php if ($loginonline && $charonline && $maponline) {echo $onlinee;} else { echo $offlinee;} ?></a>
							</li>
	<!-- End server status - SG Update  -->	
	<!-- Start Who's online - SG Update  -->		
							<li class="breadcrumb-item" aria-current="page">
								<a href="?module=character&action=online">
								<img src="<?php echo $this->themepath('img/ragnarok/patchp.png');?>" style="max-width: 30px;"> 
								<?php echo number_format($onlinecount+$automerch); ?> Connected players</a>
							</li>
	<!-- End Who's online - SG Update  -->	
	<!-- Start Merchant's online - SG Update  -->	
							<li class="breadcrumb-item " style="" aria-current="page">
								<a href="?module=vending">
									<img src="<?php echo $this->themepath('img/ragnarok/cart.png');?>" style="max-width: 20px;"> <?php echo number_format($automerch); ?> Open store 
								</a>
							</li>
	<!-- End Merchant's online - SG Update  -->							
							<li class="breadcrumb-item " style="" aria-current="page">
								<img src="<?php echo $this->themepath('img/ragnarok/714.gif');?>" style="max-width: 20px;"> War Of emperium: 
								<p style="display:inline-block;"><?php include 'main/woestat.php' ?></p>
							</li>
						</ol>
					</div>
					<!--end of col-->
				</div>
				<!--end of row-->
			</div>
			<!--end of container-->
		</nav>

		<?php if ( $params->get('module') == 'main' AND $params->get('action') == 'index'):?>
		<div>
		</div>
		<?php else: ?>
			<?php if ( $params->get('module') == 'account' AND $params->get('action') == 'create'): ?>
			<div>
			</div>	
			<?php else: ?>
				<?php if ( $params->get('module') == 'account' AND $params->get('action') == 'login'): ?>
				<div>
				</div>	
				<?php else: ?> 	
					<?php if ( $params->get('module') == 'main' AND $params->get('action') == 'features'): ?>
					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="<?php echo $this->themepath('img/ragnarok/wallpapers/home-cover.jpg');?>" class="bg-image opacity-60">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-7 text-center">
             
              <h1 class="display-3">Server Informations</h1>
              <span class="lead">
                EyrlisRO is a free server that focuses on a classic Pre-Renewal play style. 
We work with the fastest hardware to provide you with the best gaming experience as you journey through Midgard! 
              </span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>	
<?php else: ?>
<?php if ( $params->get('module') == 'main' AND $params->get('action') == 'staff'): ?>
					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="<?php echo $this->themepath('img/ragnarok/wallpapers/papers.co-av35-cloud-town-fantasy-anime-liang-xing-illustration-art-3840x2400.jpg');?>" class="bg-image opacity-60">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-7 text-center">
             
              <h1 class="display-3">Staff Presentation</h1>
              <span class="lead">
                EyrlisRO is a free server that focuses on a classic Pre-Renewal play style. 
We work with the fastest hardware to provide you with the best gaming experience as you journey through Midgard! 
              </span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
					<?php else: ?>
<?php if ( $params->get('module') == 'shop'): ?>

					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="<?php echo $this->themepath('img/features-shop.png');?>" class="bg-image opacity-60">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-7 text-center">
             
              <h1 class="display-3">Store</h1>
              <span class="lead" style="color:white !important;">
		Help fund the server and as thanks we'll give you some awesome items as gifts. Sounds like a win-win for everyone.<br>
                 <?php include $this->themePath('main/submenu.php', true) ?>
		<?php include $this->themePath('main/pagemenu.php', true) ?>

              </span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
					<?php else: ?>

<?php if ( $params->get('module') == 'main' AND $params->get('action') == 'Download'): ?>
					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="<?php echo $this->themepath('img/ragnarok/wallpapers/maxresdefault.jpg');?>" class="bg-image opacity-60">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-7 text-center">
             
              <h1 class="display-3">EyrlisRO Full Client Download</h1>
              <span class="lead">
                EyrlisRO is a free server that focuses on a classic Pre-Renewal play style. 
We work with the fastest hardware to provide you with the best gaming experience as you journey through Midgard! 
              </span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
					<?php else: ?> 	
<?php if ( $params->get('module') == 'main' AND $params->get('action') == 'Stream'): ?>
					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="<?php echo $this->themepath('img/ragnarok/wallpapers/maxresdefault.jpg');?>" class="bg-image opacity-60">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-7 text-center">
             <img src="/website/themes/eir/img/twitch.png" style="max-width:150px;">
              <h1 class="display-3">Stream on Eirlys</h1>
              <span class="lead">
                Eirlys RO is a free server that focuses on a classic Pre-Renewal play style. 
We work with the fastest hardware to provide you with the best gaming experience as you journey through Midgard! 
              </span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
					<?php else: ?> 	
<?php if ( $params->get('module') == 'main' AND $params->get('action') == 'changelog'): ?>
					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="<?php echo $this->themepath('img/ragnarok/bg-prontera.jpg');?>" class="bg-image opacity-60">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-8 text-center">
              <h1 class="display-3">Changelog / Updates</h1>
              <span class="lead">
                Eirlys RO is a free server that focuses on a classic Pre-Renewal play style. 
We work with the fastest hardware to provide you with the best gaming experience as you journey through Midgard! 
              </span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
					<?php else: ?> 

					
<?php if ( $params->get('module') == 'ranking' AND $params->get('action') == 'character'): ?>
					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="<?php echo $this->themepath('img/body4a69.jpg');?>" class="bg-image opacity-70">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-11 col-lg-11 text-center">
              <h1 class="display-3">Ranking |  Characters</h1>
              <span class="lead">
                <a href="?module=ranking&action=death"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamCrucible.png');?>"> PvP </a> | <a href="?module=ranking&action=alchemist"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/659.png');?>"> Alchemist </a> | <a href="?module=ranking&action=blacksmith"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/1359.png');?>"> Blacksmith </a> | <a href="?module=ranking&action=homunculus"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/emblem.png');?>"> Homunculus </a> | <a href="?module=ranking&action=mvp"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamGambit.png');?>"> MVP </a> | <a href="?module=ranking&action=guild"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/housing-guilds.png');?>"> Guild </a> | <a href="?module=ranking&action=zeny"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/672.gif');?>"> Zeny </a> | <a href="?module=ranking&action=instances"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamRaid.png');?>"> Instances/Raids </a>          
		</span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
					<?php else: ?> 	
<?php if ( $params->get('module') == 'ranking' AND $params->get('action') == 'death'): ?>
					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="<?php echo $this->themepath('img/body4a69.jpg');?>" class="bg-image opacity-70">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-11 col-lg-11 text-center">
              <h1 class="display-3">Ranking |  PvP</h1>
              <span class="lead">
                <a href="?module=ranking&action=death"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamCrucible.png');?>"> PvP </a> | <a href="?module=ranking&action=alchemist"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/659.png');?>"> Alchemist </a> | <a href="?module=ranking&action=blacksmith"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/1359.png');?>"> Blacksmith </a> | <a href="?module=ranking&action=homunculus"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/emblem.png');?>"> Homunculus </a> | <a href="?module=ranking&action=mvp"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamGambit.png');?>"> MVP </a> | <a href="?module=ranking&action=guild"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/housing-guilds.png');?>"> Guild </a> | <a href="?module=ranking&action=zeny"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/672.gif');?>"> Zeny </a> | <a href="?module=ranking&action=instances"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamRaid.png');?>"> Instances/Raids </a>          
		</span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
					<?php else: ?> 	
<?php if ( $params->get('module') == 'ranking' AND $params->get('action') == 'alchemist'): ?>
					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="<?php echo $this->themepath('img/body4a69.jpg');?>" class="bg-image opacity-70">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-11 col-lg-11 text-center">
              <h1 class="display-3">Ranking |  Alchemist</h1>
              <span class="lead">
                <a href="?module=ranking&action=death"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamCrucible.png');?>"> PvP </a> | <a href="?module=ranking&action=alchemist"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/659.png');?>"> Alchemist </a> | <a href="?module=ranking&action=blacksmith"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/1359.png');?>"> Blacksmith </a> | <a href="?module=ranking&action=homunculus"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/emblem.png');?>"> Homunculus </a> | <a href="?module=ranking&action=mvp"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamGambit.png');?>"> MVP </a> | <a href="?module=ranking&action=guild"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/housing-guilds.png');?>"> Guild </a> | <a href="?module=ranking&action=zeny"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/672.gif');?>"> Zeny </a> | <a href="?module=ranking&action=instances"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamRaid.png');?>"> Instances/Raids </a>          
		</span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
					<?php else: ?> 	 
<?php if ( $params->get('module') == 'ranking' AND $params->get('action') == 'blacksmith'): ?>
					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="<?php echo $this->themepath('img/body4a69.jpg');?>" class="bg-image opacity-70">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-11 col-lg-11 text-center">
              <h1 class="display-3">Ranking |  Blacksmith</h1>
              <span class="lead">
                <a href="?module=ranking&action=death"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamCrucible.png');?>"> PvP </a> | <a href="?module=ranking&action=alchemist"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/659.png');?>"> Alchemist </a> | <a href="?module=ranking&action=blacksmith"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/1359.png');?>"> Blacksmith </a> | <a href="?module=ranking&action=homunculus"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/emblem.png');?>"> Homunculus </a> | <a href="?module=ranking&action=mvp"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamGambit.png');?>"> MVP </a> | <a href="?module=ranking&action=guild"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/housing-guilds.png');?>"> Guild </a> | <a href="?module=ranking&action=zeny"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/672.gif');?>"> Zeny </a> | <a href="?module=ranking&action=instances"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamRaid.png');?>"> Instances/Raids </a>          
		</span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
<?php else: ?> 	
<?php if ( $params->get('module') == 'ranking' AND $params->get('action') == 'homunculus'): ?>
					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="<?php echo $this->themepath('img/body4a69.jpg');?>" class="bg-image opacity-70">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-11 col-lg-11 text-center">
              <h1 class="display-3">Ranking |  Homunculus</h1>
              <span class="lead">
                <a href="?module=ranking&action=death"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamCrucible.png');?>"> PvP </a> | <a href="?module=ranking&action=alchemist"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/659.png');?>"> Alchemist </a> | <a href="?module=ranking&action=blacksmith"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/1359.png');?>"> Blacksmith </a> | <a href="?module=ranking&action=homunculus"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/emblem.png');?>"> Homunculus </a> | <a href="?module=ranking&action=mvp"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamGambit.png');?>"> MVP </a> | <a href="?module=ranking&action=guild"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/housing-guilds.png');?>"> Guild </a> | <a href="?module=ranking&action=zeny"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/672.gif');?>"> Zeny </a> | <a href="?module=ranking&action=instances"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamRaid.png');?>"> Instances/Raids </a>          
		</span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
<?php else: ?> 	
<?php if ( $params->get('module') == 'ranking' AND $params->get('action') == 'mvp'): ?>
					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="<?php echo $this->themepath('img/body4a69.jpg');?>" class="bg-image opacity-70">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-11 col-lg-11 text-center">
              <h1 class="display-3">Ranking |  MVPs</h1>
              <span class="lead">
                <a href="?module=ranking&action=death"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamCrucible.png');?>"> PvP </a> | <a href="?module=ranking&action=alchemist"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/659.png');?>"> Alchemist </a> | <a href="?module=ranking&action=blacksmith"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/1359.png');?>"> Blacksmith </a> | <a href="?module=ranking&action=homunculus"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/emblem.png');?>"> Homunculus </a> | <a href="?module=ranking&action=mvp"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamGambit.png');?>"> MVP </a> | <a href="?module=ranking&action=guild"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/housing-guilds.png');?>"> Guild </a> | <a href="?module=ranking&action=zeny"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/672.gif');?>"> Zeny </a> | <a href="?module=ranking&action=instances"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamRaid.png');?>"> Instances/Raids </a>          
		</span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
<?php else: ?> 	
<?php if ( $params->get('module') == 'ranking' AND $params->get('action') == 'guild'): ?>
					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="<?php echo $this->themepath('img/body4a69.jpg');?>" class="bg-image opacity-70">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-11 col-lg-11 text-center">
              <h1 class="display-3">Ranking |  Guild</h1>
              <span class="lead">
                <a href="?module=ranking&action=death"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamCrucible.png');?>"> PvP </a> | <a href="?module=ranking&action=alchemist"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/659.png');?>"> Alchemist </a> | <a href="?module=ranking&action=blacksmith"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/1359.png');?>"> Blacksmith </a> | <a href="?module=ranking&action=homunculus"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/emblem.png');?>"> Homunculus </a> | <a href="?module=ranking&action=mvp"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamGambit.png');?>"> MVP </a> | <a href="?module=ranking&action=guild"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/housing-guilds.png');?>"> Guild </a> | <a href="?module=ranking&action=zeny"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/672.gif');?>"> Zeny </a> | <a href="?module=ranking&action=instances"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamRaid.png');?>"> Instances/Raids </a>          
		</span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
<?php else: ?> 	
<?php if ( $params->get('module') == 'ranking' AND $params->get('action') == 'zeny'): ?>
					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="<?php echo $this->themepath('img/body4a69.jpg');?>" class="bg-image opacity-70">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-11 col-lg-11 text-center">
              <h1 class="display-3">Ranking |  Zeny</h1>
              <span class="lead">
                <a href="?module=ranking&action=death"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamCrucible.png');?>"> PvP </a> | <a href="?module=ranking&action=alchemist"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/659.png');?>"> Alchemist </a> | <a href="?module=ranking&action=blacksmith"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/1359.png');?>"> Blacksmith </a> | <a href="?module=ranking&action=homunculus"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/emblem.png');?>"> Homunculus </a> | <a href="?module=ranking&action=mvp"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamGambit.png');?>"> MVP </a> | <a href="?module=ranking&action=guild"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/housing-guilds.png');?>"> Guild </a> | <a href="?module=ranking&action=zeny"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/672.gif');?>"> Zeny </a> | <a href="?module=ranking&action=instances"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamRaid.png');?>"> Instances/Raids </a>          
		</span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
<?php else: ?> 	
<?php if ( $params->get('module') == 'ranking' AND $params->get('action') == 'instances'): ?>
					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="<?php echo $this->themepath('img/body4a69.jpg');?>" class="bg-image opacity-70">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-11 col-lg-11 text-center">
              <h1 class="display-3">Ranking |  Instances</h1>
              <span class="lead">
                <a href="?module=ranking&action=death"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamCrucible.png');?>"> PvP </a> | <a href="?module=ranking&action=alchemist"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/659.png');?>"> Alchemist </a> | <a href="?module=ranking&action=blacksmith"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/1359.png');?>"> Blacksmith </a> | <a href="?module=ranking&action=homunculus"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/emblem.png');?>"> Homunculus </a> | <a href="?module=ranking&action=mvp"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamGambit.png');?>"> MVP </a> | <a href="?module=ranking&action=guild"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/housing-guilds.png');?>"> Guild </a> | <a href="?module=ranking&action=zeny"><img style="max-width:30px;" src="<?php echo $this->themepath('img/ragnarok/672.gif');?>"> Zeny </a> | <a href="?module=ranking&action=instances"><img style="max-width:30px;" src="<?php echo $this->themepath('img/fireteamRaid.png');?>"> Instances/Raids </a>          
		</span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
<?php else: ?>
<?php if ( $params->get('module') == 'main' AND $params->get('action') == 'changes'): ?>
					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="/website/themes/eir/img/features-changes.jpg" class="bg-image opacity-70">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-11 col-lg-11 text-center">
              <h1 class="display-3">Custom changes & NPCs Informations</h1>
              <span class="lead">
		</span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
					<?php else: ?> 	

<?php if ( $params->get('module') == 'main' AND $params->get('action') == 'wboss'): ?>
					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="/website/themes/eir/img/features-wboss.jpg" class="bg-image opacity-70">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-11 col-lg-11 text-center">
              <h1 class="display-3"><img src="/website/themes/eir/img/fireteamGambit.png"> World's Boss</h1>
              <span class="lead">
		</span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
			<?php else: ?>

<?php if ( $params->get('module') == 'main' AND $params->get('action') == 'event_start'): ?>
					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="/website/themes/eir/img/ragnarok/event_start/ban.jpg" class="bg-image opacity-70">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-11 col-lg-11 text-center">
                           <span class="lead">
		</span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
					<?php else: ?> 
<?php if ( $params->get('module') == 'main' AND $params->get('action') == 'ghouse'): ?>
					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="/website/themes/eir/img/features-ghouse.jpg" class="bg-image opacity-70">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-11 col-lg-11 text-center">
	<h1 class="display-3"><img src="/website/themes/eir/img/fireteamCrucible.png "> Guild House</h1>
                           <span class="lead">
		</span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
					<?php else: ?> 
<?php if ( $params->get('module') == 'main' AND $params->get('action') == 'mvphat'): ?>
					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="/website/themes/eir/img/features-mvphat.jpg" class="bg-image opacity-70">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-11 col-lg-11 text-center">
                           <span class="lead">
		</span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
					<?php else: ?> 

<?php if ( $params->get('module') == 'main' AND $params->get('action') == 'boxhat'): ?>
					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="/website/themes/eir/img/features-boxhat.jpg" class="bg-image opacity-70">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-11 col-lg-11 text-center">
                           <span class="lead">
		</span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
					<?php else: ?> 
<?php if ( $params->get('module') == 'voteforpoints'): ?>
					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="/website/themes/eir/img/ragnarok/wallpapers/features-vote.jpg" class="bg-image opacity-70">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-11 col-lg-11 text-center">
                           <span class="lead">
		</span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
					<?php else: ?> 
<?php if ( $params->get('module') == 'main' AND $params->get('action') == 'gmerchant'): ?>
					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="/website/themes/eir/img/features-gmarchant.jpg" class="bg-image opacity-70">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-11 col-lg-11 text-center">
		<h1 class="display-3"><img src="/website/themes/eir/img/fireteamTrials.png "> Guild Merchant's</h1>

                           <span class="lead">
		</span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
					<?php else: ?> 	
<?php if ( $params->get('module') == 'main' AND $params->get('action') == 'ninerealm'): ?>
					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="/website/themes/eir/img/features-raids.jpg" class="bg-image opacity-70">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-11 col-lg-11 text-center">
	<h1 class="display-3"><img src="/website/themes/eir/img/fireteamRaid.png "> Nine Realms</h1>
                           <span class="lead">
		</span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
					<?php else: ?> 
<?php if ( $params->get('module') == 'main' AND $params->get('action') == 'helheim'): ?>
					<section class="height-50 bg-dark text-white">
        <img alt="Image" src="/website/themes/eir/img/helheim.jpg" class="bg-image opacity-70">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-11 col-lg-11 text-center">
		<h1 class="display-3"><img src="/website/themes/eir/img/helheim.png "> Helheim</h1>
                           <span class="lead">
		</span>
              
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
				<?php else: ?>	
					<section class="bg-gradient text-light p-0 bar" style="background: linear-gradient(135deg, #2d81ca 0%, #285796 100%);">
						<div class="container">
							<div class="row justify-content-between align-items-center">
								<div class="col-12 col-md-6">
									<div class="space-lg pb-0">
										<h1 class="display-4"><img src="<?php echo $this->themepath('img/ragnarok/boob.png');?>"><?php if (isset($title)) echo "$title" ?></h1>
										<?php include $this->themePath('main/submenu.php', true) ?>
										<?php include $this->themePath('main/pagemenu.php', true) ?>
									</div>
								</div>
								<!--end of col-->
							</div>
							<!--end of row-->
						</div>
						<!--end of container-->
						<svg class="decorative-divider" preserveAspectRatio="none" viewBox=" 0 0 100 100">
							<polygon fill="#212529" points="0 100 100 100 100 0"></polygon>
						</svg>
					</section>

					<section class="space-sm bg-dark"><div class="container"></div></section>


				<?php endif; ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
		<?php if ( $params->get('module') == 'main' AND $params->get('action') == 'index'):?>
		<div>
		</div>
		<?php else: ?>
			<?php if ( $params->get('module') == 'account' AND $params->get('action') == 'create'): ?>
			<div>
			</div>
			<?php else: ?>

				<?php if ( $params->get('module') == 'account' AND $params->get('action') == 'login'): ?>
				<div>
				</div>		
				<?php else: ?>
					<div class="container" style="padding-bottom: 20px;color: grey !important;">


					<?php endif; ?>
				<?php endif; ?>
				<?php endif; ?>


				<style type="text/css">
					.inner h2,td,p,a{ color: grey; }
					.inner p{ color: grey; }
					.inner td{ color: grey; }
					.inner td p{ color: grey; }
				</style>		