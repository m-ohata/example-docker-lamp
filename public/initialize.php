<?php
$user = 'root';
$pass = 'test';
$dbh = new PDO('mysql:host=mysql;', $user, $pass);
$dbh->query("create database hogehoge");
$dbh->query("use hogehoge");
$dbh->query("create table users(id int, name text)");

$result = $dbh->query("show create table users;");
var_dump($result);

