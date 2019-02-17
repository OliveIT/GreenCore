<?php $url = Route::current()->uri; ?>
<div class="bg-light border-right sidebar" id="sidebar-wrapper">
    <button class="btn-sidebar-toggle toggled" id="menu-toggle"></button>
    <div class="list-group list-group-flush">
        <ul class="nav flex-column">
        @if (auth()->user()->user_role == "Admin")
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/user/view') }}">User Management</span></a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link <?=$url == 'home' ? 'active' : ""?>" href="{{ url('/home') }}">
                    <i class="fas fa-tachometer-alt"> </i> Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=$url == 'bill' ? 'active' : ""?>" href="{{ url('/bill') }}">
                    <i class="fas fa-money-bill"> </i> Billing</span></a>
                <a class="nav-link ml-3 <?=$url == 'payment' ? 'active' : ""?>" href="{{ url('/payment') }}">
                    <i class="fas fa-credit-card"> </i> Payment History</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=$url == 'usage' ? 'active' : ""?>" href="{{ url('/usage') }}">
                    <i class="fas fa-history"> </i> Usage History</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/referral') }}">
                    <i class="fas fa-hands"> </i> Referrals</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=$url == 'profile' ? 'active' : ""?>" href="{{ url('/profile') }}">
                    <i class="fas fa-user-alt"> </i> Profile</span></a>
            </li>
        @endif
        </ul>
    </div>
</div>
