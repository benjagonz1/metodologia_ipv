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