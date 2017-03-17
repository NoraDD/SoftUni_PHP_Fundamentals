<?php
include '06.1.Student.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>06.2.Student Sorting</title>
    <meta charset="utf-8">
</head>
<body>
<form method="GET">
    <table>
        <thead>
        <tr>
            <th>First name:</th>
            <th>Last name:</th>
            <th>Email:</th>
            <th>Exam score:</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <input type="text" name="first-name-1" placeholder="First name">
            </td>
            <td>
                <input type="text" name="last-name-1" placeholder="Last name">
            </td>
            <td>
                <input type="text" name="email-1" placeholder="Email">
            </td>
            <td>
                <input type="number" name="exam-score-1" placeholder="Exam score">
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="first-name-2" placeholder="First name">
            </td>
            <td>
                <input type="text" name="last-name-2" placeholder="Last name">
            </td>
            <td>
                <input type="text" name="email-2" placeholder="Email">
            </td>
            <td>
                <input type="number" name="exam-score-2" placeholder="Exam score">
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="first-name-3" placeholder="First name">
            </td>
            <td>
                <input type="text" name="last-name-3" placeholder="Last name">
            </td>
            <td>
                <input type="text" name="email-3" placeholder="Email">
            </td>
            <td>
                <input type="number" name="exam-score-3" placeholder="Exam score">
            </td>
        </tr>
        <tr>
            <td>
                Sort by:
                <select name="sort">
                    <option value="first-name">First name</option>
                    <option value="last-name">Last name</option>
                    <option value="email">Email</option>
                    <option value="exam-score">Exam score</option>
                </select>
            </td>
            <td>
                Order:
                <select name="order">
                    <option value="desc">Descending</option>
                    <option value="asc">Ascending</option>
                </select>
            </td>
            <td>
                <input type="submit" name="submit" value="Submit">
            </td>
        </tr>
        </tbody>
    </table>
</form>
<br>

<?php
if (isset($_GET['first-name-1']) && isset($_GET['last-name-1']) && isset($_GET['email-1']) && isset($_GET['exam-score-1']) &&
    isset($_GET['first-name-2']) && isset($_GET['last-name-2']) && isset($_GET['email-2']) && isset($_GET['exam-score-2']) &&
    isset($_GET['first-name-3']) && isset($_GET['last-name-3']) && isset($_GET['email-3']) && isset($_GET['exam-score-3']) &&
    isset($_GET['submit'])
) {

    $students = [];

    //Student 1
    $student_1_first_name = $_GET['first-name-1'];
    $student_1_last_name = $_GET['last-name-1'];
    $student_1_email = $_GET['email-1'];
    $student_1_exam_score = intval($_GET['exam-score-1']);

    $student_1 = new Student($student_1_first_name, $student_1_last_name, $student_1_email, $student_1_exam_score);
    $students[] = $student_1;

    //Student 2
    $student_2_first_name = $_GET['first-name-2'];
    $student_2_last_name = $_GET['last-name-2'];
    $student_2_email = $_GET['email-2'];
    $student_2_exam_score = intval($_GET['exam-score-2']);

    $student_2 = new Student($student_2_first_name, $student_2_last_name, $student_2_email, $student_2_exam_score);
    $students[] = $student_2;

    //Student 3
    $student_3_first_name = $_GET['first-name-3'];
    $student_3_last_name = $_GET['last-name-3'];
    $student_3_email = $_GET['email-3'];
    $student_3_exam_score = intval($_GET['exam-score-3']);

    $student_3 = new Student($student_3_first_name, $student_3_last_name, $student_3_email, $student_3_exam_score);
    $students[] = $student_3;

    //Sort
    $sort = $_GET['sort'];

    if ($sort == 'first-name') {
        function sortByFirstName($a, $b)
        {
            return strcmp($a->getFirstName(), $b->getFirstName());
        }

        usort($students, "sortByFirstName");
    } elseif ($sort == 'last-name') {
        function sortByLastName($a, $b)
        {
            return strcmp($a->getLastName(), $b->getLastName());
        }

        usort($students, "sortByLastName");

    } elseif ($sort == 'email') {
        function sortByEmail($a, $b)
        {
            return strcmp($a->getEmail(), $b->getEmail());
        }

        usort($students, "sortByEmail");

    } elseif ($sort == 'exam-score') {
        function sortByExamScore($a, $b)
        {
            return strcmp($a->getExamScore(), $b->getExamScore());
        }

        usort($students, "sortByExamScore");
    }

    //Order
    $order = $_GET['order'];

    if ($order == 'desc') {
        $students = array_reverse($students);
    }
}
?>
<table border="1px">
    <thead>
    <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Exam score</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $averageScore = 0;
    foreach ($students as $student) { ?>
        <tr>
            <td><?= $student->getFirstName() ?></td>
            <td><?= $student->getLastName() ?></td>
            <td><?= $student->getEmail() ?></td>
            <td><?= $student->getExamScore() ?></td>
        </tr>
        <?php
        $averageScore += $student->getExamScore();
    }
    ?>
    <tr>
        <td align="left" colspan="3">Average Score:</td>
        <td><?= round($averageScore / 3, 2) ?></td>
    </tr>
    </tbody>
</table>
</body>
</html>
