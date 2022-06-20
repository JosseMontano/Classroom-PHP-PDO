<script src="../../../../library/sweetalert2/sweetalert2@11.js"></script>

<p></p>
<script>
      Swal.fire({
  icon: 'success',
  title: 'Creacion exitosa',
  text: 'Se creo el curso de forma correcta',
  footer: '<a href="commentsView.php?id_publication=<?php echo $_GET['id_publication']; ?>">Volver al formulario</a>'
})
      </script>