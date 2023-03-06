<?php
require('DB.php');

$thedatabase = 'books';
echo ' the dbname ' . $thedatabase . "<p>";

$db = new DB($thedatabase);
echo ' BEFORE INSERT ';
// Example usage: execute a query
$sql = 'INSERT INTO books (title, author, price) VALUES (:title, :author, :price)';
$params = [
    ':title' => 'John Doe',
    ':author' => 'john.doe@example.com',
    ':price' => 12,
];
$db->query($sql, $params);

echo ' AFTER INSERT '. "<p>";

// Example usage: get a single row
$sql = 'SELECT * FROM books WHERE id = :id';
$params = [
    ':id' => 3,
];

echo ' BEFORE GET ROW '. "<p>";

$row = $db->getRow($sql, $params);
echo $row['title'] . '<p>';
echo ' AFTER GET ROW ' . "<p>";

// Example usage: get multiple rows
$sql = 'SELECT * FROM books';
$rows = $db->getRows($sql);
foreach ($rows as $row) {
    echo $row['title'] . '<p>';
}

