<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

const props = defineProps<{
    kendaraan: Array<{
        id: number;
        nomor_polisi: any[];
        jenis: any[];
        status_kepemilikan: string;
        perusahaan_sewa_id: any[];
        kantor_id: any[];
        merk: any[];
        tipe: any[];
        tahun: any[];
        perusahaan_sewa: { name: string } | null;
        kantor: { name: string } | null;
    }>;
}>();
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Vehicle',
        href: '/vehicle',
    },
];
console.log(props.kendaraan);
</script>
<template>
    <Head title="Vehicle" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="relative overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400" style="text-wrap: nowrap">
                    <thead class="bg-gray-50 text-xs text-gray-700 uppercase dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nomor Polisi</th>
                            <th scope="col" class="px-6 py-3">Jenis</th>
                            <th scope="col" class="px-6 py-3">Status Kepemilikan</th>
                            <th scope="col" class="px-6 py-3">Perusahaan Sewa</th>
                            <th scope="col" class="px-6 py-3">Kantor</th>
                            <th scope="col" class="px-6 py-3">Merek</th>
                            <th scope="col" class="px-6 py-3">Tipe</th>
                            <th scope="col" class="px-6 py-3">Tahun</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(kendaraan, index) in props.kendaraan" :key="kendaraan.id" class="border-b">
                            <td class="px-6 py-4">{{ kendaraan.nomor_polisi }}</td>
                            <td class="px-6 py-4 capitalize">{{ kendaraan.jenis }}</td>
                            <td class="px-6 py-4 capitalize">{{ kendaraan.status_kepemilikan }}</td>
                            <td class="px-6 py-4">
                                <span v-if="kendaraan.status_kepemilikan === 'sewa'">
                                    {{ kendaraan.perusahaan_sewa?.name ?? '-' }}
                                </span>
                                <span v-else>-</span>
                            </td>
                            <td class="px-6 py-4">{{ kendaraan.kantor?.name ?? '-' }}</td>
                            <td class="px-6 py-4">{{ kendaraan.merk }}</td>
                            <td class="px-6 py-4">{{ kendaraan.tipe ?? '-' }}</td>
                            <td class="px-6 py-4">{{ kendaraan.tahun }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>
