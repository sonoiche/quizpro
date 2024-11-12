<div class="col-md-12 col-sm-12 mb-3">
    <div class="form-group">
        <label for="name" class="form-label">Class Name</label>
        <input type="text" name="name" id="name" class="form-control rounded-1" value="{{ $classroom->name ?? '' }}" />
    </div>
</div>
<div class="col-md-12 col-sm-12 mb-3">
    <div class="form-group">
        <label for="section" class="form-label">Section / Block</label>
        <select name="section" id="section" class="form-select">
            <option value="">Select Section</option>
            @foreach ($sections as $section)
            <option value="{{ $section->name }}" {{ (isset($classroom->section) && $classroom->section == $section->name) ? 'selected' : '' }}>{{ $section->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-md-6 col-sm-12 mb-3">
    <div class="form-group">
        <label for="subject" class="form-label">Subject</label>
        <input type="text" name="subject" id="subject" class="form-control rounded-1" value="{{ $classroom->subject ?? '' }}" />
    </div>
</div>
<div class="col-md-6 col-sm-12 mb-3">
    <div class="form-group">
        <label for="subject_code" class="form-label">Subject Code</label>
        <input type="text" name="subject_code" id="subject_code" class="form-control rounded-1" value="{{ $classroom->subject_code ?? '' }}" />
    </div>
</div>
<div class="col-md-6 col-sm-12 mb-3">
    <div class="form-group">
        <label for="schedule" class="form-label">Schedule</label>
        <input type="text" name="schedule" id="schedule" class="form-control rounded-1" value="{{ $classroom->schedule ?? '' }}" />
    </div>
</div>
<div class="col-md-6 col-sm-12 mb-3">
    <div class="form-group">
        <label for="schedule_time" class="form-label">Schedule Time</label>
        <input type="time" name="schedule_time" id="schedule_time" class="form-control rounded-1" value="{{ $classroom->schedule_time ?? '' }}" />
    </div>
</div>