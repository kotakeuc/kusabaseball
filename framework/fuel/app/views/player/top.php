<html>
<head>
<meta charset="UTF-8">
<title>選手登録</title>
</head>
<body>
<?php echo $form; ?>
<?php foreach ($rows as $row): ?>
<div>
<?php echo $row['player_id'].'.['.$row['team_name'].']:'.$row['player_name'].'{'.$row['back_number'].'}'; ?>
<div>
<?php endforeach;?>
</body>
</html>
