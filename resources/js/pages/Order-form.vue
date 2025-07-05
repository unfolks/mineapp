<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps<{
    kendaraans: any[];
    drivers: any[];
    approvers1: any[];
    approvers2: any[];
    storeRoute: string;
}>();

const form = useForm({
    kendaraan_id: '',
    driver_id: '',
    tanggal_mulai: '',
    tanggal_selesai: '',
    lokasi_awal: '',
    lokasi_tujuan: '',
    keperluan: '',
    approver1_id: '',
    approver2_id: '',
});

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Order', href: '/order' },
    { title: 'Add Order', href: '/order-form' },
];
console.log(props.kendaraans, props.drivers, props.approvers2);
</script>

<template>
    <Head title="Form Pemesanan Kendaraan" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="max-w-3xl space-y-6 rounded-xl p-6 shadow-md">
            <h1 class="mb-4 text-2xl font-bold text-gray-700">Form Pemesanan Kendaraan</h1>

            <form @submit.prevent="form.post(props.storeRoute)" class="space-y-5">
                <!-- Kendaraan -->
                <div>
                    <label for="kendaraan_id" class="block text-sm font-medium text-gray-700">Kendaraan</label>
                    <select
                        v-model="form.kendaraan_id"
                        id="kendaraan_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200"
                        required
                    >
                        <option value="">-- Pilih Kendaraan --</option>
                        <option v-for="k in props.kendaraans" :key="k.id" :value="k.id">{{ k.nomor_polisi }} - {{ k.merk }} {{ k.tipe }}</option>
                    </select>
                </div>

                <!-- Driver -->
                <div>
                    <label for="driver_id" class="block text-sm font-medium text-gray-700">Driver</label>
                    <select
                        v-model="form.driver_id"
                        id="driver_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200"
                        required
                    >
                        <option value="">-- Pilih Driver --</option>
                        <option v-for="d in props.drivers" :key="d.id" :value="d.id">
                            {{ d.nama }}
                        </option>
                    </select>
                </div>

                <!-- Tanggal Mulai -->
                <div>
                    <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                    <input
                        type="date"
                        v-model="form.tanggal_mulai"
                        id="tanggal_mulai"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200"
                        required
                    />
                </div>

                <!-- Tanggal Selesai -->
                <div>
                    <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                    <input
                        type="date"
                        v-model="form.tanggal_selesai"
                        id="tanggal_selesai"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200"
                        required
                    />
                </div>

                <!-- Lokasi Awal -->
                <div>
                    <label for="lokasi_awal" class="block text-sm font-medium text-gray-700">Lokasi Awal</label>
                    <input
                        type="text"
                        v-model="form.lokasi_awal"
                        id="lokasi_awal"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200"
                        required
                    />
                </div>

                <!-- Lokasi Tujuan -->
                <div>
                    <label for="lokasi_tujuan" class="block text-sm font-medium text-gray-700">Lokasi Tujuan</label>
                    <input
                        type="text"
                        v-model="form.lokasi_tujuan"
                        id="lokasi_tujuan"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200"
                        required
                    />
                </div>

                <!-- Keperluan -->
                <div>
                    <label for="keperluan" class="block text-sm font-medium text-gray-700">Keperluan</label>
                    <textarea
                        v-model="form.keperluan"
                        id="keperluan"
                        rows="3"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200"
                        required
                    ></textarea>
                </div>

                <!-- Approver 1 -->
                <div>
                    <label for="approver1_id" class="block text-sm font-medium text-gray-700">Atasan Level 1</label>
                    <select
                        v-model="form.approver1_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200"
                        required
                    >
                        <option value="">-- Pilih Atasan Level 1 --</option>
                        <option v-for="a1 in props.approvers1" :key="a1.id" :value="a1.id">{{ a1.name }} - {{ a1.jabatan }}</option>
                    </select>
                </div>

                <!-- Approver 2 -->
                <div>
                    <label for="approver2_id" class="block text-sm font-medium text-gray-700">Atasan Level 2</label>
                    <select
                        v-model="form.approver2_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200"
                        required
                    >
                        <option value="">-- Pilih Atasan Level 2 --</option>
                        <option v-for="a2 in props.approvers2" :key="a2.id" :value="a2.id">{{ a2.name }} - {{ a2.jabatan }}</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button
                        type="submit"
                        class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 font-semibold text-white hover:bg-indigo-700 focus:ring focus:ring-indigo-300 focus:outline-none"
                        :disabled="form.processing"
                    >
                        Ajukan Pemesanan
                    </button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
