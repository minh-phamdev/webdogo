<template>
    <div class="order-tracking-page">
        <AppHeader />

        <main class="page-content">
            <div class="container-1320">

                <!-- 1. Form Tra cứu -->
                <TrackingSearchForm @search="handleSearch" />

                <!-- 2. Kết quả Tra cứu (Hiển thị khi tìm thấy đơn) -->
                <div v-if="orderResult" class="result-wrapper">

                    <!-- Timeline Tiến độ -->
                    <OrderTimelineCard :order="orderResult" />

                    <!-- Ảnh thực tế tại xưởng -->
                    <FactoryPhotosCard :photos="orderResult.factoryPhotos" />

                    <!-- Chi tiết sản phẩm -->
                    <TrackingOrderItems :items="orderResult.items" />

                </div>

            </div>
        </main>

        <AppFooter />
    </div>
</template>

<script setup>
import { ref } from 'vue'

import AppHeader from '@/shared/components/layout/AppHeader.vue'
import AppFooter from '@/shared/components/layout/AppFooter.vue'

import TrackingSearchForm from '../components/tracking/TrackingSearchForm.vue'
import OrderTimelineCard from '../components/tracking/OrderTimelineCard.vue'
import FactoryPhotosCard from '../components/tracking/FactoryPhotosCard.vue'
import TrackingOrderItems from '../components/tracking/TrackingOrderItems.vue'

const orderResult = ref(null)

const handleSearch = (searchParams) => {
    // Giả lập gọi API tra cứu đơn hàng theo searchParams ({ orderCode, phone })
    orderResult.value = {
        code: searchParams.orderCode || 'WD889922',
        createdDate: '13/08/2026',
        currentStatusText: '🛠️ Đang Sơn PU & Phủ Bóng',
        currentStatusClass: 'status-processing',
        steps: [
            { title: 'Tiếp nhận đơn', icon: '📝', isDone: true, isActive: false, time: '13/08 - 09:30' },
            { title: 'Lựa chọn phôi gỗ', icon: '🪵', isDone: true, isActive: false, time: '14/08 - 14:00' },
            { title: 'Đục chạm mộc', icon: '🔨', isDone: true, isActive: false, time: '16/08 - 11:15' },
            { title: 'Sơn PU hoàn thiện', icon: '🎨', isDone: false, isActive: true, time: 'Đang xử lý (Dự kiến 18/08)' },
            { title: 'Bàn giao & Lắp đặt', icon: '🚛', isDone: false, isActive: false, time: 'Dự kiến 20/08' }
        ],
        factoryPhotos: [
            { url: 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=400&auto=format&fit=crop&q=60', caption: '1. Kiểm tra phôi gỗ Hương nguyên khối' },
            { url: 'https://images.unsplash.com/photo-1544816155-12df9643f363?w=400&auto=format&fit=crop&q=60', caption: '2. Thợ hoàn thiện phần mộc đục tay' }
        ],
        items: [
            {
                id: 1,
                name: 'Tượng Di Lặc Ngũ Phúc Gỗ Hương Nguyên Khối',
                woodType: 'Gỗ Hương Gia Lai',
                dimensions: 'Cao 81cm x Ngang 48cm (Cung Tiến Bảo - Lỗ Ban)',
                quantity: 1,
                price: 10000000,
                image: 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=200&auto=format&fit=crop&q=60'
            }
        ]
    }
}
</script>

<style scoped>
.order-tracking-page {
    background-color: var(--wd-bg, #fbf9f6);
    min-height: 100vh;
}

.page-content {
    padding: 40px 0 60px;
}

.container-1320 {
    max-width: 1000px;
    margin: 0 auto;
    padding: 0 20px;
}

.result-wrapper {
    margin-top: 30px;
    display: flex;
    flex-direction: column;
    gap: 24px;
}
</style>