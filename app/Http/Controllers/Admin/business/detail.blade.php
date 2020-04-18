@extends('admin.template.template')

@section('content')
<style type="text/css">
    #payment_type { width: 200px; margin-bottom: 10px;  }
    #donation_type { width: 200px; margin-bottom: 10px; margin-right: 10px; }
</style>

 <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        @include('admin/template/flash_messages')
        <div class="row">
            <div class="col-md-12">

                    <section class="panel">
                        <header class="panel-heading no-border">
                           Business Detail View

                        </header>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th></th>


                                </tr>
                                </thead>
                                <tbody>


                                <tr>
                                    <td>Name</td>
                                    <td> <?=$business->name?></td>

                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td> <?=$business->email?></td>

                                </tr>
<tr>
                                    <td>Detail</td>
                                    <td> <?=$business->detail?></td>

                                </tr>
                                <tr>
                                    <td>Website</td>
                                    <td> <?=$business->website?></td>

                                </tr>
                                 <tr>
                                    <td>Phone Number</td>
                                    <td> <?=$business->phone_number?></td>

                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td> <?=$business->address?></td>

                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td>  <?=$business['country_details']->name?></td>

                                </tr>

                                   <tr>
                                    <td>State</td>
                                    <td> <?=$business['state_details']->name?></td>

                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td> <?=$business['city_details']->name?></td>

                                </tr>
                                <tr>
                                    <td>Zip Code</td>
                                    <td> <?=$business->zip_code?></td>

                                </tr>
                              <tr>
                                    <td>Status</td>
                                    <?php
if ($business->is_approve == 1) {
	$app = 'Approved';
} else {
	$app = "un Approved";
}
?>
                                    <td> <?=$app?></td>

                                </tr>

                                  <tr>
                                    <td>Logo</td>

                                    <td>

                                           <?php if (isset($business->logo)) {?>
                <img src="{{asset('public/uploads/business/'.@$business->logo)}}" width="70" height="70" id="new_image"  >
            <?php } else {?>
              <img name="image" style="width: 70px; height: 70px;" onclick="BrowseFile()" src="{{asset('public/admin_assets/images/upload.png')}}" alt="#" id="new_image">
            <?php }?>
                                    </td>

                                </tr>




                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>



            </div>


        </section>
    </section>
    <!--main content end-->
        <!-- page end-->
@endsection

@section('scripts')

<script type="text/javascript">


</script>
@endsection