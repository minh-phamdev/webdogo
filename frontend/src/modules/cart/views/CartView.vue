<template>
    <div class="cart-page">
        <AppHeader />

        <main class="page-content">
            <div class="container-1320">
                <!-- Header & Breadcrumb -->
                <div class="page-header">
                    <div class="breadcrumb">
                        <router-link to="/">Trang chủ</router-link>
                        <span>/</span>
                        <span class="current">Giỏ hàng</span>
                    </div>
                    <h1 class="page-title serif">
                        Giỏ hàng của bạn
                        <span class="cart-count">({{ cartItems.length }} sản phẩm)</span>
                    </h1>
                </div>

                <!-- Trạng thái 1: Giỏ hàng trống -->
                <CartEmpty v-if="cartItems.length === 0" />

                <!-- Trạng thái 2: Có sản phẩm -->
                <div v-else class="cart-layout">
                    <!-- Cột Trái -->
                    <div class="cart-left-col">
                        <div class="cart-items-card bo-rounded">
                            <!-- Render danh sách CartItem -->
                            <div class="cart-item-list">
                                <CartItem v-for="(item, index) in cartItems" :key="item.id" :item="item"
                                    @update-quantity="(delta) => updateQuantity(index, delta)"
                                    @remove="removeItem(index)" />
                            </div>

                            <!-- Ghi chú đơn hàng -->
                            <div class="cart-note-section">
                                <label for="order-note" class="note-label">📝 Ghi chú đơn hàng:</label>
                                <textarea id="order-note" v-model="orderNote"
                                    placeholder="Ví dụ: Yêu cầu ngày giao, kích thước Lỗ Ban..." rows="3"></textarea>
                            </div>
                        </div>

                        <div class="cart-actions-bottom">
                            <router-link to="/" class="btn-continue">
                                ← Tiếp tục xem sản phẩm khác
                            </router-link>
                        </div>
                    </div>

                    <!-- Cột Phải -->
                    <div class="cart-right-col">
                        <CartSummary :subtotal="subtotal" :discount="discount" :total="total"
                            @apply-voucher="handleApplyVoucher" @checkout="handleCheckout" />
                    </div>
                </div>

                <!-- Khối gợi ý -->
                <div v-if="cartItems.length > 0" class="recommended-section">
                    <RelatedProducts />
                </div>
            </div>
        </main>

        <AppFooter />
    </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useRouter } from 'vue-router'

// Layout & Shared
import AppHeader from '@/shared/components/layout/AppHeader.vue'
import AppFooter from '@/shared/components/layout/AppFooter.vue'
import RelatedProducts from '@/modules/product_detail/components/RelatedProducts.vue'

// Cart Components
import CartEmpty from '../components/CartEmpty.vue'
import CartItem from '../components/CartItem.vue'
import CartSummary from '../components/CartSummary.vue'

const router = useRouter()

const cartItems = ref([
    {
        id: 1,
        name: 'Tượng Di Lặc Ngũ Phúc Gỗ Hương Nguyên Khối',
        sku: 'S100/A6401096A',
        woodType: 'Hương Đỏ',
        price: 5500000,
        oldPrice: 7000000,
        quantity: 1,
        image: 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=300&auto=format&fit=crop&q=60'
    },
    {
        id: 2,
        name: 'Cóc Ngậm Tiền Gỗ Mun Sừng Phong Thủy',
        sku: 'C200/M30200',
        woodType: 'Mun Sừng',
        price: 2500000,
        oldPrice: 3500000,
        quantity: 2,
        image: 'https://images.unsplash.com/photo-1544816155-12df9643f363?w=300&auto=format&fit=crop&q=60'
    }
])

const orderNote = ref('')
const discount = ref(0)

const subtotal = computed(() => {
    return cartItems.value.reduce((sum, item) => sum + item.price * item.quantity, 0)
})

const total = computed(() => {
    return Math.max(0, subtotal.value - discount.value)
})

const updateQuantity = (index, delta) => {
    const newQty = cartItems.value[index].quantity + delta
    if (newQty >= 1) cartItems.value[index].quantity = newQty
}

const removeItem = (index) => {
    if (confirm('Bạn có chắc muốn xóa sản phẩm này?')) {
        cartItems.value.splice(index, 1)
    }
}

const handleApplyVoucher = (code) => {
    if (code.toUpperCase() === 'WEBDOGO500') {
        discount.value = 500000
        alert('Áp dụng mã giảm giá 500.000đ thành công!')
    } else {
        alert('Mã giảm giá không hợp lệ!')
    }
}

const handleCheckout = () => {
    router.push('/checkout')
}
</script>

<style scoped>
.cart-page {
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

.cart-count {
    font-size: 18px;
    font-weight: normal;
    color: #777;
}

.cart-layout {
    display: flex;
    gap: 24px;
    align-items: flex-start;
}

.cart-left-col {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.cart-right-col {
    width: 380px;
    position: sticky;
    top: 20px;
}

.cart-items-card {
    background: #ffffff;
    border: 1px solid var(--wd-line, #e8e2d9);
    padding: 24px;
}

.bo-rounded {
    border-radius: 12px;
}

.cart-note-section {
    margin-top: 20px;
    padding-top: 16px;
    border-top: 1px dashed #e8e2d9;
}

.note-label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: var(--wd-wood-900, #2c1810);
    margin-bottom: 8px;
}

.cart-note-section textarea {
    width: 100%;
    border: 1px solid #e8e2d9;
    border-radius: 8px;
    padding: 10px;
    box-sizing: border-box;
    outline: none;
}

.btn-continue {
    color: var(--wd-gold-600, #d4af37);
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
}

@media (max-width: 992px) {
    .cart-layout {
        flex-direction: column;
    }

    .cart-right-col {
        width: 100%;
    }
}
</style>