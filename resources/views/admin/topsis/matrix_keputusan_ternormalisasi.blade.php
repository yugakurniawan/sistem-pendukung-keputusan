@extends('layouts.admin')
@section('title')
    Matrix Keputusan Ternormalisasi | SIMAPRES
@endsection
@section('content')
<br>

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Matrix Keputusan Ternormalisasi</b></h4>
            <p class="text-muted font-14 m-b-30">
            
            </p>

            <table id="table-mahasiswa" class="table table-bordered">
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
{{-- @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                $("#bpnt").DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('admin.topsis.matrix_keputusan_ternormalisasi') !!}',
                    order:[0,'desc'],
                    columns:[
                        {data:'id', name: 'id'},
                        {data:'nama', name: 'nama'},
                        {data:'usia',name :'usia'},
                        {data:'status_pernikahan',name:'status_pernikahan'},
                        {data:'pekerjaan',name:'pekerjaan'},
                        {data:'pendapatan',name:'pendapatan'},
                        {data:'status_tinggal',name:'status_tinggal'},
                        {data:'tanggungan',name:'tanggungan'}                        
                    ]
                });
            } );
        </script>
        @include("admin.script.form-modal-ajax")
@endpush --}}
@push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                $("#table-mahasiswa").DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('admin.topsis.matrix_keputusan_ternormalisasi') !!}',
                    order:[0,'desc'],
                    columns:[
                        {data:'id', name: 'id'},
                        {data:'nama', name: 'nama'},
                        {data:'r_usia',name :'r_usia'},
                        {data:'r_status_pernikahan',name:'r_status_pernikahan'},
                        {data:'r_pekerjaan',name:'r_pekerjaan'},
                        {data:'r_pendapatan',name:'r_pendapatan'},
                        {data:'r_status_tinggal',name:'r_status_tinggal'},
                        {data:'r_tanggungan',name:'r_tanggungan'}
                    ]
                });
            });
        </script>
        @include("admin.script.form-modal-ajax")
@endpush