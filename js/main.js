function eliminarUsuario(pagina ,usuarioID) {
    Swal.fire({
        title: '¿Estás seguro de que deseas eliminar este usuario?',
        text: "Esta acción es irreversible",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "admin/eliminar.php?p=" + pagina + "&id=" + usuarioID;
        }
      })
}