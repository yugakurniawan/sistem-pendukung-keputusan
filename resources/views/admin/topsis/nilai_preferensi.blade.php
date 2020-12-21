@extends('layouts.admin')
@section('title')
    Nilai Preferensi | SIMAPRES
@endsection
@section('content')
<br>

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Nilai Preferensi</b></h4>
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
                    <th>Nilai Preferensi</th>
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
                    ajax: '{!! route('admin.topsis.nilai_preferensi') !!}',
                    order:[0,'desc'],
                    columns:[
                        {data:'id', name: 'id'},
                        {data:'nama', name: 'nama'},
                        {data:'a_usia',name:'a_usia'},
                        {data:'a_status_pernikahan',name:'a_status_pernikahan'},
                        {data:'a_pekerjaan',name:'a_pekerjaan'},
                        {data:'a_pendapatan',name:'a_pendapatan'},
                        {data:'a_status_tinggal',name:'a_status_tinggal'}                        
                        {data:'a_tanggungan',name:'a_tanggungan'}
                        {data:'nilai_preferensi',name:'nilai_preferensi'}     
                        // {data:'a_prestasi',name:'a_prestasi'},
                        // {data:'a_karya_ilmiah',name:'a_karya_ilmiah'},
                        // {data:'a_bahasa_asing',name:'a_bahasa_asing'},
                        // {data:'a_ipk',name:'a_ipk'},
                        // {data:'a_indeks_sks',name:'a_indeks_sks'},
                        // {data:'nilai_preferensi',name:'nilai_preferensi'}                        
                    ]
                });
            } );

        </script>
        @include("admin.script.form-modal-ajax")
@endpush