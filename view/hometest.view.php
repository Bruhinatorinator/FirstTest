<?php
function welcome($name){
echo"<h2> Welcome $name !</h2>";
}

function renderAccountsTable($accounts) {
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Username</th>';
    echo '<th>Name</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    
    foreach ($accounts as $account) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($account['id']) . '</td>';
        echo '<td>' . htmlspecialchars($account['username']) . '</td>';
        echo '<td>' . htmlspecialchars($account['name']) . '</td>';
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
}