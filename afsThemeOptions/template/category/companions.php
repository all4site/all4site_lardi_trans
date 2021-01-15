<div class="wrapper mb-5 m-auto" is="goodsCreateUpdatePost" inline-template>
	<div class="container-fluid">
		<div class="row  bg-grey-light">
			<div class="col-md-5 text-center m-auto py-4">
				<h4 class="text-center font-weight-bold"><?php _e( 'Добавить объявление в категорию "Груз"', 'lardi' ) ?></h4>
				<p class="mt-4"><?php _e( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, provident?', 'lardi' ) ?></p>

				<form action="" method="post" class="mt-5" id="globalForm">
					<?php wp_nonce_field() ?>
					<input type="text" hidden name="action" value="createAndUpdatePost">

					<?php get_template_part( 'afsThemeOptions/template/formPart/input', '', [ 'Заголовок', 'text', 'title' ] ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/input', '', [ 'Откуда?', 'text', 'form' ] ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/input', '', [ 'Куда?', 'text', 'where' ] ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/select', '', [ 'Тип кузова', 'bodyType', fw_get_db_settings_option( 'addBodyType' ) ] ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/select', '', [ 'Марка авто', 'carModel', fw_get_db_settings_option( 'addCarModel' ) ] ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/input', '', [ 'Количество людей', 'number', 'peopleCount' ] ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/date' ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/time' ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/description' ) ?>

					<?php get_template_part( 'afsThemeOptions/template/formPart/blockCost' ) ?>
					<?php get_template_part( 'afsThemeOptions/template/formPart/blockContact' ) ?>


					<button class="btn btn-primary btn-block">Опубликовать</button>
				</form>
			</div>
		</div>
	</div>
</div>
