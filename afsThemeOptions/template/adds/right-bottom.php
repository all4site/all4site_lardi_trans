<?php use AFS\Ads;?>

<div class="col-md-12 mt-3">
	<a href="<?php echo Ads::getAdsBottomRightLink() ?>" class="text-dark text-decoration-none">
		<div class="card text-secondary border-0">
			<img src="<?php echo Ads::getAdsBottomRightUrl() ?>" class="card-img img-fluid">

			<div class="card-img-overlay align-items-center d-flex justify-content-center adsBackground">
				<p class="card-title text-white"><?php echo Ads::getAdsBottomRightText();?></p>
			</div>
		</div>
	</a>
</div>
