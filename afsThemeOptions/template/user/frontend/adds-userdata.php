<?php
$userData = getCusctomFieldFromUserPost();
?>

<div class="col-md-2">
	<img src="<?php echo $userData['userLogo']['url'] ?>" class="rounded-circle w-100">
</div>

<div class="text-secondary col-md-4 d-flex flex-column justify-content-center">
	<span class="font-weight-bold text-uppercase"><?php echo $userData['nickName'] ?></span>
	<div class="d-flex">
		<span class="basic-font-size-small-2 m-0 p-0"><?php echo $userData['userSity'] ?></span>
		<hr class="hr-vertical mx-1 my-auto bg-grey">
		<span class="basic-font-size-small-2 m-0 p-0"><?php echo $args['date'] ?></span>
	</div>
</div>

<div class="col-md-5 offset-1 align-self-center">
	<button class="btn btn-violer py-3 w-100" @click.prevent="showPopup = !showPopup">Посмотреть контакты</button>
</div>

<?php get_template_part('afsThemeOptions/template/user/frontend/address', 'popup', $userData)?>

