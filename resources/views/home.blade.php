@extends('app')

@section('content')

<div class="container">

	<div class="row">

		<div class="col-md-8 col-sm-8" >
		
				@include('home-map')
				
		</div>

		<div class="col-md-4 col-sm-4" >	
			<div id="stories">
				<h1>Stories</h1>
				<p>Lorem ipsum dolor sit amet, <a href="#">consetetur sadipscing</a> elitr, sed diam nonumy eirmod tempor.</p>
				<p><b>Click on the marker to show the sidebar again when you've closed it.</b></p>
				<p>Other examples:</p>
				<ul>
				<li><a href="http://oueb.org">oueb.org</a></li>
				<li><a href="http://comptoir.net">comptoir.net</a></li>
				</ul>
				<p class="lorem">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
				<p class="lorem">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
			</div>
		</div>

	</div>
	
</div><!-- /.container -->

@endsection
