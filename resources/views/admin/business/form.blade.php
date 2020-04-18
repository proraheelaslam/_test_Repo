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


     <div class="form-group ">
      {!! Form::label('name','Business Name', array('class' => 'control-label')) !!}
      {!! Form::text('name',null,['class'=>'form-control','required' => 'required']) !!}
  </div>

    	

	<div class="form-group ">
	    {!! Form::label('email','Email', array('class' => 'control-label')) !!}
	    {!! Form::text('email',null,['class'=>'form-control','required' => 'required']) !!}
	</div>
<div class="form-group ">
	    {!! Form::label('phone_number','Phone Number', array('class' => 'control-label')) !!}
	    {!! Form::text('phone_number',null,['class'=>'form-control','required' => 'required']) !!}
	</div>
    
    <div class="form-group ">
	    {!! Form::label('website','Website', array('class' => 'control-label')) !!}
	    {!! Form::text('website',null,['class'=>'form-control','required' => 'required']) !!}
	</div>
    
    <div class="form-group">
     {!! Form::label('location','Location', array('class' => 'control-label')) !!}
     <div id="pac-container">
    <input id="pac-input" value="<?=@$business->address?>" name="address" class="form-control" type="text"
        placeholder="Enter a location" required>
  </div>
  </div>
    
    
     
                                                        <div class="form-group">
                                                            <label class="control-label">Select Country</label>
                                                       
                                                                <select class="form-control" name="country" onChange="get_states(this,this.value);">
                                                                
                                                                <?php 
																
																$sel = ''; 
																	foreach($country as $row){
																		
																		?>
                                                                    <option <?php if ($business->country == $row->id) {?> selected <?php }?>  value="<?=$row->id?>"><?=$row->name?></option>
                                                                    
                                                                    <?php } ?>
                                                                </select>
                                                            
                                                        </div>
                                                        <div class="form-group" id="states" >
                                                         <label class="control-label ">Select State</label>
                                                         
                                                        <select class="form-control" name="state" onChange="get_city(this,this.value);">
                                                          <?php 
																
																$sel = ''; 
																	foreach($states as $row2){
																		
																		?>
                                                                    <option <?php if ($business->state == $row2->id) {?> selected <?php }?>  value="<?=$row2->id?>"><?=$row2->name?></option>
                                                                    
                                                                    <?php } ?>
                                                          </select>
                                                      
                                                        </div>
                                                          <div class="form-group" id="city" >
                                                           <label class="control-label">Select City</label>
                                                         
                                                           <select class="form-control" name="city">
                                                          <?php 
																
																$sel = ''; 
																	foreach($city as $row3){
																		
																		?>
                                                                    <option <?php if ($business->city == $row3->id) {?> selected <?php }?>  value="<?=$row3->id?>"><?=$row3->name?></option>
                                                                    
                                                                    <?php } ?>
                                                          </select>
                                                          </div>
                                                            <div class="form-group ">
	    {!! Form::label('zip_code','Zip Code', array('class' => 'control-label')) !!}
	    {!! Form::text('zip_code',null,['class'=>'form-control','required' => 'required']) !!}
	</div>
    
    
         <div class="form-group ">
                                                    
                                <label class=" control-label">Service</label>

                                    <textarea name="service" id="service" class="form-control" rows="4"><?=@$business->service?></textarea>
                              

                            </div>
                                                                <div class="form-group ">
                                                    
                                <label class=" control-label">About Business</label>

                                    <textarea name="detail" id="detail" class="form-control" rows="4"><?=@$business->detail?></textarea>
                              

                            </div>
                            
                                 
                             <div class="form-group">
    
         {!! Form::label('logo','Business Logo', array('class' => 'control-label')) !!}
         
             <input type="file"  onchange="readImageURL(this);" onclick="BrowseFile()"  name="image" id="image" accept="image/*">
           @if ($errors->has('image'))
            <span  class="help-block">{{ $errors->first('image') }}</span>
            @endif
           <?php if(isset($business->logo)){ ?>		
                <img src="{{asset('public/uploads/business/'.@$business->logo)}}" width="70" height="70" id="new_image"  >
            <?php }
            else{?>
              <img name="image" style="width: 70px; height: 70px;" onclick="BrowseFile()" src="{{asset('public/admin_assets/images/upload.png')}}" alt="#" id="new_image">
            <?php } ?>
       
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
                                                      
                                                       
          <input type="hidden" value="<?=@$business->latitude?>" id="lat" name="latitude"/>
<input type="hidden" value="<?=@$business->longitude?>" id="lng" name="longitude"/>                                             

 	


 <div class="form-group">
    {!! Form::submit(isset($business) ? 'Update' : 'Save' ,['class'=>'btn btn-success pull-right']) !!}
</div>
<?php 
 if(@$business->latitude=='' && @$business->longitude==''){
	 $lat=-33.8688;
	 $lng=151.2195;
	 }
	 else{
		 
		  $lat=$business->latitude;	  
		    $lng=$business->longitude;
		 }
?>


@section('scripts')

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHH2WyrHbuChuvGc1zkbY3LwiODEF8zGI&libraries=places&callback=initMap"
        async defer></script>

<script type="text/javascript">

function get_states(obj,country_id){
  $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}});
            $.ajax({
                url: "{{URL::to('/')}}/admin/business/get_state",
                type: 'post',  // user.destroy
                data:{"csrf-token":"{{ csrf_token() }}",'country_id':country_id,'business_id':<?=@$business->id?>},
                success: function(result) {
                //  return false;
                $('#states').html(result);

                }
            });
}

function get_city(obj,state_id){

  $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}});
            $.ajax({
                url: "{{URL::to('/')}}/admin/business/get_city",
                type: 'post',  // user.destroy
                data:{"csrf-token":"{{ csrf_token() }}",'state_id':state_id,'business_id':<?=@$business->id?>},
                success: function(result) {
                //  return false;
                 $('#city').html(result);
                }
            });
}
    $('#client_form').validator('update');
	// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">


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