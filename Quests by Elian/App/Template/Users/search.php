<?php /**
 * @var \Data\PhonebookDTO $row
 */
?>
<form method="post">
<label for="search">
Search
    <input type="search" name="search" id="search" >
    <input type="submit" name="search!" value="search!">
</label>
</form>
<div id="result">

    <?php if($data){
        
    echo '<table border="1"> 
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
        </tr>';



            foreach($data as $row){
                echo '<tr>';
            echo '<td>'.$row->getName().'</td>';
            echo '<td>'.$row->getSecondName().'</td>';
            echo '<td>'.$row->getPhone().'</td>';
            echo '<td>'.$row->getEmail().'</td>';
            echo '</tr>';

            }
        }



   echo '</table>';
    ?>
</div>