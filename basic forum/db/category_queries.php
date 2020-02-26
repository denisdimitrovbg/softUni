<?php

function getQuestionsByCategoryID(PDO $db, int $categoryID):array
{
    $query ='
    SELECT
    q.id,
    q.title,
    q.author_id,
    u.username AS author_name,
    c.name AS category_name,
    q.created_on,
    COUNT(a.id) AS answers_count
    FROM
    questions AS q
    INNER JOIN users u on q.author_id = u.id
    INNER JOIN  categories c on q.category_id = c.id
    LEFT JOIN answers a on q.id = a.question_id
    WHERE 
    c.id = ?
    GROUP BY 
    q.id,
    q.title,
    q.author_id,
    u.username,
    c.name,
    q.created_on
    ORDER BY 
    q.created_on DESC,
    answers_count DESC 
        
    ';

    $statement = $db->prepare($query);
    $statement->execute([$categoryID]);
    return $statement->fetchAll(PDO::FETCH_ASSOC);

}



function getAllCategories(PDO $db): array
{
$query = '
    SELECT
        c.id,
        c.name,
        COUNT(q.id) AS question_count   
    FROM
        categories AS c 
    LEFT JOIN 
            questions as q
    ON
            c.id=q.category_id
    GROUP BY 
            c.id, c.id, c.name
    ORDER BY 
            question_count DESC,
             c.name ASC            
';

return $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

}