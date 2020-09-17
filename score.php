<?php

if (!empty($_POST)) {
    $score = $_POST['score'];
    if (is_numeric($score) === false) {
        $result = "数値を入力してください。";
    } elseif ($score >= 101 || $score < 0) {
        $result = "不正な点数です。";
    } else {
        if ($score == 100) {
            $result = "満点おめでとう";
        } elseif ($score >= 80) {
            $result = "素晴らしいです。";
        } elseif ($score >= 60) {
            $result = "合格です。";
        } else {
            $result = "不合格です。";
        }
    }
} else {
    $result = $_GET['score'];
    $score = '';
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>テスト結果判定</h1>
    <form method="post">
        <p>点数： <input type="text" name="score" size="3" maxlength="3" value="<?=htmlspecialchars($score, ENT_QUOTES)?>">点
            <input type="submit" value="送信">
        </p>
        <?php if ($_SERVER["REQUEST_METHOD"] === "POST") : ?>
            <p>判定結果:<?=$result?></p>
        <?php endif; ?>
    </form>
</body>

</html>