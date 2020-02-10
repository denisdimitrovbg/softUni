<form>

    <span>Name: </span>
    <input type="text" name="person">
    <br>
    <span>Age:</span>
    <input type="number" name="age">
    <br>
    <span>Town: </span>
    <select name="townId" >
        <option value="10">Sofia</option>
        <option value="20">Varna</option>
        <option value="30">Plovdiv</option>
    </select>
    <input type="submit" />
</form>


<?php

var_dump($_GET);