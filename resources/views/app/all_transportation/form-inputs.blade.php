@php $editing = isset($transportation) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="toursite_id" label="Toursite" required>
            @php $selected = old('toursite_id', ($editing ? $transportation->toursite_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Toursite</option>
            @foreach($toursites as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="type" label="Type">
            @php $selected = old('type', ($editing ? $transportation->type : 'flight')) @endphp
            <option value="flight" {{ $selected == 'flight' ? 'selected' : '' }} >Flight</option>
            <option value="bus" {{ $selected == 'bus' ? 'selected' : '' }} >Bus</option>
            <option value="train" {{ $selected == 'train' ? 'selected' : '' }} >Train</option>
            <option value="motorcycle" {{ $selected == 'motorcycle' ? 'selected' : '' }} >Motorcycle</option>
            <option value="boat" {{ $selected == 'boat' ? 'selected' : '' }} >Boat</option>
            <option value="ship" {{ $selected == 'ship' ? 'selected' : '' }} >Ship</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="price"
            label="Price"
            :value="old('price', ($editing ? $transportation->price : ''))"
            max="255"
            step="0.01"
            placeholder="Price"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="distance_covered_in_km"
            label="Distance Covered In Km"
            :value="old('distance_covered_in_km', ($editing ? $transportation->distance_covered_in_km : ''))"
            max="255"
            step="0.01"
            placeholder="Distance Covered In Km"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $transportation->image ? url(\Storage::url($transportation->image)) : '' }}')"
        >
            <x-inputs.partials.label
                name="image"
                label="Image"
            ></x-inputs.partials.label
            ><br />

            <!-- Show the image -->
            <template x-if="imageUrl">
                <img
                    :src="imageUrl"
                    class="object-cover rounded border border-gray-200"
                    style="width: 100px; height: 100px;"
                />
            </template>

            <!-- Show the gray box when image is not available -->
            <template x-if="!imageUrl">
                <div
                    class="border rounded border-gray-200 bg-gray-100"
                    style="width: 100px; height: 100px;"
                ></div>
            </template>

            <div class="mt-2">
                <input
                    type="file"
                    name="image"
                    id="image"
                    @change="fileChosen"
                />
            </div>

            @error('image') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>
</div>
