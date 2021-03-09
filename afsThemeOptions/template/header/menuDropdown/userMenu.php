<div class="my-user-menu-dropdown p-2 bg-viollet">
	<?php foreach (linkInUserProfile() as $key => $value):?>
		<a href="<?php echo $value['link'] ?>" class="my-user-menu-dropdown-inner text-white"><?php echo $value['name']?></a>
	<?php endforeach;?>
	<form action="" method="post">
		<button type="submit" class="border-0 bg-transparent my-logout-hover my-user-menu-dropdown-inner text-white" name="logoutBtn">
			<span><?php _e( 'Выйти', 'lardi' ); ?></span>
		</button>
	</form>
</div>

