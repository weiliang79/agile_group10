@extends('layout.app')

@section('content')

<style>
	body{
		background: url('{{ asset("assets") }}/images/bg-masthead.jpg');
	}
</style>

<div class="vh-100 h-100">
	<div class="container py-5 h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col col-xl-10">
				<div class="card" style="border-radius: 1rem;">
					<div class="row g-0">
						<div class="col-md-6 col-lg-5 d-none d-md-block">
							<img src="{{ asset('assets') }}/images/bg-showcase-3.jpg" alt="" class="img-fluid w-100 h-100" style="border-radius: 1rem 0 0 1rem;" />
						</div>
						<div class="col-md-6 col-lg-7 d-flex align-items-center">
							<div class="card-body p-4 p-lg-5 text-black">

								<form action="{{ route('login.process') }}" method="post">
									@csrf

									<h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log into your account</h5>

									<div class="form-outline mb-4">
										<input class="form-control form-control-lg" type="email" name="email" />
										<label class="form-label" for="">Email address</label>
									</div>

									<div class="form-outline mb-4">
										<input class="form-control form-control-lg" type="password" name="password" />
										<label class="form-label" for="">Password</label>
									</div>

									<div class="pt-1 mb-4">
										<button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
									</div>

									<p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>

									<a href="{{ route('landing') }}" class="small text-muted">Back to main page</a>
								</form>

							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

	</div>
</div>

@endsection