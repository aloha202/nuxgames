<x-app-layout>
    <div class="page">
        @if (session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('failed'))
            <div class="bg-red-500 text-white p-3 rounded mb-4">
                {{ session('failed') }}
            </div>
        @endif
        <div class="block">
        <form method="post" action="{{ route('deactivate') }}">
            @csrf
            <button type="submit"
                    class="button w-full border border-gray-500 text-black py-2 rounded-md hover:bg-blue-600 transition">
                Deactivate
            </button>
        </form>
        </div>

        <div class="block">
        <form method="post" action="{{ route('refresh') }}">
            @csrf
            <button type="submit"
                    class="button w-full border border-gray-500 text-black py-2 rounded-md hover:bg-blue-600 transition">
                Refresh
            </button>
        </form>
        </div>

        <div class="block">
            <form method="post" action="{{ route('lucky') }}">
                @csrf
                <button type="submit"
                        class="button w-full border border-gray-500 text-black py-2 rounded-md hover:bg-blue-600 transition">
                    I'm feeling lucky
                </button>
            </form>
        </div>
        <div>
            <a  href="{{ route('history') }}">
            <button class="button w-full border border-gray-500 text-black py-2 rounded-md hover:bg-blue-600 transition">
            History
                </button>
            </a>
        </div>
    </div>
</x-app-layout>
