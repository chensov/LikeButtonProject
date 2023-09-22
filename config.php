<?php
/**
 * file: config.php
 * @author anthoncode
 * @link https://anthoncode.com/en
 */

define('DB_HOST', 'localhost');
define('DB_NAME', 'star_db');
define('DB_USER','root');
define('DB_PASSWORD','');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}

function prepareStatement($sql, $params = null)
{
    global $mysqli;
    $stmt = $mysqli->prepare($sql);
    if (!($stmt)) {
        throw new Exception("Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error);
    }

    if (!empty($params) && is_array($params)) {
        $count = count($params);            
        $bindStr = str_repeat('s', $count);
        $stmt->bind_param($bindStr, ...$params);
    }

    if (!$stmt->execute()) {
        throw new Exception("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
    }

    return $stmt;
}

/**
 * GetResult
 */
function getResult($stmt)
{
    if (!($res = $stmt->get_result())) {
        throw new Exception("Getting result set failed: (" . $stmt->errno . ") " . $stmt->error);
    }
    return $res;
}

