<div class="card">
  <h3>Nuevo Usuario</h3>
  <form method="post" action="/usuarios/store">
    <div class="form-row"><label>Nombre</label><input name="nombre" class="input" required></div>
    <div class="form-row"><label>Email</label><input name="email" class="input" type="email" required></div>
    <div class="form-row"><label>Password</label><input name="password" class="input" type="password" required></div>
    <div class="form-row"><label>Rol (id)</label><input name="rol_id" class="input" value="2"></div>
    <button class="btn" type="submit">Crear</button>
  </form>
</div>
  <h3>Nueva Inspección</h3>
  <form method="post" action="/inspecciones/store">
    <div class="form-row">
      <label>Código</label>
      <input name="codigo" class="input" required>
    </div>
    <div class="form-row">
      <label>Dirección</label>
      <input name="direccion" class="input" required>
    </div>
    <div class="form-row">
      <label>Tipo de vivienda</label>
      <select name="tipo_vivienda_id" class="input">
        <?php foreach($tipos as $t): ?>
          <option value="<?= $t['id'] ?>"><?= htmlspecialchars($t['nombre']) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-row">
      <label>Estado</label>
      <select name="estado_id" class="input">
        <?php foreach($estados as $e): ?>
          <option value="<?= $e['id'] ?>"><?= htmlspecialchars($e['nombre']) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-row">
      <label>Inspector (id)</label>
      <input name="inspector_id" class="input" value="2">
    </div>
    <div class="form-row">
      <label>Fecha inspección</label>
      <input type="date" name="fecha_inspeccion" class="input">
    </div>
    <div class="form-row">
      <label>Observaciones</label>
      <textarea name="observaciones" class="input"></textarea>
    </div>
    <button class="btn" type="submit">Guardar</button>
  </form>
</div>
