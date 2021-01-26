<div class="col-md-4 bg-viollet p-4 rounded-left-bottom">
	<ul class="nav flex-column userMenu">
		<?php foreach ( linkInUserProfile() as $key => $value ): ?>
			<a href="<?php echo $value['link']; ?>" class="nav-link text-white">
				<li class="nav-item text-uppercase"><?php echo $value['name']; ?></li>
			</a>
		<?php endforeach; ?>
	</ul>
</div>