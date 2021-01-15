<div is="contactFormFooter" inline-template>
	<div class="col-md-5 m-auto pt-8 pb-8">
		<h2 class="text-center"><?php _e( 'Напишите нам', 'lardi' ) ?></h2>
		<p class="text-center">
			<?php _e( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis hic in incidunt, iure iusto laboriosam laborum saepe similique soluta sunt!', 'lardi' ) ?>
		</p>
		<form action="" method="post" class="mt-6 position-relative" @submit.prevent="cfFooter">
			<?php echo get_template_part( 'afsThemeOptions/template/preloader/preloader' ); ?>
			<div class="form-row">
				<div class="form-group col-md-6 ">
					<i class="far fa-user footer-form-icon"></i>
					<input v-model="name"
					       type="text"
					       placeholder="<?php _e( 'Ваше имя', 'lardi' ) ?>"
					       class="form-control"	>
					<div  class="text-danger" v-if="nameError!= ''">{{nameError}}</div>
				</div>
				<div class="form-group col-md-6">
					<i class="far fa-envelope footer-form-icon"></i>
					<input
						v-model="email"
						type="email"
						placeholder="<?php _e( 'Email', 'lardi' ) ?>"
						class="form-control">
					<div  class="text-danger" v-if="emailError!= ''">{{emailError}}</div>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-8">
					<i class="far fa-edit footer-form-icon"></i>
					<textarea
						v-model="text"
						placeholder="<?php _e( 'Сообщение', 'lardi' ) ?>"
						class="form-control"></textarea>
				</div>
				<div class="form-group col-md-4 d-flex ">
					<button type="submit" class="btn btn-primary btn-block"><?php _e( 'Отправить', 'lardi' ) ?></button>
				</div>
			</div>
		</form>
	</div>
</div>