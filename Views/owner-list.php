<?php include('header.php'); ?>

<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>

<form action="<?php echo FRONT_ROOT . "Home/showOwnerList" ?>" method="get">
    <h1>List of Owner registered</h1>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 15%;">Username</th>
                <th style="width: 30%;">FirstName - lastname</th>
                <th style="width: 30%;">Email</th>
                <th style="width: 10%;">Chat</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ownerList as $owner) { ?>
                <tr>
                    <td class="first-td"><?php echo $owner->getUsername(); ?></td>
                    <td><?php echo $owner->getFirstname() . ' ' . $owner->getLastname(); ?></td>
                    <td><?php echo '$' . $owner->getEmail(); ?></td>

                    <td>
                        <form style="" action="<?php echo FRONT_ROOT . "Message/IndexMessage" ?>" method="post">

                            <input style="display: none;" type="text" name="idKeeper" id="idKeeper" value=<?php echo $owner->getId(); ?>>

                            <button type="submmit" class="large-button">Chat with <?php echo $owner->getFirstname();      ?></button>


                        </form>
                    </td>
                </tr>
            <?php }; ?>

        </tbody>
    </table>
</form>



<?php include('footer.php'); ?>