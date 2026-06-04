<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profil Dosen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <strong>NIDN:</strong> {{ $dosen->nidn }}
                    </div>
                    <div class="mb-4">
                        <strong>Nama Lengkap:</strong> {{ $dosen->nama_lengkap }}
                    </div>
                    <div class="mb-4">
                        <strong>Email:</strong> {{ $dosen->user->email }}
                    </div>
                    <div class="mb-4">
                        <strong>Nomor HP:</strong> {{ $dosen->no_hp }}
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('dosen.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
