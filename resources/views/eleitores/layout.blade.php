<!DOCTYPE html>

<html>

<head>
    <title>Pesquisa Eleitoral isaiasilva.info@gmail.com</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        @yield('content')
    </div>
</body>
<script>
    $(document).ready(function() {
        /* When click New pesquisa button */
        $('#new-pesquisa').click(function() {
          //  $('#btn-save').val("create-eleitor");
          //  $('#eleitor').trigger("reset");
            $('#eleitorCrudModal').html("Pesquisa Quantitativa Direcionada");
            $('#crud-modalPesquisa').modal('show');
        });
        /* When click New eleitor button */
        $('#new-eleitor').click(function() {
            $('#btn-save').val("create-eleitor");
            $('#eleitor').trigger("reset");
            $('#eleitorCrudModal').html("Adicionar Novo Eleitor");
            $('#crud-modal').modal('show');
        });
        /* Edit Eleitor */
        $('body').on('click', '#edit-eleitor', function() {
            var eleitor_id = $(this).data('id');
            $.get('eleitores/' + eleitor_id + '/edit', function(data) {
                $('#eleitorCrudModal').html("Editar Eleitor");
                $('#btn-update').val("Update");
                $('#btn-save').prop('disabled', false);
                $('#crud-modal').modal('show');
                $('#cust_id').val(data.id);
                $('#nome').val(data.nome);
                $('#telefone').val(data.telefone);
                $('#localidade').val(data.localidade);
                $('#endereco').val(data.endereco);
            })
        });
        /* Show Eleitor */
        $('body').on('click', '#show-eleitor', function() {
            $('#eleitorCrudModal-show').html("Detalhes do Eleitor");
            $('#crud-modal-show').modal('show');
        });
        /* Delete eleitor */
        $('body').on('click', '#delete-eleitor', function() {
            var eleitor_id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            confirm("Tem deseja que deseja deletar este registro? !");
            $.ajax({
                type: "DELETE",
                url: "http://localhost/laravel7crud/public/eleitores/" + eleitor_id,
                data: {
                    "id": eleitor_id,
                    "_token": token,
                },
                success: function(data) {
                    $('#msg').html('Eleitor excluído com sucesso!');
                    $("#eleitor_id_" + eleitor_id).remove();
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });
    });
</script>

</html>