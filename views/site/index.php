<?php

	/* @var $this yii\web\View */

	$this->title = 'Тестовое задание';
?>
<div class="site-index">

	<div class="row">
		<div class="col-md-5">

			<?php foreach ($authors as $author): ?>
				<h3> <?php echo $author->id ?>. <?php echo $author->full_name ?></h3>

					<ol>
				<?php foreach ($author->books as $book): ?>
						<li><?php echo $book->title ?></li>
				<?php endforeach ?>
					</ol>

			<?php endforeach ?>
		</div>
	</div>
</div>
