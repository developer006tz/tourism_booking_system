@php $editing = isset($booking) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $booking->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="toursite_id" label="Toursite" required>
            @php $selected = old('toursite_id', ($editing ? $booking->toursite_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Toursite</option>
            @foreach($toursites as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="transportation_id" label="Transportation">
            @php $selected = old('transportation_id', ($editing ? $booking->transportation_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Transportation</option>
            @foreach($allTransportation as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="accomodations_id" label="Accomodations">
            @php $selected = old('accomodations_id', ($editing ? $booking->accomodations_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Accomodations</option>
            @foreach($allAccomodations as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
