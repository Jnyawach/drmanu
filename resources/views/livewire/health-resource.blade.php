<div>
    <section>
        <div class="filter">

            <form>
                <div class="form-group row p-5">

                    <div class="col-12 col-md-3 p-2">
                        <select class="form-select w-100 m-0 " wire:model="category">
                            <option selected value="">All Categories</option>
                            @foreach($categories as $identity=>$category)
                            <option value="{{$identity}}">{{$category}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-12 col-md-7 p-2">
                        <input type="search" class="form-control w-100 m-0" placeholder="Search Keyword or title"
                        wire:model.debounce.350ms="search">

                    </div>
                    <div class="col-12 col-md-2 p-2">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class="resources m-5">
        @if($resources->count()>0)
        <div class="row resources-row">
            @foreach($resources as $resource)
                <div class="col-10 col-sm-6 col-md-2 p-1">

                    <a href="{{route('health-resources.show',$resource->slug)}}" title="{{$resource->name}}">
                        <img src="{{asset($resource->getFirstMediaUrl('cover')? $resource->getFirstMediaUrl('cover'):'/images/no-image.png' )}}" class="img-fluid rounded" alt="{{$resource->name}}"
                             title="{{$resource->name}}">
                    </a>


                </div>
            @endforeach
        </div>
        @else
            <h2>Sorry! We didn't find what you are looking for
            </h2>
        @endif
        <div class="text-center mt-3">
            {{$resources->links('vendor.pagination.custom')}}
        </div>
    </section>
</div>
