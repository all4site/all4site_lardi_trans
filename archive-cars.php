<?php get_header() ?>
<?php

use AFS\PostFilter;

$addTransport = fw_get_db_settings_option( 'addTransport' );
$postType     = 'cars';
$title        = 'Попутное авто';
//dump( get_post_meta( 2308, '', true ) );
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
							'value'        => '',
							'wrpper-class' => 'col-12 p-0',
							'input-class'  => '',
							'vue-data'     => '@change="sendDataToServerFunction"'
						] ) ?>
						<a href="#!" class="btn btn-primary btn-block" @click.prevent="dateReset('date')">Сброс</a>
					</div>

					<p class="col-12 font-weight-bold mb-3 mt-5">Время</p>
					<div class="row col-11 m-auto">
						<?php get_template_part( 'afsThemeOptions/template/formPart/time', '', [
							'title'        => 'Выберите время',
							'type'         => 'time',
							'args'         => 'time',
							'value'        => '',
							'wrpper-class' => 'col-12 p-0',
							'input-class'  => '',
							'vue-data'     => '@change="sendDataToServerFunction"'
						] ) ?>
						<a href="#!" class="btn btn-primary btn-block" @click.prevent="dateReset('time')">Сброс</a>
					</div>

					<p class="col-12 font-weight-bold mb-3 mt-5">Количество пассажиров</p>
					<div class="row col-11 m-auto">
						<?php get_template_part( 'afsThemeOptions/template/formPart/input', '', [
							'title'        => '0',
							'type'         => 'number',
							'args'         => 'peopleCount',
							'wrpper-class' => 'col-12 p-0',
							'input-class'  => '',
							'vue-data'     => '@input="sendDataToServerFunction"'
						] ) ?>
						<a href="#!" class="btn btn-primary btn-block" @click.prevent="dateReset('peopleCount')">Сброс</a>
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