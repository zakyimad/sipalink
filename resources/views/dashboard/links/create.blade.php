@extends('dashboard.layouts.main')

@section('container')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create New Link</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="{{ url("/dashboard") }}">Dashboard</a></li>
                          <li class="breadcrumb-item"><a href="{{ url("/dashboard/links") }}">Manage Link</a></li>
                          <li class="breadcrumb-item active">Create Link</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="row p-4">
            <div class="col-sm-7">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Link Baru</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action={{ url("/dashboard/links")}} enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputJudul">Judul Link</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="exampleInputJudul"
                                    placeholder="Masukan Judul" value="{{old('title')}}">
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputLink">Link</label>
                                <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" id="exampleInputLink"
                                    placeholder="Link" value="{{old('link')}}">
                                @error('link')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputDeskripsi">Deskripsi</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" rows="3" name="description" id="exampleInputDeskripsi"
                                    placeholder="Deskripsi ... ">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type='hidden' class="custom-control-input" id="vpnhidden" name="vpn" value="0">
                                    <input type="checkbox" class="custom-control-input" id="vpn" name="vpn" value="1" @checked(old('vpn'))>
                                <label class="custom-control-label" for="vpn">Harus menggunakan VPN</label>
                                </div>
                            </div>

                            <div>
                                    <div class="form-group">
                                      <label>Tags</label>
                                      <select class="form-control" name="tags_id"  data-placeholder="  Pilih Tags"
                                              style="width: 100%;">
                                        @foreach ($tags as $tag)
                                            @if(old('tags_id') == $tag->id)
                                            <option value="{{ $tag->id }}" selected>
                                            {{ $tag->title }}
                                            </option>
                                            @else
                                            <option value="{{ $tag->id }}">
                                            {{ $tag->title }}
                                            </option>
                                            @endif
                                        @endforeach
                                      </select>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Preview Website (Optional)</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                  </div>
                                  <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                  </div>
                                </div>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>

            <div class="col-sm-5">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Tags</h3>
                    </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputJudul">Daftar Tags</label>
                            </div>
                                @foreach ($tags as $tag)
                                    <button class="btn btn-dark mb-2">
                                       {{ $tag->title }}
                                    </button>
                                    {{-- <div class="card">
                                        <div class="card-body">
                                        <h5 class="card-title">{{ $tag->title }}</h5>
                                        </div>
                                    </div> --}}
                                @endforeach
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning">Kelola Tags</button>
                        </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="/AdminLTE/dist/js/adminlte.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/AdminLTE/plugins/jszip/jszip.min.js"></script>
    <script src="/AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="/AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>



    <!-- Select2 -->
    <script src="/AdminLTE/plugins/select2/js/select2.full.min.js"></script>

    <!-- Page specific script -->
    <script>
        $(function () {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            })
        });
    </script>

    <script>
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>

@endsection
