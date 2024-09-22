<div class="col-md-6 col-sm-12 mb-3">
    <div class="form-group">
        <label for="fname" class="form-label">First Name</label>
        <input type="text" name="fname" id="fname" class="form-control rounded-1" value="{{ $user->fname ?? '' }}" />
    </div>
</div>
<div class="col-md-6 col-sm-12">
    <div class="form-group">
        <label for="lname" class="form-label">Last Name</label>
        <input type="text" name="lname" id="lname" class="form-control rounded-1" value="{{ $user->lname ?? '' }}" />
    </div>
</div>
<div class="col-md-12 col-sm-12 mb-3">
    <div class="form-group">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" name="email" id="email" class="form-control rounded-1" value="{{ $user->email ?? '' }}" />
    </div>
</div>
<div class="col-md-6 col-sm-12 mb-3">
    <div class="form-group">
        <label for="contact_number" class="form-label">Contact Number</label>
        <input type="text" name="contact_number" id="contact_number" class="form-control rounded-1" value="{{ $user->contact_number ?? '' }}" />
    </div>
</div>
<div class="col-md-6 col-sm-12 mb-3">
    <div class="form-group">
        <label for="role" class="form-label">Role</label>
        <select name="role" id="role" class="form-select rounded-1 py-2">
            <option value="">Select Role</option>
            <option value="Admin" {{ (isset($user->role) && $user->role == 'Admin') ? 'selected' : '' }}>Admin</option>
            <option value="Teacher" {{ (isset($user->role) && $user->role == 'Teacher') ? 'selected' : '' }}>Teacher</option>
        </select>
    </div>
</div>