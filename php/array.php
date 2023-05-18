<?php

function filterListByThreshold($data, $threshold)
{
  $filteredData = array();
  foreach ($data as $item) {
    if ($item['price'] > $threshold) {
      $filteredData[] = $item;
    }
  }
  return $filteredData;
}

function calculateTotalSum($data)
{
  $totalSum = 0;
  foreach ($data as $item) {
    $totalSum += $item['price'];
  }
  return $totalSum;
}

// Usage:
$items = array(
  array('id' => 1, 'price' => 10),
  array('id' => 2, 'price' => 20),
  array('id' => 3, 'price' => 30),
  array('id' => 4, 'price' => 40),
);

if (isset($_POST['threshold'])) {
  $threshold = $_POST['threshold'];
  $filteredItems = filterListByThreshold($items, $threshold);
  $totalSum = calculateTotalSum($filteredItems);
  echo json_encode($filteredItems);
  echo "<br>";
  echo "Total Sum:" . $totalSum;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="" method="POST">
    <label for="threshold">Enter the threshold:</label>
    <input type="number" name="threshold" id="threshold">
    <input type="submit" value="Submit">
  </form>
</body>

</html>