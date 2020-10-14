
<div class="form-group">
    <h5>Permissions</h5>
    <fieldset>
        <legend>
            <label class="kt-checkbox">
                <input type="checkbox" class="checkAll" @if(isset($item) && $item->hasAllDirectPermissions(['add_roles'])) checked @endif>
                <span class="first"></span>
            </label>
        </legend>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" value="add_roles" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('add_roles')) checked @endif>  Add/ Edit
                    <span></span>
                </label>
            </div>

        </div>
    </fieldset>
</div>

<div class="form-group">
    <h5>Admin</h5>
    <fieldset>
        <legend>
            <label class="kt-checkbox">
                <input type="checkbox" class="checkAll" @if(isset($item) && $item->hasAllDirectPermissions(['show_admins' , 'add_admins'])) checked @endif>
                <span class="first"></span>
            </label>
        </legend>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" value="show_admins" type="checkbox" @if(isset($item) && $item->hasPermissionTo('show_admins')) checked @endif> Show
                    <span></span>
                </label>
            </div>
            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" value="add_admins" type="checkbox" @if(isset($item) && $item->hasPermissionTo('add_admins')) checked @endif>  Add/ Edit
                    <span></span>
                </label>
            </div>

        </div>
    </fieldset>
</div>

<div class="form-group">
    <h5>Items</h5>
    <fieldset>
        <legend>
            <label class="kt-checkbox">
                <input type="checkbox" class="checkAll" @if(isset($item) && $item->hasAllDirectPermissions(['show_items' , 'add_items'])) checked @endif>
                <span class="first"></span>
            </label>
        </legend>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" value="show_items" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('show_items')) checked @endif>  Show
                    <span></span>
                </label>
            </div>

            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" value="add_items" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('add_items')) checked @endif>  Add/ Edit
                    <span></span>
                </label>
            </div>

        </div>
    </fieldset>
</div>

