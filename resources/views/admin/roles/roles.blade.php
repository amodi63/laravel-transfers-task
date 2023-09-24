
<input type="hidden" name="user_id" id="user_id" value="{{$user_id}}">
@foreach ($roles as $index => $role)
  <div class="form-group" style="margin-bottom: 2px;">
    <div class="checkbox-inline">
      <label class="checkbox checkbox-primary">
        <input name="role[]" value="{{$role->id}}" type="checkbox"
               @if($role->checked  == true )checked="checked" @endif >
        {{$role->name}}
        <span></span>
      </label>
    </div>
  </div>
@endforeach