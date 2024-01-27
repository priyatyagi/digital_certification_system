<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Completion</title>
</head>
<body>
    <h1>Certificate of Completion</h1>
    <p>This is to certify that</p>
    <h2><?php echo $student['name']; ?></h2>
    <p>has successfully completed the course</p>
    <h3><?php echo $student['course']; ?></h3>
    <p>on <?php echo $student['completion_date']; ?></p>
</body>
</html>
