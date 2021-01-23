@extends('backend.template.index')

@section('content')
<center>
    <div class="row mb-4">
        <div class="float-left col-md-11">
            <h3><b>Polres</b></h3>
        </div>
        <div class="float-right col-md-1">
            <button class="btn btn-sm" style="background-color: #019943" onclick="bukaModal()"><i style="color:white" class="icon-plus"></i></button>
        </div>
    </div>
</center>
<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Data Polres</h3>
            </div>
            <div class="widget-content">
                <table id="table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Polres</th>
                            <th>Alamat</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Nama Polres</td>
                            <td>-</td>
                            <td style="text-align: center">
                                <a class="icon-edit"></a>
                                <a class="icon-trash"></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <div class="col-md-4">
        <div class="card card-outline card-info">
            <div class="card-body">
                <h4 class="text-center">Kalimantan Timur</h4>
                <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo laudantium repellendus, eius impedit provident voluptatibus inventore? Voluptate enim nesciunt veritatis neque autem aliquam eius explicabo ad illum modi. Labore, dolorum.</h6>
            </div>
        </div>
    </div> --}}
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
                    <label><b>Alamat</b></label>
                    <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
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
