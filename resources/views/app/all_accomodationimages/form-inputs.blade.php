@php $editing = isset($accomodationimages) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select  class="select2" name="accomodations_id" label="Accomodations" required>
            @php $selected = old('accomodations_id', ($editing ? $accomodationimages->accomodations_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Accomodations</option>
            @foreach($allAccomodations as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select  class="select2" name="type"  label="Type">
            @php $selected = old('type', ($editing ? $accomodationimages->type : 'surroundings')) @endphp
            <option value="food" {{ $selected == 'food' ? 'selected' : '' }} >Food</option>
            <option value="room" {{ $selected == 'room' ? 'selected' : '' }} >Room</option>
            <option value="bed" {{ $selected == 'bed' ? 'selected' : '' }} >Bed</option>
            <option value="surroundings" {{ $selected == 'surroundings' ? 'selected' : '' }} >Surroundings</option>
            <option value="other" {{ $selected == 'other' ? 'selected' : '' }} >Other</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $accomodationimages->image ? url(\Storage::url($accomodationimages->image)) : '' }}')"
        >
           <x-inputs.partials.label
            name="image"
            label="Image"
        ></x-inputs.partials.label
        ><br />

        <!-- Show the images -->
        <template x-if="Object.keys(imageUrls).length > 0">
            <div class="flex flex-wrap">
                <template x-for="(url, index) in imageUrls" :key="index">
                    <img
                        :src="url"
                        class="object-cover rounded border border-gray-200 mr-2 mb-2"
                        style="width: 100px; height: 100px;"
                    />
                </template>
            </div>
        </template>

        <!-- Show the gray box when image is not available -->
        <template x-if="Object.keys(imageUrls).length === 0">
            <div
                class="border rounded border-gray-200 bg-gray-100"
                style="width: 100px; height: 100px;"
            ></div>
        </template>

        <div class="mt-2">
            <input
                type="file"
                name="image[]"
                id="image"
                @change="filesChosen"
                multiple
            />
        </div>

        @error('image') @include('components.inputs.partials.error')
        @enderror
    </div>
</x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            >{{ old('description', ($editing ? $accomodationimages->description
            : '')) }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
