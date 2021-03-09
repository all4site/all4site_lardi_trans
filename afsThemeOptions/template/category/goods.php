<?php
$postId       = ! empty( $_GET['postid'] ) ? strtok( $_GET['postid'], '?' ) : '';
$categoryName = 'goods';
//dump($args)
?>


<div class="wrapper mb-5 m-auto" is="createAndUpdatePost" inline-template>
	<div class="container-fluid">
		<div class="row  bg-grey-light">
			<div class="col-md-5 text-center m-auto py-4">
				<h4 class="text-center font-weight-bold"><?php _e( 'Добавить объявление в категорию "Груз"', 'lardi' ) ?></h4>
				<p class="mt-4"><?php _e( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, provident?', 'lardi' ) ?></p>

				<form action="" method="post" class="mt-5 " id="globalForm" name="globalForm" @submit.prevent="getFormData">
					<?php get_template_part( 'afsThemeOptions/template/formPart/fileUpload' ) ?>

					<?php wp_nonce_field( $categoryName, $categoryName ) ?>
					<input type="text" hidden name="action" value="createAndUpdatePost">
					<input type="text" hidden name="category" value="<?php echo $categoryName ?>">
					<input type="text" hidden name="postID" value="<?php echo $postId ?>" id="postID">


					<?php get_template_part( 'afsThemeOptions/template/formPart/input', '', [
						'title'        => 'Заголовок',
						'type'         => 'text',
						'args'         => 'title',
						'value'        => ( isset( $args['title'] ) ) ? $args['title'] : '',
						'wrpper-class' => '',
						'input-class'  => ''
					] ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/input', '', [
						'title'        => 'Откуда?',
						'type'         => 'text',
						'args'         => 'from',
						'value'        => ( isset( $args['from'] ) ) ? $args['from'] : '',
						'wrpper-class' => '',
						'input-class'  => ''
					] ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/input', '', [
						'title'        => 'Куда?',
						'type'         => 'text',
						'args'         => 'where',
						'value'        => ( isset( $args['where'] ) ) ? $args['where'] : '',
						'wrpper-class' => '',
						'input-class'  => ''
					] ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/date', '', [
						'value' => ( isset( $args['date'] ) ) ? $args['date'] : '',
					] ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/time', '', [
						'value' => ( isset( $args['time'] ) ) ? $args['time'] : '',
					] ) ?>

					<h5 class="font-weight-bold mt-5 mb-4 col">Габариты кузова</h5>
					<div class="row">
						<?php get_template_part( 'afsThemeOptions/template/formPart/input', '', [
							'title'        => 'Длинна в М',
							'type'         => 'number',
							'args'         => 'lenth',
							'value'        => ( isset( $args['lenth'] ) ) ? $args['lenth'] : '',
							'wrpper-class' => 'col-md-4 pr-2',
							'input-class'  => ''
						] ) ?>
						<?php get_template_part( 'afsThemeOptions/template/formPart/input', '', [
							'title'        => 'Ширина в М',
							'type'         => 'number',
							'args'         => 'width',
							'value'        => ( isset( $args['width'] ) ) ? $args['width'] : '',
							'wrpper-class' => 'col-md-4 px-1',
							'input-class'  => ''
						] ) ?>
						<?php get_template_part( 'afsThemeOptions/template/formPart/input', '', [
							'title'        => 'Высота в М',
							'type'         => 'number',
							'args'         => 'height',
							'value'        => ( isset( $args['height'] ) ) ? $args['height'] : '',
							'wrpper-class' => 'col-md-4 pl-2',
							'input-class'  => ''
						] ) ?>
					</div>

					<?php get_template_part( 'afsThemeOptions/template/formPart/input', 'label', [
						'title'            => 'Масса',
						'type'             => 'number',
						'args'             => 'weight',
						'value'            => ( isset( $args['weight'] ) ) ? $args['weight'] : '',
						'wrpper-class'     => '',
						'input-class'      => '',
						'label-text'       => 'кг',
						'label-span-class' => 'my-label-span-class justify-content-center'
					] ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/input', 'label', [
						'title'            => 'Обьем',
						'type'             => 'number',
						'args'             => 'volume',
						'value'            => ( isset( $args['volume'] ) ) ? $args['volume'] : '',
						'wrpper-class'     => '',
						'input-class'      => '',
						'label-text'       => 'литры',
						'label-span-class' => 'my-label-span-class justify-content-center'
					] ) ?>

					<?php get_template_part( 'afsThemeOptions/template/formPart/checkbox', '', [
						'title'        => 'Согласен в составе сборного груза',
						'type'         => 'checkbox',
						'id'           => 'groupageCargo',
						'name'         => 'groupageCargo',
						'value'        => ( isset($args['groupageCargo']) ) ? $args['groupageCargo'] : '0',
						'wrpper-class' => '',
						'input-class'  => ''
					] ) ?>

					<?php get_template_part( 'afsThemeOptions/template/formPart/select', '', [
						'title'          => 'Тип кузова',
						'args'           => 'bodyType',
						'select-options' => fw_get_db_settings_option( 'addBodyType' ),
						'value'          => ( isset( $args['bodyType'] ) ) ? $args['bodyType'] : '',
						'wrpper-class'   => '',
						'input-class'    => ''

					] ) ?>

					<?php get_template_part( 'afsThemeOptions/template/formPart/description', '', [
						'value' => ( isset( $args['description'] ) ) ? $args['description'] : '',
					] ) ?>

					<?php get_template_part( 'afsThemeOptions/template/formPart/blockCost', '', $args ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/blockContact', '', $args ) ?>

					<button class="btn btn-primary btn-block" id="testbtn" name="formButton" type="submit">Опубликовать</button>
				</form>
			</div>
		</div>
	</div>
</div>
