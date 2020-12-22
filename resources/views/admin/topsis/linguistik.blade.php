@extends('layouts.admin')
@section('title')
    Analisa Linguistik | SIMAPRES
@endsection
@section('content')
<br>

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Analisa Linguistik</b></h4>
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
                    // processing: true,
                    // serverSide: true,
                    // ajax: '{!! route('admin.topsis.linguistik') !!}',
                    // order:[0,'desc'],
                    // columns:[
                    //     {data:'id', name: 'id'},
                    //     {data:'nim',name :'nim'},
                    //     {data:'nama', name: 'nama'},
                    //     {data:'fakultas',name:'fakultas'},
                    //     {data:'l_prestasi',name:'l_prestasi'},
                    //     {data:'l_karya_ilmiah',name:'l_karya_ilmiah'},
                    //     {data:'l_bahasa_asing',name:'l_bahasa_asing'},
                    //     {data:'l_ipk',name:'l_ipk'},
                    //     {data:'l_indeks_sks',name:'l_indeks_sks'}                        
                    // ]
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('admin.topsis.linguistik') !!}',
                    order:[0,'desc'],
                    columns:[
                        {data:'id', name: 'id'},
                        {data:'nama', name: 'nama'},
                        {data:'l_usia',name :'l_usia'},
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