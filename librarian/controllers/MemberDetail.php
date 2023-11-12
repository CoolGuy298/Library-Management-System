<?php

$memberQuery = $connection->prepare('SELECT * FROM member WHERE username LIKE :username');
$memberQuery->bindParam(":username", $username, PDO::PARAM_STR);
$memberQuery->execute();

$columnNames = array_keys($memberQuery->fetch(PDO::FETCH_ASSOC));

$memberQuery->execute();
$memberDetails = $memberQuery->fetch(PDO::FETCH_NUM);



$_SESSION["member_id"] = $memberDetails[0];
$storedUsername = $memberDetails[4];

echo '<table id="memberDetailsTable" class="table table-light table-striped table-bordered">';
for ($i = 1; $i < 5; $i++) {
    echo '<tr>';
    echo '<th class="font-weight-bold" scope="row">' . ucwords($columnNames[$i]) . ':</th>';
    echo '<td class="memberInfo">' . $memberDetails[$i] . '</td>';
    echo '</tr>';
}
echo '</table>';
?>

