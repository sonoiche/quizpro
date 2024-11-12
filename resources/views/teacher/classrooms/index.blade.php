@extends('layouts.app')
@section('content')
<div class="main-content app-content">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12 col-xl-12 col-xxl-12">
                <div class="card custom-card overflow-hidden">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Manage Classrooms</div>
                        <div class="dropdown">
                            <a href="{{ url('teacher/classrooms/create') }}" class="btn btn-outline-primary">Create Classroom</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="{{ $recordsTotal > 3 ? 'table-responsive' : '' }}">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="{{ url('vendor/datatables/buttons.server-side.js') }}"></script>
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
<script>
function deleteClassroom(id) {
    if(confirm('Are you sure you want to delete this?')) {
        $.ajax({
            type: "DELETE",
            url: "{{ url('teacher/classrooms') }}/" + id,
            dataType: "json",
            success: function (response) {
                location.reload();
            }
        });
    }
}
</script>
@endpush