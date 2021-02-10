<?php
$postId       = ! empty( $_GET['postid'] ) ? strtok( $_GET['postid'], '?' ) : '';
$categoryName = 'offices';
//dump($args)
?>

<div class="wrapper mb-5 m-auto" is="createAndUpdatePost" inline-template>
	<div class="container-fluid">
		<div class="row  bg-grey-light">
			<div class="col-md-5 text-center m-auto py-4">
				<h4 class="text-center font-weight-bold"><?php _e( 'Добавить объявление в категорию "Перевозка офиса/ квартиры"', 'lardi' ) ?></h4>
				<p class="mt-4"><?php _e( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, provident?', 'lardi' ) ?></p>

				<form action="" method="post" class="mt-5 " id="globalForm" name="globalForm" @submit.prevent="getFormData">
					<?php wp_nonce_field( $categoryName, $categoryName ) ?>
					<input type="text" hidden name="action" value="createAndUpdatePost">
					<input type="text" hidden name="category" value="<?php echo $categoryName ?>">
					<input type="text" hidden name="postID" value="<?php echo $postId ?>" id="postID">

					<?php get_template_part( 'afsThemeOptions/template/formPart/fileUpload' ) ?>

					<?php get_template_part( 'afsThemeOptions/template/formPart/input', '', [
						'title'        => 'Заголовок',
						'type'         => 'text',
						'args'         => 'title',
						'value'        => $args['title'],
						'wrpper-class' => '',
						'input-class'  => ''
					] ) ?>

					<?php get_template_part( 'afsThemeOptions/template/formPart/date', '', [
						'value' => $args['date'],
					] ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/time', '', [
						'value' => $args['time'],
					] ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/select', '', [
						'title'          => 'Транспорт',
						'args'           => 'transport',
						'select-options' => fw_get_db_settings_option( 'addTransport' ),
						'value'          => $args['transport'],
						'wrpper-class'   => '',
						'input-class'    => ''

					] ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/checkbox', '', [
						'title'            => 'Погрузка',
						'type'             => 'checkbox',
						'name'             => 'loading',
						'id'               => 'loading',
						'value'            => $args['loading'],
						'wrpper-class'     => 'col-md-6 mx-auto',
						'input-class'      => '',
						'label-span-class' => 'justify-content-end',
						'vue-data'         => '@click="sendCheckboxDate"'
					] ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/checkbox', '', [
						'title'            => 'Разгрузка',
						'type'             => 'checkbox',
						'name'             => 'unloading',
						'id'               => 'unloading',
						'value'            => $args['unloading'],
						'wrpper-class'     => 'col-md-6 mx-auto',
						'input-class'      => '',
						'label-span-class' => 'justify-content-end',
						'vue-data'         => '@click="sendCheckboxDate"'
					] ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/checkbox', '', [
						'title'            => 'Упаковка',
						'type'             => 'checkbox',
						'name'             => 'packaging',
						'id'               => 'packaging',
						'value'            => $args['packaging'],
						'wrpper-class'     => 'col-md-6 mx-auto',
						'input-class'      => '',
						'label-span-class' => 'justify-content-end',
						'vue-data'         => '@click="sendCheckboxDate"'
					] ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/checkbox', '', [
						'title'            => 'Такелажные работы',
						'type'             => 'checkbox',
						'name'             => 'riggingWorks',
						'id'               => 'riggingWorks',
						'value'            => $args['riggingWorks'],
						'wrpper-class'     => 'col-md-6 mx-auto',
						'input-class'      => '',
						'label-span-class' => 'justify-content-end',
						'vue-data'         => '@click="sendCheckboxDate"'
					] ) ?>

					<?php get_template_part( 'afsThemeOptions/template/formPart/description', '', [
						'value' => $args['description'],
					] ) ?>


					<?php get_template_part( 'afsThemeOptions/template/formPart/blockCost', '', $args ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/blockContact', '', $args ) ?>

					<button class="btn btn-primary btn-block" id="testbtn" name="formButton" type="submit">Опубликовать</button>
				</form>
			</div>
		</div>
	</div>
</div>

