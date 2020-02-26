<?php

function getUserByAuthId(PDO $db, string $authId):int
{
    $query='
            SELECT
                user_id
                FROM
                authentications
                WHERE
                    auth_string = ?
    ';


    $statement = $db->prepare($query);
    $statement->execute([$authId]);
    $data = $statement->fetch(PDO::FETCH_ASSOC);

    if($data && $data['user_id']){
        return (int)$data['user_id'];
    }
    return -1;
}


function issueAuthenticationString(PDO $db, int $userId):string
{
    $query='
            SELECT
                auth_string
                FROM
                authentications
                WHERE
                    user_id = ?
    ';


    $statement = $db->prepare($query);
    $statement->execute([$userId]);
    $data = $statement->fetch(PDO::FETCH_ASSOC);

    if($data && $data['auth_string']){
        return $data['auth_string'];
    }

    $authString = uniqid('', true);

    $query = '
    INSERT INTO
        authentications(
                        auth_string,
                        user_id
                        )
                        VALUES (
                                ?,
                                ?
        )
    ';

    $statement=$db->prepare($query);
    $statement->execute([
        $authString,
        $userId
    ]);

    return $authString;


}





function verifyCredentials(PDO $db, string $username, string $password): int
{

    $query = ' SELECT 
            id, 
            password
        FROM
          users
        WHERE
          username = ?'
    ;

    $statement = $db->prepare($query);
    if (!$statement->execute([$username])) {
        return -1;
    }

    $user = $statement->fetch(PDO::FETCH_ASSOC);
    $passwordHash = $user['password'];
    $result = password_verify($password, $passwordHash);

    if($result){
        return (int)$user['id'];
    }else{
        return -1;
    }
}


function register(PDO $db, string $username, string $password): bool
{
    $query = '
             INSERT INTO 
                users(
                      username,
                      password
                )
                VALUES(
                    ?,
                    ?
                )

    ';

    $statement = $db->prepare($query);
    $result = $statement->execute(
        [
            $username,
            password_hash($password, PASSWORD_ARGON2ID)
        ]
    );

    return $result;
}

