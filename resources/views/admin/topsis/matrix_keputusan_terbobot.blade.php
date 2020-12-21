@extends('layouts.admin')
@section('title')
    Matrix Keputusan Terbobot| SIMAPRES
@endsection
@section('content')
<br>

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Matrix Keputusan</b></h4>
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
@push('scripts')
        <script type="text/javascript">
            
            $(document).ready(function() {
                $("#table-mahasiswa").DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('admin.topsis.matrix_keputusan_terbobot') !!}',
                    order:[0,'desc'],
                    columns:[
                        // {data:'id', name: 'id'},
                        // {data:'nim',name :'nim'},
                        // {data:'nama', name: 'nama'},
                        // {data:'fakultas',name:'fakultas'},
                        // {data:'v_prestasi',name:'v_prestasi'},
                        // {data:'v_karya_ilmiah',name:'v_karya_ilmiah'},
                        // {data:'v_bahasa_asing',name:'v_bahasa_asing'},
                        // {data:'v_ipk',name:'v_ipk'},
                        // {data:'v_indeks_sks',name:'v_indeks_sks'}
                        {data:'id', name: 'id'},
                        {data:'nama', name: 'nama'},
                        {data:'v_usia',name :'v_usia'},
                        {data:'v_status_pernikahan',name:'v_status_pernikahan'},
                        {data:'v_pekerjaan',name:'v_pekerjaan'},
                        {data:'v_pendapatan',name:'v_pendapatan'},
                        {data:'v_status_tinggal',name:'v_status_tinggal'},
                        {data:'v_tanggungan',name:'v_tanggungan'}                        
                    ]
                });
            } );

        </script>
        @include("admin.script.form-modal-ajax")
@endpush