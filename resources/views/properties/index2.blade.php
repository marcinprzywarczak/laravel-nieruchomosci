<x-app-layout>
    <x-slot name="styles">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/properties.css') }}">
    </x-slot>
    <x-slot name="scripts">
        

    </x-slot>
    <div class="container">
        <h1>{{ __('translations.properties.title') }}</h1>
        <div class="d-flex flex-row-reverse mb-4">

        </div>
        @foreach ($properties as $property )
        @if ($property->offer != null)
        <div class="row ">
        <div class="card mb-3 ">
            <div class="row g-0 ">
              <div class="col-md-4">
                <img src="{{url('/images/property/1min.png')}}" class="img-fluid rounded-start mx-auto d-block" alt="..." width="500" height="300" style="margin: auto auto;" >
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{ $property->offer->title }}</h5>
                  <p class="card-text">
                      
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>{{ __('translations.offers.attribute.price') }}</strong>: 
                            {{ number_format($property->offer->price,2, '.', ' ')}}</li>
                        <li class="list-group-item"><strong>{{ __('translations.properties.attribute.property_type') }}</strong>: 
                            {{ $property->property_type->name }}</li>
                        <li class="list-group-item"><strong>{{ __('translations.properties.attribute.address') }}</strong>:
                            {{ $property->address }}</li>
                        <li class="list-group-item"><strong>{{ __('translations.properties.attribute.area_square_meters') }}</strong>: 
                            {{ $property->area_square_meters }}</li>
                        <li class="list-group-item"><strong>{{ __('translations.properties.attribute.rooms') }}</strong>: 
                            {{ $property->rooms }}</li>
                        <li class="list-group-item"><strong>{{ __('translations.properties.attribute.floor') }}</strong>: 
                            {{ $property->floor }}</li>
                        <li class="list-group-item"><strong>{{ __('translations.offers.attribute.start_date') }}</strong>: 
                            {{ $property->offer->start_date }}</li>
                        <li class="list-group-item"><strong>{{ __('translations.offers.attribute.offer_status') }}</strong>: 
                            {{ $property->offer->offer_status->name }}</li>
                        <li class="list-group-item"><strong>{{ __('translations.properties.attribute.description') }}</strong>: 
                            {{ $property->description }}</li>

                      </ul>
                
                    </p>
                  
                </div>
              </div>
            </div>
          </div></div>
        @endif
        @endforeach
        <div class="d-flex justify-content-center">
                {{ $properties->links() }}
        </div> 
    </div>
</x-app-layout>