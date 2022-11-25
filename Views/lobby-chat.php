<?php include('header.php'); ?>

<style>
  table,
  th,
  td {
    border: 1px solid black;
  }
</style>

<form style="scroll-behavior: auto;scroll-behavior: smooth;" action="<?php echo FRONT_ROOT . "Message/showMyMessageList" ?>" method="GET">
  <h1>Your Message's</h1>
  <table style="border: 1px solid;" class="table">
    <thead>
      <tr>
        <!-- <th>id</th> -->
        <!-- <th>idOwner</th>
        <th>idKeeper</th> -->
        <th style="width: 150px;">date</th>
        <th style="width: 600px;">text</th>
        <th style="width: 70px;">source</th>

      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($messageListAux as $message) {

      ?>
        <tr>
          <!-- <td> <?php echo $message->getId() ?></td>
            <td> <?php echo $message->getIdOwner() ?></td>
            <td> <?php echo $message->getIdKeeper() ?></td> -->
          <td> <?php echo $message->getDate() ?></td>
          <?php
          if ($message->getSource() == "owner") {
          ?>
            <td> <?php echo $message->getText() ?></td>
          <?php
          } else {
          ?> <td style="text-align: right;"> <?php echo $message->getText() ?></td>
          <?php
          }
          ?>

          <td style="text-align: center;"> <?php echo $message->getSource() ?></td>
        </tr>
      <?php
      };  ?>

    </tbody>
  </table>
</form>

<div class="container">

  <form action="<?php echo FRONT_ROOT . "Message/addMessage" ?>" method="post">
    <input type="text" id="text" name="text" placeholder="Message" />
    <input style="display: none;" type="text" name="idAux" id="idAux" value=<?php echo $idAux; ?>>

    <button type="submmit" class="large-button">enviar</button>
  </form>
</div>




<?php include('footer.php'); ?>