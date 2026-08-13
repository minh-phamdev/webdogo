<template>
    <div class="order-success-page">
        <AppHeader />

        <main class="page-content">
            <div class="container-1320">

                <!-- 1. Banner Chúc mừng & Mã đơn -->
                <SuccessBanner :orderCode="orderInfo.code" />

                <div class="success-content-wrapper">

                    <!-- 2. Thẻ Quét mã VietQR (Chỉ hiện khi chọn Chuyển khoản) -->
                    <VietQrCard v-if="orderInfo.paymentMethod === 'qr'" :orderCode="orderInfo.code"
                        :total="orderInfo.total" />

                    <!-- 3. Thẻ Chi tiết đơn hàng & Sản phẩm -->
                    <OrderDetailsCard :order="orderInfo" />

                    <!-- 4. Nút bấm hành động -->
                    <SuccessActions />

                </div>
            </div>
        </main>

        <AppFooter />
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRoute } from 'vue-router'

import AppHeader from '@/shared/components/layout/AppHeader.vue'
import AppFooter from '@/shared/components/layout/AppFooter.vue'

import SuccessBanner from '../components/SuccessBanner.vue'
import VietQrCard from '../components/VietQrCard.vue'
import OrderDetailsCard from '../components/OrderDetailsCard.vue'
import SuccessActions from '../components/SuccessActions.vue'

const route = useRoute()

// Dữ liệu đơn hàng (Có thể lấy từ Pinia hoặc API theo query param)
const orderInfo = ref({
    code: route.query.orderCode || 'WD889922',
    customerName: 'Nguyễn Văn A',
    phone: '0988.123.456',
    address: 'Số 123 Đường Cầu Giấy, P. Dịch Vọng, Q. Cầu Giấy, Hà Nội',
    paymentMethod: 'qr', // Hoặc 'cod'
    note: 'Nhờ shop chọn pho tượng vân gỗ đều và đẹp giúp tôi.',
    total: 10000000,
    items: [
        {
            id: 1,
            name: 'Tượng Di Lặc Ngũ Phúc Gỗ Hương Nguyên Khối',
            quantity: 1,
            price: 5500000,
            image: 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=300&auto=format&fit=crop&q=60'
        },
        {
            id: 2,
            name: 'Cóc Ngậm Tiền Gỗ Mun Sừng Phong Thủy',
            quantity: 2,
            price: 2250000,
            image: 'https://images.unsplash.com/photo-1544816155-12df9643f363?w=300&auto=format&fit=crop&q=60'
        }
    ]
})
</script>

<style scoped>
.order-success-page {
    background-color: var(--wd-bg, #fbf9f6);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.page-content {
    flex: 1;
    padding: 40px 0 60px;
}

.container-1320 {
    width: 100%;
    max-width: 1320px;
    margin: 0 auto;
    padding: 0 20px;
    box-sizing: border-box;
}

.success-content-wrapper {
    max-width: 800px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    gap: 24px;
}
</style>