@extends("_admin.master")
@section("content")
<section class="content-header">
   <div class="container-fluid">
       <div class="row mb-2">
           <div class="col-sm-6">
               <h1>Contact</h1>
           </div>
           <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item active">Contact</li>
               </ol>
           </div>
       </div>
   </div>
</section>
<section class="content">
	<div class="container-fluid">
	    <div class="row">
			<div class="col-md-12">
				<div class="card card-primary card-outline">
					<div class="card-header">
						<h3 class="card-title">Contact Detail Data</h3>
					</div>
					<form action="{{ route('site.contact') }}" method="POST" accept-charset="utf-8">
						@csrf
						<div class="card-body">

							<!-- Info -->
							<div class="form-group">
								<label>
									 Info*
								</label>
								<textarea class="textarea" name="info" placeholder="Place some text here" style="width: 100%; min-height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ \App\Setting::find_key('info') }}</textarea>
								<p class="help-block"></p>
							</div>

							<!-- Address -->
							<div class="form-group ">
								<label>
									 Address*
								</label> 
								<textarea class="textarea" name="address" placeholder="Place some text here" style="width: 100%; min-height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ \App\Setting::find_key('address') }}</textarea>
								<p class="help-block"></p>
							</div>

							<!-- Google Maps URL -->
							<div class="form-group ">
								<label>
									 Google Maps URL*
								</label>
								<input type="gmaps_url" name="gmaps_url" class="form-control" value="{{ \App\Setting::find_key('gmaps_url') }}" required>
								<p class="help-block"></p>
							</div>

							<!-- Phone -->
							<div class="form-group ">
								<label>
									 Phone*
								</label>
								<input type="phone" name="phone" class="form-control" value="{{ \App\Setting::find_key('phone') }}" required>
								<p class="help-block"></p>
							</div>

							<!-- Fax -->
							<div class="form-group ">
								<label>
									 WhatsApp*
								</label>
								<input type="phone" name="whatsapp" class="form-control" value="{{ \App\Setting::find_key('whatsapp') }}" required>
								<p class="help-block"></p>
							</div>

							<!-- Email -->
							<div class="form-group ">
								<label>
									 Sales Email*
								</label>
								<input type="email" name="sales_email" class="form-control" value="{{ \App\Setting::find_key('sales_email') }}" required>
								<p class="help-block"></p>
							</div>
							<hr class="hr-line-2px">

							<!-- Contact Form Email -->
							<div class="form-group ">
								<label>
									 Info Email*
								</label>
								<input type="email" name="info_email" class="form-control" value="{{ \App\Setting::find_key('info_email') }}" required>
								<p class="help-block"></p>
							</div>

							<!-- Contact Form Email -->
							<div class="form-group ">
								<label>
									 Working*
								</label>
								<textarea id="editor1" name="working" cols="80" rows="5" required>{{ \App\Setting::find_key('working') }}</textarea>
							</div>
						</div>

						<div class="card-footer">
							<input type="submit" name="submit" class="btn btn-primary" value="Submit">
						</div>
					</form>				
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('javascript')
<!-- CK Editor -->
<script src="/dist/plugins/ckeditor/ckeditor.js"></script>
<script>
  	$(function () {

	    var allEditors = document.querySelectorAll('#editor1');
	    for (var i = 0; i < allEditors.length; ++i) {
	    	ClassicEditor
		    	.create(allEditors[i], {
		    		toolbar: [ 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
		    	})
		    	.then(function (editor) {
				})
	    		.catch(function (error) {
	    			console.error(error)
	    		})
		}
  	})
</script>
@endsection