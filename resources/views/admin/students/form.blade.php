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


<div class="form-group ">
    {!! Form::label('first_name','First Name', array('class' => 'control-label')) !!}
    {!! Form::text('first_name',null,['class'=>'form-control','required' => 'required']) !!}
</div>

<div class="form-group ">
    {!! Form::label('last_name','Last Name', array('class' => 'control-label')) !!}
    {!! Form::text('last_name',null,['class'=>'form-control','required' => 'required']) !!}
</div>


<div class="form-group ">
    {!! Form::label('email','Email', array('class' => 'control-label')) !!}
    {!! Form::text('email',null,['class'=>'form-control','required' => 'required', 'readonly'=>true]) !!}
</div>
<div class="form-group ">
    {!! Form::label('phone','Phone Number', array('class' => 'control-label')) !!}
    {!! Form::text('phone',null,['class'=>'form-control','required' => 'required']) !!}
</div>


<div class="form-group ">
    <label class=" control-label">About Students</label>
    <textarea name="about_student" id="about_student" class="form-control" rows="4"><?=@$students->about_student?></textarea>

</div>

<div class="form-group ">
    {!! Form::label('instagram','Instagram', array('class' => 'control-label')) !!}
    {!! Form::text('instagram',null,['class'=>'form-control']) !!}
</div>
<div class="form-group ">
    {!! Form::label('facebook','Facebook', array('class' => 'control-label')) !!}
    {!! Form::text('facebook',null,['class'=>'form-control']) !!}
</div>
<div class="form-group ">
    {!! Form::label('twitter','Twitter', array('class' => 'control-label')) !!}
    {!! Form::text('twitter',null,['class'=>'form-control']) !!}
</div>
<div class="form-group ">
    {!! Form::label('linkedin','Linkedin', array('class' => 'control-label')) !!}
    {!! Form::text('linkedin',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">

    {!! Form::label('image','Student Image', array('class' => 'control-label')) !!}

    <input type="file"  onchange="readImageURL(this);" onclick="BrowseFile()"  name="image" id="image" accept="image/*">
    @if ($errors->has('image'))
        <span  class="help-block">{{ $errors->first('image') }}</span>
    @endif
    <?php if(@$students->image!=''){ ?>
    <img src="{{asset('public/uploads/students/'.@$students->image)}}" width="70" height="70" id="new_image"  >
    <a  onclick="delete_record(<?=@$students->id?>)" href="javascript:;">Remove Image</a>
    <?php }
    else{?>
    <img name="image" style="width: 70px; height: 70px;" onclick="BrowseFile()" src="{{asset('public/admin_assets/images/upload.png')}}" alt="#" id="new_image">
    <?php } ?>

</div>

<div class="form-group">
    {!! Form::submit(isset($students) ? 'Update' : 'Save' ,['class'=>'btn btn-success pull-right']) !!}
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="confirmDelete" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Confirm Delete</h4>
            </div>
            <div class="modal-body"> Are you sure you want to delete? </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal" id="btn-delete"> Confirm</button>

            </div>
        </div>
    </div>
</div>


<?php
if(@$students->latitude=='' && @$students->longitude==''){
    $lat=-33.8688;
    $lng=151.2195;
}
else{

    $lat=$students->latitude;
    $lng=$students->longitude;
}
?>


@section('scripts')

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHH2WyrHbuChuvGc1zkbY3LwiODEF8zGI&libraries=places&callback=initMap"
            async defer></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript">


        var delID = 0;
        function delete_record(del_id){
            delID = del_id;
            $("#confirmDelete").modal("show");
        }


        $(document).ready(function () {




            $("#btn-delete").click(function(e) {
                if(delID != 0){
                    $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}});
                    $.ajax({
                        url: "{{URL::to('/')}}/admin/users/remove_image_student",
                        type: 'post',  // user.destroy
                        data:{"csrf-token":"{{ csrf_token() }}",'image_id':delID},
                        success: function(result) {

                            location.reload();

                        }
                    });

                }
            });

        }); //..... end of ready() .....//
        //

        $('#client_form').validator('update');
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
        $(document).ready(function () {

            $( "#registartion_date" ).datepicker();
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
                <?php if(isset($students)){ ?>
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
