<div class="col-md-8 bg-grey-light pt-5 pb-5 rounded-right-bottom">

	<h4 class="text-center mb-5"><?php _e( 'Личные данные', 'lardi' ) ?></h4>

	<div is="userData" inline-template>
		<form action="" method="post" class="col-md-7 m-auto p-0" @submit.prevent="submit" id="userData">

			<!--			--><?php //get_template_part( 'afsThemeOptions/template/preloader/spinner' ) ?>

			<?php get_template_part( 'afsThemeOptions/template/formPart/input', '', [
				'title'        => 'Имя',
				'type'         => 'text',
				'args'         => 'firstName',
				'value'        => $args['firstName'],
				'wrpper-class' => '',
				'input-class'  => ''
			] ) ?>

			<?php get_template_part( 'afsThemeOptions/template/formPart/input', '', [
				'title'        => 'Фамилия',
				'type'         => 'text',
				'args'         => 'lastName',
				'value'        => $args['lastName'],
				'wrpper-class' => '',
				'input-class'  => ''
			] ) ?>

			<?php get_template_part( 'afsThemeOptions/template/formPart/input', '', [
				'title'        => 'Никнейм',
				'type'         => 'text',
				'args'         => 'nickName',
				'value'        => $args['nickName'],
				'wrpper-class' => '',
				'input-class'  => ''
			] ) ?>

			<?php get_template_part( 'afsThemeOptions/template/formPart/oneImageUpload', '', [
				'title'        => 'Выберите фото профиля',
				'type'         => 'file',
				'args'         => 'customFile',
				'value'        => ( isset( $args['customFile'] ) ) ? $args['customFile'] : '',
				'wrpper-class' => '',
				'input-class'  => ''
			] ) ?>

			<?php get_template_part( 'afsThemeOptions/template/formPart/input', '', [
				'title'        => 'Город',
				'type'         => 'text',
				'args'         => 'userSity',
				'value'        => $args['userSity'],
				'wrpper-class' => '',
				'input-class'  => ''
			] ) ?>
			<?php get_template_part( 'afsThemeOptions/template/formPart/input', '', [
				'title'        => 'Телефон',
				'type'         => 'text',
				'args'         => 'userPhone',
				'value'        => $args['userPhone'],
				'wrpper-class' => '',
				'input-class'  => ''
			] ) ?>
			<?php get_template_part( 'afsThemeOptions/template/formPart/input', '', [
				'title'        => 'E-mail',
				'type'         => 'text',
				'args'         => 'userEmail',
				'value'        => $args['userEmail'],
				'wrpper-class' => '',
				'input-class'  => ''
			] ) ?>

			<button type="submit" class="btn btn-primary btn-block mt-3" name="userDataBtn">
				<?php _e( 'Сохранить', 'lardi' ) ?>
			</button>
		</form>
	</div>

	<div is="chagePassword" inline-template>
		<div>
			<h4 class="text-center mt-8"><?php _e( 'Изменить пароль', 'lardi' ) ?></h4>
			<p class="text-center mb-5"><?php _e( 'Пароль должен содержать не менее 6 символов.', 'lardi' ) ?></p>
			<form action="" method="post" class="col-md-7 m-auto p-0" @submit.prevent="passwordChange" id="passwordChnage">

				<?php echo get_template_part( 'afsThemeOptions/template/preloader/preloader' ) ?>

				<div class="form-group">
					<input type="password" class="form-control"
					       autocomplete="on"
					       placeholder="<?php _e( 'Текущий пароль', 'lardi' ) ?>"
					       v-model="oldPassword"
					>
					<div class="text-danger" v-if="oldPasswordVal !=''">{{oldPasswordVal}}</div>
				</div>
				<div class="form-group">
					<input type="password" class="form-control"
					       autocomplete="off"
					       placeholder="<?php _e( 'Новый пароль', 'lardi' ) ?>"
					       v-model="newPassword"
					>
					<div class="text-danger" v-if="newPasswordVal !=''">{{newPasswordVal}}</div>
					<div class="text-danger" v-if="newPasswordVal !=''">{{passwordNotMach}}</div>
				</div>
				<div class="form-group">
					<input type="password" class="form-control"
					       autocomplete="off"
					       placeholder="<?php _e( 'Повторите пароль', 'lardi' ); ?>"
					       v-model="confirmNewPassword"
					>
					<div class="text-danger" v-if="confirmNewPasswordVal !=''">{{confirmNewPasswordVal}}</div>
					<div class="text-danger" v-if="confirmNewPasswordVal !=''">{{passwordNotMach}}</div>
				</div>


				<button type="submit" class="btn btn-primary btn-block mt-3" name="userPasswordBtn">
					<?php _e( 'Сохранить', 'lardi' ) ?>
				</button>
			</form>
		</div>
	</div>
</div>
