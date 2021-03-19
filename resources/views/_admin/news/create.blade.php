@extends("_admin.master")
@section("content")
<section class="content-header p-2">
   <div class="container-fluid">
       <div class="row mb-0">
           <div class="col-sm-6">
               <h4>Create New {{ $title }}</h4>
           </div>
           <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item active">{{ $title }}</li>
               </ol>
           </div>
       </div>
   </div>
</section>

<section class="content">
    <div class="container-fluid">
      <form method="POST" action="{{ url('/magic/news') }}" accept-charset="UTF-8" enctype="multipart/form-data">
          {{ csrf_field() }}

          @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
          @endif
          <div class="row">
            @include ('_admin.news.form', ['formMode' => 'create'])
          </div>

      </form>
    </div>
</section>
@endsection
