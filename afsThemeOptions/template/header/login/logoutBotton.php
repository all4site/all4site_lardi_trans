<div is="userDropdownMenu" inline-template>
	<div class="user-login position-relative" @mouseover="show = true">
		<?php if ( is_user_logged_in() ) : ?>
		<?php if ( ! empty( $args ) ): ?>
			<img src="<?php echo $args['userLogo']['url'] ?>" alt="" id="user-logo-header" class="rounded-circle logo-image ml-3 mr-2 object-fit-cover">
		<?php else: ?>
			<i class="far fa-user rounded-circle bg-grey  ml-3 mr-2 logo-image justify-content-center align-items-center d-flex"></i>
		<?php endif; ?>

		<transition name="fade">
			<div class="user-dropdown-menu position-absolute bg-grey-light z-index-1 shadow-2" v-show="show" @mouseleave="show = false" v-cloak>
				<?php get_template_part( 'afsThemeOptions/template/header/menuDropdown/userMenu' ) ?>
			</div>
		</transition>
	</div>
</div>
<?php endif; ?>
