<template>
    <div class="checkout-page">
        <AppHeader />

        <main class="page-content">
            <div class="container-1320">
                <!-- Breadcrumb & Tiêu đề -->
                <div class="page-header">
                    <div class="breadcrumb">
                        <router-link to="/">Trang chủ</router-link>
                        <span>/</span>
                        <router-link to="/cart">Giỏ hàng</router-link>
                        <span>/</span>
                        <span class="current">Thanh toán</span>
                    </div>
                    <h1 class="page-title serif">Xác nhận thông tin & Thanh toán</h1>
                </div>

                <div class="checkout-layout">
                    <!-- CỘT TRÁI: Form thông tin & Phương thức thanh toán -->
                    <div class="checkout-left-col">
                        <CheckoutForm @update-form="handleFormUpdate" />
                        <PaymentMethods @update-method="handleMethodUpdate" />
                    </div>

                    <!-- CỘT PHẢI: Tóm tắt đơn hàng & Nút chốt đơn -->
                    <div class="checkout-right-col">
                        <OrderSummary :items="cartItems" :subtotal="subtotal" :discount="discount" :total="total"
                            :isSubmitting="isSubmitting" @submit-order="handleSubmitOrder" />
                    </div>
                </div>
            </div>
        </main>

        <AppFooter />
    </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useRouter } from 'vue-router'

import AppHeader from '@/shared/components/layout/AppHeader.vue'
import AppFooter from '@/shared/components/layout/AppFooter.vue'

import CheckoutForm from '../components/CheckoutForm.vue'
import PaymentMethods from '../components/PaymentMethods.vue'
import OrderSummary from '../components/OrderSummary.vue'

const router = useRouter()

// Dữ liệu giỏ hàng (Sau này lấy từ Pinia Store)
const cartItems = ref([
    {
        id: 1,
        name: 'Tượng Di Lặc Ngũ Phúc Gỗ Hương Nguyên Khối',
        sku: 'S100/A6401096A',
        price: 5500000,
        quantity: 1,
        image: 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=300&auto=format&fit=crop&q=60'
    },
    {
        id: 2,
        name: 'Cóc Ngậm Tiền Gỗ Mun Sừng Phong Thủy',
        sku: 'C200/M30200',
        price: 2500000,
        quantity: 2,
        image: 'https://images.unsplash.com/photo-1544816155-12df9643f363?w=300&auto=format&fit=crop&q=60'
    }
])

const shippingForm = ref({})
const paymentMethod = ref('cod')
const discount = ref(500000)
const isSubmitting = ref(false)

const subtotal = computed(() => {
    return cartItems.value.reduce((sum, item) => sum + item.price * item.quantity, 0)
})

const total = computed(() => {
    return Math.max(0, subtotal.value - discount.value)
})

const handleFormUpdate = (formData) => {
    shippingForm.value = formData
}

const handleMethodUpdate = (method) => {
    paymentMethod.value = method
}

// Xử lý gửi Đặt hàng
const handleSubmitOrder = async () => {
    const form = shippingForm.value
    if (!form.fullName || !form.phone || !form.addressDetail || !form.province) {
        alert('Vui lòng điền đầy đủ các thông tin giao hàng bắt buộc (*)!')
        return
    }

    isSubmitting.value = true

    // Giả lập gửi API tạo đơn hàng
    setTimeout(() => {
        isSubmitting.value = false
        alert('Đặt hàng thành công! Cảm ơn Quý khách.')

        // Chuyển sang màn hình Đặt hàng thành công
        router.push({
            path: '/order-success',
            query: { orderCode: 'WD' + Date.now().toString().slice(-6) }
        })
    }, 1200)
}
</script>

<style scoped>
.checkout-page {
    background-color: var(--wd-bg, #fbf9f6);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.page-content {
    flex: 1;
    padding: 30px 0 60px;
}

.container-1320 {
    width: 100%;
    max-width: 1320px;
    margin: 0 auto;
    padding: 0 20px;
    box-sizing: border-box;
}

.page-header {
    margin-bottom: 24px;
}

.breadcrumb {
    font-size: 13px;
    color: #888;
    display: flex;
    gap: 8px;
    margin-bottom: 8px;
}

.breadcrumb a {
    color: #666;
    text-decoration: none;
}

.breadcrumb .current {
    color: var(--wd-wood-900, #2c1810);
    font-weight: 600;
}

.page-title {
    font-size: 28px;
    color: var(--wd-wood-900, #2c1810);
    margin: 0;
}

.checkout-layout {
    display: flex;
    gap: 24px;
    align-items: flex-start;
}

.checkout-left-col {
    flex: 1;
}

.checkout-right-col {
    width: 420px;
}

@media (max-width: 992px) {
    .checkout-layout {
        flex-direction: column;
    }

    .checkout-right-col {
        width: 100%;
    }
}
</style>