<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Questions </title>
    </head>
    <body>
    <a href="<?= url("ask_question.php?category_id=$id"); ?>">Ask new question</a>
    <hr/>
    <?php foreach ($questions as $question ): ?>
    <div class="question">
        <span>
           <a href="<?=url("question.php?id={$question['id']}") ?>">
            <?php echo $question['title'] ?>
            </a>

        </span>
        <span>
           ( <?php echo $question['answers_count'] ?> )
        </span>
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
    </div>
        <hr/>
    <?php endforeach; ?>

    </body>
</html>