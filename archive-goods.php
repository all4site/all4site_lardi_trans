<?php get_header() ?>
<?php

use AFS\PostFilter;

$lenthFilter = fw_get_db_settings_option( 'lenth_filter' );
$widthFilter = fw_get_db_settings_option( 'width_filter' );
$heightFiter = fw_get_db_settings_option( 'height_fiter' );
$weightFiter = fw_get_db_settings_option( 'weight_fiter' );
$volumeFiter = fw_get_db_settings_option( 'volume_fiter' );
$postType    = 'goods';
$title       = 'Груз';
?>
	<div class="container-fluid d-flex flex-wrap wrapper justify-content-center">

		<div class="row col-md-3 mr-md-4 bg-viollet text-white rounded-left-top rounded-left-bottom h-fit-content">
			<h3 class="font-weight-bold mt-3 mb-5 col-12"><?php echo $title ?></h3>
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

					<p class="col-12 font-weight-bold mb-3 mt-5">Локация</p>
					<div class="row col-11 m-auto">
						<?php get_template_part( 'afsThemeOptions/template/formPart/select', '', [
							'title'          => 'Откуда?',
							'type'           => 'select',
							'args'           => 'from',
							'select-options' => PostFilter::getFromCity( $postType ),
							'value'          => '',
							'wrpper-class'   => 'col-12 p-0',
							'input-class'    => '',
							'vue-data'       => "@change='sendDataToServerFunction'"
						] ) ?>

						<?php get_template_part( 'afsThemeOptions/template/formPart/select', '', [
							'title'          => 'Куда?',
							'type'           => 'select',
							'args'           => 'where',
							'select-options' => PostFilter::getWhereCity( $postType ),
							'value'          => '',
							'wrpper-class'   => 'col-12 p-0',
							'input-class'    => '',
							'vue-data'       => "@change='sendDataToServerFunction'"
						] ) ?>
						<a href="#!" class="btn btn-primary btn-block" @click.prevent="locationReset">Сброс</a>
					</div>

					<p class="col-12 font-weight-bold mb-3 mt-5">Дата</p>
					<div class="row col-11 m-auto">
						<?php get_template_part( 'afsThemeOptions/template/formPart/date', '', [
							'title'        => 'Выберите дату',
							'type'         => 'date',
							'args'         => 'date',
							'value'        => ( isset( $args['from'] ) ) ? $args['from'] : '',
							'wrpper-class' => 'col-12 p-0',
							'input-class'  => '',
							'vue-data'     => '@change="sendDataToServerFunction"'
						] ) ?>
						<a href="#!" class="btn btn-primary btn-block" @click.prevent="dateReset">Сброс</a>
					</div>

					<p class="col-12 font-weight-bold mb-3 mt-4">Длинна</p>
					<div class="row col-11 m-auto">
						<?php foreach ( $lenthFilter as $key => $value ): ?>
							<?php get_template_part( 'afsThemeOptions/template/formPart/checkbox', '', [
								'title'        => $value['name'],
								'type'         => 'checkbox',
								'id'           => 'lenth_' . $key,
								'name'         => 'lenth[]',
								'value'        => $value['from'] . '-' . $value['to'],
								'wrpper-class' => 'col-12 d-flex p-0',
								'input-class'  => '',
								'vue-data'     => '@click="sendDataToServerFunction"',
							] ) ?>
						<?php endforeach; ?>
					</div

					<p class="col-12 font-weight-bold mb-3 mt-4">Ширина</p>
					<div class="row col-11 m-auto">
						<?php foreach ( $widthFilter as $key => $value ): ?>
							<?php get_template_part( 'afsThemeOptions/template/formPart/checkbox', '', [
								'title'        => $value['name'],
								'type'         => 'checkbox',
								'id'           => 'width_' . $key,
								'name'         => 'width[]',
								'value'        => $value['from'] . '-' . $value['to'],
								'wrpper-class' => 'col-12 d-flex p-0',
								'input-class'  => '',
								'vue-data'     => '@click="sendDataToServerFunction"'
							] ) ?>
						<?php endforeach; ?>
					</div>

					<p class="col-12 font-weight-bold mb-3 mt-4">Высота</p>
					<div class="row col-11 m-auto">
						<?php foreach ( $heightFiter as $key => $value ): ?>
							<?php get_template_part( 'afsThemeOptions/template/formPart/checkbox', '', [
								'title'        => $value['name'],
								'type'         => 'checkbox',
								'id'           => 'height_' . $key,
								'name'         => 'height[]',
								'value'        => $value['from'] . '-' . $value['to'],
								'wrpper-class' => 'col-12 d-flex p-0',
								'input-class'  => '',
								'vue-data'     => '@click="sendDataToServerFunction"'
							] ) ?>
						<?php endforeach; ?>
					</div>

					<p class="col-12 font-weight-bold mb-3 mt-4">Масса</p>
					<div class="row col-11 m-auto">
						<?php foreach ( $weightFiter as $key => $value ): ?>
							<?php get_template_part( 'afsThemeOptions/template/formPart/checkbox', '', [
								'title'        => $value['name'],
								'type'         => 'checkbox',
								'id'           => 'weight_' . $key,
								'name'         => 'weight[]',
								'value'        => $value['from'] . '-' . $value['to'],
								'wrpper-class' => 'col-12 d-flex p-0',
								'input-class'  => '',
								'vue-data'     => '@click="sendDataToServerFunction"'
							] ) ?>
						<?php endforeach; ?>
					</div>

					<p class="col-12 font-weight-bold mb-3 mt-4">Обьем</p>
					<div class="row col-11 m-auto">
						<?php foreach ( $volumeFiter as $key => $value ): ?>
							<?php get_template_part( 'afsThemeOptions/template/formPart/checkbox', '', [
								'title'        => $value['name'],
								'type'         => 'checkbox',
								'id'           => 'volume_' . $key,
								'name'         => 'volume[]',
								'value'        => $value['from'] . '-' . $value['to'],
								'wrpper-class' => 'col-12 d-flex p-0',
								'input-class'  => '',
								'vue-data'     => '@click="sendDataToServerFunction"'
							] ) ?>
						<?php endforeach; ?>
					</div>

					<p class="col-12 font-weight-bold mb-3 mt-4">Другое</p>
					<div class="row col-11 m-auto">
						<?php get_template_part( 'afsThemeOptions/template/formPart/checkbox', '', [
							'title'        => 'В составе сборного груза',
							'type'         => 'checkbox',
							'id'           => 'groupageCargo',
							'name'         => 'groupageCargo',
							'value'        => '1',
							'wrpper-class' => 'col-12 d-flex p-0',
							'input-class'  => '',
							'vue-data'     => '@click="sendDataToServerFunction"'
						] ) ?>
					</div>

				</form>
			</div>
		</div>

		<div class="row col-md-6 p-0 h-fit-content">
			<?php get_template_part( 'afsThemeOptions/template/frontend/archive/goods', 'archive', $postType ) ?>
		</div>

		<?php get_template_part( 'afsThemeOptions/template/adds/ads', 'right' ) ?>
	</div>

<?php get_footer() ?>