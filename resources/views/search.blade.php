@extends('layouts.app')

@section('content')

<!-- SEARCH BAR -->
    <div class="horizontal-search-bar">
	
	</div>

<div id="full-size">
    
    <!-- MAP AREA -->
	<section class="mapArea-left">
		MAPA
	</section>

	<!-- LIST SPACES AREA -->
	<div class="listArea-right">

			
		@foreach ($list as $space)
			
			<div class="space-object">
				<div class="space-object-gallery">
					<div class="s2-content s2-display-container slider" id="div{{$space->id}}">
						
						{{ Form::hidden('spaceID', $space->id, array('id' => 'space_id')) }}

						<a href="{{ url('space/'.$space->id) }}">
						@foreach ($listimages as $space_images)
							@if ($space->id == $space_images->id)
							  	<img class="mySlides" src="{{ $space_images->img_thumb }}">
						  	@endif
					  	@endforeach
						</a>

						<button class="s2-button s2-display-left s2-black" onclick="plusDivs(this, -1)">&#10094;</button>
						<button class="s2-button s2-display-right s2-black" onclick="plusDivs(this, 1)">&#10095;</button>

					</div>

					<div class="space-object-info">
						<a href="{{ url('space/'.$space->id) }}">
							<div class="space_name">{{$space->name}} - {{$space->short_name}}</div>
							<div class="space_city">{{$space->city}}</div>
							<div class="space_rate">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								(3)
							</div>
						</a>
					</div>
					
				</div>
			</div>
			
		@endforeach
		

	</div>

</div>

<script>
var sliderObjects = [];
createSliderObjects();

function plusDivs(obj, n) {
  var parentDiv = $(obj).parent();
  var matchedDiv;
  $.each(sliderObjects, function(i, item) {
    if ($(parentDiv[0]).attr('id') == $(item).attr('id')) {
      matchedDiv = item;
      return false;
    }
  });

  matchedDiv.slideIndex=matchedDiv.slideIndex+n;
  showDivs(matchedDiv, matchedDiv.slideIndex);
}

function createSliderObjects() {
  var sliderDivs = $('.slider');
  $.each(sliderDivs, function(i, item) {
    var obj = {};
    obj.id = $(item).attr('id');
    obj.divContent = item;
    obj.slideIndex = 1;
    obj.slideContents = $(item).find('.mySlides');
    showDivs(obj, 1);
    sliderObjects.push(obj);
  });
}

function showDivs(divObject, n) {
  var i;
  var x = document.getElementById(divObject.id).getElementsByClassName("mySlides");
  if (n > divObject.slideContents.length) {
    divObject.slideIndex = 1
  }
  if (n < 1) {
    divObject.slideIndex = divObject.slideContents.length
  }
  for (i = 0; i < divObject.slideContents.length; i++) {
    x[i].style.display = "none";
  }

  x[divObject.slideIndex - 1].style.display = "block"; 
}
</script>

@endsection