<?php
/**
 * var \Data\UserDTO[] $data
 */
?>


<table border="1">
    <thead>
    <tr>
        <td>
            id
        </td>
        <td>
            username
        </td>
        <td>
            first name
        </td>
        <td>
            born on
        </td>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($data as $userDTO) : ?>

    <tr>
        <td>
            <?= $userDTO->getId(); ?>
        </td>
        <td>
            <?= $userDTO->getUsername();?>
        </td>
        <td>
            <?= $userDTO->getFirstName(); ?>
        </td>
        <td>
            <?= $userDTO->getBornOn(); ?>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>

</table>

<hr>
<span>Go back to
    <a href="profile.php">your profile</a>
</span>