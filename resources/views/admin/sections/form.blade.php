<div class="col-md-12 col-sm-12 mb-3">
    <div class="form-group">
        <label for="name" class="form-label">Section Name</label>
        <input type="text" name="name" id="name" class="form-control rounded-1" value="{{ $section->name ?? '' }}" />
    </div>
</div>
<div class="col-md-6 col-sm-12 mb-3">
    <div class="form-group">
        <label for="college_year" class="form-label">College Year</label>
        <select name="college_year" id="college_year" class="form-select">
            <option value="">Select College Year</option>
            @foreach (config('app.college_years') as $college_year)
            <option value="{{ $college_year }}" {{ (isset($section->college_year) && $section->college_year == $college_year) ? 'selected' : '' }}>{{ $college_year }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-md-6 col-sm-12 mb-3">
    <div class="form-group">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-select">
            <option value="">Select Status</option>
            <option value="Enable" {{ (isset($section->status) && $section->status == 'Enable') ? 'selected' : '' }}>Enable</option>
            <option value="Disable" {{ (isset($section->status) && $section->status == 'Disable') ? 'selected' : '' }}>Disable</option>
        </select>
    </div>
</div>