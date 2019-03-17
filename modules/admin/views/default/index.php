<?php

	use yii\helpers\Html;
	use yii\grid\GridView;

?>
<div class="admin-default-index">
	<h1>Административная часть</h1>

	<table class="table table-bordered">
		<caption>Список всех книг</caption>

		<thead>
			<tr>
				<th>id</th>
				<th>Автор</th>
				<th>Название книги</th>
				<th>Жанр</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($books as $book): ?>
				<tr>

					<td><?php echo $book[ 'id' ] ?></td>
					<td><?php echo $book['author']['full_name'] ?></td>
					<td><?php echo $book[ 'title' ] ?></td>
					<td><?php echo $book[ 'genre' ] ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>


	<table class=" table table-bordered">
		<caption>Количество книг у каждого автора</caption>
		<thead>
			<tr>
				<th>id</th>
				<th>Автор</th>
				<th>Количество книг</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($authors as $author): ?>
			<tr>
				<td><?php echo $author['id'] ?> </td>
				<td><?php echo $author['full_name'] ?> </td>
				<td><?php echo $author['books'] ?></td>
			</tr>
			<?php endforeach ?>

		</tbody>
	</table>


<!--//		foreach ($authors_count as $author)-->
<!--//		{-->
<!--//			echo '<h2>' . $author[ 'id' ] . ') ' . $author[ 'full_name' ] . '</h2>'; // 1) Иван И.И.-->
<!--//			echo '<p>Книг: ' . $author[ 'books' ] . '</p>'; // Книг: 17-->
<!--//		}-->
<!--//	?>-->

</div>
