@extends('layouts.app')
@section('content')
<div class="main-content app-content">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-6 col-xl-6 col-xxl-6">
                <div class="card custom-card overflow-hidden">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Update Assessment Test</div>
                    </div>
                    <div class="card-body p-3">
                        <form action="{{ url('teacher/exams', $exam->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                @include('teacher.exams.form')
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ url('teacher/exams') }}" class="btn btn-outline-danger me-2">Back</a>
                                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                                            @if (count($questions) == 0)
                                            <input type="submit" name="generate" value="Save and Generate Questions" class="btn btn-primary" />
                                            @else
                                            <input type="submit" name="clean" value="Regenerate New Questions" class="btn btn-primary" />
                                            @endif
                                            <input type="hidden" name="content" id="content" value="{{ $exam->content }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if (count($questions))
            <div class="col-md-6 col-xl-6 col-xxl-6">
                <div class="card custom-card overflow-hidden">
                    <div class="card-header justify-content-between">
                        <div class="card-title">{{ $exam->items }} auto generated questions</div>
                    </div>
                    <div class="card-body p-3" style="height: 700px; overflow: auto">
                        @foreach ($questions as $question)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="py-2">
                                    <h6>{{ $question->question }}</h6>
                                </div>
                                <div class="py-2 ml-5">
                                    @php
                                        $options = explode(',', $question->options);
                                        $results = [];
                                    @endphp
                                    @foreach ($options as $option)
                                        @if (preg_match('/([a-d])\) (.+)/', $option, $matches))
                                            <?php $results[$matches[1]] = $matches[2]; ?>
                                        @endif
                                    @endforeach

                                    @foreach ($results as $key => $result)
                                        {!! $key . ') ' . $result . '<br>' !!}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>        
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{ url('assets/libs/choices.js/public/assets/styles/choices.min.css') }}">
<link rel="stylesheet" href="{{ url('assets/libs/quill/quill.snow.css') }}">
<link rel="stylesheet" href="{{ url('assets/libs/quill/quill.bubble.css') }}">
@endsection

@push('scripts')
{!! JsValidator::formRequest('App\Http\Requests\Teacher\ExamRequest') !!}
<script src="{{ url('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
<script src="{{ url('assets/libs/quill/quill.min.js') }}"></script>
<script>
const element = document.querySelector('#choices-multiple-remove-button');
const choices = new Choices(element, {
    searchEnabled: true,
    inputType: 'select-multiple',
    removeItemButton: true
});

var toolbarOptions = [
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
    [{ 'font': [] }],
    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
    ['blockquote', 'code-block'],

    [{ 'header': 1 }, { 'header': 2 }],               // custom button values
    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
    [{ 'script': 'sub' }, { 'script': 'super' }],      // superscript/subscript
    [{ 'indent': '-1' }, { 'indent': '+1' }],          // outdent/indent
    [{ 'direction': 'rtl' }],                         // text direction

    [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown

    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
    [{ 'align': [] }],

    ['image', 'video'],
    ['clean']                                         // remove formatting button
];

const editorDiv = document.getElementById('editor');
var quill = new Quill(editorDiv, {
    modules: {
        toolbar: toolbarOptions
    },
    theme: 'snow'
});

editorDiv.addEventListener('focusout', function() {
    const content = document.getElementById('content');
    content.value = editorDiv.innerHTML;
});
</script>
@endpush