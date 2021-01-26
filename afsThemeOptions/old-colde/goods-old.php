<?php
$addBodyType      = fw_get_db_settings_option( 'addBodyType' );
$addCurrency      = fw_get_db_settings_option( 'addCurrency' );
$addPaymentFrom   = fw_get_db_settings_option( 'addPaymentFrom' );
$addPaymentMoment = fw_get_db_settings_option( 'addPaymentMoment' );

?>
<?php get_header() ?>
	<div class="wrapper mb-5 m-auto" is="goodsCreateUpdatePost" inline-template>
		<div class="container-fluid">
			<div class="row  bg-grey-light">
				<div class="col-md-5 text-center m-auto py-4">
					<h4 class="text-center font-weight-bold"><?php _e( 'Добавить объявление в категорию "Груз"', 'lardi' ) ?></h4>
					<p class="mt-4"><?php _e( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, provident?', 'lardi' ) ?></p>

					<form action="post" class="mt-5" @submit.prevent="goodsForm">
						<?php get_template_part( 'afsThemeOptions/template/preloader/preloader' ) ?>
						<?php get_template_part( 'afsThemeOptions/template/multiImageUpload/multiImageUploadUpdate' ) ?>

						<div class="form-group position-relative" v-for="(input, index) in inputs" :key="input.name">
							<label v-if="input.label!=''"
							       :for="input.name"
							       :class="input.labelClass"
							       @click.prevent="labelCkick">
								{{input.label}}
								<i :class="input.icon"></i>
							</label>

							<input :type="input.type"
							       @click="labelCkick"
							       class="form-control"
							       v-model="input.data"
							       :id="input.name"
							       :class="input.class"
							       :placeholder="input.placeholder">
							<div v-if="input.error!=''" class="text-danger text-center">{{input.error}}</div>
						</div>

						<!--Габариты кузова-->
						<h5 class="font-weight-bold mt-5 mb-4">Габариты кузова</h5>
						<div class="row">
							<div class="form-group position-relative"
							     v-for="(input, index) in sizes"
							     :class="input.wrapperClass"
							     :key="input.name">

								<div v-if="input.type == 'textarea'">
										<textarea :type="input.type"
										          @click="labelCkick"
										          class="form-control "
										          rows="4"
										          v-model="input.data"
										          :id="input.name"
										          :class="input.class"
										          :placeholder="input.placeholder">
										</textarea>
									<div v-if="input.error!=''" class="text-danger text-center">{{input.error}}</div>
								</div>
								<div v-else-if="input.type === 'select'">

									<select :name="input.name"
									        :id="input.name"
									        v-model="input.data"
									        class="text-secondary"
									        :class="input.class">

										<option disabled value="">Выберите один из вариантов</option>
										<?php foreach ( $addBodyType as $key => $value ): ?>
											<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
										<?php endforeach; ?>

									</select>
								</div>
								<div v-else-if="input.type === 'checkbox'">
									<input :type="input.type"
									       @click="labelCkick"
									       v-model="input.data"
									       :id="input.name"
									       :class="input.class"
									       :placeholder="input.placeholder">
									<div v-if="input.error!=''" class="text-danger text-center">{{input.error}}</div>
									<label v-if="input.label!=''"
									       :for="input.name"
									       :class="input.labelClass"
									       @click.prevent="labelCkick">
										{{input.label}}
										<span class="d-block check"></span>
									</label>

								</div>
								<div v-else>
									<label v-if="input.label!=''"
									       :for="input.name"
									       :class="input.labelClass"
									       @click.prevent="labelCkick">
										{{input.label}}
										<i :class="input.icon"></i>
									</label>
									<input :type="input.type"
									       class="form-control "
									       v-model="input.data"
									       :id="input.name"
									       :class="input.class"
									       :placeholder="input.placeholder">
									<div v-if="input.error!=''" class="text-danger text-center">{{input.error}}</div>
								</div>

							</div>
						</div>

						<!--Стоимость услуги-->
						<h5 class="font-weight-bold mt-5 mb-4">Стоимость услуги</h5>
						<div class="row">

							<div class="form-group position-relative"
							     v-for="(input, index) in coast"
							     :class="input.wrapperClass"
							     :key="input.name">

								<div v-if="input.name === 'currency'">

									<select :name="input.name"
									        :id="input.name"
									        v-model="input.data"
									        class="text-secondary"
									        :class="input.class">

										<?php foreach ( $addCurrency as $currencyKey => $currencyValue ): ?>
											<?php if ( $currencyKey == 0 ): ?>
												<option value="" disabled> {{input.placeholder}}</option>
											<?php endif; ?>

											<option value="<?php echo $currencyValue; ?>"> <?php echo $currencyValue; ?> </option>
										<?php endforeach; ?>


									</select>
									<div v-if="input.error!=''" class="text-danger text-center">{{input.error}}</div>
								</div>

								<div v-else-if="input.name === 'paymentFrom'">

									<select :name="input.name"
									        :id="input.name"
									        v-model="input.data"
									        class="text-secondary"
									        :class="input.class">

										<?php foreach ( $addPaymentFrom as $key => $value ): ?>
											<?php if ( $key == 0 ): ?>
												<option value="" disabled> {{input.placeholder}}</option>
											<?php endif; ?>

											<option value="<?php echo $value; ?>"> <?php echo $value; ?> </option>
										<?php endforeach; ?>


									</select>
									<div v-if="input.error!=''" class="text-danger text-center">{{input.error}}</div>
								</div>
								<div v-else-if="input.name === 'paymentMoment'">

									<select :name="input.name"
									        :id="input.name"
									        v-model="input.data"
									        class="text-secondary"
									        :class="input.class">

										<?php foreach ( $addPaymentMoment as $key => $value ): ?>
											<?php if ( $key == 0 ): ?>
												<option value="" disabled> {{input.placeholder}}</option>
											<?php endif; ?>

											<option value="<?php echo $value; ?>"> <?php echo $value; ?> </option>
										<?php endforeach; ?>


									</select>
									<div v-if="input.error!=''" class="text-danger text-center">{{input.error}}</div>
								</div>

								<div v-else>
									<label v-if="input.label!=''"
									       :for="input.name"
									       :class="input.labelClass"
									       @click.prevent="labelCkick">
										{{input.label}}
										<i :class="input.icon"></i>
									</label>
									<input :type="input.type"
									       class="form-control "
									       v-model="input.data"
									       :id="input.name"
									       :class="input.class"
									       :placeholder="input.placeholder">
									<div v-if="input.error!=''" class="text-danger text-center">{{input.error}}</div>
								</div>

							</div>

						</div>


						<!--Контактные данные-->
						<h5 class="font-weight-bold mt-5 mb-4">Контактные данные</h5>
						<div class="form-group position-relative" v-for="(input, index) in contacts" :key="input.name">
							<label v-if="input.label!=''"
							       :for="input.name"
							       :class="input.labelClass"
							       @click.prevent="labelCkick">
								{{input.label}}
								<i :class="input.icon"></i>
							</label>

							<input :type="input.type"
							       class="form-control"
							       v-model="input.data"
							       :id="input.name"
							       :class="input.class"
							       :placeholder="input.placeholder">
							<div v-if="input.error!=''" class="text-danger text-center">{{input.error}}</div>

						</div>
						<button type="submit"
						        class="btn btn-primary btn-block ">
							{{button.placeholder}}
						</button>
					</form>
				</div>

				<div class="col-md-12">
				<?php get_template_part('afsThemeOptions/template/adds/createGoodsBottom/createGoods')?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer() ?>