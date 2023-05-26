<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						@auth
						<li class="{{ getActive('home') }}"> <a href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
						<li class="list-divider"></li>
						@can('view-any', App\Models\Toursite::class)
						<li class="submenu"> <a href="#"><i class="fa fa-map"></i> <span> Toursites </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class " style="display: none;">
								<li class="{{ activeMenu('toursites.index') }}" ><a href="{{ route('toursites.index') }}"> view </a></li>
								<li  class="{{ activeMenu('toursites.create') }}"><a href="{{ route('toursites.create') }}"> add </a></li>
								@can('view-any', App\Models\Toursiteimages::class)
								<li  class="{{ activeMenu('all-toursiteimages.create') }}"><a href="{{ route('all-toursiteimages.create') }}"> add photo </a></li>
								<li class="{{ activeMenu('all-toursiteimages.index') }}" ><a href="{{ route('all-toursiteimages.index') }}"> view photos</a></li>
							
						@endcan
							</ul>
						</li>
						@endcan

						 @can('view-any', App\Models\Attractions::class)
						<li class="submenu"> <a href="#" class="{{ getActive('all-attractions','subdrop') }}"><i class="fas fa-map-marked-alt"></i> <span> Attractions </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a class="{{ getActive('all-attractions.index') }}" href="{{ route('all-attractions.index') }}"> view </a></li>
								<li><a class="{{ getActive('all-attractions.create') }}" href="{{ route('all-attractions.index') }}"> add </a></li>
								@can('view-any', App\Models\Attractionimages::class)
								<li><a class="{{ getActive('all-attractionimages.create') }}" href="{{ route('all-attractionimages.create') }}"> add photo </a></li>
								<li><a class="{{ getActive('all-attractionimages.index') }}" href="{{ route('all-attractionimages.index') }}"> view photos</a></li>
							
						@endcan
							</ul>
						</li>
						@endcan
						 @can('view-any', App\Models\Booking::class)
						<li class="submenu"> <a href="#"><i class="far fa-address-book"></i><span> Bookings </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ route('bookings.index') }}"> view</a></li>
							</ul>
						</li>
						@endcan
						 @can('view-any', App\Models\Country::class)
						<li class="submenu"> <a href="#"><i class="fas fa-flag"></i> <span> Countries </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ route('countries.create') }}"> add </a></li>
								<li><a href="{{ route('countries.index') }}"> view</a></li>
							</ul>
						</li>
						@endcan
						@can('view-any', App\Models\Accomodations::class)
						<li class="submenu"> <a href="#"><i class="fas fa-hotel"></i> <span> Accomodations </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ route('all-accomodationimages.index') }}"> add </a></li>
								<li><a href="{{ route('all-accomodations.index') }}"> view</a></li>
								@can('view-any', App\Models\Accomodationimages::class)
								<li><a href="{{ route('all-accomodationimages.index') }}"> add image</a></li>
								<li><a href="{{ route('all-accomodations.index') }}"> view images</a></li>
								@endcan
							</ul>
						</li>
						@endcan
					
						@can('view-any', App\Models\Transportation::class)
						<li class="submenu"> <a href="#"><i class="fas fa-plane-departure"></i> <span> Transportations </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ route('all-transportation.create') }}"> add </a></li>
								<li><a href="{{ route('all-transportation.index') }}"> view</a></li>
							</ul>
						</li>
						@endcan
						@can('view-any', App\Models\Tourguide::class)
						<li class="submenu"> <a href="#"><i class="fas fa-user-tie"></i></i> <span> Tour Guides </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ route('tourguideagents.create') }}"> add </a></li>
								<li><a href="{{ route('tourguideagents.index') }}"> view</a></li>
							</ul>
						</li>
						@endcan
						@can('view-any', App\Models\User::class)
						<li class="submenu"> <a href="#"><i class="fas fa-user-edit fa-spin"></i> <span> Manage Users </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ route('users.create') }}"> add </a></li>
								<li><a href="{{ route('users.index') }}"> view</a></li>
							</ul>
						</li>
						@endcan
						@can('view-any', App\Models\Tourchallenges::class)
						<li class="submenu"> <a href="#"><i class="fas fa-paste"></i></i> <span> Tour challenges </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ route('all-tourchallenges.index') }}"> add </a></li>
								<li><a href="{{ route('all-tourchallenges.index') }}"> view</a></li>
							</ul>
						</li>
						@endcan
						@if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) || 
                    Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
						<li class="submenu"> <a href="#"><i class="fas fa-user-lock"></i> <span> Access Management </span> <span class="menu-arrow"></span></a>
							 @can('view-any', Spatie\Permission\Models\Role::class)
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ route('all-toursiteimages.index') }}"> Roles </a></li>
								@can('view-any', Spatie\Permission\Models\Permission::class)
								<li><a href="{{ route('all-toursiteimages.index') }}"> Permissions</a></li>
								@endcan
							</ul>
							@endcan
						</li>
						@endif
						<li class="my-4" style="height:10px;"></li>
						@endauth
					</ul>
				</div>
			</div>
		</div>