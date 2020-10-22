<div class="row fixed" style="width: 100%; padding-right: 0; margin-right: 0; margin-left: 0;">
	<div id="main_container" class=" col-xl-6 col-lg-6 col-md-6 col-sm-6" style="padding-left: 0px; padding-right: 0px; max-height: 450px;">
		<?php if($Sesion): ?>
		<div style="width: 100%; padding-top: 300px;">
			<button onclick="window.location='/cpanel';" class="btn btn-primary">Ir a CPanel</button>
		</div>
		<?php endif; ?>
		<?php if(!$Sesion): ?>
		<?php echo $__env->make('Contents.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php endif; ?>
	</div>
	<img class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-none d-md-block d-sm-block"  src="img/backmain.png" style="padding-right: 0px; padding-left: 0px;">
	<img class="d-xs-block d-md-none d-sm-none"  src="img/backlogin.jpg" style="padding-right: 0px; width: 100%;">
</div>
<?php /**PATH C:\xampp\htdocs\SARAM-API\resources\views/Contents/main.blade.php ENDPATH**/ ?>