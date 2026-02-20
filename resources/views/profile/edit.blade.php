<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('status') === 'profile-updated')
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                            {{ __('Profile updated successfully!') }}
                        </div>
                    @endif

                    @if (session('status') === 'photo-removed')
                        <div class="mb-4 p-4 bg-blue-100 text-blue-700 rounded-lg">
                            {{ __('Profile photo removed successfully!') }}
                        </div>
                    @endif

                    @if (session('status') === 'photo-updated')
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                            {{ __('Profile photo updated successfully!') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <!-- Left Column - Photo & Basic Info -->
                        <div class="lg:col-span-1">
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <!-- Profile Photo -->
                                <div class="text-center mb-6">
                                    <div class="relative inline-block">
@if(Auth::user()->photo)
                                            <img src="{{ asset('storage/photos/' . Auth::user()->photo) }}"
                                                 alt="Profile Photo"
                                                 class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg">
                                        @else
                                            <div class="w-32 h-32 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center text-white text-4xl font-bold mx-auto">
                                                {{ substr(Auth::user()->name, 0, 1) }}
                                            </div>
                                        @endif

                                        @if(Auth::user()->role === 'admin')
                                            <div class="absolute -top-2 -right-2 bg-red-600 text-white text-xs px-3 py-1 rounded-full">
                                                Admin
                                            </div>
                                        @else
                                            <div class="absolute -top-2 -right-2 bg-green-600 text-white text-xs px-3 py-1 rounded-full">
                                                Calon Maba
                                            </div>
                                        @endif
                                    </div>

                                    <h3 class="text-xl font-bold mt-4">{{ Auth::user()->name }}</h3>
                                    <p class="text-gray-600">{{ Auth::user()->email }}</p>
                                    <p class="text-sm text-gray-500 mt-1">
                                        {{ Auth::user()->role === 'admin' ? 'Administrator' : 'Calon Mahasiswa Baru' }}
                                    </p>

                                    <!-- Photo Upload/Remove -->
                                    <div class="mt-4 space-y-2">
                                        <form method="POST" action="{{ route('profile.photo.update') }}" enctype="multipart/form-data" id="photoForm">
                                            @csrf
                                            @method('patch')
                                            <input type="file" name="photo" id="photo" class="hidden" accept="image/*" onchange="document.getElementById('photoForm').submit()">
                                            <label for="photo" class="cursor-pointer inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition text-sm">
                                                <i class="fas fa-camera mr-2"></i>Ganti Foto
                                            </label>
                                        </form>

                                        @if(Auth::user()->photo)
                                            <form method="POST" action="{{ route('profile.remove-photo') }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm">
                                                    <i class="fas fa-trash mr-1"></i>Hapus Foto
                                                </button>
                                            </form>
                                        @endif
                                        @if($errors->has('photo'))
                                            <p class="text-red-600 text-sm mt-2">{{ $errors->first('photo') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <!-- User Stats (for Calon Maba) -->
                                @if(Auth::user()->role === 'user')
                                    <div class="mt-6 pt-6 border-t border-gray-200">
                                        <h4 class="font-bold text-gray-700 mb-3">Status Pendaftaran</h4>
                                        <div class="space-y-2">
                                            <div class="flex justify-between">
                                                <span class="text-gray-600">Nomor Test:</span>
                                                <span class="font-bold">-</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-gray-600">Status Test:</span>
                                                <span class="px-2 py-1 rounded text-xs font-bold text-yellow-600 bg-yellow-100">
                                                    Belum
                                                </span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-gray-600">Daftar Ulang:</span>
                                                <span class="px-2 py-1 rounded text-xs font-bold text-yellow-600 bg-yellow-100">
                                                    Belum
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Admin Info -->
                                @if(Auth::user()->role === 'admin')
                                    <div class="mt-6 pt-6 border-t border-gray-200">
                                        <h4 class="font-bold text-gray-700 mb-3">Info Admin</h4>
                                        <div class="space-y-2">
                                            <div class="flex items-center text-gray-600">
                                                <i class="fas fa-briefcase mr-2"></i>
                                                <span>{{ Auth::user()->position ?? 'Administrator' }}</span>
                                            </div>
                                            <div class="flex items-center text-gray-600">
                                                <i class="fas fa-building mr-2"></i>
                                                <span>{{ Auth::user()->department ?? 'PMB' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Right Column - Forms -->
                        <div class="lg:col-span-2">
                            <!-- Update Profile Information -->
                            <div class="mb-8">
                                <h3 class="text-lg font-bold mb-4">Informasi Profil</h3>

                                <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                                    @csrf
                                    @method('patch')

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- Name -->
                                        <div>
                                            <x-input-label for="name" :value="__('Nama Lengkap')" />
                                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                                :value="old('name', Auth::user()->name)" required autofocus />
                                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                        </div>

                                        <!-- Email -->
                                        <div>
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                                :value="old('email', Auth::user()->email)" required />
                                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                        </div>

                                        <!-- Phone -->
                                        <div>
                                            <x-input-label for="phone" :value="__('Nomor Telepon')" />
                                            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"
                                                :value="old('phone', Auth::user()->phone)" />
                                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                                        </div>

                                        <!-- Gender -->
                                        <div>
                                            <x-input-label for="gender" :value="__('Jenis Kelamin')" />
                                            <select id="gender" name="gender" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="L" {{ old('gender', Auth::user()->gender) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                                <option value="P" {{ old('gender', Auth::user()->gender) == 'P' ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
                                        </div>

                                        <!-- Birth Place & Date -->
                                        <div>
                                            <x-input-label for="birth_place" :value="__('Tempat Lahir')" />
                                            <x-text-input id="birth_place" name="birth_place" type="text" class="mt-1 block w-full"
                                                :value="old('birth_place', Auth::user()->birth_place)" />
                                            <x-input-error class="mt-2" :messages="$errors->get('birth_place')" />
                                        </div>

                                        <div>
                                            <x-input-label for="birth_date" :value="__('Tanggal Lahir')" />
                                            <x-text-input id="birth_date" name="birth_date" type="date" class="mt-1 block w-full"
                                                :value="old('birth_date', Auth::user()->birth_date ? Auth::user()->birth_date->format('Y-m-d') : '')" />
                                            <x-input-error class="mt-2" :messages="$errors->get('birth_date')" />
                                        </div>

                                        <!-- Parents Info -->
                                        <div>
                                            <x-input-label for="father_name" :value="__('Nama Ayah')" />
                                            <x-text-input id="father_name" name="father_name" type="text" class="mt-1 block w-full"
                                                :value="old('father_name', Auth::user()->father_name)" />
                                            <x-input-error class="mt-2" :messages="$errors->get('father_name')" />
                                        </div>

                                        <div>
                                            <x-input-label for="mother_name" :value="__('Nama Ibu')" />
                                            <x-text-input id="mother_name" name="mother_name" type="text" class="mt-1 block w-full"
                                                :value="old('mother_name', Auth::user()->mother_name)" />
                                            <x-input-error class="mt-2" :messages="$errors->get('mother_name')" />
                                        </div>

                                        <!-- For Admin Only -->
                                        @if(Auth::user()->role === 'admin')
                                            <div>
                                                <x-input-label for="position" :value="__('Jabatan')" />
                                                <x-text-input id="position" name="position" type="text" class="mt-1 block w-full"
                                                    :value="old('position', Auth::user()->position)" />
                                                <x-input-error class="mt-2" :messages="$errors->get('position')" />
                                            </div>

                                            <div>
                                                <x-input-label for="department" :value="__('Departemen')" />
                                                <x-text-input id="department" name="department" type="text" class="mt-1 block w-full"
                                                    :value="old('department', Auth::user()->department)" />
                                                <x-input-error class="mt-2" :messages="$errors->get('department')" />
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Address -->
                                    <div>
                                        <x-input-label for="address" :value="__('Alamat Lengkap')" />
                                        <textarea id="address" name="address" rows="3"
                                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('address', Auth::user()->address) }}</textarea>
                                        <x-input-error class="mt-2" :messages="$errors->get('address')" />
                                    </div>

                                    <div class="flex items-center gap-4">
                                        <x-primary-button>{{ __('Simpan Perubahan') }}</x-primary-button>

                                        @if (session('status') === 'profile-updated')
                                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                                class="text-sm text-gray-600">
                                                {{ __('Saved.') }}
                                            </p>
                                        @endif
                                    </div>
                                </form>
                            </div>

                            <!-- Update Password -->
                            <div class="mb-8 pt-8 border-t border-gray-200">
                                <h3 class="text-lg font-bold mb-4">Update Password</h3>

                                <form method="post" action="{{ route('password.update') }}" class="space-y-6">
                                    @csrf
                                    @method('put')

                                    <div>
                                        <x-input-label for="current_password" :value="__('Password Saat Ini')" />
                                        <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                    </div>

                                    <div>
                                        <x-input-label for="password" :value="__('Password Baru')" />
                                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                    </div>

                                    <div>
                                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                                        <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                    </div>

                                    <div class="flex items-center gap-4">
                                        <x-primary-button>{{ __('Update Password') }}</x-primary-button>

                                        @if (session('status') === 'password-updated')
                                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                                class="text-sm text-gray-600">
                                                {{ __('Password updated.') }}
                                            </p>
                                        @endif
                                    </div>
                                </form>
                            </div>

                            <!-- Delete Account -->
                            <div class="pt-8 border-t border-gray-200">
                                <h3 class="text-lg font-bold mb-4">Hapus Akun</h3>

                                <p class="text-sm text-gray-600 mb-4">
                                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                                </p>

                                <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                                    class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                                    {{ __('Hapus Akun') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Account Modal -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="Password" class="sr-only" />
                <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4"
                    placeholder="Password" />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</x-app-layout>
