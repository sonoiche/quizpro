<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="row">
            <div class="col-md-12 col-lg-4 col-xl-4">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body px-0 py-3">
                        <div class="mb-2 p-3 pb-0">
                            <div class="flex-fill fs-15">Available Exam</div>
                        </div>
                        <div class="d-flex align-items-center ps-3">
                            <div class="flex-fill">
                                <div class="fs-25 fw-normal mb-2">{{ $availableExam }}</div>
                                <p class="mb-0">
                                    <i class="ri-arrow-up-line text-primary fs-15 align-middle"></i>
                                    <span class="text-primary fs-12">&nbsp;</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-4">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body px-0 py-3">
                        <div class="mb-2 p-3 pb-0">
                            <div class="flex-fill fs-15">Exam Taken</div>
                        </div>
                        <div class="d-flex align-items-center ps-3">
                            <div class="flex-fill">
                                <div class="fs-25 fw-normal mb-2">{{ count($takenExam) }}</div>
                                <p class="mb-0">
                                    <i class="ri-arrow-up-line text-primary fs-15 align-middle"></i>
                                    <span class="text-primary fs-12">&nbsp;</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-4">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body px-0 py-3">
                        <div class="mb-2 p-3 pb-0">
                            <div class="flex-fill fs-15">Passed Exam</div>
                        </div>
                        <div class="d-flex align-items-center ps-3">
                            <div class="flex-fill">
                                <div class="fs-25 fw-normal mb-2">{{ $passExam }}</div>
                                <p class="mb-0">
                                    <i class="ri-arrow-up-line text-primary fs-15 align-middle"></i>
                                    <span class="text-primary fs-12">&nbsp;</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>