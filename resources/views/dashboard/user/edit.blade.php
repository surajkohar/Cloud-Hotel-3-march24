<x-app-layout>
    <x-splade-modal>
        <div class="flex justify-between">
            {{-- <h1 class="text-2xl font-semibold p-4">Edit Product</h1> --}}
            <span></span>
            <div class="p-4">
                <Link href="{{ route('users.index') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">Back</Link>
            </div>
            {{-- <div class="p-4">
                <Link href="{{ route('user.resetRoles',$user) }}" method="DELETE" confirm="Delete the Product"
                    confirm-text="You want to delete?" confirm-button="Yes" cancel-button="No"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">Reset Role</Link>
            </div> --}}
        </div>
        <x-splade-form :method="$details['method']" :action="$details['url']" class="space-y-4" :default="$user">
            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                {{ $details['title'] }}
            </h3>
            {{--
            <x-splade-input name="name" label="Role Name" placeholder="Role Name" required /> --}}
            <h1>Add roles to user</h1>
            <x-splade-input name="name" label="Name" placeholder="Name" required />
            <x-splade-input name="email" label="Email" placeholder="Email" required />
            <x-splade-select name="roles" :options="$roles" multiple relation choices />

            {{--
            <x-splade-select name="roles" :options="$roles" /> --}}

            <div class="flex justify-center">
                <x-splade-submit class="w-full" name="submit" :label="$details['title']" />
            </div>
        </x-splade-form>

    </x-splade-modal>
</x-app-layout>