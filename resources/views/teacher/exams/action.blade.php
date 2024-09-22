<div class="btn-group">
    <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Action
    </button>
    <ul class="dropdown-menu" style="">
        <li><a class="dropdown-item" href="{{ url('teacher/exams', $id) }}/edit">Edit</a></li>
        <li><a class="dropdown-item" href="javascript:void(0);" onclick="deleteExam({{ $id }})">Delete</a></li>
    </ul>
</div>