<div class="col-12 col-xxl-6">
    <div class="mb-8">
        <h2 class="mb-2">Dashboard</h2>
        <h5 class="text-700 fw-semi-bold">Here's what's going on right now.....</h5>
    </div>
    <div class="row align-items-center g-4">
        <div class="col-12 col-md-auto">
            <div class="d-flex align-items-center"><img
                    src="{{ asset('assets/admin/src/img/icons/illustrations/4.png') }}" alt="" height="46" width="46">
                <div class="ms-3">
                    <h4 class="mb-0">57 new orders</h4>
                    <p class="text-800 fs--1 mb-0">Awating processing</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-auto">
            <div class="d-flex align-items-center"><img
                    src="{{ asset('assets/admin/src/img/icons/illustrations/2.png') }}" alt="" height="46" width="46">
                <div class="ms-3">
                    <h4 class="mb-0">5 orders</h4>
                    <p class="text-800 fs--1 mb-0">On hold</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-auto">
            <div class="d-flex align-items-center"><img
                    src="{{ asset('assets/admin/src/img/icons/illustrations/3.png') }}" alt="" height="46" width="46">
                <div class="ms-3">
                    <h4 class="mb-0">15 products</h4>
                    <p class="text-800 fs--1 mb-0">Out of stock</p>
                </div>
            </div>
        </div>
    </div>
    <hr class="bg-200 mb-6 mt-4">
    <div class="row flex-between-center mb-4 g-3">
        <div class="col-auto">
            <h3>Total sells</h3>
            <p class="text-700 lh-sm mb-0">Payment received across all channels</p>
        </div>
        <div class="col-8 col-sm-4"><select class="form-select form-select-sm mt-2" id="select-gross-revenue-month">
                <option>Mar 1 - 31, 2022</option>
                <option>April 1 - 30, 2022</option>
                <option>May 1 - 31, 2022</option>
            </select></div>
    </div>
    <div class="echart-total-sales-chart" style="min-height:320px;width:100%"></div>
</div>
