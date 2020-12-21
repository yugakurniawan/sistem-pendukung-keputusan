@extends('layouts.admin')
@section('title')
    Hasil Rekomendasi | SIMAPRES
@endsection
@section('content')
<br>

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Hasil Rekomendasi</b></h4>
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
                    order:[7,'desc'],
                    columns:[
                        {data:'id', name: 'id',orderable:false,visible:false},
                        {data:'nama', name: 'nama',orderable:false},
                        {data:'usia',name:'usia'},
                        {data:'status_pernikahan',name:'status_pernikahan'},
                        {data:'pekerjaan',name:'pekerjaan'},
                        {data:'pendapatan',name:'pendapatan'},
                        {data:'status_tinggal',name:'status_tinggal'},                        
                        {data:'tanggungan',name:'tanggungan'},
                        {data:'nilai_preferensi',name:'nilai_preferensi'}                        
                    ]
                });
            } );

        </script>
        @include("admin.script.form-modal-ajax")
@endpush