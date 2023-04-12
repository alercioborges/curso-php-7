<?php

class Student {
  public $name;
  
  function __construct($name) {
    $this->name = $name;
  }
}

class Course {
  public $name;
  public $students = array();
  
  function __construct($name) {
    $this->name = $name;
  }
  
  function enrollStudent($student) {
    array_push($this->students, $student);
  }
}

// create some students
$student1 = new Student("John");
$student2 = new Student("Jane");

// create a course
$course = new Course("Math");

// enroll students in the course
$course->enrollStudent($student1);
$course->enrollStudent($student2);

// print the enrolled students
echo "Enrolled students in " . $course->name . ":<br>";
foreach ($course->students as $student) {
  echo $student->name . "<br>";
}

?>