<?php
$fine = 0;

if(isset($_POST['submit']))
{
    $student = $_POST['student'];
    $book = $_POST['book'];
    $issue = $_POST['issue_date'];
    $return = $_POST['return_date'];

    $issueDate = new DateTime($issue);
    $returnDate = new DateTime($return);

    $days = $issueDate->diff($returnDate)->days;

    // First 15 days are free
    if($days > 15)
    {
        $fine = ($days - 15) * 5;   // ₹5 per extra day
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Book Submission</title>
</head>
<body>

<h2>Library Book Return Form</h2>

<form method="post">

    Student ID:
    <input type="text" name="student" required><br><br>

    Student Name:
    <input type="text" name="name" required><br><br>

    Book ID:
    <input type="text" name="book" required><br><br>

    Book Title:
    <input type="text" name="title" required><br><br>

    Issue Date:
    <input type="date" name="issue_date" required><br><br>

    Return Date:
    <input type="date" name="return_date" required><br><br>

    Condition:
    <select name="condition">
        <option>Good</option>
        <option>Damaged</option>
        <option>Lost</option>
    </select>
    <br><br>

    <input type="submit" name="submit" value="Submit">

</form>

<?php
if(isset($_POST['submit']))
{
    echo "<hr>";
    echo "<h3>Book Return Details</h3>";
    echo "Student ID : ".$_POST['student']."<br>";
    echo "Student Name : ".$_POST['name']."<br>";
    echo "Book ID : ".$_POST['book']."<br>";
    echo "Book Title : ".$_POST['title']."<br>";
    echo "Issue Date : ".$issue."<br>";
    echo "Return Date : ".$return."<br>";
    echo "Days Used : ".$days."<br>";
    echo "Book Condition : ".$_POST['condition']."<br>";
    echo "<h3>Fine Amount : ₹".$fine."</h3>";
}
?>

</body>
</html>