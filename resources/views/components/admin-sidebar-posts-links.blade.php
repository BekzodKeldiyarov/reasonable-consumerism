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
            {{--            <a class="collapse-item" href="{{route('goods.package.create')}}">Add New Package</a>--}}
            <a class="collapse-item" href="{{route('goods.index')}}">View all Plastic</a>
        </div>
    </div>
</li>
