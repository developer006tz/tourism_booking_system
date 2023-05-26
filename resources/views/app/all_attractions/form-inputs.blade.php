@php $editing = isset($attractions) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select  class="select2" name="toursite_id" label="Toursite" required>
            @php $selected = old('toursite_id', ($editing ? $attractions->toursite_id : '')) @endphp
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
            :value="old('name', ($editing ? $attractions->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            >{{ old('description', ($editing ? $attractions->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="distance"
            label="Distance"
            :value="old('distance', ($editing ? $attractions->distance : ''))"
            max="255"
            step="0.01"
            placeholder="Distance"
        ></x-inputs.number>
    </x-inputs.group>
</div>
