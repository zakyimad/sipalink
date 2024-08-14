@extends('dashboard.layouts.main')

@section('container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Link</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="{{ url("/dashboard") }}">Dashboard</a></li>
                          <li class="breadcrumb-item active">Manage Link</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @if(session()->has("success"))
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa-check"></i> Informasi </h5>
                      {{ session('success') }}
                    </div>
                @endif
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <a href={{ url("/dashboard/links/create")}}>
                                    <button type="button" class="btn btn-block btn-primary col-md-2">Tambah Link</button>
                                </a>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="datalink" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Link</th>
                                            <th>Deskripsi</th>
                                            <th>Tags</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($links as $link)
                                        <tr>
                                            <td></td>
                                            <td>{{$link->title}}</td>
                                            <td>
                                                @if (strlen($link -> link) < 40)
                                                    <p>{{$link->link}}  <a href={{url($link->link)}}><span class="float-right"><i class="fas fa-share-from-square"></i></span></a></p>
                                                @else
                                                    <p>{{ substr_replace($link -> link, "...", 30) }}  <a href={{$link->link}}><span class="float-right"><i class="fas fa-share-from-square"></i></span></a></p>
                                                @endif
                                            </td>
                                            <td>{{$link->description}}</td>
                                            <td><span class="badge" style="font-size: 1em; background-color: {{ $link->tags->color }}; color: white; ">{{$link->tags->title}}</span></td>
                                            <td>
                                                <a href={{ url("/dashboard/links/$link->id") }} class="btn btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href={{url("/dashboard/links/$link->id/edit")}} class="btn btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action={{ url("/dashboard/links/$link->id") }} method="post" class='d-inline'>
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger" onclick="return confirm('Yakin akan menghapus Link ini?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Link</th>
                                            <th>Deskripsi</th>
                                            <th>Tags</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src={{asset("/AdminLTE/plugins/jquery/jquery.min.js")}}></script>
    <!-- Bootstrap -->
    <script src={{asset("/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js")}}></script>
    <!-- AdminLTE -->
    <script src={{asset("/AdminLTE/dist/js/adminlte.js")}}></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src={{asset("/AdminLTE/dist/js/pages/dashboard3.js")}}></script>

    <!-- DataTables  & Plugins -->
    <script src={{asset("/AdminLTE/plugins/datatables/jquery.dataTables.min.js")}}></script>
    <script src={{asset("/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}></script>
    <script src={{asset("/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}></script>
    <script src={{asset("/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}></script>
    <script src={{asset("/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js")}}></script>
    <script src={{asset("/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js")}}></script>
    <script src={{asset("/AdminLTE/plugins/jszip/jszip.min.js")}}></script>
    <script src={{asset("/AdminLTE/plugins/pdfmake/pdfmake.min.js")}}></script>
    <script src={{asset("/AdminLTE/plugins/pdfmake/vfs_fonts.js")}}></script>
    <script src={{asset("/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js")}}></script>
    <script src={{asset("/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js")}}></script>
    <script src={{asset("/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js")}}></script>

    <!-- Page specific script -->
    <script>
        const table = new DataTable('#datalink', {
            paging: true,
            lengthChange: false,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            columnDefs: [{
                searchable: false,
                orderable: false,
                targets: [0, -1]
            }],
            // order: [
            //    [1, 'asc']
            //],
            columnDefs: [{
                className: 'dt-nowrap dt-center',
                targets: -1
            }],
            // columnDefs: [{
            //     max-width: 20%,
            //     width: 20%,
            //     targets: 0
            // }],
        });

        table
            .on('order.dt search.dt', function () {
                let i = 1;

                table
                    .cells(null, 0, {
                        search: 'applied',
                        order: 'applied'
                    })
                    .every(function (cell) {
                        this.data(i++);
                    });
            })
            .draw();

    </script>



@endsection
