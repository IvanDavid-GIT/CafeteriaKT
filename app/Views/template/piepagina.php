</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function Eliminar() {
        Swal.fire({
            title: "¿Realmente desea eliminar la categoría",
            text: "La eliminación no podrá deshacerse",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Eliminado!',
                    'El detalle fue eliminado',
                    'success'
                );
                document.getElementById(frmEliminar).submit();
            }



        })

    }
</script>
</body>

</html>