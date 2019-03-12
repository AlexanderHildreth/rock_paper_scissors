<?php 
$rand = 1;
$request = '';
$json = array();
$result = 'lose';

//key value pair for rules
$arr = array(
	1 => 'rock',
	2 => 'paper',
	3 => 'scissors',
	4 => 'lizard',
	5 => 'spock'
);

// key beats value
$rules = array(
	1 => array(
		'scissors',
		'lizard'
	),
	2 => array(
		'rock',
		'spock'
	),
	3 => array(
		'paper',
		'lizard'
	),
	4 => array(
		'spock',
		'paper'
	),
	5 => array(
		'scissors',
		'rock'
	)
);

// header('Content-Type: application/json');
$request = $_REQUEST['data'];
$rand =  rand(1, 5);
$outcome = $arr[(int)$rand];
$user_key = array_search($request, $arr);

switch ($request) {
	case 'rock':
		if (in_array($request, $rules[$rand])) {
			$result = 'lose';
		} elseif ($outcome == $request) {
			$result = 'draw';
		} else {
			$result = 'win';
		}
		break;
	case 'paper':
		if (in_array($request, $rules[$rand])) {
			$result = 'lose';
		} elseif ($outcome == $request) {
			$result = 'draw';
		} else {
			$result = 'win';
		}
		break;

	case 'scissors':
		if (in_array($request, $rules[$rand])) {
			$result = 'lose';
		} elseif ($outcome == $request) {
			$result = 'draw';
		} else {
			$result = 'win';
		}
		break;
	case 'lizard':
		if (in_array($request, $rules[$rand])) {
			$result = 'lose';
		} elseif ($outcome == $request) {
			$result = 'draw';
		} else {
			$result = 'win';
		}
		break;
	case 'spock':
		if (in_array($request, $rules[$rand])) {
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