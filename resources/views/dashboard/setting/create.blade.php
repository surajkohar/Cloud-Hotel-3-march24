<x-app-layout>
    <x-splade-modal>
        <div class="flex justify-between">
            {{-- <h1 class="text-2xl font-semibold p-4">Edit Product</h1> --}}
            <span></span>
            <div class="p-4">
                <Link href="{{ route('dashboard.setting') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">Back</Link>
            </div>
        </div>
        <x-splade-form :method="$details['method']" :action="$details['url']" class="space-y-4"
            :default="$defaults ?? []">
            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                {{ $details['title'] }}
            </h3>
            <x-splade-input name="setting_name" label="Setting Name" placeholder="Setting Name" required />
            <x-splade-input name="setting_value" label="Setting Value" placeholder="Setting Value" required />
          

            {{--
            <x-splade-textarea name="description" label="Description" placeholder="Category Description" required />
            --}}

            {{--
            <x-splade-file name="avatar" label="Image" /> --}}

            {{--
            <x-splade-file name="image" label="Image" :show-filename="true" /> --}}

            {{-- <img v-if="form.image" :src="form.$fileAsUrl('image')" /> --}}

            <div class="flex justify-center">
                <x-splade-submit class="w-full" name="submit" :label="$details['title']" />
            </div>
        </x-splade-form>

    </x-splade-modal>
</x-app-layout>