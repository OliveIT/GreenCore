<div class="sidebar-sticky">
    <ul class="nav flex-column">
    @if (auth()->user()->user_role == "Admin")
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/user/view') }}">User Management</span></a>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('/home') }}">Dashboard</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/bill') }}">Billing</span></a>
            <a class="nav-link ml-3" href="{{ url('/payment') }}">Payment History</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/usage') }}">Usage History</span></a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="{{ url('/referrals') }}">Referrals</span></a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/profile') }}">Profile</span></a>
        </li>
    @endif
    </ul>
</div>
