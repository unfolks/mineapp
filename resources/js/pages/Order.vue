<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, router } from '@inertiajs/vue3';
const props = defineProps<{
    orders: Array<{
        id: number;
        tanggal_mulai: string;
        tanggal_selesai: string;
        keperluan: string;
        status: string;
        created_at: string;
        kendaraan: { nomor_polisi: string } | null;
        driver: { nama: string } | null;
        pemesan: { name: string } | null;
        approval_status: string;
        approval_progress: number;
        can_approve: boolean;
        user_approval_id: number;
    }>;
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Order',
        href: '/order',
    },
];

function approve(id: number, status: 'disetujui' | 'ditolak') {
    if (confirm(`Yakin ingin ${status === 'disetujui' ? 'menyetujui' : 'menolak'} pemesanan ini?`)) {
        router.post(`/approvals/${id}/action`, { status });
    }
}
console.log(props.orders);
</script>
<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div>
                <button class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700" @click="$inertia.visit('/order-form')">
                    Tambah
                </button>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                    <thead class="bg-gray-50 text-xs text-gray-700 uppercase dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Tanggal Pemesanan</th>
                            <th scope="col" class="px-6 py-3">Tanggal Mulai</th>
                            <th scope="col" class="px-6 py-3">Tanggal Selesai</th>
                            <th scope="col" class="px-6 py-3">Keperluan</th>
                            <th scope="col" class="px-6 py-3">Kendaraan</th>
                            <th scope="col" class="px-6 py-3">Driver</th>
                            <th scope="col" class="px-6 py-3">Pemesan</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Menyetujui</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="order in props.orders" :key="order.id">
                            <td class="px-6 py-4">{{ new Date(order.created_at).toLocaleDateString() }}</td>
                            <td class="px-6 py-4">{{ new Date(order.tanggal_mulai).getFullYear() }} {{ order.tanggal_mulai }}</td>
                            <td class="px-6 py-4">{{ order.tanggal_selesai }}</td>
                            <td class="px-6 py-4">{{ order.keperluan }}</td>
                            <td class="px-6 py-4">{{ order.kendaraan?.nomor_polisi ?? '-' }}</td>
                            <td class="px-6 py-4">{{ order.driver?.nama ?? '-' }}</td>
                            <td class="px-6 py-4">{{ order.pemesan?.name ?? '-' }}</td>
                            <td class="px-6 py-4" style="text-wrap: nowrap">
                                <span
                                    class="mr-2 rounded px-2 py-1 text-xs font-semibold"
                                    :class="{
                                        'bg-yellow-100 text-yellow-800': order.approval_status === 'Menunggu',
                                        'bg-green-100 text-green-800': order.approval_status === 'Disetujui',
                                        'bg-red-100 text-red-800': order.approval_status === 'Ditolak',
                                        'bg-blue-100 text-blue-800': order.approval_status === 'Dalam Proses',
                                    }"
                                >
                                    {{ order.approval_status }} {{ order.approval_progress }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <template v-if="order.can_approve">
                                    <button
                                        class="mr-2 rounded bg-green-500 px-3 py-1 text-xs text-white hover:bg-green-600"
                                        @click="approve(order.user_approval_id, 'disetujui')"
                                    >
                                        Approve
                                    </button>
                                    <button
                                        class="rounded bg-red-500 px-3 py-1 text-xs text-white hover:bg-red-600"
                                        @click="approve(order.user_approval_id, 'ditolak')"
                                    >
                                        Tolak
                                    </button>
                                </template>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>
