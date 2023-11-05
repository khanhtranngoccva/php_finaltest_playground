<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="/metrics.php" method="post" id="value-form">
    <div>
        <label for="01">True Positive</label>
        <input type="text" name="tp" id="01">
    </div>
    <div>
        <label for="02">False Negative</label>
        <input type="text" name="fn" id="02">
    </div>
    <div>
        <label for="03">False Positive</label>
        <input type="text" name="fp" id="03">
    </div>
    <div>
        <label for="04">True Negative</label>
        <input type="text" name="tn" id="04">
    </div>
    <input type="submit" value="Submit">
</form>
<a href="/display.php">Display</a>
</body>
<script src="/static/exercise2.js"></script>
</html>