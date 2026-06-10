<x-app-layout>
    <x-container>
        <form action="{{ route('friends.store', $user) }}" class="px-4 my-8" method="POST">
            @csrf

            <x-submit-button>Add Friend</x-submit-button>
        </form>
        @foreach ($posts as $post)
            <x-card class="mb-4">
                {{ $post->body }}
                <div class="text-xs test-slate-500">
                    {{ $post->created_at->diffForHumans() }}
                </div>
            </x-card>
        @endforeach
    </x-container>
</x-app-layout>