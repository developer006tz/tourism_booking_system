@php $editing = isset($tourguideagent) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select  class="select2" name="toursite_id" label="Toursite">
            @php $selected = old('toursite_id', ($editing ? $tourguideagent->toursite_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Toursite</option>
            @foreach($toursites as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="title"
            label="Title"
            :value="old('title', ($editing ? $tourguideagent->title : ''))"
            maxlength="255"
            placeholder="Title"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            >{{ old('description', ($editing ? $tourguideagent->description :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="guide_price_per_day"
            label="Guide Price Per Day"
            :value="old('guide_price_per_day', ($editing ? $tourguideagent->guide_price_per_day : ''))"
            max="255"
            step="0.01"
            placeholder="Guide Price Per Day"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="rating"
            label="Rating"
            :value="old('rating', ($editing ? $tourguideagent->rating : ''))"
            max="255"
            step="0.01"
            placeholder="Rating"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="distance_covered"
            label="Distance Covered"
            :value="old('distance_covered', ($editing ? $tourguideagent->distance_covered : ''))"
            max="255"
            step="0.01"
            placeholder="Distance Covered"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select  class="select2" name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $tourguideagent->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
