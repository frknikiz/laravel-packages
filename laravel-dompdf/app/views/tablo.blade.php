<!doctype html>
<html lang="tr-TR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Html to Pdf</title>
</head>

<style type="text/css">
    table.reference {
        width: 100%;
        max-width: 100%;
        border-left: 1px solid #dddddd;
        border-right: 1px solid #dddddd;
        border-bottom: 1px solid #dddddd;
    }
    table.reference tr:nth-child(odd) {
        background-color: #ffffff;
    }
    table.reference>thead>tr>th, table.reference>tbody>tr>th, table.reference>tfoot>tr>th, table.reference>thead>tr>td, table.reference>tbody>tr>td, table.reference>tfoot>tr>td {
        padding: 8px;
        line-height: 1.42857143;
        vertical-align: top;
        border-top: 1px solid #ddd;}
    table.reference tr:nth-child(even) {
        background-color: #f1f1f1;
    }
</style>
<body>
<div class="table-responsive">
    <table class="reference notranslate">
      <tbody><tr>
        <th>CustomerID</th>
        <th>CustomerName</th>
        <th>ContactName</th>
        <th>Address</th>
        <th>City</th>
        <th>PostalCode</th>
        <th>Country</th>
      </tr>
      <tr>
        <td>1<br><br></td>
        <td>Alfreds Futterkiste</td>
        <td>Maria Anders</td>
        <td>Obere Str. 57</td>
        <td>Berlin</td>
        <td>12209</td>
        <td>Germany</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Ana Trujillo Emparedados y helados</td>
        <td>Ana Trujillo</td>
        <td>Avda. de la Constitución 2222</td>
        <td>México D.F.</td>
        <td>05021</td>
        <td>Mexico</td>
      </tr>
      <tr>
        <td>3</td>
        <td>Antonio Moreno Taquería</td>
        <td>Antonio Moreno</td>
        <td>Mataderos 2312</td>
        <td>México D.F.</td>
        <td>05023</td>
        <td>Mexico</td>
      </tr>
      <tr>
        <td>4<br><br></td>
        <td>Around the Horn</td>
        <td>Thomas Hardy</td>
        <td>120 Hanover Sq.</td>
        <td>London</td>
        <td>WA1 1DP</td>
        <td>UK</td>
      </tr>
      <tr>
        <td>5</td>
        <td>Berglunds snabbköp</td>
        <td>Christina Berglund</td>
        <td>Berguvsvägen 8</td>
        <td>Luleå</td>
        <td>S-958 22</td>
        <td>Sweden</td>
      </tr>
      <tr>
          <td>6</td>
          <td>{{$cusName}}</td>
          <td>{{$conName}}</td>
          <td>{{$address}}</td>
          <td>{{$pCode}}</td>
          <td>{{$city}}</td>
          <td>{{$country}}</td>
      </tr>
    </tbody></table>
    </div>
</body>
</html>