{{--@dd("hello")--}}

<x-app-layout>
    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold p-4">Roles</h1>
        <div class="p-4">
            {{-- @role('admin') --}}
            {{-- @can('add role') --}}
            <Link href="{{ route('roles.create') }}"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">New Role</Link>

            {{-- @endrole --}}
        </div>
    </div>
    <x-splade-table :for="$roles">
        <x-slot:empty-state>
            <p>Whoops! No Roles Found</p>
        </x-slot:empty-state>
        {{-- @cell('image',$products)
        <div class="space-x-2 border-2 w-36 ">
            <img src="{{ asset('storage/'.$products->media->file_path) }}" class="w-full object-cover">
        </div>
        @endcell --}}
         @cell('action', $roles)
        <div class="space-x-2">
{{--            @can('edit role')--}}
            <Link href="{{ route('roles.edit', $roles) }}" class="text-green-400 hover:text-green-700 font-semibold">
            Edit
            </Link>
{{--            @endcan--}}
{{--            @can('edit role')--}}
            <Link href="{{ route('roles.destroy', $roles) }}" method="DELETE" confirm="Delete the Product"
                confirm-text="You want to delete?" confirm-button="Yes" cancel-button="No"
                class="text-red-400 hover:text-red-700 font-semibold ">
            Delete
            </Link>
{{--            @endcan--}}
        </div>
         @endcell
    </x-splade-table>

</x-app-layout>
