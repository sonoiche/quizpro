<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="row">
            @foreach ($classrooms as $classroom)
            <div class="col-md-12 col-lg-4 col-xl-4">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body px-0 py-3">
                        <div class="mb-2 p-3 pb-0">
                            <div class="flex-fill fs-15">{{ $classroom->name }}</div>
                        </div>
                        <div class="d-flex align-items-center ps-3">
                            <div class="flex-fill">
                                <div class="fs-25 fw-normal mb-2">{{ $classroom->subject }}</div>
                                <p class="mb-0">
                                    <span class="text-primary fs-12">{{ $classroom->schedule }}</span>
                                </p>
                            </div>
                            <div id="sales-card" class="me-3">
                                <a href="{{ url('teacher/exams/create') }}" class="btn btn-primary" style="border-radius: 100%">
                                    <i class="ri-add-line fs-20"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>