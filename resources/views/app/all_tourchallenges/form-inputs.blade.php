@php $editing = isset($tourchallenges) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select  class="select2" name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $tourchallenges->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="title"
            label="Title"
            :value="old('title', ($editing ? $tourchallenges->title : ''))"
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
            required
            >{{ old('description', ($editing ? $tourchallenges->description :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $tourchallenges->image ? url(\Storage::url($tourchallenges->image)) : '' }}')"
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
</div>
