<div class="col-md-6 col-sm-12 mb-3">
    <div class="form-group">
        <label for="fname" class="form-label">First Name</label>
        <input type="text" id="fname" class="form-control rounded-1" value="{{ $student->fname ?? '' }}" readonly />
    </div>
</div>
<div class="col-md-6 col-sm-12 mb-3">
    <div class="form-group">
        <label for="lname" class="form-label">Last Name</label>
        <input type="text" id="lname" class="form-control rounded-1" value="{{ $student->lname ?? '' }}" readonly />
    </div>
</div>
<div class="col-md-12 col-sm-12 mb-3">
    <div class="form-group">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" id="email" class="form-control rounded-1" value="{{ $student->email ?? '' }}" readonly />
    </div>
</div>
<div class="col-md-6 col-sm-12 mb-3">
    <div class="form-group">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control rounded-1" />
    </div>
</div>
<div class="col-md-6 col-sm-12 mb-3">
    <div class="form-group">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control rounded-1" />
    </div>
</div>
<div class="col-md-12 col-sm-12 mb-3">
    <div class="form-group">
        <label for="contact_number" class="form-label">Contact Number</label>
        <input type="text" name="contact_number" id="contact_number" class="form-control rounded-1" value="{{ $student->contact_number ?? '' }}" />
    </div>
</div>
<div class="col-md-6 col-sm-12 mb-3">
    <div class="form-group">
        <label for="year_level" class="form-label">Year Level</label>
        <select name="year_level" id="year_level" class="form-select" style="padding: 8px 10px">
            <option value="">Select Level</option>
            @foreach (config('app.college_years') as $level)
            <option value="{{ $level }}" {{ (isset($student->college_year) && $student->college_year == $level) ? 'selected' : '' }}>{{ $level }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-md-6 col-sm-12 mb-3">
    <div class="form-group">
        <label for="section" class="form-label">Section / Block</label>
        <select name="section" id="section" class="form-select" style="padding: 8px 10px">
            <option value="">Select Section</option>
            @foreach ($sections as $section)
            <option value="{{ $section->name }}" {{ (isset($student->section) && $student->section == $section->name) ? 'selected' : '' }}>{{ $section->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-md-12 col-sm-12 mb-4">
    <div class="form-group">
        <label for="student_number" class="form-label">Student Number</label>
        <input type="text" name="student_number" id="student_number" class="form-control rounded-1" value="{{ $student->student_number ?? '' }}" {{ isset($student->student_number) ? 'readonly' : '' }} />
    </div>
</div>