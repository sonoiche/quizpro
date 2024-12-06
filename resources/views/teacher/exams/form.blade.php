<div class="col-md-12 col-sm-12 mb-3">
    <div class="form-group">
        <label for="name" class="form-label">Title</label>
        <input type="text" name="name" id="name" class="form-control rounded-1" value="{{ $exam->name ?? old('name') }}" />
    </div>
</div>
<div class="col-md-6 col-sm-12 mb-3">
    <div class="form-group">
        <label for="classroom_ids" class="form-label">Sections</label>
        <select class="form-select py-2" name="classroom_id" id="classroom_id">
            @foreach ($classrooms as $classroom)
            <option value="{{ $classroom->id }}" {{ (isset($exam->classroom_id) && $classroom->id == $exam->classroom_id) ? 'selected' : '' }}>{{ $classroom->section }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-md-6 col-sm-12 mb-3">
    <div class="form-group">
        <label for="test_type" class="form-label">Type of Test</label>
        <select class="form-select py-2" name="test_type" id="test_type">
            <option value="1" {{ (isset($exam->test_type) && 1 == $exam->test_type) ? 'selected' : '' }}>Multiple Choice</option>
            <option value="2" {{ (isset($exam->test_type) && 2 == $exam->test_type) ? 'selected' : '' }}>True or False</option>
            <option value="3" {{ (isset($exam->test_type) && 3 == $exam->test_type) ? 'selected' : '' }}>Identification</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-sm-12 mb-3">
        <div class="form-group">
            <label for="items" class="form-label">Number of Items</label>
            <input type="number" name="items" id="items" class="form-control rounded-1" value="{{ $exam->items ?? old('items') }}" />
        </div>
    </div>
    <div class="col-md-8 col-sm-12 mb-4">
        <div class="form-group">
            <label for="document_file" class="form-label">Upload Document</label>
            <input type="file" name="document_file" id="document_file" class="form-control rounded-1" value="{{ old('document_file') }}" />
        </div>
    </div>
</div>
<div class="col-md-4 col-sm-12 mb-3">
    <div class="form-group">
        <label for="passing_grade" class="form-label">Passing Grade</label>
        <input type="number" name="passing_grade" id="passing_grade" class="form-control rounded-1" value="{{ $exam->passing_grade ?? old('passing_grade') }}" />
    </div>
</div>
<div class="col-md-8 col-sm-12 mb-3">
    <div class="d-flex align-items-center" style="height: 100px">
        <div class="form-check">
            <input class="form-check-input" name="display_student_score" type="checkbox" value="1" id="display_student_score" {{ ($exam->display_student_score) ? 'checked' : '' }} />
            <label class="form-check-label" for="display_student_score">
                Display student score once student is done taking the exam?
            </label>
        </div>
    </div>
</div>
<div class="col-md-6 col-sm-12 mb-3">
    <div class="form-group">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-select">
            <option value="Published" {{ (isset($exam->status) && $exam->status == 'Published') ? 'selected' : '' }}>Published</option>
            <option value="Draft" {{ (isset($exam->status) && $exam->status == 'Draft') ? 'selected' : '' }}>Draft</option>
        </select>
    </div>
</div>
<div class="col-md-6 col-sm-12 mb-4">
    <div class="form-group">
        <label for="published_at" class="form-label">Date to Publish</label>
        <input type="datetime-local" name="published_at" id="published_at" class="form-control rounded-1" value="{{ $exam->published_at ?? old('published_at') }}" min="{{ date('Y-m-d H:i:s') }}" />
    </div>
</div>
@if(isset($exam->content))
<div class="col-md-12 col-sm-12 mb-3">
    <div class="form-group">
        <label for="content" class="form-label">Exam Content (Please check if the contents are correct in every words)</label>
        <div id="editor" style="height: 300px; overflow: auto">{!! nl2br($exam->content ?? '') !!}</div>
    </div>
</div>
@endif