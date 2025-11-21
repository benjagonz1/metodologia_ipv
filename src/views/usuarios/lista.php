<div class="card">
  <div style="display:flex;justify-content:space-between;align-items:center">
    <h3>Usuarios</h3>
    <a href="/usuarios/create" class="btn">Nuevo usuario</a>
  </div>

  <table class="table">
    <thead><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Rol</th><th>Creado</th></tr></thead>
    <tbody>
    <?php foreach($users as $u): ?>
      <tr>
        <td><?= $u['id'] ?></td>
        <td><?= htmlspecialchars($u['nombre']) ?></td>
        <td><?= htmlspecialchars($u['email']) ?></td>
        <td><?= htmlspecialchars($u['rol_id']) ?></td>
        <td><?= $u['created_at'] ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>