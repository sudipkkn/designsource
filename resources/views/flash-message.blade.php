@if ($message = Session::get('success'))
<div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="font-35 text-white"><i class="bx bxs-check-circle"></i>
        </div>
        <div class="ms-3">
            <h6 class="mb-0 text-white">Yeh!</h6>
            <div class="text-white">{{ $message }}</div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="font-35 text-white"><i class="bx bxs-message-square-x"></i>
        </div>
        <div class="ms-3">
            <h6 class="mb-0 text-white">Oops!</h6>
            <div class="text-white">{{ $message }}</div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="font-35 text-dark"><i class="bx bx-info-circle"></i>
        </div>
        <div class="ms-3">
            <h6 class="mb-0 text-dark">Warning Alerts</h6>
            <div class="text-dark">A simple Warning alert—check it out!</div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info border-0 bg-info alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="font-35 text-dark"><i class="bx bx-info-square"></i>
        </div>
        <div class="ms-3">
            <h6 class="mb-0 text-dark">Info</h6>
            <div class="text-dark">{{ $message }}</div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


@if ($errors->any())
<div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
    <div class="text-white">@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif