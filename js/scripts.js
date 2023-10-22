function alertaEliminar(pagina ,id) {
    Swal.fire({
        title: '¿Estás seguro de que deseas eliminar este registro?',
        text: "Esta acción es irreversible",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "admin/eliminar.php?p=" + pagina + "&id=" + id;
        }
      })
}

function reservarRuta() {
  Swal.fire('Viaje reservado correctamente', '', 'success')
}