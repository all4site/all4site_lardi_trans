<?php use AFS\UserSubscribe; ?>

<div class="col-md-8 bg-grey-light p-5 rounded-right-bottom">
	<p class="text-center mb-5"><?php echo UserSubscribe::getSubscribeTextarea() ?></p>

	<div class="col-md-9 py-3 m-auto rounded-lg">
		<div class="card border-0 shadow-4 rounded-lg">
			<div class="card-body text-center py-5">
				<h2 class="card-title text-nowrap font-weight-bold text-secondary text-left pl-3 basic-font-size-big-8">
					<?php echo UserSubscribe::getSubscribePrice() ?>
					<span class="basic-font-size-big-1">
						<?php echo UserSubscribe::getSubscribePriceSmall() ?>
					</span>
				</h2>
				<ul class="list-style-none p-0">
					<?php foreach ( UserSubscribe::getSubscribeRules() as $key => $value ): ?>
						<li class="p-3 d-flex">
							<i class="fas fa-check-circle text-secondary basic-font-size-big-5 mr-3 mt-1"></i>
							<h5 class="text-left"><?php echo $value['name'] ?></h5>
						</li>
					<?php endforeach; ?>
				</ul>
				<div is="paypal" inline-template>
					<div>
						<span class="basic-font-size-big-6">Подписаться</span>
						<div id="paypal-button-container" class="mt-3"></div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>




