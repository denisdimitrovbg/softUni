<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ask Question</title>
</head>
<body>

<h1> Ask Question</h1>

<form method="post">
    <label for="title">Title</label>
    <input type="text" name="title">
    </br>
    <label for="body">Question</label>
    <textarea name="body" cols="50" rows="1"></textarea>
    </br>
    <label for="category">Category</label>
    <select name="category" id="">
        <?php foreach ($categories as $category) : ?>
            <option <?= $category['id'] == $categoryId ? 'selected' : ''?> value="<?= $category['id'] ?>">
                <?= $category['name'] ?>(<?= $category['question_count']; ?>)
            </option>
        <?php endforeach; ?>
    </select>
    </br>
    <select name="existing_tags[]" multiple="multiple">

        <?php foreach ($tags as $tag) : ?>
            <option value="<?= $tag['id'] ?>">
                <?= $tag['name'] ?>(<?= $tag['questions_count'] ?>)
            </option>
        <?php endforeach; ?>
    </select>

    <label for="new_tags">Add tags:</label>
    <input type="text" name="new_tags" placeholder="Enter your tags">
    </br>
    <input type="submit" value="ask">
</form>

</body>
</html>