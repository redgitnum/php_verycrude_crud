<?php 
include_once __DIR__.'/partials/header.php';

$update_info = $_SESSION['update_info'];

?>

<h1>Update</h1>

<form action="/update_entry" method="POST">
    <div class="form-input">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $update_info['name']?>">
    </div>
    <div class="form-input">
        <label for="surname">Surname:</label>
        <input type="text" name="surname" value="<?php echo $update_info['surname']?>">
    </div>
    <div class="form-input">
        <label for="age">Age:</label>
        <input type="number" name="age" value="<?php echo $update_info['age']?>">
    </div>
    <input type="hidden" name="id" value="<?php echo $update_info['id']?>">
    <div class="form-input">
        <button type="submit">Update Record</button>
    </div>
</form>