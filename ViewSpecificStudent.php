<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('CoHeader.php');
 

// Retrieve student details based on the student name (assuming student name is passed as a GET parameter)
$student_id = $_GET['StudentId']; // Assuming 'name' is the parameter name
$sql = "SELECT * FROM profile WHERE studentid = '$student_id'";
$result = $con->query($sql);



if ($result->num_rows > 0) {
    // Student details found
    $row = $result->fetch_assoc();
    $student_name = $row['name'];
    $joining_date = $row['joining_date'];
    $registration_number = $row['registration_number'];
    $mobile = $row['mobile'];
    $email = $row['email'];
    $gender = $row['gender'];
    $advisor_name = $row['advisor_name'];
    $nationality = $row['nationality'];
    $department_name = $row['department_name'];
    $joining_campus_date = $row['joining_campus_date'];
    $studentid = $row['studentid'];


     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link rel="stylesheet" href="css/student-detail.css">
</head>
<body>

<div class="student-details-table">
    <h2>Student Details </h2>
    <table>
        <tr>
            <td><strong>Student Name:</strong></td>
            <td><?php echo $student_name; ?></td>
        </tr>
        <tr>
            <td><strong>Joining Date:</strong></td>
            <td><?php echo $joining_date; ?></td>
        </tr>
        <tr>
            <td><strong>Registration Number:</strong></td>
            <td><?php echo $registration_number; ?></td>
        </tr>
        <tr>
            <td><strong>Mobile:</strong></td>
            <td><?php echo $mobile; ?></td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <td><strong>Gender:</strong></td>
            <td><?php echo $gender; ?></td>
        </tr>
        <tr>
            <td><strong>Advisor Name:</strong></td>
            <td><?php echo $advisor_name; ?></td>
        </tr>
        <tr>
            <td><strong>Nationality:</strong></td>
            <td><?php echo $nationality; ?></td>
        </tr>
        <tr>
            <td><strong>Department Name:</strong></td>
            <td><?php echo $department_name; ?></td>
        </tr>
        <tr>
            <td><strong>Joining Campus Date:</strong></td>
            <td><?php echo $joining_campus_date; ?></td>
        </tr>
        <tr>
            <td><strong>Student ID:</strong></td>
            <td><?php echo $studentid; ?></td>
        </tr>
    </table>
</div>
 
<?php
// Retrieve and display grades details
$grades_sql = "SELECT * FROM grades WHERE studentid = '$studentid'";
$grades_result = $con->query($grades_sql);
if ($grades_result->num_rows > 0) {
    echo "<h3>Grades Detail</h3>";
    echo "<table border='1'>";
    echo "<tr><th>Student UID</th><th>Subject</th><th>Grade</th><th>Date</th><th>Approved</th><th>Student ID</th></tr>";
    while ($grades_row = $grades_result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $grades_row['uid'] . "</td>";
        echo "<td>" . $grades_row['subject'] . "</td>";
        echo "<td>" . $grades_row['grade'] . "</td>";
        echo "<td>" . $grades_row['date'] . "</td>";
        echo "<td>" . $grades_row['approved'] . "</td>";
        echo "<td>" . $grades_row['studentid'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

// Retrieve and display journal details
$journal_sql = "SELECT * FROM journals WHERE studentid = '$studentid'";
$journal_result = $con->query($journal_sql);
if ($journal_result->num_rows > 0) {
    echo "<h3>Journal Detail</h3>";
    echo "<table border='1'>";
    echo "<tr><th>Journals Unique ID</th><th>Journal Name</th><th>Publish Date</th><th>Approved</th><th>Journal Link</th><th>Journal Website</th></tr>";
    while ($journal_row = $journal_result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $journal_row['uid'] . "</td>";
        echo "<td>" . $journal_row['journal_name'] . "</td>";
        echo "<td>" . $journal_row['publish_date'] . "</td>";
        echo "<td>" . $journal_row['approved'] . "</td>";
        echo "<td>" . $journal_row['journal_link'] . "</td>";
        echo "<td>" . $journal_row['journal_website'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

// Retrieve and display paper details
$paper_sql = "SELECT * FROM papers WHERE studentid = '$studentid'";
$paper_result = $con->query($paper_sql);
if ($paper_result->num_rows > 0) {
    echo "<h3>Paper Detail</h3>";
    echo "<table border='1'>";
    echo "<tr><th>Papers Unique ID</th><th>Paper Name</th><th>Presentation Date</th><th>Approved</th><th>Paper Link</th><th>Paper Website</th><th>Presentation Country</th></tr>";
    while ($paper_row = $paper_result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $paper_row['uid'] . "</td>";
        echo "<td>" . $paper_row['paper_name'] . "</td>";
        echo "<td>" . $paper_row['presentation_date'] . "</td>";
        echo "<td>" . $paper_row['approved'] . "</td>";
        echo "<td>" . $paper_row['paper_link'] . "</td>";
        echo "<td>" . $paper_row['paper_website'] . "</td>";
        echo "<td>" . $paper_row['presentation_country'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

// Retrieve and display patent details
$patent_sql = "SELECT * FROM patent WHERE studentid = '$studentid'";
$patent_result = $con->query($patent_sql);
if ($patent_result->num_rows > 0) {
    echo "<h3>Patent Detail</h3>";
    echo "<table border='1'>";
    echo "<tr><th>Patents Unique ID</th><th>Patent Title</th><th>Approved</th><th>Patent Link</th><th>Patent Grade</th><th>Approval Date</th></tr>";
    while ($patent_row = $patent_result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $patent_row['uid'] . "</td>";
        echo "<td>" . $patent_row['patent_title'] . "</td>";
        echo "<td>" . $patent_row['approved'] . "</td>";
        echo "<td>" . $patent_row['patent_link'] . "</td>";
        echo "<td>" . $patent_row['patent_grade'] . "</td>";
        echo "<td>" . $patent_row['approval_date'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>


 
<?php
    // Close PHP tag to resume HTML content
} else {
    // Student details not found
    echo "<p>Student not found.</p>";
}
?>

</body>
</html>
