<div class="container">
    <h1><?php echo $text_all_users; ?></h1>
    <?php if ($users) { ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"><?php echo $text_firstname; ?></th>
                    <th scope="col"><?php echo $text_lastname; ?></th>
                    <th scope="col"><?php echo $text_email; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <th scope="row"><?php echo $user['user_id']; ?></th>
                        <td><?php echo $user['firstname']; ?></td>
                        <td><?php echo $user['lastname']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $text_no_users; ?>
        </div>
    <?php } ?>
</div>