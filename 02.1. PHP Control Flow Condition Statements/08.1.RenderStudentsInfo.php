<?php
if (isset($_GET['names']) && isset($_GET['ages']) && isset($_GET['delimiter'])) {
    $delimiter = trim($_GET['delimiter']);
    $names = array_filter(array_map('trim', explode($delimiter, $_GET['names'])));
    $ages =  array_map('intval', array_filter(array_map('trim', explode($delimiter, $_GET['ages']))));
    if (strpos($_GET['names'], $_GET['delimiter']) !== false  &&
        strpos($_GET['ages'], $_GET['delimiter']) !== false &&
        sizeof($names) == sizeof($ages)) {
        $students = [];
        for ($i = 0; $i < sizeof($ages); $i++) {
            $student = (object)[];
            $student->name = $names[$i];
            $student->age = $ages[$i];
            array_push($students, $student);
        }
    }
}
include '08.2.RenderStudentsInfo_Frontend.php';


