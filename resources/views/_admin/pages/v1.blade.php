@extends('_admin.master') 
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3 id="unreadd">0</h3>

              <p>Contact Us</p>
            </div>
            <div class="icon">
              <i class="fa fa-address-book"></i>
            </div>
            <a href="{{ url('contact/list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3 id="gallery">0</h3>

              <p>Gallery</p>
            </div>
            <div class="icon">
              <i class="fa fa-tasks"></i>
            </div>
            <a href="{{ url('magic/gallery') }}?type=photo" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3  id="news">0</h3>

              <p>News</p>
            </div>
            <div class="icon">
              <i class="fa fa-newspaper"></i>
            </div>
            <a href="{{ url('magic/news') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3 id="event">0</h3>
              <p>Event</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="{{ url('magic/event') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Contact</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="text-center overlay" id="spin">
                    <i class='fa fa-spinner fa-spin loading' style="font-size: 100px;"></i>
                </div>
                <div class="table-responsive" id="paginateajax">
                
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="{{ url('contact/list') }}" class="btn btn-sm btn-secondary float-right">View All</a>
              </div>
              <!-- /.card-footer -->
            </div>
        </div>
        <div class="col-md-4">
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recently User</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" id="agentdata">
                
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{ url('magic/news') }}" class="uppercase">View All</a>
              </div>
              <!-- /.card-footer -->
            </div>
            </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
<!-- /.content-wrapper -->
@endsection
@section('javascript')
<script type="text/javascript">
  $( document ).ready(function() {
        $.ajax({
            method: "GET",
            url: '/magic/collect?q=all',
        }).done(function(data) {
            document.getElementById('event').innerHTML=data.event
            document.getElementById('news').innerHTML=data.news
            document.getElementById('gallery').innerHTML=data.gallery
        });
        
        $.ajax({
            method: "GET",
            url: '/magic/collect?q=contact',
        }).done(function(data) {
            $('#spin').hide();
            document.getElementById("paginateajax").innerHTML = data;
            loadProject();
        });
    });

    function loadProject() {
        $.ajax({
            method: "GET",
            url: '/magic/collect?q=agent',
        }).done(function(data) {
            $('#spin').hide();
            document.getElementById("agentdata").innerHTML = data;
        });
      }
</script>
@endsection