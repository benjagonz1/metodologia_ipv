<?php $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\'); ?>
<div class="card">
  <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px">
    <h3 class="section" style="margin:0">Inspecciones</h3>
    <a href="<?= $base ?>/inspecciones/create" class="btn">Nueva inspección</a>
  </div>

  <table class="table">
    <thead><tr><th>Código</th><th>Dirección</th><th>Tipo</th><th>Estado</th><th>Inspector</th><th>Fecha</th><th style="text-align:right">Acciones</th></tr></thead>
    <tbody>
    <?php foreach($inspecciones as $i):
      $badge = $i['estado']==='Aprobada'?'ok':($i['estado']==='Pendiente'?'warn':'bad');
    ?>
      <tr>
        <td><?= htmlspecialchars($i['codigo']) ?></td>
        <td><?= htmlspecialchars($i['direccion']) ?></td>
        <td><?= htmlspecialchars($i['tipo']) ?></td>
        <td><span class="badge <?= $badge ?>"><?= htmlspecialchars($i['estado']) ?></span></td>
        <td><?= htmlspecialchars($i['inspector']) ?></td>
        <td><?= htmlspecialchars($i['fecha_inspeccion']) ?></td>
        <td style="text-align:right">
          <a href="<?= $base ?>/inspecciones/edit/<?= $i['id'] ?>" class="btn gray">Editar</a>
          <a href="<?= $base ?>/inspecciones/delete/<?= $i['id'] ?>" class="btn danger">Borrar</a>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>

