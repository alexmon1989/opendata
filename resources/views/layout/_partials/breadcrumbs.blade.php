@if ($breadcrumbs)
<!--=== Breadcrumbs ===-->
		<div class="breadcrumbs">
			<div class="container">
				<h1 class="pull-left">{{ collect($breadcrumbs)->last()->h1 }}</h1>
				<ul class="pull-right breadcrumb">
				    @foreach ($breadcrumbs as $breadcrumb)
				        @if (!$breadcrumb->last)
				            <li><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
				        @else
				            <li class="active">{{ $breadcrumb->title }}</li>
				        @endif
					@endforeach
				</ul>
			</div><!--/container-->
		</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->
@endif