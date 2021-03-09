<div is="contactFormFooter" inline-template>
	<div class="col-md-5 m-auto pt-8 pb-8">
		<h2 class="text-center"><?php _e( 'Напишите нам', 'lardi' ) ?></h2>
		<p class="text-center">
			<?php _e( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis hic in incidunt, iure iusto laboriosam laborum saepe similique soluta sunt!', 'lardi' ) ?>
		</p>

		<form action="" method="post" class="mt-6 position-relative" @submit.prevent="cfFooter" id="contactFormFooter">

			<div class="form-row">
				<?php get_template_part( 'afsThemeOptions/template/formPart/input', 'icon', [
					'title'            => 'Ваше имя',
					'type'             => 'text',
					'args'             => 'name',
					'value'            => '',
					'wrpper-class'     => 'col-md-6',
					'input-class'      => '',
					'label-text'       => '',
					'label-span-class' => '',
					'icon-class'       => 'far fa-user footer-form-icon icon-rtl'
				] ) ?>
				<?php get_template_part( 'afsThemeOptions/template/formPart/input', 'icon', [
					'title'            => 'Email',
					'type'             => 'email',
					'args'             => 'email',
					'value'            => '',
					'wrpper-class'     => 'col-md-6',
					'input-class'      => '',
					'label-text'       => '',
					'label-span-class' => '',
					'icon-class'       => 'far fa-envelope footer-form-icon icon-rtl'
				] ) ?>
			</div>

			<div class="form-row">
				<?php get_template_part( 'afsThemeOptions/template/formPart/description', 'icon', [
					'name'         => 'footerDescription',
					'id'           => 'footerDescription',
					'value'        => 'Сообщение',
					'wrpper-class' => 'col-md-8',
					'icon-class'   => 'far fa-edit footer-form-icon icon-rtl',
					'textarea-row' => '2'
				] ) ?>

				<div class="form-group col-md-4 d-flex my-btn-footer">
					<button type="submit" class="btn btn-primary btn-block"><?php _e( 'Отправить', 'lardi' ) ?></button>
				</div>
			</div>
		</form>

	</div>
</div>