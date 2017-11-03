<?php require 'partials/head.php'; ?>

    <?php foreach ($users as $user) : ?>
        <li><?= $user->name ?></li>
    <?php endforeach; ?>

    <h1>Submit your form</h1>

    <form method="post" action="/users">
        <input type="text" name="name" id="name">
        <input type="submit" value="Send">
    </form>

<?php require 'partials/footer.php' ?>