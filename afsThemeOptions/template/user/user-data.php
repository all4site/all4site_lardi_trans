<div class="col-md-8 bg-grey-light pt-5 pb-5 rounded-right-bottom">

	<h4 class="text-center mb-5"><?php _e( 'Личные данные', 'lardi' ) ?></h4>

	<div is="userData" inline-template>
		<form action="" method="post" class="col-md-7 m-auto" @submit.prevent="submit" id="userData">

			<?php get_template_part( 'afsThemeOptions/template/preloader/preloader' ) ?>

			<div class="form-group">
				<input type="text" class="form-control" placeholder="<?php _e( 'Имя', 'lardi' ) ?>"
				       v-model="firstName"
				       :name="firstNameData ='<?php echo ( $args['firstName'] ) ? $args['firstName'] : '' ?>'">
				<div v-if="firstNameError!=''" class="text-danger text-center">{{firstNameError}}</div>
			</div>

			<div class="form-group">
				<input type="text" class="form-control" placeholder="<?php _e( 'Фамилия', 'lardi' ) ?>"
				       v-model="lastName"
				       :name="lastNameData ='<?php echo ( $args['lastName'] ) ? $args['lastName'] : '' ?>'">
				<div v-if="lastNameError!=''" class="text-danger text-center">{{lastNameError}}</div>
			</div>

			<div class="form-group">
				<input type="text" class="form-control" placeholder="<?php _e( 'Никнейм', 'lardi' ) ?>"
				       v-model="nickName"
				       :name="nickNameData ='<?php echo ( $args['nickName'] ) ? $args['nickName'] : '' ?>'">
				<div v-if="nickNameError!=''" class="text-danger text-center">{{nickNameError}}</div>
			</div>

			<div class="custom-file mb-3">
				<label class="custom-file-label"
				       for="customFile"><?php _e( 'Выберите фото профиля', 'lardi' ) ?></label>
				<input type="file" class="custom-file-input" id="customFile"
				       @change="userLogoData"
				       @click="reset">
			</div>

			<div v-if="userLogoShowBlock" class="position-relative mb-3">
				<i class="far fa-trash-alt trash-form-icon cursor-pointer" @click="deleteImage"></i>
				<img :src="userLogoPreview" alt="" class="w-50 img-fluid img-thumbnail">
			</div>

			<div class="form-group">
				<input type="text" class="form-control" placeholder="<?php _e( 'Город', 'lardi' ) ?>"
				       v-model="userSity"
				       :name="userSityData ='<?php echo ( $args['userSity'] ) ? $args['userSity'] : '' ?>'">
			</div>

			<div class="form-group">
				<input type="text" class="form-control" placeholder="<?php _e( 'Телефон', 'lardi' ) ?>"
				       v-model="userPhone"
				       :name="userPhoneData ='<?php echo ( $args['userPhone'] ) ? $args['userPhone'] : '' ?>'">
				<div v-if="userPhoneError!=''" class="text-danger text-center">{{userPhoneError}}</div>
			</div>

			<div class="form-group">
				<input type="text" class="form-control" placeholder="<?php _e( 'E-mail', 'lardi' ) ?>"
				       v-model="userEmail"
				       :name="userEmailData ='<?php echo ( $args['userEmail'] ) ? $args['userEmail'] : '' ?>'">
				<div v-if="userEmailError!=''" class="text-danger text-center">{{userEmailError}}</div>
			</div>

			<button type="submit" class="btn btn-primary btn-block mt-3" name="userDataBtn">
				<?php _e( 'Сохранить', 'lardi' ) ?>
			</button>
		</form>
	</div>

	<div is="chagePassword" inline-template>
		<div>
			<h4 class="text-center mt-8"><?php _e( 'Изменить пароль', 'lardi' ) ?></h4>
			<p class="text-center mb-5"><?php _e( 'Пароль должен содержать не менее 6 символов.', 'lardi' ) ?></p>
			<form action="" method="post" class="col-md-7 m-auto" @submit.prevent="passwordChange" id="passwordChnage">

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
