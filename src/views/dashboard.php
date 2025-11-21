<?php
$total = $total ?? 0;
$aprobadas = $aprobadas ?? 0;
$pendientes = $pendientes ?? 0;
$rechazadas = $rechazadas ?? 0;
?>
<div class="grid grid-4">
  <div class="card stat kpi total">
    <div class="label">Total inspecciones</div>
    <div class="value"><?= $total ?></div>
  </div>
  <div class="card stat kpi ok">
    <div class="label">Aprobadas</div>
    <div class="value"><?= $aprobadas ?></div>
  </div>
  <div class="card stat kpi warn">
    <div class="label">Pendientes</div>
    <div class="value"><?= $pendientes ?></div>
  </div>
  <div class="card stat kpi bad">
    <div class="label">Rechazadas</div>
    <div class="value"><?= $rechazadas ?></div>
  </div>
</div>

<div style="height:16px"></div>

<div class="card">
  <h3 class="section">Inspecciones recientes</h3>
  <table class="table">
    <thead>
      <tr><th>Código</th><th>Dirección</th><th>Fecha</th><th>Estado</th></tr>
    </thead>
    <tbody>
    <?php foreach($inspecciones as $i): 
      $badgeClass = ($i['estado_id']==1?'ok':($i['estado_id']==2?'warn':'bad'));
      $estadoTxt  = ($i['estado_id']==1?'Aprobada':($i['estado_id']==2?'Pendiente':'Rechazada'));
    ?>
      <tr>
        <td><?= htmlspecialchars($i['codigo']) ?></td>
        <td><?= htmlspecialchars($i['direccion']) ?></td>
        <td><?= htmlspecialchars($i['fecha_inspeccion']) ?></td>
        <td><span class="badge <?= $badgeClass ?>"><?= $estadoTxt ?></span></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>

