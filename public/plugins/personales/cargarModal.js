$('#exampleModal1').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var recipient0 = button.data('idTipoActividad')
var modal = $(this)
modal.find('.modal-body #idTipoActividadJquery').val(recipient0)
});
<script src="{{ asset('plugins/personales/cargarModal.js')}}"></script>