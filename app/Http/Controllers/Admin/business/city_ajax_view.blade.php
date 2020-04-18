   <label class="control-label">Select City</label>
 <select class="form-control" name="city" class="validate[required]" placeholder="City">
                               <?php
if (!empty($city)) {
	foreach ($city as $ct_row) {?>


                            <option <?php if ($business->city == $ct_row->id) {?> selected <?php }?> value="<?=$ct_row->id?>"><?=$ct_row->name?></option>

<?php }
}

?>
                          </select>
