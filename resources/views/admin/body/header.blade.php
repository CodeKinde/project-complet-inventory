@php
    $user = DB::table('users')->where('id',Auth::user()->id)->first();
@endphp
<header id="page-topbar">
    <div class="navbar-header">
<div class="d-flex">
    <!-- LOGO -->
    <div class="navbar-brand-box">

        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="logo-sm-light" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="logo-light" height="20">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
        <i class="ri-menu-2-line align-middle"></i>
    </button>

    <!-- App Search-->
    <form class="app-search d-none d-lg-block">
        <div class="position-relative">
            <input type="text" class="form-control" placeholder="Search...">
            <span class="ri-search-line"></span>
        </div>
    </form>
</div>

<div class="d-flex">



<div class="dropdown d-none d-lg-inline-block ms-1">
    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
        <i class="ri-fullscreen-line"></i>
    </button>
</div>


<div class="dropdown d-inline-block user-dropdown">
    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="rounded-circle header-profile-user" src="{{(!empty($user->profile_photo)) ? url('upload/user_photo/'.$user->profile_photo) : url('upload/no_image.jpg')}}"
            alt="Header Avatar">
        <span class="d-none d-xl-inline-block ms-1">{{ $user->name }}</span>
        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-end">
        <!-- item-->
        <a class="dropdown-item" href="{{ route('profile.view') }}"><i class="ri-user-line align-middle me-1"></i> Profile</a>

        <a class="dropdown-item" href="{{ route('change.password') }}"><i class="ri-lock-unlock-line align-middle me-1"></i>Change Mot de passe</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Se Deconnecter</a>
    </div>
</div>

</div>
    </div>
</header>
