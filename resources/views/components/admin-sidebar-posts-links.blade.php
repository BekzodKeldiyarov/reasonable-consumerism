<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
       aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Plastic</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Plastic</h6>
            <a class="collapse-item" href="{{route('goods.bottle.create')}}">Add New Bottle</a>
            <a class="collapse-item" href="{{route('goods.bottle.index')}}">View All Bottles</a>
            <a class="collapse-item" href="{{route('packages.create')}}">Add Package</a>
            <a class="collapse-item" href="{{route('packages.index')}}">View All Package</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
       aria-expanded="true" aria-controls="collapseThree">
        <i class="fas fa-fw fa-cog"></i>
        <span>Meat</span>
    </a>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Meat</h6>
            <a class="collapse-item" href="{{route('meats.index')}}">View all Meats</a>
            <a class="collapse-item" href="{{route('meats.create')}}">Add Meat</a>
            {{--            <a class="collapse-item" href="{{route('goods.bottle.index')}}">View All Bottles</a>--}}
            {{--            <a class="collapse-item" href="{{route('packages.create')}}">Add Package</a>--}}
            {{--            <a class="collapse-item" href="{{route('packages.index')}}">View All Package</a>--}}
            {{--            <a class="collapse-item" href="{{route('goods.package.create')}}">Add New Package</a>--}}
            {{--            <a class="collapse-item" href="{{route('goods.index')}}">View all Plastic</a>--}}
        </div>
    </div>
</li>


<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransport"
       aria-expanded="true" aria-controls="collapseTransport">
        <i class="fas fa-fw fa-cog"></i>
        <span>Transport</span>
    </a>
    <div id="collapseTransport" class="collapse" aria-labelledby="headingTransport" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Transport</h6>
            <a class="collapse-item" href="{{route('transports.private.create')}}">Add Private Transport</a>
            <a class="collapse-item" href="{{route('transports.private.index')}}">View All Private Transports</a>

            <a class="collapse-item" href="{{route('transports.public.create')}}">Add Public Transport</a>
            <a class="collapse-item" href="{{route('transports.public.index')}}">View All Public Transports</a>
        </div>
    </div>
</li>
