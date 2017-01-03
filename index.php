<!DOCTYPE HTML>
<html>
<head>
</head>
<body>

<?php
// define variables and set to empty values
$amount = $interest = $term = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $amount = test_input($_POST["amount"]);
    $interest = test_input($_POST["interest"]);
      $term = test_input($_POST["term"]);
      	  }

function test_input($data) {
  $data = trim($data);
    $data = stripslashes($data);
      $data = htmlspecialchars($data);
        return $data;
	}
	?>
	<h3>Region:region-here</h3>
<h2>Simple Mortgage Calculator</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Mortgage Amount: <input type="text" name="amount">
    <br><br>
      Interest Rate: <input type="text" name="interest">
        <br><br>
	  Term (Years): <input type="text" name="term">
	    <br><br>
	      <input type="submit" name="submit" value="Submit">
   </form>

<?php

setlocale(LC_MONETARY, 'en_US');

$n = $term * 12;
$c = ($interest / 100) / 12;
$c2 = pow(1+$c, $n);
$p = $amount*(($c*$c2)/($c2 - 1));

echo "<h2>Your Results:</h2>";
echo "Mortgage Loan: " . "$" . money_format('%i', $amount);
echo "<br>";
echo "Interest Rate: " . $interest."%";
echo "<br>";
echo "Term: " . $term;
echo "<hr>";
echo "<b>Monthly Payment: " . "$" . money_format('%i', round($p,0)) . "</b>";

?>

</body>
</html>
