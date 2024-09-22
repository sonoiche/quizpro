<!-- Start::row-1 -->
<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="row">
            <div class="col-md-6 col-lg-3 col-xl-3">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body px-0 py-3">
                        <div class="mb-2 p-3 pb-0">
                            <div class="flex-fill fs-15">Enrolled Students</div>
                        </div>
                        <div class="d-flex align-items-center ps-3">
                            <div class="flex-fill">
                                <div class="fs-25 fw-normal mb-2">{{ $enrolledStudents }}</div>
                            </div>
                            <div id="sales-card" class="crm-card-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-xl-3">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body px-0 py-3">
                        <div class="mb-2 p-3 pb-0">
                            <div class="flex-fill fs-15">Active Classrooms</div>
                        </div>
                        <div class="d-flex align-items-center ps-3">
                            <div class="flex-fill">
                                <div class="fs-25 fw-normal mb-2">{{ $classroomCount }}</div>
                            </div>
                            <div id="revenue-card" class="crm-card-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-xl-3">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body px-0 py-3">
                        <div class="mb-2 p-3 pb-0">
                            <div class="flex-fill fs-15">Generated Exams</div>
                        </div>
                        <div class="d-flex align-items-center ps-3">
                            <div class="flex-fill">
                                <div class="fs-25 fw-normal mb-2">{{ $totalExams }}</div>
                            </div>
                            <div id="customers-card" class="crm-card-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-xl-3">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body px-0 py-3">
                        <div class="mb-2 p-3 pb-0">
                            <div class="flex-fill fs-15">Active Instructors</div>
                        </div>
                        <div class="d-flex align-items-center ps-3">
                            <div class="flex-fill">
                                <div class="fs-25 fw-normal mb-2">{{ $teacherCount }}</div>
                            </div>
                            <div id="orders-card" class="crm-card-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End::row-1 -->