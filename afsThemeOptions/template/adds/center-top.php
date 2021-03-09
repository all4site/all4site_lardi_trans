<?php use AFS\Ads; ?>

<div class="col-md-8 mx-auto mt-4">
	<a href="<?php echo Ads::getAdsCenterLink() ?>" class="text-dark text-decoration-none">
		<div class="card text-secondary border-0">
			<img class="card-img whide-ads img-fluid" src="<?php echo Ads::getAdsCenterUrl() ?>">

			<div class="card-img-overlay align-items-center d-flex justify-content-center adsBackground">
				<p class="card-title text-white"><?php echo Ads::getAdsCenterText() ?></p>
			</div>
		</div>
	</a>
</div>
