<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profil Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <strong>NIM:</strong> {{ $mahasiswa->nim }}
                    </div>
                    <div class="mb-4">
                        <strong>Nama Lengkap:</strong> {{ $mahasiswa->nama_lengkap }}
                    </div>
                    <div class="mb-4">
                        <strong>Email:</strong> {{ $mahasiswa->user->email }}
                    </div>
                    <div class="mb-4">
                        <strong>Tahun Angkatan:</strong> {{ $mahasiswa->tahun_angkatan }}
                    </div>
                    <div class="mb-4">
                        <strong>Program Studi:</strong> {{ $mahasiswa->prodi }}
                    </div>
                    <div class="mb-4">
                        <strong>Status:</strong> {{ $mahasiswa->status }}
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('mahasiswa.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
