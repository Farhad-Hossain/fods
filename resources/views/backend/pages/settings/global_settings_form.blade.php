@extends('backend.master')
@section('main_content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-md-6">
			<div class="card card-custom gutter-b example example-compact">
				<div class="card-header">
					<h3 class="card-title">Base Controls</h3>
					<div class="card-toolbar">
						<div class="example-tools justify-content-center">
							<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
							<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
						</div>
					</div>
				</div>
				<!--begin::Form-->
				<form action="{{ route('backend.settings.global_settings') }}" method="post">
					@csrf
					<div class="card-body">
						<div class="form-group">
							<label>{!! __('backend_gs_form.app_name') !!}</label>
							<input type="text" class="form-control" placeholder="Application Name" name="app_name" />
							@error('app_name')
								<span class="form-text text-warning">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group">
							<label>{!! __('backend_gs_form.contact_email') !!}</label>
							<input type="text" class="form-control" placeholder="Contact Email" name="app_email" />
							@error('app_email')
								<span class="form-text text-warning">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group">
							<label>{!! __('backend_gs_form.theme_color') !!}</label>
							<input type="text" class="form-control" placeholder="Theme Color" name="theme_color" />
							@error('theme_color')
								<span class="form-text text-warning">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group">
							<label>{!! __('backend_gs_form.navbar_color') !!}</label>
							<input type="text" class="form-control" placeholder="Navbar Color" name="navbar_color" />
							@error('navbar_color')
								<span class="form-text text-warning">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group">
							<label>{!! __('backend_gs_form.delivery_charge') !!}</label>
							<input type="text" class="form-control" placeholder="Delivery Charge" name="delivery_charge" />
							@error('delivery_charge')
								<span class="form-text text-warning">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group">
							<label>{!! __('backend_gs_form.selling_charge') !!}</label>
							<input type="text" class="form-control" placeholder="Delivery Charge" name="selling_charge" />
							@error('selling_charge')
								<span class="form-text text-warning">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group">
							<label>{!! __('backend_gs_form.contact_address') !!}</label>
							<textarea class="form-control" name="contact_address"></textarea>
							@error('contact_address')
								<span class="form-text text-warning">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group">
							<label>{!! __('backend_gs_form.app_status') !!}</label>
							<div class="radio-inline">
								<label class="radio">
								<input type="radio" name="app_status" value="1" />Active
								<span></span></label>
								<label class="radio">
								<input type="radio" name="app_status" value="2" />Disabled
								<span></span></label>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-primary mr-2">Save Changes</button>
						<button type="reset" class="btn btn-secondary">Cancel</button>
					</div>
				</form>
				<!--end::Form-->
			</div>
			<!--end::Card-->	
		</div>



		<div class="col-sm-12 col-md-6">
			<div class="card card-custom gutter-b example example-compact">
				<div class="card-header">
					<h3 class="card-title">Base Controls</h3>
					<div class="card-toolbar">
						<div class="example-tools justify-content-center">
							<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
							<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
						</div>
					</div>
				</div>
				<!--begin::Form-->
				
				
					<div class="card-body">
						<div class="form-group">
							<label>{!! __('backend_gs_form.app_logo') !!}</label>
							<div></div>
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="app_logo" />
								<label class="custom-file-label">Choose file</label>
								@error('app_logo')
									<span class="form-text text-warning">{{ $message }}</span>
								@enderror
							</div>
						</div>

						<div class="form-group">
							<label>{!! __('backend_gs_form.app_description') !!}</label>
							<textarea class="form-control" name="app_description"></textarea>
							@error('app_description')
								<span class="form-text text-warning">{{ $message }}</span>
							@enderror
						</div>
					</div>
					
				</form>
				<!--end::Form-->
			</div>
			<!--end::Card-->	
		</div>
	</div>
</div>
@endsection