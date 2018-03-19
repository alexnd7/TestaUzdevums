<?php

/*
printing array
*/
function print_arr($arr){
	echo '<pre>'  . print_r($arr, true) . '</pre>';
}

/*
 getting list of tests
*/
function get_tests(){
	global $db;
	$query = "SELECT * FROM test";
	$res = mysqli_query($db, $query);
	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$data[] = $row;
	}
	return $data;
}
/*
getting test data
*/
function get_test_data($test_id){
	if( !$test_id ) return;
	global $db;
	$query = "SELECT q.questions, q.parent_test, a.id, a.answer, a.parent_question, a.correct_answer 
	FROM questions q
	LEFT JOIN answers a
	ON q.id = a.parent_question
	WHERE q.parent_test = $test_id";

	$res = mysqli_query($db, $query);
	$data = null;
	while($row = mysqli_fetch_assoc($res)){
		$data[$row['parent_question']][0] = $row['questions'];
		$data[$row['parent_question']][$row['id']] = $row['answer'];

	}
	return $data;
}
/*
 build pagination
*/
function pagination($count_questions, $test_data){
	$keys = array_keys($test_data);
	$pagination = '<div class="pagination">';
	for($i = 1; $i <= $count_questions; $i++){
		$key = array_shift($keys);
		if( $i == 1 ){
			$pagination .= '<a class="nav-active" href="#question-' . $key . '">' . $i . '</a>';
		}else{
			$pagination .= '<a href="#question-' . $key . '">' . $i . '</a>';
		}
	}
	$pagination .= '</div>';
	return $pagination;
}
