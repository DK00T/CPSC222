<?php 
class Student {

	private $firstName, $lastName, $studentID, $courses;

	function __construct($f, $l, $s, $c)
	{
		$this->setFirstname($f);
		$this->setLastname($l);
		$this->setStudentid($s);
		$this->setCourses($c);
	}	
	function getFirstname()
	{
		return $this->firstName;
	}

	function setFirstname($f)
	{
		$this->firstName = $f;
	}

	function getLastname()
	{
		return $this->lastName;
	}

	function setLastname($l)
	{
		$this->lastName = $l;
	}

	function getStudentid()
	{
		return $this->studentID;
	}

	function setStudentid($s)
	{
		$this->studentID = $s;
	}

	function getCourses()
	{
		return $this->courses;
	}

	function setCourses($c)
	{
		$this->courses = $c;
	}
}
?>
