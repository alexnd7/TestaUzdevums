<?php 

ini_set("display_errors", 1);
error_reporting(-1);
require_once 'config.php';
require_once 'functions.php';

// list of tests
$tests = get_tests();

if( isset($_GET['test']) ){
	$test_id = (int)$_GET['test'];
	$test_data = get_test_data($test_id);
	if( is_array($test_data) ){
		$count_questions = count($test_data);
		$pagination = pagination($count_questions, $test_data);
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Testing</title>
	<link rel="stylesheet" href="style/style.css">

</head>
<body>

<div class="wrap">
	
<?php if( $tests ): ?>
	<h3>Please choose the test</h3>
	<?php foreach($tests as $test): ?>
		<p><a href="?test=<?=$test['id']?>"><?=$test['test_name']?></a></p>
	<?php endforeach; ?>

	<br><hr><br>
<div class="content">
	
<?php if( isset($test_data) ): ?>

	<?php if( is_array($test_data) ): ?>

		<?=$pagination?>
		<span class="none" id="test-id"><?=$test_id?></span>


<div class="test-data">
	
<?php foreach($test_data as $id_question => $item): // getting each question + answer ?>
	
	<div class="question" data-id="<?=$id_question?>" id="question-<?=$id_question?>">
		
		<?php foreach($item as $id_answer => $answer): // going through array ?>
			
			<?php if( !$id_answer ): // getting questions ?>
				<p class="q"><?=$answer?></p>
			<?php else: // getting answers ?>

<p class="a">
	<input type="radio" id="answer-<?=$id_answer?>" name="question-<?=$id_question?>" value="<?=$id_answer?>">
	<label for="answer-<?=$id_answer?>"><?=$answer?></label>
</p>

			<?php endif; // $id_answer ?>

		<?php endforeach; // $item ?>


	</div> <!-- .question -->

<?php endforeach; // $test_data ?>

</div> <!-- .test-data -->

<div class="buttons">
	<button class="center btn">Finish test</button>
</div>
<?php else: // is_array($test_data) ?>
	There are no tests yet
<?php endif; // is_array($test_data) ?>
		
<?php else: // isset($test_data) ?>
	Select test
<?php endif; // isset($test_data) ?>

</div> <!-- .content -->

<?php else: // $tests ?>
	<h3>There are no tests</h3>
<?php endif; // $tests ?>

</div> <!-- .wrap -->

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="scripts/scripts.js"></script>

</body>
</html>