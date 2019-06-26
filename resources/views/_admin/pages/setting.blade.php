@extends('_admin.master') 
@section('content') 
<section class="content-header p-2">
   <div class="container-fluid">
       <div class="row mb-0">
           <div class="col-sm-6">
               <h4>Settings</h4>
           </div>
           <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item active">Settings</li>
               </ol>
           </div>
       </div>
   </div>
</section>
<section class="content">
   <div class="container-fluid">
        <form role="form" action="{{ route('site.settings') }}" method="post" accept-charset="utf-8">
       @csrf
       <div class="row">
           <div class="col-md-6">
               <div class="card card-primary card-outline">
                   <div class="card-header">
                       <h3 class="card-title">Site Information</h3>
                   </div>
                       <div class="card-body">
                           <div class="form-group">
                               <label for="site_name">Site Name*</label>
                               <input type="text" class="form-control" id="site_name" name="site_name" value="{{ \App\Setting::find_key('site_name') }}" required>
                           </div>
                           <div class="form-group">
                               <label for="site_email">Site Email*</label>
                               <input type="email" class="form-control" id="site_email" name="site_email" value="{{ \App\Setting::find_key('site_email') }}" required>
                           </div> 

                           <hr class="hr-line-2px">
                           <div class="form-group ">
                               <label>
                                   Meta Title*
                               </label>
                               <input type="text" name="site_meta_title" class="form-control" value="{{ \App\Setting::find_key('site_meta_title') }}" required>
                               <p class="help-block"></p>
                           </div>

                           <div class="form-group ">
                               <label>
                                   Meta Description*
                               </label>
                               <input type="text" name="site_meta_description" class="form-control" value="{{ \App\Setting::find_key('site_meta_description') }}" required>
                               <p class="help-block"></p>
                           </div>

                           <div class="form-group ">
                               <label>
                                   Meta Keyword*
                               </label>
                               <input type="text" name="site_meta_keyword" class="form-control" value="{{ \App\Setting::find_key('site_meta_keyword') }}" required>
                               <p class="help-block"></p>
                           </div>
                       </div> 
               </div>
           </div>
           <div class="col-md-6">
               <div class="card card-primary card-outline">
                   <div class="card-header">
                       <h3 class="card-title">Advanced</h3>
                   </div>
                       <div class="card-body">
                            
                           <div class="form-group">
                               <label>
                                   Google Analytics ID*
                               </label>
                               <input type="text" name="analytics_id" class="form-control" value="{{ \App\Setting::find_key('analytics_id') }}" required>
                               <p class="help-block"></p>
                           </div> 
                           <div class="form-group">
                               <label>
                                   Facebook ID*
                               </label>
                               <input type="text" name="fb_id" class="form-control" value="{{ \App\Setting::find_key('fb_id') }}" required>
                               <p class="help-block"></p>
                           </div>
                           <div class="form-group">
                               <label>
                                   Add Header Meta
                               </label>
                               <textarea class="textarea" name="headercode" placeholder="Place some text here" style="width: 100%; min-height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ \App\Setting::find_key('headercode') }}</textarea>
                               <p class="help-block"></p>
                           </div>
                            <div class="form-group">
                               <label>
                                   Add Footer Javascript
                               </label> 
                               <textarea class="textarea" name="footercode" placeholder="Place some text here" style="width: 100%; min-height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ \App\Setting::find_key('footercode') }}</textarea>
                               <p class="help-block"></p>
                           </div>
                           <div class="form-group">
                               <label>
                                   Add Body Code
                               </label> 
                               <textarea class="textarea" name="bodycode" placeholder="Place some text here" style="width: 100%; min-height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ \App\Setting::find_key('bodycode') }}</textarea>
                               <p class="help-block"></p>
                           </div>
                       </div>     
               </div>
           </div>
           <div class="card-footer">
               <button type="submit" class="btn btn-primary">Submit</button>
           </div>
       </div>
       </form>
   </div>
</section> 
@endsection