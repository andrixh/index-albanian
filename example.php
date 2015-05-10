<?php
include "stemmer.php";

$in = '';
$out = '';
if (isset($_POST['in'])) {
    $in = $_POST['in'];
    $out = stem($in);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Albanian indexing example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
</head>
<body>
<div class="container">
    <h1>Albanian Indexing Example</h1>

    <form method="post">
        <div class="form-group">
            <textarea class="form-control" rows="10" name="in"><?= htmlspecialchars($in) ?></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">Index</button>
        </div>
        <div class="form-group">
            <textarea class="form-control" rows="10" name="out"><?= htmlspecialchars($out) ?></textarea>
        </div>
    </form>
</div>
</body>
</html>
