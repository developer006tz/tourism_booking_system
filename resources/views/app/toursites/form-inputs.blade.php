@php $editing = isset($toursite) @endphp

<div class="row">

    <x-inputs.group class="col-sm-12">
        <x-inputs.select  class="select2" name="country_id" label="Country" required>
            @php $selected = old('country_id', ($editing ? $toursite->country_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Country</option>
            @foreach($countries as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $toursite->name : ''))"
            maxlength="2555"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="other_name"
            label="Other Name"
            :value="old('other_name', ($editing ? $toursite->other_name : ''))"
            maxlength="255"
            placeholder="Other Name"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="5000"
            >{{ old('description', ($editing ? $toursite->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="accomodation"
            label="Accomodation"
            maxlength="10000"
            >{{ old('accomodation', ($editing ? $toursite->accomodation : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="region"
            label="Region"
            :value="old('region', ($editing ? $toursite->region : ''))"
            maxlength="500"
            placeholder="Region"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="district"
            label="District"
            :value="old('district', ($editing ? $toursite->district : ''))"
            maxlength="255"
            placeholder="District"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="distance"
            label="Distance"
            :value="old('distance', ($editing ? $toursite->distance : ''))"
            max="1000"
            step="0.01"
            placeholder="Distance"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="attractions"
            label="Attractions"
            maxlength="255"
            >{{ old('attractions', ($editing ? $toursite->attractions : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="local_price"
            label="Local Price"
            :value="old('local_price', ($editing ? $toursite->local_price : ''))"
            max="1000000000"
            step="0.01"
            placeholder="Local Price"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="international_price"
            label="International Price"
            :value="old('international_price', ($editing ? $toursite->international_price : ''))"
            max="1000000000"
            step="0.01"
            placeholder="International Price"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="time_of_visit"
            label="Time Of Visit"
            maxlength="100000"
            >{{ old('time_of_visit', ($editing ? $toursite->time_of_visit : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
