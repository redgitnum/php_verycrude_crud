<?php 
include_once __DIR__.'/partials/header.php';


?>

<h1>Add</h1>

<form action="/update" method="POST">
    <div class="form-input">
        <label for="name">Name:</label>
        <input type="text" name="name">
    </div>
    <div class="form-input">
        <label for="surname">Surname:</label>
        <input type="text" name="surname">
    </div>
    <div class="form-input">
        <label for="age">Age:</label>
        <input type="number" name="age">
    </div>
    <div class="form-input">
        <button type="submit">Update Record</button>
    </div>
</form>