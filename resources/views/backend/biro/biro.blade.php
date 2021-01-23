@extends('backend.template.index')

@section('content')
<center>
    <div class="row mb-4">
        <div class="float-left col-md-11">
            <h3><b>Biro Partner</b></h3>
        </div>
        <div class="float-right col-md-1">
            <button class="btn btn-sm icon-plus" style="background-color: #019943" onclick="bukaModal()"></button>
        </div>
    </div>
</center>
<div class="row">
    <div class="col-md-4">
        <div class="card card-outline card-info">
            <div class="card-body">
                <img src="{{asset('/biro/logo.png')}}" style="width:100%" alt="">
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>


<!-- modal -->
<div class="modal" id="formModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Biro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="">
                <div class="col-md-12">
                    <label><b>Nama</b></label>
                    <input type="text" name="nama" class="form-control">
                </div>
                <div class="col-md-12">
                    <label><b>File</b></label>
                    <input type="file" name="file" class="form-control">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm" style="background-color: #019943">Save</button>
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>


<script>
    function bukaModal(){
        $('#formModal').modal('show');
    }
</script>
@endsection
