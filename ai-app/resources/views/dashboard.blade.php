<x-layouts::app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>
        <div class="grid auto-rows-min gap-4 md:grid-cols-4">
            @foreach(['Finger Haus', 'ELK', 'Schworer', 'Haas', 'DFH', 'Model 6', 'Model 7', 'Model 8','New rule'] as $model)
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-4">
            <h3 class="font-semibold mb-3">{{ $model }}</h3>
            <div class="flex-items flex-col gap-2">
                <button class="px-3 py-1 text-sm bg-blue-500 text-white rounded hover:bg-blue-600">Try</button>
                <button class="px-3 py-1 text-sm bg-gray-500 text-white rounded hover:bg-gray-600">Edit</button>
                <button class="px-3 py-1 text-sm bg-green-500 text-white rounded hover:bg-green-600">Accept</button>
            </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layouts::app>
