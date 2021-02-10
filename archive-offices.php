<?php get_header() ?>
<?php
$addTransport = fw_get_db_settings_option( 'addTransport' );
$moreCheckbox = [
	'loading'      => 'погрузка',
	'unloading'    => 'разгрузка',
	'packaging'    => 'упаковка',
	'riggingWorks' => 'такелажные работы'
];
$postType     = 'offices';
//dump( get_post_meta( 2263, '', true ) );
?>
	<div class="container-fluid d-flex flex-wrap wrapper justify-content-center">

		<div class="row col-md-3 mr-md-4 bg-viollet text-white rounded-left-top rounded-left-bottom h-fit-content">
			<h3 class="font-weight-bold mt-3 mb-5 col-12">Перевозка офиса / квартиры</h3>
			<div is="goodsFilter" inline-template>
				<form action="" method="post" id="goodsFilter" name="goodsFilter" class="mb-5" @submit.prevent="sendDataToServer">

					<input type="hidden" name="archiveName" id="postTypeName" value="<?php echo $postType; ?>">

					<p class="col-12 font-weight-bold mb-3">Цена</p>
					<div class="row col-11 m-auto">
						<div class="input-group">
							<?php get_template_part( 'afsThemeOptions/template/formPart/input', 'clear', [
								'placeholder'  => 'От',
								'type'         => 'number',
								'name'         => 'costInput[]',
								'id'           => 'priceFrom',
								'value'        => '',
								'wrpper-class' => '',
								'input-class'  => ''
							] ) ?>
							<?php get_template_part( 'afsThemeOptions/template/formPart/input', 'clear', [
								'placeholder'  => 'До',
								'type'         => 'number',
								'name'         => 'costInput[]',
								'id'           => 'priceTo',
								'value'        => '',
								'wrpper-class' => '',
								'input-class'  => ''
							] ) ?>
							<a href="#!" class="btn btn-primary rounded-0 rounded-right-top rounded-right-bottom" @click.prevent="sendDataToServerFunction">OK</a>
						</div>
					</div>

					<p class="col-12 font-weight-bold mb-3 mt-5">Дата</p>
					<div class="row col-11 m-auto">
						<?php get_template_part( 'afsThemeOptions/template/formPart/date', '', [
							'title'        => 'Выберите дату',
							'type'         => 'date',
							'args'         => 'date',
							'value'        => $args['from'],
							'wrpper-class' => 'col-12 p-0',
							'input-class'  => '',
							'vue-data'     => '@change="sendDataToServerFunction"'
						] ) ?>
						<a href="#!" class="btn btn-primary btn-block" @click.prevent="dateReset">Сброс</a>
					</div>

					<p class="col-12 font-weight-bold mb-3 mt-5">Транспорт</p>
					<div class="row col-11 m-auto">
						<?php get_template_part( 'afsThemeOptions/template/formPart/select', '', [
							'title'          => 'Транспорт',
							'type'           => 'select',
							'args'           => 'transport',
							'select-options' => $addTransport,
							'value'          => '',
							'wrpper-class'   => 'col-12 p-0',
							'input-class'    => '',
							'vue-data'       => "@change='sendDataToServerFunction'"
						] ) ?>
					</div>

					<p class="col-12 font-weight-bold mb-3 mt-5">Дополнительно</p>
					<div class="row col-11 m-auto">
						<?php foreach ( $moreCheckbox as $key => $value ): ?>
							<?php get_template_part( 'afsThemeOptions/template/formPart/checkbox', '', [
								'title'        => $value,
								'type'         => 'checkbox',
								'id'           => $key,
								'name'         => $key,
								'value'        => '',
								'wrpper-class' => 'col-12 d-flex p-0',
								'input-class'  => '',
								'vue-data'     => '@click="sendChesckboxDataTrueOrFalse"',
							] ) ?>
						<?php endforeach; ?>
					</div
				</form>
			</div>
		</div>

		<div class="row col-md-6 p-0 h-fit-content">
			<?php get_template_part( 'afsThemeOptions/template/frontend/archive/goods', 'archive', $postType ) ?>
		</div>

		<div class="col-md-3 ml-md-1 d-flex justify-content-center" id="adsBlock" is="adsBlock" inline-template>
			<div class="row position-relative">
				<div class="asd-wrapper" :class="data" :style="{top: dataCss}">
					<?php get_template_part( 'afsThemeOptions/template/adds/userProfile/add', 'one', $adsData ) ?>
					<?php get_template_part( 'afsThemeOptions/template/adds/userProfile/add', 'two', $adsData ) ?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer() ?>