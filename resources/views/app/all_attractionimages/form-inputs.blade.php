@php $editing = isset($attractionimages) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select  class="select2" name="attractions_id" label="Attractions" required>
            @php $selected = old('attractions_id', ($editing ? $attractionimages->attractions_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Attractions</option>
            @foreach($allAttractions as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $attractionimages->image ? url(\Storage::url($attractionimages->image)) : '' }}')"
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
            >{{ old('description', ($editing ? $attractionimages->description :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
