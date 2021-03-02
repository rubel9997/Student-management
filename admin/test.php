<html>

<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="jquery/dataTables.bootstrap.min.css" />
  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"></link>
</head>

<body>


  <div class="container">
    <div class="jumbotron">
      <h3>Požičovňa náradia SEAS</h3>
    </div>

    <table id="tabulka_kariet" class="table table-bordered">
      <thead>
        <tr>
          <th>Kód karty</th>
          <th>Názov karty</th>
          <th>Počet ks na všetkých skladoch</th>

        </tr>
      </thead>

      <tfoot>
        <tr>
          <th>Kód karty</th>
          <th>Názov karty</th>
          <th>Počet ks na všetkých skladoch</th>
        </tr>
      </tfoot>

      <tr>
        <td>13245</td>
        <td>Sekacie kladivo Bosch 5184</td>
        <td class="pocet">12</td>

      </tr>

      <tr>
        <td>6789</td>
        <td>Brúska Bosch 5184</td>
        <td class="pocet">7</td>

      </tr>

    </table>

    <?php

    ?>

  </div>

</body>
<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    $('#tabulka_kariet').DataTable();
  });
</script>
</html>