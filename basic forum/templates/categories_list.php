<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Categories List</title>
    </head>
    <body>

    <h1> Ask Question</h1>
    <h1> Categories List</h1>
    <table border="1">
        <thead>
        <th>Name</th>
        <th> Questions count</th>
        </thead>
        <tbody>
        <?php foreach ($categories as $category): ?>
        <tr>

                <td>

                    <a href="<?=  url("category.php?id={$category['id']}");?> ">
                        <?php echo $category['name']; ?>
                    </a>
                </td>

            <td><?php echo $category['question_count']; ?> </td>
        </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    </body>
</html>