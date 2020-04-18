<option value="">{{Lang::get('label.Please Select')}}</option>
@foreach($sub_categories as $row)
    <option value="{{$row->id}}">{{$row->name}}</option>
@endforeach
