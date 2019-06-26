@extends("_admin.master")
@section("header")
  <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
@endsection
@section("content")
<section class="content-header p-2">
   <div class="container-fluid">
       <div class="row mb-0">
           <div class="col-sm-6">
               <h4>File Manager</h4>
           </div>
           <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item active">File Manager</li>
               </ol>
           </div>
       </div>
   </div>
</section> 

<section class="content">
	<div class="container-fluid" style="height: 600px;">
        <div id="fm"></div> 
	</div>
</section> 
@endsection
@section('javascript')
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
@endsection