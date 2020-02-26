<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Question </title>
</head>
<body>
<hr/>
<div class="question">
    <h1> Ask Question</h1>
    <span>
        Title:
        <?=htmlspecialchars($question['title']) ; ?>
    </span>
    <br>
    <span>
        Body:
        <?= htmlspecialchars($question['body']); ?>
    </span>
    <p>Asked by:</p>
    <br>
    <span>
            <?php echo $question['author_name'] ?>
        </span>
    <span>
            <?php echo $question['created_on'] ?>
        </span>
    <span>
            <?php echo $question['category_name'] ?>
        </span>
    <hr/>
    <a href="<?= url("category.php?id={$question['category_id']}");?>">Back to the questions in this category</a>
    <hr/>
</div>
<?php foreach ($answers as $answer ): ?>
<span>Answer By: <?php echo $answer['author_name'] ?></span>
    <br>
<p>
    <?php echo $answer['body'] ?>
</p>
    <hr>
<?php endforeach; ?>
<form action="" method="post">
    <label for="body">Enter your answer here</label>
    <textarea name="body" id="" cols="30" rows="5"></textarea>
    <input type="submit" value="answer" name="answer">
</form>
<hr>
</body>
</html>