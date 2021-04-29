<?php
$filename = "suckers.txt" ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Buy Your Way to a Better Education!</title>
    <link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/4-buyagrade/buyagrade.css" type="text/css" rel="stylesheet" />
</head>

<body>
<?php if($_SERVER["REQUEST_METHOD"]!='POST') { ?>
    <h2>This page only accepts POST requests</h2>
<?php } else if ($_REQUEST["name"] == $_REQUEST["section"] && $_REQUEST["section"] == $_REQUEST["card"]) { ?>
<h2>Sorry</h2>
    You didn't fill out form completely. <a href = buyagrade.html>Try again?</a>
<?php } else { ?>
    <h1>Thanks, sucker!</h1>

    <p>Your information has been recorded.</p>

    <dl>
        <dt>Name</dt>
        <dd><?= $_POST["name"] ?></dd>

        <dt>Section</dt>
        <dd><?= $_POST["section"] ?></dd>

        <dt>Credit Card</dt>
        <dd><?= $_POST["card"] ?> (<?= $_POST["cc"] ?>)</dd>

        <?php $data = $_REQUEST ?>

        <pre>
            <dt>Here are all suckers:</dt>
            <dd><?php
                // Open the file to get existing content
                $current = file_get_contents($filename);
                // Append a new person to the file
                $current .= implode(";", $data);
                $current .= "\n";
                print_r($current);
                // Write the contents back to the file
                file_put_contents($filename, $current);
                ?>
            </dd>
            </pre>

    </dl>

<?php } ?>
</body>
</html>