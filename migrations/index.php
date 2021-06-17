<?php
require_once("2021_06_16_create_schema.php");
require_once("2021_06_16_create_Cliente_table.php");
require_once("2021_06_16_insert.php");

$objMigration = new Migration();
$objMigration->slqCreateSchema();

$objCreateTable = new CreateTable();
$objCreateTable->CreateTable();

$objInsert = new InsertData();
$objInsert->insert();

header('location: ../index.php');