<?php
/**
 * @var \Data\PhonebookDTO $row
 */

?>

<table border="1">
    <tr>
        <th>
            Name
        </th>
        <th>
            Second Name
        </th>
        <th>
            Phone
        </th>
        <th>
            Email
        </th>
    </tr>
<?php foreach($data as $row):
    echo '<tr>';
    echo '<td>'.$row->getName().'</td>';
    echo '<td>'.$row->getSecondName().'</td>';
    echo '<td>'.$row->getPhone().'</td>';
    echo '<td>'.$row->getEmail().'</td>';
    echo '</tr>';

    endforeach; ?>
</table>


