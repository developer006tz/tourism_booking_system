@php $editing = isset($accomodations) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="toursite_id" label="Toursite" required>
            @php $selected = old('toursite_id', ($editing ? $accomodations->toursite_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Toursite</option>
            @foreach($toursites as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $accomodations->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="type" label="Type">
            @php $selected = old('type', ($editing ? $accomodations->type : 'hotel')) @endphp
            <option value="hotel" {{ $selected == 'hotel' ? 'selected' : '' }} >Hotel</option>
            <option value="restaurant" {{ $selected == 'restaurant' ? 'selected' : '' }} >Restaurant</option>
            <option value="motel" {{ $selected == 'motel' ? 'selected' : '' }} >Motel</option>
            <option value="lodge" {{ $selected == 'lodge' ? 'selected' : '' }} >Lodge</option>
            <option value="resort" {{ $selected == 'resort' ? 'selected' : '' }} >Resort</option>
            <option value="other" {{ $selected == 'other' ? 'selected' : '' }} >Other</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="sleep_service" label="Sleep Service">
            @php $selected = old('sleep_service', ($editing ? $accomodations->sleep_service : 'yes')) @endphp
            <option value="yes" {{ $selected == 'yes' ? 'selected' : '' }} >Yes</option>
            <option value="no" {{ $selected == 'no' ? 'selected' : '' }} >No</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            >{{ old('description', ($editing ? $accomodations->description :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="local_night_fee"
            label="Local Night Fee"
            :value="old('local_night_fee', ($editing ? $accomodations->local_night_fee : ''))"
            max="255"
            step="0.01"
            placeholder="Local Night Fee"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="international_night_fee"
            label="International Night Fee"
            :value="old('international_night_fee', ($editing ? $accomodations->international_night_fee : ''))"
            max="255"
            step="0.01"
            placeholder="International Night Fee"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="food_service" label="Food Service">
            @php $selected = old('food_service', ($editing ? $accomodations->food_service : 'yes')) @endphp
            <option value="yes" {{ $selected == 'yes' ? 'selected' : '' }} >Yes</option>
            <option value="no" {{ $selected == 'no' ? 'selected' : '' }} >No</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="food_types_and_price"
            label="Food Types And Price"
            maxlength="255"
            >{{ old('food_types_and_price', ($editing ?
            $accomodations->food_types_and_price : '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="is_inside_park" label="Is Inside Park">
            @php $selected = old('is_inside_park', ($editing ? $accomodations->is_inside_park : 'yes')) @endphp
            <option value="yes" {{ $selected == 'yes' ? 'selected' : '' }} >Yes</option>
            <option value="no" {{ $selected == 'no' ? 'selected' : '' }} >No</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="distance_to_tour_site"
            label="Distance To Tour Site"
            :value="old('distance_to_tour_site', ($editing ? $accomodations->distance_to_tour_site : ''))"
            max="255"
            step="0.01"
            placeholder="Distance To Tour Site"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="room_available"
            label="Room Available"
            :value="old('room_available', ($editing ? $accomodations->room_available : ''))"
            max="255"
            placeholder="Room Available"
        ></x-inputs.number>
    </x-inputs.group>
</div>
