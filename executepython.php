<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['execute'])) {
    $pythonScript = "wbutransform.py";  // Replace with the actual path to your Python script

    // Execute Python script
    $output = exec("python3 $pythonScript 2>&1", $outputArray, $returnCode);

    // Print the output
    echo "<h2>Output:</h2><pre>" . implode("\n", $outputArray) . "</pre>";

    // Print the return code
    echo "<h2>Return Code:</h2><p>$returnCode</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Execute Python Script</title>
</head>
<body>
<h1>Execute Python Script</h1>
<form method="post" action="">
    <button type="submit" name="execute">Execute Python Script</button>
</form>
</body>
</html>
