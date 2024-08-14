@extends('dashboard.layouts.main')

@section('container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row mb-3">
          <div class="col-lg-4">
            <div class="card h-100">
              <div class="card-header border-0 bg-dark">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Summary</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-link"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Total Link</span>
                      <span class="info-box-number">{{ $links->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>

                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-chart-line"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Clicked Link</span>
                      <span class="info-box-number">{{ $links->sum('hit_counter') }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>

                <a href={{url("/dashboard/links")}}>
                  <button type="button" class="btn btn-block btn-primary mt-4">Manage Link</button>
                </a>

              </div>
            </div>
            <!-- /.card -->
          </div>

          <div class="col-lg-8">
            <div class="card h-100">
              <div class="card-header border-0 bg-dark">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Recently Added</h3>
                </div>
              </div>
              <div class="card-body">
                <table id="link" class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px; text-align:center;">#</th>
                        <th style="text-align:center;">Title Link</th>
                        <th style="width: 30%; text-align:center;">Created By</th>
                        <th style="width: 25%; text-align:center;">Created At</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($links->take(3) as $link)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $link->title }}</td>
                            <td>{{ $link->user->fullname }}</td>
                            <td>{{ $link->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
              </div>
            </div>
            <!-- /.card -->
          </div>

        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-4">
                <!-- Widget: user widget style 2 -->
                <div class="card card-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header bg-warning">
                    <!-- /.widget-user-image -->
                    <h3 class="card-title">Top Contributors</h3>
                  </div>
                  <div class="card-footer p-0">
                    <ul class="nav flex-column">
                        @foreach ( $top_contributors->take(3) as $top )
                        <li class="nav-item mt-2">
                            <h6 class="ml-2 nav-link"> <span class="float-left badge bg-warning mr-2">#{{ $loop->iteration }}</span> {{ $top->user->fullname }} <span class="float-right badge bg-primary mr-1">{{ $top->count }}</span></h6>
                        </li>
                        @endforeach
                    </ul>
                  </div>
                </div>
                <!-- /.widget-user -->
              </div>

            <div class="col-lg-8">
              <div class="card">
                <div class="card-header border-0">
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="display">
                            <p id="quote" style="text-align:center; font-style:italic;">
                            </p>
                          <h3 id="author" style="text-align:center"></h3>
                          </div>
                      </div>
                </div>
              </div>
              <!-- /.card -->
            </div>

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
    <script src={{ asset("AdminLTE/plugins/jquery/jquery.min.js") }}></script>
    <!-- Bootstrap -->
    <script src={{ asset("AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js") }}></script>
    <!-- AdminLTE -->
    <script src={{ asset("AdminLTE/dist/js/adminlte.js") }}></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src={{ asset("AdminLTE/dist/js/pages/dashboard3.js") }}></script>

    <!-- DataTables  & Plugins -->
    <script src={{ asset("AdminLTE/plugins/datatables/jquery.dataTables.min.js") }}></script>
    <script src={{ asset("AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") }}></script>
    <script src={{ asset("AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js") }}></script>
    <script src={{ asset("AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js") }}></script>
    <script src={{ asset("AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js") }}></script>
    <script src={{ asset("AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js") }}></script>
    <script src={{ asset("AdminLTE/plugins/jszip/jszip.min.js") }}></script>
    <script src={{ asset("AdminLTE/plugins/pdfmake/pdfmake.min.js") }}></script>
    <script src={{ asset("AdminLTE/plugins/pdfmake/vfs_fonts.js") }}></script>
    <script src={{ asset("AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js") }}></script>
    <script src={{ asset("AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js") }}></script>
    <script src={{ asset("AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js") }}></script>

    <!-- Page specific script -->
    <script>
    const table = new DataTable('#link', {
        paging: false,
        ordering: false,
        searching: false,
        info: false,
        lengthChange: false,
    });
    </script>

    <script>
        const divWithQuote = document.getElementById("insertQuoteHere");
            let quote = document.getElementById("quote");
            let author = document.getElementById("author");
            let btn = document.getElementById("btn");
            const url = "https://api.quotable.io/random";
            let getQuote = () => {
                fetch(url)
                .then((data) => data.json())
                .then((item) => {
                quote.innerText = item.content;
                author.innerText = item.author;
            });
        };
        window.addEventListener("load", getQuote);
        // btn.addEventListener("click", getQuote);

        // $(document).ready(function () {
        //     $('.nav-link').click(function(e) {
        //     $('.nav-link').removeClass('active');
        //     $(this).addClass("active");

        // });
        // });
    </script>
@endsection
