<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>IPV - Sistema</title>
<?php $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\'); ?>
<link rel="stylesheet" href="<?= $base ?>/css/estilos.css?v=3">
</head>
<body>
<div class="container">
  <div class="navbar">
    <div class="brand">
      <div class="logo"></div>
      <div>IPV — Sistema de Inspecciones</div>
    </div>
    <div class="nav-actions">
      <a href="<?= $base ?>/inspecciones" class="btn">Inspecciones</a>
      <a href="<?= $base ?>/usuarios" class="btn gray">Usuarios</a>
    </div>
  </div>
  <div style="height:14px"></div>
