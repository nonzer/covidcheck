<div class="modal modal-warning fade" id="modal-warning-{{ $id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Suppression #{{ $id }}</h4>
            </div>
            <div class="modal-body">
                <p>Voulez-vous vraiment supprimer cet enregistrement ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Non</button>
                <form action="{{ route($prefix, $id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-outline">Oui</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->