<?php use AFS\Ads;?>

<div class="col-md-12">
	<a href="<?php echo Ads::getAdsTopRightLink() ?>" class="text-dark text-decoration-none">
		<div class="card text-secondary border-0">
				<img src="<?php echo Ads::getAdsTopRightUrl() ?>" class="card-img img-fluid">

				<div class="card-img-overlay align-items-center d-flex justify-content-center adsBackground">
					<p class="card-title text-white"><?php echo Ads::getAdsTopRightText();?></p>
				</div>
		</div>
	</a>
</div>

