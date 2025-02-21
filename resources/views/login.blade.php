
<x-app-layout>

            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Username Field -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}"
                           class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300 @error('username') border-red-500 @enderror">
                    @error('username')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone Field -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                           class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300 @error('phone') border-red-500 @enderror">
                    @error('phone')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                            class="w-full border-gray-300 bg-blue-500 text-black py-2 rounded-md hover:bg-blue-600 transition">
                        Register
                    </button>
                </div>
            </form>
</x-app-layout>
