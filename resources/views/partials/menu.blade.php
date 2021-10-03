<div class="mt-4 card">
    <div class="card-body">
        <div class="nav flex-column nav-pills">
            <a href="#" class="nav-link">Overview</a>
            <a href="#" class="nav-link">Reports</a>
            <a href="{{ route('customers') }}" class="nav-link {{ Request::url() == route('customers') ? "active" : "" }}">Customers</a>
            <a href="#" class="nav-link">Billing</a>
            <a href="{{ route('package') }}" class="nav-link {{ Request::url() == route('package') ? "active" : "" }}">Packages</a>
        </div>
    </div>
</div>
