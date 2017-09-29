<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script>

    // Apertura de Mesa
    $(document).on('click', '#btn_modal_pedido', function (e) {
        $("#modal_pedido").modal("show");
        $("#num_mesa").val($(this).find('#nume_de_mesa').html());
    });

    // Menú - Del Corral
    $(document).on('click', '#btn_modal_del_corral', function (e) {
        $("#modal_del_corral").modal("show");
    });

    // Menú - Del Mar
    $(document).on('click', '#btn_modal_del_mar', function (e) {
        $("#modal_del_mar").modal("show");
    });

    // Menú - Comen por 4
    $(document).on('click', '#btn_modal_comen_por_cuatro', function (e) {
        $("#modal_comen_por_cuatro").modal("show");
    });

    // Menú - Empanadas / Sandwichs
    $(document).on('click', '#btn_modal_empanadas_sandwichs', function (e) {
        $("#modal_empanadas").modal("show");
    });

    // Menú Bebestibles
    $(document).on('click', '#btn_modal_bebestibles', function (e) {
        $("#modal_bebestibles").modal("show");
    });

    // Menú - Quincho Tarde
    $(document).on('click', '#btn_modal_menu_tarde', function (e) {
        $("#modal_menu_tarde").modal("show");
    });

    // Pago de la Mesa
    $(document).on('click', '#btn_modal_pago', function (e) {
        $("#modal_pago").modal("show");
    });

    // Cierre de la Mesa
    $(document).on('click', '#btn_modal_cerrar_mesa', function (e) {
        $("#modal_cerrar_mesa").modal("show");
    });

</script>
