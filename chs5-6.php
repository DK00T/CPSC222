
<?php 
require_once('student.php');
require_once('graded.php');

$studArr = array();


$students[] = new Student("Homer", "Simpson", "1682", array("CPSC-130" =>85, "CPSC-140" => 92, "CPSC-231" => 78));
$students[] = new Student("Dom", "Kutsick", "6391", array("CPSC-222" =>99, "CPSC-400" => 95, "CPSC-231" => 80));
$students[] = new Student("John", "Cena", "5251", array("CPSC-131" =>87, "CPSC-140" => 62, "CPSC-350" => 90));

echo "<!DOCTYPE html>\n";
echo "<html>\n";
echo "<head>\n";
echo "<h1> Chapters 5-6</h1>\n";
echo "<style>";
echo "</style>";
echo "</head>\n";
echo "<body>\n";

foreach ($students as $student) {
    echo "<table border='1'>";
    echo "<tr><td><b><center>Name:</center </b></td><td>" . $student->getLastName() . ", " . $student->getFirstName() . "</td></tr>";
    echo "<tr><td><b><center>Student ID:</center></b></td><td>" . $student->getStudentID() . "</td></tr>";
    echo "<tr><td><b><center>Grades:</center></b></td><td>";

    echo "<ul>";
    foreach ($student->getCourses() as $course => $grade) {
        echo "<li>$course - $grade% " . calculateLetterGrade($grade) . "</li>";
    }
    echo "</ul>";

    echo "</td></tr>";
    echo "</table>";
    echo "<br>";
}

echo "</body>\n"; echo "</html>";
?>
