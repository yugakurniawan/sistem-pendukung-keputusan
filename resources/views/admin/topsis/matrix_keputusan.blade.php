@extends('layouts.admin')
@section('title')
    Matrix Keputusan | SIMAPRES
@endsection
@section('content')
<br>

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Matrix Keputusan</b></h4>
            <p class="text-muted font-14 m-b-30">
            
            </p>

            <table id="bpnt" class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Lengkap</th>
                    <th>usia</th>
                    <th>Status Pernikahan</th>
                    <th>Pekerjaan</th>
                    <th>Pendapatan</th>
                    <th>Status Tinggal</th>
                    <th>Tanggungan</th>
                </tr>
                </thead>


                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->
<!-- end row -->


@endsection
@push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                $("#bpnt").DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('admin.topsis.matrix_keputusan') !!}',
                    order:[0,'desc'],
                    columns:[
                        {data:'id', name: 'id'},
                        {data:'nama', name: 'nama'},
                        {data:'l_usia',name:'l_usia'},
                        {data:'l_status_pernikahan',name:'l_status_pernikahan'},
                        {data:'l_pekerjaan',name:'l_pekerjaan'},
                        {data:'l_pendapatan',name:'l_pendapatan'},
                        {data:'l_status_tinggal',name:'l_status_tinggal'},                        
                        {data:'l_tanggungan',name:'l_tanggungan'}                        
                    ]
                });
            } );

        </script>
        @include("admin.script.form-modal-ajax")
@endpush