<?php 
include_once __DIR__.'/partials/header.php';
?>
<h1>Index</h1>
<ul>
<?php 

// echo '<pre>';
// var_dump($result);
// echo '</pre>';
// exit;
foreach ($result as $entry) {?>
    <li class="index-list">
        <div>id: <?php echo $entry['id']?></div>
        <div>Name: <?php echo $entry['name'] ?></div>
        <div>Surname: <?php echo $entry['surname'] ?></div>
        <div>Age: <?php echo $entry['age'] ?></div>
        <div class="buttons">
            <form action="/update" method="POST">
                <input type="hidden" name="update_id" value="<?php echo $entry['id'] ?>">
                <button type="submit">UPDATE</button>
            </form>
            <form action="/delete" method="POST">
                <input type="hidden" name="delete_id" value="<?php echo $entry['id'] ?>">
                <button style="color: red" type="submit">DELETE</button>
            </form>
        </div>
    </li>
<?php } ?>
</ul>

</body>
</html>
