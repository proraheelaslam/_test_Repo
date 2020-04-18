
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
/* Always set the map height explicitly to define the size of the div
 * element that contains the map. */
#map {
  height: 100%;
}

#description {
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
}

#infowindow-content .title {
  font-weight: bold;
}

#infowindow-content {
  display: none;
}

#map #infowindow-content {
  display: inline;
}

.pac-card {
  margin: 10px 10px 0 0;
  border-radius: 2px 0 0 2px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  outline: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
  background-color: #fff;
  font-family: Roboto;
}

#pac-container {
  padding-bottom: 12px;
  margin-right: 12px;
}

.pac-controls {
  display: inline-block;
  padding: 5px 11px;
}

.pac-controls label {
  font-family: Roboto;
  font-size: 13px;
  font-weight: 300;
}



#pac-input:focus {
  border-color: #4d90fe;
}

#title {
  color: #fff;
  background-color: #4d90fe;
  font-size: 25px;
  font-weight: 500;
  padding: 6px 12px;
}
</style>
 	<div class="form-group">
	    {!! Form::label('name','Name', array('class' => 'control-label')) !!}
	    {!! Form::text('name',null,['class'=>'form-control','required' => 'required']) !!}                                   
	</div>


	<div class="form-group">
     {!! Form::label('category_id','Category', array('class' => 'control-label')) !!}
	     <select class="form-control" name="category_id">

                              <?php
foreach ($cat_data as $catrow) {?>

                            <option <?php if (@$ads->category_id == $catrow->id) {?> selected <?php }?> value="{{$catrow->id}}">{{$catrow->name}}</option>
                           <?php }?>
                          </select>                            
	</div>



   <div class="form-group">
     {!! Form::label('location','Location', array('class' => 'control-label')) !!}
     <div id="pac-container">
    <input id="pac-input" value="<?=@$ads->ad_location?>" name="ad_location" class="form-control" type="text"
        placeholder="Enter a location" required>
  </div>
  </div>
  
  <div class="form-group">
	    {!! Form::label('tag','Tag Line', array('class' => 'control-label')) !!}
	    {!! Form::text('tag',null,['class'=>'form-control','required' => 'required']) !!}                                   
	</div>
    
     <div class="form-group">
	    {!! Form::label('ad_url','Website', array('class' => 'control-label')) !!}
	    {!! Form::text('ad_url',null,['class'=>'form-control','required' => 'required']) !!}                                   
	</div>


    <div class="form-group">
	    {!! Form::label('ad_price','Price', array('class' => 'control-label')) !!}
	    {!! Form::text('ad_price',null,['class'=>'form-control','required' => 'required']) !!}                                   
	</div>
    
     <div class="form-group">
	    {!! Form::label('ad_disc_price','Discounted Price', array('class' => 'control-label')) !!}
	    {!! Form::text('ad_disc_price',null,['class'=>'form-control','required' => 'required']) !!}                                   
	</div>
    
    
      <div class="form-group">
	    {!! Form::label('start_date','Start Date', array('class' => 'control-label')) !!}
	    {!! Form::text('start_date',null,['class'=>'form-control','id'=>'start_date','required' => 'required']) !!}                                   
	</div>
    
    
      <div class="form-group">
	    {!! Form::label('end_date','End Date', array('class' => 'control-label')) !!}
	    {!! Form::text('end_date',null,['class'=>'form-control','id'=>'end_date','required' => 'required']) !!}                                   
	</div>
    
    
                                                                <div class="form-group ">
                                                    
                                <label class=" control-label">Ad Details</label>

                                    <textarea name="description" id="description" class="form-control" rows="4"><?=@$ads->description?></textarea>
                              

                            </div>
     
               
                                                          <div  class="row">
 <div class="form-group col-md-6">
 <div id="map"></div>
<div id="infowindow-content">
  <img src="" width="16" height="16" id="place-icon">
  <span id="place-name"  class="title"></span><br>
  <span id="place-address"></span>
</div>
</div>
</div>                              
          <input type="hidden" value="<?=@$ads->latitude?>" id="lat" name="latitude"/>
<input type="hidden" value="<?=@$ads->longitude?>" id="lng" name="longitude"/>                                             

 <div class="form-group">
    {!! Form::submit(isset($ads) ? 'Update' : 'Save' ,['class'=>'btn btn-success pull-right']) !!}
</div>
<?php 
 if(@$ads->latitude=='' && @$ads->longitude==''){
	 $lat=-33.8688;
	 $lng=151.2195;
	 }
	 else{
		 
		  $lat=$ads->latitude;	  
		    $lng=$ads->longitude;
		 }
?>


@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHH2WyrHbuChuvGc1zkbY3LwiODEF8zGI&libraries=places&callback=initMap"
        async defer></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
  $(document).ready(function () {

        $("#start_date").datepicker({
            dateFormat: "dd-m-yy",
            minDate: 0,
             orientation: "bottom left",
            onSelect: function () {
                var dt2 = $('#end_date');
                var startDate = $(this).datepicker('getDate');
                var minDate = $(this).datepicker('getDate');
                var dt2Date = dt2.datepicker('getDate');
                //difference in days. 86400 seconds in day, 1000 ms in second
                var dateDiff = (dt2Date - minDate)/(86400 * 1000);

                startDate.setDate(startDate.getDate() + 30);
                if (dt2Date == null || dateDiff < 0) {
                    dt2.datepicker('setDate', minDate);
                }
                else if (dateDiff > 60){
                    dt2.datepicker('setDate', startDate);
                }
                //sets dt2 maxDate to the last day of 30 days window
                dt2.datepicker('option', 'maxDate', startDate);
                dt2.datepicker('option', 'minDate', minDate);
            }
        });
        $('#end_date').datepicker({
            dateFormat: "dd-m-yy",
            minDate: 0
        });
    });
    $('#category_form').validator('update');


$("#chk").change( function() {
  if ( $(this).is(":checked") ) {
    // do something if a1 is checked
	 $(this).val(1);
  } else if ( $(this).not(":checked") ) {
    // do something if a1 is unchecked
	 $(this).val(0);
  }
});

function BrowseFile() {
        $("input[id='imaage']").click();
    }
function readImageURL(input)
 {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#new_image')
                    .attr('src', e.target.result)
                    .width(70)
                    .height(70);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

  
</script>
<script>
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };



    var input = document.getElementById('autocomplete');

    function initMap() {
        var geocoder;
        var autocomplete;
  var card = document.getElementById('pac-card');
  var input = document.getElementById('pac-input');
  var types = document.getElementById('type-selector');
  var strictBounds = document.getElementById('strict-bounds-selector');
        geocoder = new google.maps.Geocoder();
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {
                  lat: <?=@$lat?>,
                  lng:<?=@$lng?>
            },
            zoom: 13
        });
        var card = document.getElementById('pac-card');
        autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29),
            draggable: true
        });
		<?php if(isset($user)){ ?>
		var marker = new google.maps.Marker({
          // The below line is equivalent to writing:
          // position: new google.maps.LatLng(-34.397, 150.644)
          position: {lat: <?=$lat?>, lng: <?=$lng?>},
          map: map,
		   draggable: true
        });
		<?php }?>


        autocomplete.addListener('place_changed', function() {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            console.log(place);

            if (!place.geometry) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
				$('#lng').val(place.geometry.location.lng());
	            $('#lat').val(place.geometry.location.lat());
                map.fitBounds(place.geometry.viewport);
            } else {
				$('#lng').val(place.geometry.location.lng());
		        $('#lat').val(place.geometry.location.lat());
                map.setCenter(place.geometry.location);
                map.setZoom(17); // Why 17? Because it looks good.
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }

            infowindowContent.children['place-icon'].src = place.icon;
            infowindowContent.children['place-name'].textContent = place.name;
            infowindowContent.children['place-address'].textContent = address;
            infowindow.open(map, marker);
            fillInAddress();

        });

        function fillInAddress(new_address) { // optional parameter
            if (typeof new_address == 'undefined') {
                var place = autocomplete.getPlace(input);
            } else {
                place = new_address;
            }
            //console.log(place);
          //  for (var component in componentForm) {
            //    document.getElementById(component).value = '';
            //    document.getElementById(component).disabled = false;
            //}

            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                   // document.getElementById(addressType).value = val;
                }
            }
        }

        google.maps.event.addListener(marker, 'dragend', function() {
            geocoder.geocode({
                'latLng': marker.getPosition()
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
					//	alert(marker.getPosition().lat());
						//	alert(marker.getPosition().lng());
                        console.log(autocomplete);
                        $('#autocomplete').val(results[0].formatted_address);
                        $('#latitude').val(marker.getPosition().lat());
                        $('#longitude').val(marker.getPosition().lng());
						$('#lng').val(marker.getPosition().lng());
		              $('#lat').val(marker.getPosition().lat());
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                        // google.maps.event.trigger(autocomplete, 'place_changed');
                        fillInAddress(results[0]);
                    }
                }
            });
        });
    }
</script>
@endsection