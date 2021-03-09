<?php
$postId       = ! empty( $_GET['postid'] ) ? strtok( $_GET['postid'], '?' ) : '';
$categoryName = 'cars';
//dump($args)
?>

<div class="wrapper mb-5 m-auto" is="createAndUpdatePost" inline-template>
	<div class="container-fluid">
		<div class="row  bg-grey-light">
			<div class="col-md-5 text-center m-auto py-4">
				<h4 class="text-center font-weight-bold"><?php _e( 'Добавить объявление в категорию "Попутное авто"', 'lardi' ) ?></h4>
				<p class="mt-4"><?php _e( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, provident?', 'lardi' ) ?></p>

				<form action="" method="post" class="mt-5 " id="globalForm" name="globalForm" @submit.prevent="getFormData">

					<?php wp_nonce_field( $categoryName, $categoryName ) ?>
					<input type="text" hidden name="action" value="createAndUpdatePost">
					<input type="text" hidden name="category" value="<?php echo $categoryName ?>">
					<input type="text" hidden name="postID" value="<?php echo $postId ?>" id="postID">

					<?php get_template_part( 'afsThemeOptions/template/formPart/fileUpload') ?>

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
					<?php get_template_part( 'afsThemeOptions/template/formPart/select', '', [
						'title'          => 'Тип кузова',
						'args'           => 'bodyType',
						'select-options' => fw_get_db_settings_option( 'addBodyType' ),
						'value'          => ( isset( $args['bodyType'] ) ) ? $args['bodyType'] : '',
						'wrpper-class'   => '',
						'input-class'    => ''

					] ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/select', '', [
						'title'          => 'Марка авто',
						'args'           => 'carModel',
						'select-options' => fw_get_db_settings_option( 'addCarModel' ),
						'value'          => ( isset( $args['carModel'] ) ) ? $args['carModel'] : '',
						'wrpper-class'   => '',
						'input-class'    => ''
					] ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/input', '', [
						'title'        => 'Количество людей',
						'type'         => 'number',
						'args'         => 'peopleCount',
						'value'        => ( isset( $args['peopleCount'] ) ) ? $args['peopleCount'] : '',
						'wrpper-class' => '',
						'input-class'  => ''
					] ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/date', '', [
						'value' => ( isset( $args['date'] ) ) ? $args['date'] : '',
					] ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/time', '', [
						'value' => ( isset( $args['time'] ) ) ? $args['time'] : '',
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
