<div class="card">
  <h3>Editar Inspección</h3>
  <form method="post" action="/inspecciones/update/<?= $ins['id'] ?>">
    <div class="form-row"><label>Código</label><input name="codigo" value="<?= htmlspecialchars($ins['codigo']) ?>" class="input" required></div>
    <div class="form-row"><label>Dirección</label><input name="direccion" value="<?= htmlspecialchars($ins['direccion']) ?>" class="input" required></div>
    <div class="form-row"><label>Tipo</label>
      <select name="tipo_vivienda_id" class="input">
        <?php foreach($tipos as $t): ?>
          <option value="<?= $t['id'] ?>" <?= $ins['tipo_vivienda_id']==$t['id'] ? 'selected' : '' ?>><?= htmlspecialchars($t['nombre']) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-row"><label>Estado</label>
      <select name="estado_id" class="input">
        <?php foreach($estados as $e): ?>
          <option value="<?= $e['id'] ?>" <?= $ins['estado_id']==$e['id'] ? 'selected' : '' ?>><?= htmlspecialchars($e['nombre']) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-row"><label>Fecha</label><input type="date" name="fecha_inspeccion" value="<?= $ins['fecha_inspeccion'] ?>" class="input"></div>
    <div class="form-row"><label>Observaciones</label><textarea name="observaciones" class="input"><?= htmlspecialchars($ins['observaciones']) ?></textarea></div>
    <button class="btn" type="submit">Actualizar</button>
  </form>
</div>
