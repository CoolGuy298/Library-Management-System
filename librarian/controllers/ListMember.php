<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('core/connection.php');

$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();

$queryMembers = $connection->prepare('SELECT COUNT(*) FROM member');
$queryMembers->execute();

if ($queryMembers->fetchColumn() > 0) {
    $queryMembers = $connection->prepare('SELECT m.username, m.name, m.address, m.phone FROM member AS m');
    $queryMembers->execute();

    $columnCount = $queryMembers->columnCount();
    $fieldNames = array();

    // Retrieve field names
    for ($i = 0; $i < $columnCount; $i++) {
        $meta = $queryMembers->getColumnMeta($i);
        $fieldNames[] = $meta['name'];
    }

    echo '
    <table id="members-table" class="table tablesorter-bootstrap table-light table-striped table-bordered table-responsive-sm table-hover text-center">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Username</th>'; // Changed the position of the Username column

    // Output field names as table headers
    foreach ($fieldNames as $fieldName) {
        if ($fieldName != 'username') { // Skip the Username field for now
            echo '<th scope="col">' . $fieldName . '</th>';
        }
    }

    echo '
            </tr>
        </thead>
        <tbody>';

    $num = 1;
    foreach ($queryMembers->fetchAll(PDO::FETCH_NUM) as $row) {
        echo '<tr>';
        echo "<th scope='row'>" . $num . "</th>"; // Display the "No." column
        echo "<td><a href='ViewMember.php?username=" . urlencode($row[0]) . "'>" . $row[0] . "</a></td>"; // Added hyperlink to View_Member.php

        foreach ($row as $key => $cell) {
            if ($fieldNames[$key] != 'username') { // Skip the Username field for now
                echo "<td>" . $cell . "</td>";
            }
        }

        echo '</tr>';
        $num++;
    }

    echo '
        </tbody>
    </table>';

} else {

    echo "<br/><br/><br/><br/><br/>";
    echo "<h3 class='text-light'>You haven't added any member yet. Click on 'Add New Member' to start adding members now.</h4>";
}
?>
