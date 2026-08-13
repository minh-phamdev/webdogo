<template>
    <div class="product-main-info left-align">
        <!-- Tên Sản Phẩm Serif cao cấp, capitalization nhất quán -->
        <h1 class="product-title serif capitalize">Tượng Di Lặc Ngũ Phúc Gỗ Hương Nguyên Khối</h1>

        <!-- Thông Tin Tóm Tắt (Dóng lề trái, dóng dều vertical align) -->
        <div class="summary-row">
            <span class="sku">SKU: S100/A6401096A</span>
            <span class="divider"></span>
            <span class="rating-stars bo-rounded">★ ★ ★ ★ ★ 4.9/5 đánh giá</span>
        </div>

        <!-- Logic GIÁ CHUẨN (Đã sửa lỗi logic) -->
        <div class="pricing-wrap">
            <span class="old-price">7.000.000đ</span>
            <span class="promo-price red-bold">5.500.000đ</span>
        </div>

        <!-- Chọn Số Lượng -->
        <div class="quantity-selector bo-rounded">
            <label for="quantity">Số lượng</label>
            <div class="quantity-input">
                <button @click="quantity > 1 ? quantity-- : null">-</button>
                <input type="number" id="quantity" v-model="quantity" min="1" />
                <button @click="quantity++">+</button>
            </div>
        </div>

        <!-- Nút CTA bo góc radius tương ứng nút "Mua ngay" trên Trang chủ -->
        <div class="cta-actions">
            <button class="add-to-cart btn bo-rounded">Thêm vào giỏ hàng</button>
            <button class="buy-now btn bo-rounded btn-gold">Mua ngay</button>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
const quantity = ref(1);
</script>

<style scoped>
.product-main-info {
    display: flex;
    flex-direction: column;
    gap: 20px;
    padding: 30px;
    box-sizing: border-box;
}

.product-title {
    font-size: 32px;
    font-weight: 700;
    color: var(--wd-wood-900, #2c1810);
    line-height: 1.25;
    margin: 0;
}

.summary-row {
    display: flex;
    align-items: center;
    gap: 16px;
    font-size: 13px;
    color: var(--wd-ink-soft, #888);
}

.rating-stars {
    color: var(--wd-gold-600, #d4af37);
    font-weight: 600;
    background: rgba(212, 175, 55, 0.06);
    padding: 4px 8px;
}

.divider {
    width: 1px;
    height: 14px;
    background-color: var(--wd-line, #eee);
}

.pricing-wrap {
    display: flex;
    align-items: baseline;
    gap: 12px;
}

.old-price {
    font-size: 18px;
    text-decoration: line-through;
    color: var(--wd-ink-soft, #888);
}

.promo-price {
    font-size: 24px;
}

.quantity-selector {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 14px;
    border: 1px solid var(--wd-line, #eee);
    padding: 6px 12px;
    width: fit-content;
}

.quantity-input {
    display: flex;
    border: 1px solid var(--wd-line, #eee);
    overflow: hidden;
    border-radius: 4px;
}

.quantity-input button {
    width: 32px;
    height: 32px;
    border: none;
    background-color: #fbf9f6;
    font-weight: bold;
    cursor: pointer;
}

.quantity-input input {
    width: 48px;
    height: 32px;
    border: none;
    text-align: center;
}

.cta-actions {
    display: flex;
    gap: 16px;
}

.btn {
    height: 44px;
    padding: 0 30px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.2s;
    flex: 1;
}

.add-to-cart {
    background-color: #fff;
    border: 1px solid var(--wd-gold-600, #d4af37);
    color: var(--wd-gold-600, #d4af37);
}

.add-to-cart:hover {
    background-color: rgba(212, 175, 55, 0.03);
}

.btn-gold {
    background-color: var(--wd-gold-600, #d4af37);
    border: none;
    color: #fff;
}

.btn-gold:hover {
    background-color: var(--wd-gold-700, #b8860b);
}
</style>