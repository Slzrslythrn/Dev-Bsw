<x-admin-layout>
    <div class="row">
        <div class="col-xl-6 col-xxl-12 col-lg-12 col-md-12">
            <div id="user-activity" class="card">
                <div class="card-header border-0 pb-0 d-sm-flex d-block">
                    <div>
                        <h4 class="card-title">Log Aktivitas</h4>
                    </div>
                    <div class="card-action">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#user" role="tab">
                                    Day
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#session" role="tab">
                                    Week
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#bounce" role="tab">
                                    Month
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#session-duration" role="tab">
                                    Year
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="user" role="tabpanel">
                            <canvas id="activity" class="chartjs"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-admin-layout>
