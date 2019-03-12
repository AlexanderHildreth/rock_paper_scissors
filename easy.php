<?php 
$rand = 1;
$request = '';
$json = array();
$result = 'lose';

//key value pair for rules
$arr = array(
	1 => 'rock',
	2 => 'paper',
	3 => 'scissors'
);

// key beats value
$rules = array(
	1 => 'scissors',
	2 => 'rock',
	3 => 'paper'
);

// header('Content-Type: application/json');
$request = $_REQUEST['data'];
$rand =  rand(1, 3);
$outcome = $arr[(int)$rand];
$user_key = array_search($request, $arr);

switch ($request) {
	case 'rock':
		if ($rules[$rand] == $request) {
			$result = 'lose';
		} elseif ($outcome == $request) {
			$result = 'draw';
		} else {
			$result = 'win';
		}
		break;
	case 'paper':
		if ($rules[$rand] == $request) {
			$result = 'lose';
		} elseif ($outcome == $request) {
			$result = 'draw';
		} else {
			$result = 'win';
		}
		break;

	case 'scissors':
		if ($rules[$rand] == $request) {
			$result = 'lose';
		} elseif ($outcome == $request) {
			$result = 'draw';
		} else {
			$result = 'win';
		}
		break;
}

$json['user_choice'] = $request;
$json['outcome'] = $outcome;
$json['result'] = $result;

echo json_encode($json);