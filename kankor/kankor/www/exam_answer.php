<?php
require_once("../lib/db.php");
require_once("../lib/crud.php");
$crud = new crud();
$question_id = $_POST['question_id'];
$answer = $_POST['answer'];

        $rs=$crud->select_latest("student_exams","id");
		$idexam=$rs['id'];
		$now = new DateTime();	
	    $time_stamp=$now->format('Y-m-d H:i:s');

$rs = $crud -> select("student_questions", "count(id) count", "questions_id = '$question_id' and 
student_exams_id = '$idexam'");
if(!$rs[0]['count']){
	$crud -> insert("student_questions", "questions_id,student_exams_id,answers_id,response_time", "'$question_id', $idexam, $answer,'$time_stamp'");
}else{
	$crud -> update("student_questions", "answers_id = '$answer'", 
	"student_exams_id = $idexam and questions_id = $question_id");
}
?>